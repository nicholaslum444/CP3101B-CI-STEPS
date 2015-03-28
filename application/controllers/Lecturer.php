<?php

class Lecturer extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library("session");
		$this->load->helper("url");
		$this->load->helper("viewdata");
	}

    /* Created this for easy viewing, please go ahead to change it
        as desired */

    public function index() {

        if ($this->_isLoggedIn() && $this->_isLecturer()) {

            // load the console views
            $this->console();

        } else {

            // load the login view
            $this->_denyAccess();

        }

    }

    public function newModule() {
        // have to change this

        $this->load->view("persistent/Header");
        $this->load->view("users/newModulePage");
        $this->load->view("persistent/Footer");
    }

    public function console() {
        // get the modules that he control
        // and send to the lecturer page
        // module code and name enough for this page

        $this->load->view("persistent/Header", $this->_makeHeaderData());
        $this->load->view("users/LecturerPage", $this->_makeBodyData());
        $this->load->view("persistent/Footer");
    }

    private function _denyAccess() {

        $this->load->view("persistent/Header", $this->_makeHeaderData());
        $this->load->view("users/AccessDeniedPage");
        $this->load->view("persistent/Footer");
    }

    private function _makeHeaderData() {
        return ViewData::makeHeaderData($this->session, base_url());
    }

    private function _makeBodyData() {
        $modules = [];
        $modules[0] = [
            "moduleCode" => "CS3020",
            "moduleName" => "Facebook and Society"
        ];
        $modules[1] = [
            "moduleCode" => "IS1515",
            "moduleName" => "ISIS Society"
        ];
        $bodyData = [
            //"data" => modulesmodel::getlecturerpagedata();
            "data" => $modules
        ];
        return $bodyData;
    }

	private function _isLoggedIn() {
		return $this->session->isLoggedIn;
	}

    private function _isLecturer() {
        return $this->session->userType === "Lecturer";
    }
}
