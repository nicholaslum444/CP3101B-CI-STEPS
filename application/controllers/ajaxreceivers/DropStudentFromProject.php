<?php

// this call returns JSON objects.
header("Content-Type: application/json");

/* This class drops student from a project by lecturer*/

class DropStudentFromProject extends CI_Controller {

    public function __construct() {
      parent::__construct();
    }

    public function index() {
        if (!(isset($_POST["project"]))) 
            exit($this->_buildIncompleteFormResponse());

        if (!$this->session->isLoggedIn || !($this->session->userType === USER_TYPE_LECTURER)) {
            exit($this->_buildAccessDeniedResponse());
        }

        exit($this->_buildResponse($_POST["project"]));
    }

    private function _buildResponse($project) {

        $insertResult = $this->_insertIntoDb($project);

        return json_encode($insertResult);
    }

    private function _insertIntoDb($project) {
      $id = $project['projectID'];
      $userID = $project['userID'];
      $isLeader = $project['leader'];

      $this->Dbinsert->deleteStudentFromProject($id, $userID); 
    
      if($isLeader) {
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
