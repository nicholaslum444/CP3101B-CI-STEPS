<?php

class Modules extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library("session");
        $this->load->helper("url");
        $this->load->helper("viewdata");
		$this->load->model("Dbquery");
        $this->load->model("Dbinsert");
    }

    public function index($moduleCode = null) {
        $this->view($moduleCode);
    }

    public function view($moduleCode = NULL) {
        // the chosen module is shown in the url
        if (is_null($moduleCode) || $moduleCode == "index") {
            // show overview page if no module clicked

            $this->load->view("persistent/Header", $this->_makeHeaderData());
            // pass the data into modulespage
            $this->load->view("public/ModulesPage", $this->_makeBodyData());
            $this->load->view("persistent/Footer");
        } else {
            // show module page with projects

            $this->load->view("persistent/Header", $this->_makeHeaderData());
            // pass the data into modulespage
            $this->load->view("public/ModulesPage", $this->_makeBodyData($moduleCode));
            $this->load->view("persistent/Footer");
        }
    }

	private function _isLoggedIn() {
		return $this->session->isLoggedIn;
	}

    private function _makeHeaderData() {
        return ViewData::makeHeaderData($this->session, base_url());
    }

    private function _makeBodyData($moduleCode = NULL) {
        $iteration = $this->Dbquery->getLatestIteration();
        $bodyData = [];
        $bodyData["modules"] = $this->Dbquery->getModuleListByIteration($iteration);
        if (isset($moduleCode)) {
            $selectedModule = $this->_findModule($moduleCode, $bodyData["modules"]);
            if (isset($selectedModule)) {
                $bodyData["selectedModule"] = $selectedModule;
                $bodyData["projects"] = $this->Dbquery->getProjectListByModule($moduleCode, $iteration);
                $bodyData["projectDetails"] = $this->_getProjectDetails($bodyData["projects"]);
            }
        }

        return $bodyData;
    }

    private function _getProjectDetails($projects) {
        $projectDetails = [];
        for ($i = 0; $i < count($projects); $i++) {
            $projectDetails[$i] = $this->Dbquery->getStudentDetailByProject($projects[$i]["projectID"]);
        }
        return $projectDetails;
    }

    private function _findModule($mc, $mods) {
        for ($i = 0; $i < count($mods); $i++) {
            if (strtolower($mods[$i]["moduleCode"]) === strtolower($mc)) {
                return $mods[$i];
            }
        }
        return NULL;
    }

}
