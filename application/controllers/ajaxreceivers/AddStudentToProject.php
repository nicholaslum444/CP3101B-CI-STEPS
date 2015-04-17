<?php

// this call returns JSON objects.
header("Content-Type: application/json");

/* This class adds student from a project by lecturer*/

class AddStudentToProject extends CI_Controller {

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

      $this->Dbinsert->insertStudentToProject($id, $userID); 
    
      $query = $this->Dbquery->getProjectDetailsByProjectID($id);

      if(is_null($query['leaderID'])) {
        $this->Dbinsert->setLeaderForProject($userID, $id);  
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
