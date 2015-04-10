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
		$this->load->view("persistent/SiteHeader", $this->_makeHeaderData());
		$this->load->view('public/HomePage', $this->_makeBodyData());
        $this->load->view("persistent/SiteFooter");

	}

	private function _isLoggedIn() {
		return $this->session->isLoggedIn;
	}

    private function _makeHeaderData() {
        return ViewData::makeHeaderData($this->session, base_url());
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
		$eventDateObj = new DateTime();
		$eventDateObj->setTimestamp($iterInfo['startTime']);
		$eventStartTimeObj = new DateTime();
		$eventStartTimeObj->setTimestamp($iterInfo['startTime']);
		$eventEndTimeObj = new DateTime();
		$eventEndTimeObj->setTimestamp($iterInfo['endTime']);

		$bodyData = [];
		$bodyData["eventDate"] = $eventDateObj->format("jS F Y");
		$bodyData["eventStartTime"] = $eventStartTimeObj->format("gA");
		$bodyData["eventEndTime"] = $eventEndTimeObj->format("gA");
		$bodyData["modules"] = $this->Dbquery->getModuleListByIteration($iteration);
		var_dump($bodyData);
		return $bodyData;
	}
}
