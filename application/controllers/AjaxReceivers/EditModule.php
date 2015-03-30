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
        $updateResult = $this->_insertIntoDb();

        return json_encode($updateResult);
    }

    private function _insertIntoDb() {
        // if exist ($mc) then fail
        $iteration = $this->Dbquery->getLatestIteration();
        $moduleCode = $_POST["moduleCode"];
        if (!$this->Dbquery->isModuleExist($moduleCode, $iteration)) {
            // make fail obj
            return [
                "success" => FALSE,
                "error" => "MODULE_DO_NOT_EXISTS"
            ];
        } else {
            $editedClassSize = $_POST["editedClassSize"];
            $editedNumProjects = $_POST["editedNumProjects"];
            $editedModuleDescription = $_POST["editedModuleDescription"];
            //CANNOT EDIT NUMBER OF PROJECTS: ASK IF CAN JUST THROW AWAY THAT VALUE
            $updateSuccess = $this->Dbinsert->updateModuleDescription($moduleCode, $iteration, null, $editedModuleDescription, $editedClassSize);
            //$updateSuccess = TRUE; // TODO remove
            if (isset($updateSuccess)) {
                return [
                    "success" => TRUE
                ];
            } else {
                return [
                    "success" => FALSE,
                    "error" => "UPDATE_FAIL"
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
