<?php

// this call returns JSON objects.
header("Content-Type: application/json");

class RegisterModule extends CI_Controller {

    public function __construct() {
		parent::__construct();
    }

    public function index() {
        if (!(isset($_POST["moduleId"]))) {
            exit($this->_buildIncompleteFormResponse());
        }
        if (!$this->session->isLoggedIn || !($this->session->userType === USER_TYPE_LECTURER)) {
            exit($this->_buildAccessDeniedResponse());
        }
        echo $this->_buildResponse($_POST["moduleId"]);
    }

    private function _buildResponse($moduleId) {
        // try to insert to db
        // get response object from db telling me
        // whether it can insert or not

        $insertResult = $this->_insertIntoDb($moduleId);

        return json_encode($insertResult);
    }

    private function _insertIntoDb($moduleId) {
        $moduleDetails = IvleApi::getModuleDetails($this->session->userToken, $moduleId);
        //echo json_encode($moduleDetails->Results[0]);
        $moduleCode = $moduleDetails->Results[0]->CourseCode;
        $moduleName = $moduleDetails->Results[0]->CourseName;
        // if exist ($moduleId) then fail
        $iteration = $this->Dbquery->getLatestIteration();

        //$moduleAlreadyExists = $this->Dbquery->isModuleExist($moduleId); // TODO change to this
        $moduleAlreadyExists = $this->Dbquery->isModuleExist($moduleCode, $iteration);
        if ($moduleAlreadyExists) {
            // make fail obj
            return [
                "success" => FALSE,
                "error" => "MODULE_EXISTS"
            ];
        } else {
            //$insertSuccess = $this->Dbinsert->createModule($moduleCode, $moduleId, $moduleName, $iteration, $this->session->userId);
            $insertSuccess = $this->Dbinsert->createModule($moduleCode, $moduleName, $moduleId, $iteration, $this->session->userId);
            //$superviseSuccess = $this->Dbinsert->insertModuleSupervision($this->session->userId, $moduleCode, $iteration);
            if (isset($insertSuccess)) {
                return [
                    "success" => TRUE
                ];
            } else {
                return [
                    "success" => FALSE,
                    "error" => "INSERTION_FAIL"
                ];
            }
        }
    }

    private function _buildIncompleteFormResponse() {
        $fail = [
            "success" => FALSE,
            "error" => "INCOMPLETE_FORM"
        ];

        return json_encode($fail);
    }

    private function _buildAccessDeniedResponse() {
        $fail = [
            "success" => FALSE,
            "error" => "ACCESS_DENIED"
        ];

        return json_encode($fail);
    }
}
