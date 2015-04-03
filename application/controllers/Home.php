<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
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

	private function _isLoggedIn() {
		return $this->session->isLoggedIn;
	}

    private function _makeHeaderData() {
        return ViewData::makeHeaderData($this->session, base_url());
    }
}
