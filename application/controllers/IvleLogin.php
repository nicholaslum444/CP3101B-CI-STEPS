<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IvleLogin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library("session");
	echo "testing";
        // load the helper that helps us auth
        $this->load->helper("UserInfo");
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
            exit ("token invalid");
        }

        // reassign the token cos it may have been updated
        $token = $validationResult->Token;

        // note the user id
        $userId = UserInfo::getUserID($token);

        // get the profile
        $userProfile = UserInfo::getUserProfile($token);

        // get the user type (USING DEBUG FUNCTION, TODO CHANGE TO ORIGINAL)
        $userType = UserInfo::__getUserTypeDEBUG__($token);

        // store all data needed to keep and validate session
        $userData = [
            "userToken" => $validationResult->Token,
            "userId" => $userId,
            "isLoggedIn" => TRUE,
            "userType" => $userType,
            "userProfile" => $userProfile
        ];

        // set the session with this data
        $this->session->set_userdata($userData);

        // load the script that closes the popup window
        $this->load->view("login/LoginPopup");
    }

}
