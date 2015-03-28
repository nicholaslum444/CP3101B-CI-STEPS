<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library("session");
		$this->load->helper("url");
	}

	// possibly introduce a helper that prepares the session data
	// for the header?
	// also possibly move the navbar out of the header into its own file?

	public function index() {

		// possibly reroute the user to his landing page if he is logged in?

		// load the homepage views
		$this->load->view("persistent/Header", $this->_makeHeaderData());
		$this->load->view('public/HomePage');
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

	private function _isLoggedIn() {
		return $this->session->isLoggedIn;
	}
}
