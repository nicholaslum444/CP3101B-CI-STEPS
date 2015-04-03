<?php

class Student extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

    public function index() {

        if ($this->_isAuthenticated()) {

            $this->console();

        } else {
            $this->_denyAccess();
        }

    }

    public function console() {

		if ($this->_isAuthenticated()) {

	        $this->load->view("persistent/Header", $this->_makeHeaderData());
	        $this->load->view("users/StudentPage", $this->_makeBodyData());
	        $this->load->view("persistent/Footer");
		} else {
			$this->_denyAccess();
		}
    }

    public function registerProject() {

        if ($this->_isAuthenticated()) {

            $this->load->view("persistent/Header", $this->_makeHeaderData());
            $this->load->view("users/RegisterProjectPage", $this->_selectMembersData());
            $this->load->view("persistent/Footer");

        } else {
            $this->_denyAccess();
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
            //$data[$module["moduleCode"]] = $this->_getModuleInformation($module["moduleCode"]);
        }

        $bodyData = [
            "data" => $data
        ];

        return $bodyData;
    }

    /* get students who are still not in any projects */
    private function _selectMembersData() {
        $iteration = $this->Dbquery->getLatestIteration();
        //Hardcode - to be removed
        $module = 'SS3101';
        $student = $this->Dbquery->getStudentsNotInProjectGroupByModule($module, $iteration);
        $bodyData = [
            "data" => $student
        ];
        return $bodyData;
    }

	private function _isLoggedIn() {
		return $this->session->isLoggedIn;
	}

	private function _isStudent() {
		return $this->session->userType === USER_TYPE_STUDENT;
	}

	private function _isAuthenticated() {
		return $this->_isLoggedIn() && $this->_isStudent();
	}
}
