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

        /*$setResult = $this->_insertIntoDb($startDate, $endDate);

        return json_encode($setResult);*/

        return json_encode("HELLLLLoooooo");
    }

    private function _insertIntoDb($startDate, $endDate) {


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
