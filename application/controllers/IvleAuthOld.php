<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IvleAuthOld extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library("session");

        // load the helper that helps us auth
        $this->load->helper("IvleUserAuth");
    }

    public function index() {

        // ensure that there is a token
        if (!isset($_GET["token"])) {
            exit("no token supplied");
        }

        // load this token, with string escape
        $token = htmlspecialchars($_GET["token"]);

        // validate token and get result
        $validationResult = IvleUserAuth::getValidationResult($token);

        // die if validation unsuccessful
        if (!$validationResult->Success) {
            exit ("token invalid");
        }

        // reassign the token cos it may have been updated
        $token = $validationResult->Token;

        // note the user id
        $userId = IvleUserAuth::getUserID($token);

        // get the profile
        $userProfile = IvleUserAuth::getUserProfile($token);

        // get the user type (USING DEBUG FUNCTION, TODO CHANGE TO ORIGINAL)
        $userType = IvleUserAuth::__getUserTypeDEBUG__($token);

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
