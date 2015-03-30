<?php

class EditModule extends CI_Controller {

    public function __construct() {
		parent::__construct();
        $this->load->library("session");
		$this->load->model("Dbquery");
        $this->load->model("Dbinsert");
    }

    public function index() {

        //MODULE CODE MUST BE SET!
        if (!(isset($_POST["moduleCode"]))) {
            exit($this->_buildIncompleteFormResponse());
        }
        if (!$this->session->isLoggedIn && !($this->session->userType === Lecturer)) {
            exit($this->_buildFailureResponse());
        }
        echo $this->_buildResponse();
    }

    private function _buildResponse() {
        //CALL MUN AW'S DATABASE'S UPDATE MODULE FUNCTION!

        $insertResult = $this->_insertIntoDb($moduleCode, $moduleName);

        return json_encode($insertResult);
    }

    private function _insertIntoDb($mc, $mn) {
        // if exist ($mc) then fail
        $iteration = $this->Dbquery->getLatestIteration();
        if ($this->Dbquery->isModuleExist($mc, $iteration)) {
            // make fail obj
            return [
                "success" => FALSE,
                "error" => "MODULE_EXISTS"
            ];
        } else {
            $insertSuccess = $this->Dbinsert->createModule($mc, $iteration, $mn);
            $superviseSuccess = $this->Dbinsert->insertModuleSupervision($this->session->userId, $mc, $iteration);
            //$insertSuccess = TRUE; // TODO remove
            if (isset($insertSuccess) && isset($superviseSuccess)) {
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
