<?php

// this call returns JSON objects.
header("Content-Type: application/json");

/* This class drops student from a project by lecturer*/

class DropStudentFromModule extends CI_Controller {

    public function __construct() {
      parent::__construct();
    }

    public function index() {
        if (!(isset($_POST["module"]))) 
            exit($this->_buildIncompleteFormResponse());

        if (!$this->session->isLoggedIn || !($this->session->userType === USER_TYPE_LECTURER)) {
            exit($this->_buildAccessDeniedResponse());
        }

        exit($this->_buildResponse($_POST["module"]));
    }

    private function _buildResponse($project) {

        $insertResult = $this->_insertIntoDb($project);

        return json_encode($insertResult);
    }

    private function _insertIntoDb($project) {
      $moduleID = $project['moduleID'];
      $userID = $project['userID'];

      $this->Dbinsert->dismissStudentfromModule($userID, $moduleID);

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
