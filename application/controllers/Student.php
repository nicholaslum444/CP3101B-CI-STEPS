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

           $this->load->view("persistent/SiteHeader", $this->_makeHeaderData());
           $this->load->view("users/StudentPage", $this->_makeBodyData());
           $this->load->view("persistent/SiteFooter");

        } else {
            $this->_denyAccess();

        }
    }

    public function registerProject($moduleId, $projectId) {

        if ($this->_isAuthenticated()) {
            $allStudentsInProject = $this->Dbquery->getStudentDetailByProject($projectId);
            $this->load->view("persistent/SiteHeader", $this->_makeHeaderData());
            $loadRegister = true;
            foreach($allStudentsInProject as $student) {
                if($student["userID"] === $this->session->userId) {
                    $this->load->view("users/UpdateMembersPage", $this->retrieveMemberDetails($projectId));
                    $loadRegister = false;
                    header("LOCATION: /index.php/Student/updateMembers/".$projectId);
                }
            }


            if($loadRegister) {
                $this->load->view("users/RegisterProjectPage", $this->_selectMembersData($moduleId, $projectId));
            }

            $this->load->view("persistent/SiteFooter");

        } else {
            $this->_denyAccess();
        }
    }

    public function updateMembers($projectId) {

        if ($this->_isAuthenticated()) {

            $this->load->view("persistent/SiteHeader", $this->_makeHeaderData());
            $this->load->view("users/UpdateMembersPage", $this->retrieveMemberDetails($projectId));
            $this->load->view("persistent/SiteFooter");

        } else {
            $this->_denyAccess();
        }
    }

    private function _denyAccess() {
        $this->load->view("persistent/SiteHeader", $this->_makeHeaderData());
        $this->load->view("users/AccessDeniedPage");
        $this->load->view("persistent/SiteFooter");
    }

    private function _makeHeaderData() {
        return ViewData::makeHeaderData($this->session, base_url());
    }

    private function _makeBodyData() {
        $iteration = $this->Dbquery->getLatestIteration();

        //$userId = 'A0201001B'; //Hardcode to be removed
        $userId = $this->session->userId; //must be student

        $moduleProjects = $this->Dbquery->getModuleProjectForStudent($userId, $iteration);
        $modules = $this->_getRegisteredAndNotRegisteredModule($moduleProjects);
        $unregisteredProjects = $this->_getAllUnregisteredProjects($modules[1]);

        $bodyData = [
            "data" => $modules,
            "dataUnregistered" => $unregisteredProjects
        ];

        return $bodyData;
    }

    private function _getRegisteredAndNotRegisteredModule($moduleProjects) {
        $modulesRegistered = [];
        $modulesNotRegistered = [];
        if(isset($moduleProjects['enrolled'])) {
            foreach($moduleProjects['enrolled'] as $module) {
                
                if($module['project']==null) {//did not sign up for project
                    array_push($modulesNotRegistered, $module);
                }
                else { //has a project under this module
                    array_push($modulesRegistered, $module);
                }
            }
        }
        
        return array($modulesRegistered, $modulesNotRegistered);
    }

    /* retrieves student's unregistered module's untaken projects */
    private function _getAllUnregisteredProjects($modulesNotRegistered){
        $result = array();

        foreach($modulesNotRegistered as $module){
            $result[$module['moduleCode']] = $this->Dbquery->getProjectListWithNoMemberByModule($module['moduleID']);
        }

        return $result;
    }

    /* get coursemates who are still not in any projects */
    private function _selectMembersData($moduleId, $projectId) {
        $iteration = $this->Dbquery->getLatestIteration();
        $student = $this->Dbquery->getStudentsNotInProjectGroupByModule($moduleId);
        foreach($student as $index=>$checkForUser) {
            if($checkForUser["userID"] == $this->session->userId) {
                unset($student[$index]);
            }
        }

        $bodyData = [
            "data" => $student,
            "pId" => $projectId
        ];

        return $bodyData;
    }

    private function retrieveMemberDetails($projectId) {
        $memberDetails = $this->Dbquery->getMembersByProjectID($projectId);
        
        $bodyData = [
            "data" => $memberDetails,
            "projectData" => $this->Dbquery->getProjectDetailsByProjectID($projectId)
        ];
        //var_dump($bodyData["data"]);
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
