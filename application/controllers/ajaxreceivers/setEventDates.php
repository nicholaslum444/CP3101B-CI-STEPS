<?php

// this call returns JSON objects.
header("Content-Type: application/json");

/* This class set the start and cut off dates */

class setEventDates extends CI_Controller {

    public function __construct() {
      parent::__construct();
    }

    public function index() {

        if(!(isset($_POST["startDate"])) || !(isset($_POST["endDate"]))
            || !(isset($_POST["registrationDate"]))  || !(isset($_POST["cutOffDate"]))) {
            exit($this->_buildIncompleteFormResponse());
        } 

        if (!$this->session->isLoggedIn || !($this->session->userType === USER_TYPE_ADMIN)) {
            exit($this->_buildAccessDeniedResponse());
        }

        echo $this->_buildResponse($_POST["startDate"], $_POST["endDate"], 
                                   $_POST["registrationDate"], $_POST["cutOffDate"]);
    }

    private function _buildResponse($startDate, $endDate, $registerDate, $cutOffDate) {

        $setResult = $this->_editFieldsInDb($startDate, $endDate, $registerDate, $cutOffDate);

        return json_encode($setResult);

        //return json_encode("HELLLLLoooooo");
    }

    private function _editFieldsInDb($startDate, $endDate, $registerDate, $cutOffDate) {

        $START_TIME = " 00:00:00";
        $END_TIME = " 23:59:59";

        $user = $this->session->username;
        $password = $this->session->password;
        $stepSem = null;    //i.e. AY13/14
        $iteration = $this->Dbquery->getLatestIteration();
        $startDate = $startDate . $START_TIME;
        $endDate = $endDate . $END_TIME;
        $registerDate = $registerDate . $START_TIME;
        $cutOffDate = $cutOffDate . $END_TIME;

        $editSuccess = $this->Dbadmin->editSteps($user, $password, $iteration, $stepSem, 
                                                 $startDate, $endDate, $cutOffDate, $registerDate);

        if($editSuccess) {
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
