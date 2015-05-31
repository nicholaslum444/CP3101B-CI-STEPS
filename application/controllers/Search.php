<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	// possibly introduce a helper that prepares the session data
	// for the header?
	// also possibly move the navbar out of the header into its own file?

	public function index() {

		// possibly reroute the user to his landing page if he is logged in?

		// load the homepage views
		$this->load->view("persistent/SiteHeader", $this->_makeHeaderData());
		$this->load->view('public/SearchPage', $this->_makeBodyData());
        $this->load->view("persistent/SiteFooter");

	}

	private function _isLoggedIn() {
		return $this->session->isLoggedIn;
	}

    private function _makeHeaderData() {
        return ViewData::makeHeaderData($this->session, base_url(), LOADER_TYPE_PUBLIC_VOTE);
    }
	
	private function _makeBodyData() {
        if (!isset($_GET["searchTerm"])) {
			return [
				"hasSearchTerm" => FALSE
			];
		}
		
		$searchTerm = $_GET["searchTerm"];
		return [
			"hasSearchTerm" => TRUE,
			"searchTerm" => $searchTerm
		];
		
    }
}