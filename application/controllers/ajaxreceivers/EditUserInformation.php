<?php

// this call returns JSON objects.
header("Content-Type: application/json");

/* This class updates students information in the db entered */

class EditUserInformation extends CI_Controller {

    public function __construct() {
      parent::__construct();
    }

    public function index() {
        if (!(isset($_POST["users"]))) 
            exit($this->_buildIncompleteFormResponse());

        if (!$this->session->isLoggedIn) {
            exit($this->_buildAccessDeniedResponse());
        }

        exit($this->_buildResponse($_POST["users"]));
    }

    private function _buildResponse($users) {

        $insertResult = $this->_insertIntoDb($users);

        return json_encode($insertResult);
    }

    private function _insertIntoDb($users) {
      //echo json_encode($users);
      //echo json_encode($users[0]);
      foreach($users as $user) {
        $userID = null;
        $email = null;
        $food = null;
        $contact = null;
        foreach($user as $field) {
          if(strlen($field['value']) == 0) 
            continue;
          switch($field['name']) {
            case 'userId': $userID = $field['value']; break; 
            case 'name': $name = $field['value']; break;
            case 'foodPref': 
              switch($field['value']) {
                case 'Non-Vegetarians': $food = FOOD_PREFERENCE_NON_VEGETARIAN; break;
                case 'Vegetarians':     $food = FOOD_PREFERENCE_VEGETARIAN; break;
                case 'Muslim':          $food = FOOD_PREFERENCE_MUSLIM; break;
                case 'Non-Muslim':      $food = FOOD_PREFERENCE_NON_MUSLIM; break;
              }
              break;
            case 'contact': $contact = $field['value']; break;
            case 'email': $email = $field['value']; break;
          }
        }
         $this->Dbinsert->updateStudentDetail($userID, $email, $contact, $food); 
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
