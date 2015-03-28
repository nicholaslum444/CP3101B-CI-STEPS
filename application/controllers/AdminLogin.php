<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminLogin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library("session");

        // maybe load a model that helps us auth?
        //$this->load->model("adminloginmodel");
    }

    public function index() {

        // ensure that there is a token
        if (!(isset($_POST["username"]) && isset($_POST["password"]))) {
            exit("no username or password supplied");
        }

        // load the username and password
        $username = htmlspecialchars($_POST["username"]);
        $password = htmlspecialchars($_POST["password"]);

        // validate token and get result
        //$validationResult = adminloginmodel::getValidationResult($token);

        // die if validation unsuccessful
        if (!$validationResult->Success) {
            exit ("username or password incorrect");
        }

        // set the user type to admin
        $userType = "admin";

        // store all data needed to keep and validate session
        $userData = [
            "username" => $username,
            "isLoggedIn" => TRUE,
            "userType" => $userType
        ];

        // set the session with this data
        $this->session->set_userdata($userData);
    }

}
