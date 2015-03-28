<?php

class Lecturer extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library("session");
		$this->load->helper("url");
	}

    /* Created this for easy viewing, please go ahead to change it
        as desired */

    public function index() {

        $this->load->view("persistent/Header", $this->_makeHeaderData());
        $this->load->view("users/LecturerPage");
        $this->load->view("persistent/Footer");
    }

	private function _makeHeaderData() {
		// initialise the data that goes into the header
		$headerData = [
			"isLoggedIn" => $this->_isLoggedIn(),
			"baseUrl" => base_url()
		];

		// add additional data if user is logged in
		if($this->_isLoggedIn()) {
	        $headerData["isLoggedIn"] = TRUE;
			$headerData["userProfile"] = $this->session->userProfile;
		}

        return $headerData;
	}

    public function newModule() {

        $this->load->view("persistent/Header");
        $this->load->view("users/newModulePage");
        $this->load->view("persistent/Footer");
    }

	private function _isLoggedIn() {
		return $this->session->isLoggedIn;
	}
}
