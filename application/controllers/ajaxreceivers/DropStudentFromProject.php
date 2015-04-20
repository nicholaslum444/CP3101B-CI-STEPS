<?php

// this call returns JSON objects.
header("Content-Type: application/json");

/* This class drops student from a project by lecturer*/

class DropStudentFromProject extends CI_Controller {

    public function __construct() {
      parent::__construct();
    }

    public function index() {
        if (!(isset($_POST["projectId"])) || !(isset($_POST["members"]))) 
            exit($this->_buildIncompleteFormResponse());

        if (!$this->session->isLoggedIn || !($this->session->userType === USER_TYPE_LECTURER)) {
            exit($this->_buildAccessDeniedResponse());
        }

        exit($this->_buildResponse($_POST["projectId"], $_POST["members"]));
    }

    private function _buildResponse($projectId, $members) {

        $insertResult = $this->_insertIntoDb($projectId, $members);

        return json_encode($insertResult);
    }

    private function _insertIntoDb($projectId, $members) {
      $id = $projectId;
      $leaderIsGone = false;
      
      foreach($members as $toDelete) {
        $userID = $toDelete;
        if($this->Dbquery->isLeader($userID, $projectId)) {
          $leaderIsGone = true;
        }
        $this->Dbinsert->deleteStudentFromProject($projectId, $toDelete); 
      }

      if($leaderIsGone) {
        $query = $this->Dbquery->getStudentDetailByProject($id);
        if(count($query) > 0) {
          $this->Dbinsert->setLeaderForProject($query[1]['userID'], $id);  
        }
      }

       return [
       "success" => TRUE
       ];
    }

    private function _buildIncompleteFormResponse() {
        $fail = [
        "success" => FALSE,
        "error" => "INCOMPLETE_FORM"
        ];

        return json_encode($fail);
    }

    private function _buildAccessDeniedResponse() {
        $fail = [
        "success" => FALSE,
        "error" => "ACCESS_DENIED"
        ];

        return json_encode($fail);
    }
}
