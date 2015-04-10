<?php

// this call returns JSON objects.
header("Content-Type: application/json");

/* This class set the start and cut off dates */

class setDates extends CI_Controller {

    public function __construct() {
      parent::__construct();
    }

    public function index() {

        if(!(isset($_POST["startDate"])) || !(isset($_POST["cutOffDate"]))) {
            exit($this->_buildIncompleteFormResponse());
        } 

        if (!$this->session->isLoggedIn || !($this->session->userType === USER_TYPE_ADMIN)) {
            exit($this->_buildAccessDeniedResponse());
        }

        echo $this->_buildResponse($_POST["startDate"], $_POST["cutOffDate"]);
    }

    private function _buildResponse($startDate, $cutOffDate) {

        /*$setResult = $this->_insertIntoDb($startDate, $cutOffDate);

        return json_encode($setResult);*/

        //return json_encode("HELLLLL");
    }

    private function _insertIntoDb($startDate, $cutOffDate) {


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
