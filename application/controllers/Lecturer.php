<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lecturer extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library("session");
		$this->load->helper("url");
	}

	public function index() {

		// possibly reroute the user to console/student or console/lecturer

		// initialise the data that goes into the header
		$headerData = [
			"isLoggedIn" => FALSE,
			"baseUrl" => base_url()
		];

		// add additional data if user is logged in
		if($this->_isLoggedIn()) {
	        $headerData["isLoggedIn"] = TRUE;
			$headerData["userProfile"] = $this->session->userProfile;
		}

		// load the homepage views
		$this->load->view("persistent/Header", $headerData);
        // load consolepage or sth
		$this->load->view('public/HomePage');
        $this->load->view("persistent/Footer");

	}

	private function _isLoggedIn() {
		return $this->session->isLoggedIn;
	}
}
