<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IvleLogin extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // should load an actual loading view
        echo "Loading....";

    }

    public function index() {

        // ensure that there is a token
        if (!isset($_GET["token"])) {
            exit("no token supplied");
        }

        // load this token, with string escape
        $token = htmlspecialchars($_GET["token"]);

        // validate token and get result
        $validationResult = UserInfo::getValidationResult($token);

        // die if validation unsuccessful
        if (!$validationResult->Success) {
            exit("token invalid");
        }

        // reassign the token cos it may have been updated
        $token = $validationResult->Token;

        // note the user id
        $userId = UserInfo::getUserID($token);

        // get the user type (USING DEBUG FUNCTION, TODO CHANGE TO ORIGINAL)
        //$userType = UserInfo::__getUserTypeDEBUG__($token);
        $userType = $this->_getUserType($userId);

        if ($userType === USER_TYPE_UNKNOWN) {
            exit("user type unknown");
        }

        // get the profile
        $userProfile = UserInfo::getUserProfile($token);

        $name = $userProfile->Results[0]->Name;

        // store all data needed to keep and validate session
        $userData = [
            "userToken" => $validationResult->Token,
            "userId" => $userId,
            "isLoggedIn" => TRUE,
            "name" => $name,
            "userType" => $userType,
            "userProfile" => $userProfile
        ];

        // insert logged in user to the database as a registered user
        $userExist = $this->Dbquery->userExistByID($userId, $userType);
        if (!$userExist) {
            if ($userType === USER_TYPE_LECTURER) {
                $this->Dbinsert->insertProfBasicDetail($userId, $name);
            } else if ($userType === USER_TYPE_STUDENT) {
                $this->Dbinsert->insertStudentBaseInfo($userId, $name);
            }
        }

        // set the session with the session data
        $this->session->set_userdata($userData);

        // load the script that closes the popup window
        $this->load->view("login/LoginPopup", $this->_makeHeaderData());
    }

    private function _getUserType($userId) {
        if (isset($_GET["s"]) && $this->_isUserIdStudent($userId)) {
            return USER_TYPE_STUDENT;
        }
        if (isset($_GET["l"]) /*&& !$this->_isUserIdStudent($userId)*/) {
            return USER_TYPE_LECTURER;
        }
        return USER_TYPE_UNKNOWN;
    }

    private function _isUserIdStudent($userId) {
        return (preg_match(REGEX_STUDENT_ID, $userId) === 1);
    }

    private function _makeHeaderData() {
        return ViewData::makeHeaderData($this->session, base_url());
    }
}
