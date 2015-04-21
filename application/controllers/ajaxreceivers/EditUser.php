<?php

// this call returns JSON objects.
header("Content-Type: application/json");

/* This class updates students information in the db entered */

class EditUserInformation extends CI_Controller {

    public function __construct() {
      parent::__construct();
    }

    public function index() {
        // if (!(isset($_POST["projectId"]))) 
            // exit($this->_buildIncompleteFormResponse());

        if(!(isset($_POST["userIDs"]))) {
            exit($this->_buildIncompleteFormResponse());
        } 

        if (!$this->session->isLoggedIn) {
            exit($this->_buildAccessDeniedResponse());
        }

        exit($this->_buildResponse($_POST["userIDs"], $this->session->userId));
    }

    private function _buildResponse($userIDs, $userId) {

        $userIDS = $this->_filter($userIDs);        
        $insertResult = $this->_insertIntoDb($userIDs, $userId);

        return json_encode($insertResult);
    }

    private function _insertIntoDb($userIDs, $userId) {

        //loop and update student information
        if (is_array($userIDs)) {
            foreach($userIDs as $aMember) {
              $email = $aMember['email'];
              $contact = $aMember['contact'];
              $food = $aMember['food'];
              $userId = $aMember['userID'];
              //Wierd to call update student though, should change to user instead
              $this->Dbinsert->updateStudentDetail($userID, $email, $contact, $food); 
           }
       }

       return [
       "success" => TRUE
       ];
    }
    
    private function _filter($userIDS) {
      if (is_array($userIDs)) {
          foreach($userIDs as $aMember) {
            $email = $aMember['email'];
            $aMember['email'] = filter_var($email, FILTER_SANITIZE_EMAIL);
            $contact = $aMember['contact'];
            $aMember['contact'] = filter_var($contact, FILTER_SANITIZE_STRING);
            $food = $aMember['food'];
            $aMember['food'] = filter_var($food, FILTER_SANITIZE_STRING);
         }
      }
      return $userIDS;
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
