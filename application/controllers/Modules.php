<?php

class Modules extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($moduleCode = null) {
        $this->view($moduleCode);
    }

    public function view($moduleCode = NULL) {
        // the chosen module is shown in the url
        if (is_null($moduleCode) || $moduleCode == "index") {
            // show overview page if no module clicked

            $this->load->view("persistent/SiteHeader", $this->_makeHeaderData());
            // pass the data into modulespage
            $this->load->view("public/ModulesPage", $this->_makeBodyData());
            $this->load->view("persistent/SiteFooter");
        } else {
            // show module page with projects

            $this->load->view("persistent/SiteHeader", $this->_makeHeaderData());
            // pass the data into modulespage
            $this->load->view("public/ModulesPage", $this->_makeBodyData($moduleCode));
            $this->load->view("persistent/SiteFooter");
        }
    }

	private function _isLoggedIn() {
		return $this->session->isLoggedIn;
	}

    private function _makeHeaderData() {
        return ViewData::makeHeaderData($this->session, base_url(), LOADER_TYPE_PUBLIC_MODULES);
    }

    private function _makeBodyData($moduleCode = NULL, $iteration = NULL) {
        if (is_null($iteration)) {
            $iteration = $this->Dbquery->getLatestIteration();
        }

        $allModulesData = $this->Dbquery->getModuleListByIteration($iteration);

        $allModulesDetails = $this->_getDetails($allModulesData);
        $selectedModuleData = $this->_getModuleData($moduleCode, $allModulesData);
        $selectedModuleRanking = $this->_getRanking($this->_getModuleId($moduleCode, $allModulesData));

        $bodyData = [
            "allModulesDetails" => $allModulesDetails,
            "selectedModuleData" => $selectedModuleData,
            "selectedModuleRanking" => $selectedModuleRanking
        ];
        //echo json_encode($bodyData);
        return $bodyData;
    }

    private function _getDetails($allModules) {
        $allDetails = [];

        foreach($allModules as $module) {
            $details = [
                "moduleCode" => $module['moduleCode'],
                "moduleName" => $module['moduleName'],
                "moduleId" => $module['moduleID']
            ];
            array_push($allDetails, $details);
        }

        return $allDetails;
    }

    private function _getModuleData($moduleCode, $allModules) {
        $moduleCode = strtolower($moduleCode);

        foreach ($allModules as $module) {
            $other = strtolower($module["moduleCode"]);
            if ($moduleCode === $other) {
                return $module;
            }
        }

        return NULL;
    }
    
    private function _getModuleId($moduleCode, $allModules) {
        $moduleCode = strtolower($moduleCode);

        foreach ($allModules as $module) {
            $other = strtolower($module["moduleCode"]);
            if ($moduleCode === $other) {
                return $module["moduleID"];
            }
        }

        return NULL;
    }
    
    private function _getRanking($moduleId) {
        //var_dump($moduleId);
        $rankingData = $this->Dbquery->getRankingByModule($moduleId);
        if (isset($rankingData)) {
            return ["isEmpty" => FALSE, "data" => $rankingData];
        } else {
            return ["isEmpty" => TRUE];
        }
    }

}
