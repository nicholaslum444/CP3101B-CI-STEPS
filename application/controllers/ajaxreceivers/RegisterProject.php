<?php

// this call returns JSON objects.
header("Content-Type: application/json");

/* This class inserts all students into the db entered by the leader */

class RegisterProject extends CI_Controller {

    public function __construct() {
      parent::__construct();
    }

    public function index() {
        if (!(isset($_POST["projectId"]))) 
            exit($this->_buildIncompleteFormResponse());

        if(!(isset($_POST["memberIDs"]))) {
            exit($this->_buildIncompleteFormResponse());
        } 

        if (!$this->session->isLoggedIn || !($this->session->userType === USER_TYPE_STUDENT)) {
            exit($this->_buildAccessDeniedResponse());
        }

        exit($this->_buildResponse($_POST["projectId"],$_POST["memberIDs"], $this->session->userId));
    }

    private function _buildResponse($projectId, $memberIDs, $userId) {

        $insertResult = $this->_insertIntoDb($projectId, $memberIDs, $userId);

        return json_encode($insertResult);
    }

    private function _insertIntoDb($projectId, $memberIDs, $userId) {

        //loop and insert student
        if (is_array($memberIDs)) {
            foreach($memberIDs as $aMember) {
               $this->Dbinsert->insertStudentToProject($projectId, $aMember);
           }
       }

       //$userId = 'A0201001B'; //hardcode to be removed
      $userId = $this->session->userId;
        //insert himself
       $this->Dbinsert->insertStudentToProject($projectId, $userId);

        //set leader
       $this->Dbinsert->setLeaderForProject($userId, $projectId);

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
