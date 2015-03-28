<?php

class Lecturer extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library("session");
		$this->load->helper("url");
		$this->load->helper("viewdata");
	}

    /* Created this for easy viewing, please go ahead to change it
        as desired */

    public function index() {

        if ($this->_isLoggedIn()) {

            // load the console views
            $this->console();

        } else {

            // load the login view
            $this->_denyAccess();

        }

    }

    public function newModule() {

        $this->load->view("persistent/Header");
        $this->load->view("users/newModulePage");
        $this->load->view("persistent/Footer");
    }

    public function console() {

        $this->load->view("persistent/Header", $this->_makeHeaderData());
        $this->load->view("users/LecturerPage");
        $this->load->view("persistent/Footer");
    }

    private function _denyAccess() {

        $this->load->view("persistent/Header", $this->_makeHeaderData());
        $this->load->view("users/AccessDeniedPage");
        $this->load->view("persistent/Footer");
    }

    private function _makeHeaderData() {

        return ViewData::makeHeaderData($this->session, base_url());
    }

	private function _isLoggedIn() {
		return $this->session->isLoggedIn;
	}
}
