<?php

// this call returns JSON objects.
header("Content-Type: application/json");

/* This class create a new instance of STePS*/

class NewStep extends CI_Controller {

    public function __construct() {
      parent::__construct();
    }

    public function index() {

        if(!(isset($_POST["iteration"])) || !(isset($_POST["sem"])) || !(isset($_POST["startDate"])) || !(isset($_POST["endDate"]))
            || !(isset($_POST["registrationDate"]))  || !(isset($_POST["cutOffDate"]))) {
            exit($this->_buildIncompleteFormResponse());
        } 

        if (!$this->session->isLoggedIn || !($this->session->userType === USER_TYPE_ADMIN)) {
            exit($this->_buildAccessDeniedResponse());
        }

        echo $this->_buildResponse($_POST["iteration"], $_POST["sem"], $_POST["startDate"], $_POST["endDate"], 
                                   $_POST["registrationDate"], $_POST["cutOffDate"]);
    }

    private function _buildResponse($newIteration, $stepSem, $startDate, $endDate, $registerDate, $cutOffDate) {

        $setResult = $this->_insertIntoDb($newIteration, $stepSem, $startDate, $endDate, $registerDate, $cutOffDate);

        return json_encode($setResult);
    }

    private function _insertIntoDb($newIteration, $stepSem, $startDate, $endDate, $registerDate, $cutOffDate) {

        //$START_TIME = " 00:00:00";
        //$END_TIME = " 23:59:59";

        $user = $this->session->username;
        $password = $this->session->password;

        $insertSuccess = $this->Dbadmin->openSteps($user, $password, $stepSem, 
                                                   $startDate, $endDate, $cutOffDate, $registerDate);

        // currIteration will be the latest one assigned by DB with auto-increment
        $currIteration = $this->Dbquery->getLatestIteration();

        // if the number entered by admin is not the auto-incremented number, editIteration will be called
        if($newIteration != $currIteration) {
            $insertSuccess = $this->Dbadmin->editIteration($user, $password, $currIteration, $newIteration);
        }

        if($insertSuccess) {
            return [
                "success" => TRUE
            ];
        } else {

            return [
                "success" => FALSE,
                "error" => "EDIT FAIL"
            ];
        }
       
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
