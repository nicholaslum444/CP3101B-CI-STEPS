<?php

class CutOff extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

    public function index() {

        if ($this->_isAuthenticated()) {

            $this->load->view("persistent/SiteHeader", $this->_makeHeaderData());
            $this->load->view("users/CutOffPage");
            $this->load->view("persistent/SiteFooter");

        } else {
            $this->_denyAccess();
        }

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
    
    private function _makeHeaderData() {
        return ViewData::makeHeaderData($this->session, base_url());
    }
}
