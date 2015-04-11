<?php

// this call returns JSON objects.
header("Content-Type: application/json");

/* This class create a new instance of STePS*/

class NewStep extends CI_Controller {

    public function __construct() {
      parent::__construct();
    }

    public function index() {

        if(!(isset($_POST["sem"])) || !(isset($_POST["startDate"])) || !(isset($_POST["endDate"]))
            || !(isset($_POST["registrationDate"]))  || !(isset($_POST["cutOffDate"]))) {
            exit($this->_buildIncompleteFormResponse());
        } 

        if (!$this->session->isLoggedIn || !($this->session->userType === USER_TYPE_ADMIN)) {
            exit($this->_buildAccessDeniedResponse());
        }

        echo $this->_buildResponse($_POST["sem"], $_POST["startDate"], $_POST["endDate"], 
                                   $_POST["registrationDate"], $_POST["cutOffDate"]);
    }

    private function _buildResponse($sem, $startDate, $endDate, $registerDate, $cutOffDate) {

        $setResult = $this->_insertIntoDb($sem, $startDate, $endDate, $registerDate, $cutOffDate);

        return json_encode($setResult);
    }

    private function _insertIntoDb($sem, $startDate, $endDate, $registerDate, $cutOffDate) {

        $START_TIME = " 00:00:00";
        $END_TIME = " 23:59:59";

        $user = $this->session->username;
        $password = $this->session->password;
        $stepSem = $sem;
        $startDate = $startDate . $START_TIME;
        $endDate = $endDate . $END_TIME;
        $registerDate = $registerDate . $START_TIME;
        $cutOffDate = $cutOffDate . $END_TIME;

        $insertSuccess = $this->Dbadmin->openSteps($user, $password, $stepSem, 
                                                   $startDate, $endDate, $cutOffDate, $registerDate);

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
