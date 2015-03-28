<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library("session");
		$this->load->helper("url");
        $this->load->helper("viewdata");

        //$this->load->model("adminloginmodel");
	}

    // this class handles the login, logout and console for admin

	public function index() {

        // workflow:
        // load and check whether logged.
        // if logged in: load the console page (need special header?)
        // else load the login page (need separate login page)

		if ($this->_isLoggedIn()) {

    		// load the console views
            $this->console();

		} else {

            // load the login view
            $this->login();

        }

	}

    public function login() {

		if($this->_isLoggedIn() && $this->_isAdmin()) {

            // show the homepage if the user is actually logged in
	        $this->console();

		} else if ((isset($_POST["username"]) && isset($_POST["password"]))) {

            // both username and password supplied
            $this->_processLogin();

            if ($this->_isLoggedIn()) {
                // now user is logged in, show the homepage
                $this->console();

            } else {
                // username and password must be wrong!
                // reload the login view
                $this->_loadLoginView(TRUE);
            }

        } else {

            // user not logged in, so load the login view
            $this->_loadLoginView();
        }

    }

    public function logout() {
        // carry out the logout stuff
        header("Location: /index.php/Logout");
    }

    public function console() {

		if($this->_isLoggedIn()) {

    		// load the console views
            $this->load->view("persistent/Header", $this->_makeHeaderData());
    		$this->load->view('users/AdminConsolePage');
            $this->load->view("persistent/Footer");

		} else {

            $this->login();

        }

    }

    // TODO remove this in production!!
    public function testing() {
        $this->test = 1;
        $this->_loadLoginView();
    }

	private function _isLoggedIn() {
		return $this->session->isLoggedIn;
	}

    private function _isAdmin() {
        return $this->session->userType === "Admin";
    }

    private function _generateAdminToken() {
        return sha1(microtime(true).mt_rand(10000,90000));
    }

    private function _processLogin() {

        // load the username and password
        $username = htmlspecialchars($_POST["username"]);
        $password = htmlspecialchars($_POST["password"]);

        // validate token and get result
        //$validationResult = adminloginmodel::getValidationResult($username, $password);
        $validationResult = [
            "success" => TRUE // TODO PLS REMOVE IN PRODUCTION
        ];

        // check if validation successful
        if ($validationResult["success"]) {

            // set the user type to admin
            $userType = "Admin";

            // generate a token for the admin
            $adminToken = $this->_generateAdminToken();

            // find the name of the logged in admin
            $name = "ANAND BHOJAN";

            // store all data needed to keep and validate session
            $userData = [
                "token" => $adminToken,
                "name" => $name,
                "username" => $username,
                "isLoggedIn" => TRUE,
                "userType" => $userType
            ];

            // set the session with this data
            $this->session->set_userdata($userData);

        }
    }

    private function _makeHeaderData() {
        return ViewData::makeHeaderData($this->session, base_url());
    }

    private function _makePageData($retry) {
        $pageData = [
            "retry" => $retry
        ];

        return $pageData;
    }

    private function _loadLoginView($retry = FALSE) {

        $this->load->view("persistent/Header", $this->_makeHeaderData());
        $this->load->view('users/AdminLoginPage', $this->_makePageData($retry));
        $this->load->view("persistent/Footer");
    }
}
