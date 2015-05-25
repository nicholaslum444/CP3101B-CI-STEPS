<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	// possibly introduce a helper that prepares the session data
	// for the header?
	// also possibly move the navbar out of the header into its own file?

	public function index() {

		// load the homepage views
		$this->load->view("persistent/SiteHeader", $this->_makeHeaderData());
		$this->load->view('public/AboutPage', $this->_makeBodyData());
        $this->load->view("persistent/SiteFooter");

	}

	private function _isLoggedIn() {
		return $this->session->isLoggedIn;
	}

    private function _makeHeaderData() {
        return ViewData::makeHeaderData($this->session, base_url(), LOADER_TYPE_PUBLIC_ABOUT);
    }

    private function _makeBodyData() {
        /*
        date of event
        start/end time of event
        participating modules
            picture
            module code
            module name
        */
        $iteration = $this->Dbquery->getLatestIteration();
        $iterInfo = $this->Dbquery->getLatestIterationInfo();
		
        $bodyData = [];
        $bodyData["modules"] = $this->Dbquery->getModuleListByIteration($iteration);
		ViewData::insertEventData($bodyData, $iteration, $iterInfo);
		
        return $bodyData;
    }
}
