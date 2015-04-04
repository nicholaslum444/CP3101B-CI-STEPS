<?php

class Lecturer extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

    /* Created this for easy viewing, please go ahead to change it
        as desired */

    public function index() {

        if ($this->_isAuthenticated()) {

            $this->console();

        } else {
            $this->_denyAccess();
        }

    }

    public function viewModule($moduleID = NULL) {
        $this->load->view("persistent/SiteHeader", $this->_makeHeaderData());
        $this->load->view("users/ViewModulePage", $this->_getModuleInformation($moduleID));
        $this->load->view("persistent/SiteFooter");
    }

    public function console() {
        if ($this->_isAuthenticated()) {
            // load the console views
            $this->load->view("persistent/SiteHeader", $this->_makeHeaderData());
            $this->load->view("users/LecturerPage", $this->_makeBodyData());
            $this->load->view("persistent/SiteFooter");

        } else {
            $this->_denyAccess();
        }
    }

	private function _getIvleStaffedModules() {
		// TODO REVERT TO THIS WHEN CONFIRMED

		// return IvleApi::getStaffedModules($this->session->userToken);

		// ELSE simply return all modules and assume it's for staff
		return IvleApi::getAllModules($this->session->userToken);
	}

    private function _getModuleInformation($moduleID) {
        //echo $moduleCode;
        if (isset($moduleID)) {
            $modInfo = [
                "data" => $this->Dbquery->getModuleDetailByModuleID($moduleID)
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
            if(!isset($data[$module["moduleID"]])) {
                $data[$module["moduleID"]] = array();
            }
            $data[$module["moduleID"]] = $this->_getModuleInformation($module["moduleID"]);
            //print_r($data[$module["moduleID"]]);
        }

        $bodyData = [
            "data" => $data,
			//"ivleStaffedModules" => $this->_getIvleStaffedModules()
			"userToken" => $this->session->userToken
        ];

        return $bodyData;
    }

	private function _isLoggedIn() {
		return $this->session->isLoggedIn;
	}

    private function _isLecturer() {
        return $this->session->userType === USER_TYPE_LECTURER;
    }

	private function _isAuthenticated() {
		return $this->_isLoggedIn() && $this->_isLecturer();
	}

    private function _denyAccess() {
        $this->load->view("persistent/SiteHeader", $this->_makeHeaderData());
        $this->load->view("users/AccessDeniedPage");
        $this->load->view("persistent/SiteFooter");
    }
}
