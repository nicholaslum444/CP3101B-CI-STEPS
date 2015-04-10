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
		//$eventDateObj = new DateTime("2015-4-22");
		$eventDateObj->setTimestamp($iterInfo['startTime']);
		$eventDateObj->setTimezone(new DateTimeZone("Asia/Singapore"));
		$eventStartTimeObj->setTimestamp($iterInfo['startTime']);
		$eventStartTimeObj->setTimezone(new DateTimeZone("Asia/Singapore"));
		$eventEndTimeObj->setTimestamp($iterInfo['endTime']);
		$eventEndTimeObj->setTimezone(new DateTimeZone("Asia/Singapore"));

		$bodyData = [];
		$bodyData["eventDate"] = $eventDateObj->format("jS F Y");
		$bodyData["eventStartTime"] = $eventStartTimeObj->format("");
		$bodyData["eventEndTime"] = $eventEndTimeObj->format("");
		$bodyData["modules"] = $this->Dbquery->getModuleListByIteration($iteration);
		var_dump($bodyData);
		return $bodyData;
	}
}
