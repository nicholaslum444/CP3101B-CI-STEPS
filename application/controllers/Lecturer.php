<?php

class Lecturer extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library("session");
		$this->load->helper("url");
		$this->load->helper("viewdata");
		$this->load->model("Dbquery");
        $this->load->model("Dbinsert");
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

    public function viewModule($moduleCode = NULL) {
        // have to change this

        $this->load->view("persistent/Header", $this->_makeHeaderData());
        $this->load->view("users/ViewModulePage", $this->_getModuleInformation($moduleCode));
        $this->load->view("persistent/Footer");
    }

    public function console() {
        // get the modules that he control
        // and send to the lecturer page
        // module code and name enough for this page
        if ($this->_isLoggedIn() && $this->_isLecturer()) {

            // load the console views
            $this->load->view("persistent/Header", $this->_makeHeaderData());   
            $this->load->view("users/LecturerPage", $this->_makeBodyData());
            $this->load->view("persistent/Footer");

        } else {

            // load the login view
            $this->_denyAccess();
        }
    }

    private function _getModuleInformation($moduleCode) {
        //echo $moduleCode;
        if (isset($moduleCode)) {
            $modInfo = [
                "data" => $this->Dbquery->getModuleDetailByModuleCode($moduleCode, $this->Dbquery->getLatestIteration())
            ];
            //echo json_encode($modInfo);
            return $modInfo;
        } else {
            $modInfo = [
                "data" => []
            ];
            //echo json_encode($modInfo);
            return $modInfo;
        }

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
        $iteration = $this->Dbquery->getLatestIteration();
        //Get all modules
        $allModules = $this->Dbquery->getSupervisedModuleByID($this->session->userId, $iteration); // A0101075B
        $data = [];
        //Loop through and query for module data
        foreach($allModules as $module) {
            if(!isset($data[$module["moduleCode"]])) {
                $data[$module["moduleCode"]] = array();
            }
            $data[$module["moduleCode"]] = $this->_getModuleInformation($module["moduleCode"]);
        }

        $bodyData = [
            "data" => $data
        ];

        return $bodyData;
    }
	private function _isLoggedIn() {
		return $this->session->isLoggedIn;
	}

    private function _isLecturer() {
        return $this->session->userType === Lecturer;
    }
}
