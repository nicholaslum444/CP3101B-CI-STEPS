<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
        //$this->load->model("adminloginmodel");
	}

    // this class handles the login, logout and console for admin

	public function index() {

        // workflow:
        // load and check whether logged.
        // if logged in: load the console page (need special header?)
        // else load the login page (need separate login page)

		if ($this->_isAuthenticated()) {

    		// load the console views
            $this->console();

		} else {

            // load the login view
            $this->login();

        }

	}

    public function login() {

		if($this->_isAuthenticated()) {

            // show the homepage if the user is actually logged in
	        $this->console();

		} else if ((isset($_POST["username"]) && isset($_POST["password"]))) {

            // both username and password supplied
	        // load the username and password
	        $u = htmlspecialchars($_POST["username"]);
	        $p = htmlspecialchars($_POST["password"]);

            $this->_processLogin($u, $p);

			// remove from the post array after processing
			$_POST["username"] = null;
			$_POST["password"] = null;

            if ($this->_isAuthenticated()) {
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

		if($this->_isAuthenticated()) {

    		// load the console views
            $this->load->view("persistent/SiteHeader", $this->_makeHeaderData());
    		$this->load->view('users/AdminConsolePage', $this->_makeBodyData());
            $this->load->view("persistent/SiteFooter");

		} else {

            $this->login();

        }

    }

	private function _isLoggedIn() {
		return $this->session->isLoggedIn;
	}

    private function _isAdmin() {
        return $this->session->userType === USER_TYPE_ADMIN;
    }

	private function _isAuthenticated() {
		return $this->_isLoggedIn() && $this->_isAdmin();
	}

    private function _generateAdminToken() {
        return sha1(microtime(true).mt_rand(10000,90000));
    }

    private function _processLogin($username, $password) {

        $isAdmin = $this->Dbadmin->isAdmin($username, $password);

        // check if validation successful
        if ($isAdmin) {

            // set the user type to admin
            $userType = USER_TYPE_ADMIN;

            // generate a token for the admin
            $adminToken = $this->_generateAdminToken();

            // find the name of the logged in admin
			$adminProfile = $this->Dbadmin->getAdminDetails($username, $password);

            // store all data needed to keep and validate session
            $userData = [
                "token" => $adminToken,
                "adminProfile" => $adminProfile,
                "username" => $username,
				"password" => $password, // store the password for queries later
                "isLoggedIn" => TRUE,
                "userType" => $userType
            ];

            // set the session with this data
            $this->session->set_userdata($userData);
        }
    }

    private function _makeHeaderData() {
        $data = ViewData::makeHeaderData($this->session, base_url());
        $data["loader"] = LOADER_TYPE_ADMIN;
        return $data;
    }

    private function _makeBodyData() {
        $iteration = $this->Dbquery->getLatestIteration(); // will be 0 if no iterations
        $foodPref = $this->Dbquery->getFoodPrefByIteration($iteration);
        $dates = $this->_getDates($iteration);

        $listOfModules = $this->Dbquery->getModuleListByIteration($iteration);

        $moduleData = [];
        //Loop through and query for module data
        $i = 0;
        foreach($listOfModules as $module) {
            $moduleData[$i] = $this->_getModuleInformation($module["moduleID"]);
            $moduleData[$i]['lecturers'] = $this->Dbquery->getSupervisorByModule($module["moduleID"]);
        
            $i++;
        }

        $bodyData = [
            "moduleData" => $moduleData,
            "foodPref" => $foodPref,
            "iteration" => $iteration,
            "iterationInfo" => $dates
        ];

        return $bodyData;
    }

    private function _makePageData($retry) {
        $pageData = [
            "retry" => $retry
        ];

        return $pageData;
    }

    private function _loadLoginView($retry = FALSE) {

        $this->load->view("persistent/SiteHeader", $this->_makeHeaderData());
        $this->load->view('users/AdminLoginPage', $this->_makePageData($retry));
        $this->load->view("persistent/SiteFooter");
    }

    private function _getModuleInformation($moduleId) {

		$modInfo = [
			"data" => $this->Dbquery->getModuleDetailByModuleID($moduleId)
		];
        //$modInfo["data"]["lecturers"] = 
        return $modInfo;
    }

    private function _getDates($iteration) {
        $dates = $this->Dbquery->getIterationInfoByIterate($iteration);
		
        //var_dump($dates);
		
        //For clean DB, missing values
        if(!isset($dates['startTime'])) {
            $dates['startTime'] = null;
        }

        if(!isset($dates['endTime'])) {
            $dates['endTime'] = null;
        }

        if(!isset($dates['regisDate'])) {
            $dates['regisDate'] = null;
        } 
        
        if(!isset($dates['cutOff'])){
            $dates['cutOff'] = null;
        }

        if(!isset($dates['semester'])) {
            $dates['semester'] = null;
        }

        return $dates;
    }
}
