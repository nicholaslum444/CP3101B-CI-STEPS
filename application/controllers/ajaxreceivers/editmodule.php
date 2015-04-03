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
            $editedNewProjectTitles = $_POST["editedNewProjectTitles"];
            $editedExistingProjectTitles = $_POST["editedExistingProjectTitles"];
            $updateSuccess = $this->Dbinsert->updateModuleDescription($moduleCode, $iteration, null, $editedModuleDescription, $editedClassSize);
            
            echo $editedExistingProjectTitles;
            echo "<br>" . $editedNewProjectTitles;

            //Update new project titles
            if(isset($editedNewProjectTitles)) {
                foreach($editedNewProjectTitles as $newTitle) {
                    $updateSuccess = $this->Dbinsert->createProject($newTitle, $moduleCode, $iteration);
                }
            }
            //Update existing project titles
            if(isset($editedExistingProjectTitles)) {
                foreach($editedExistingProjectTitles as $existingIdTitlePair) {
                    $updateSuccess = $this->Dbinsert->updateProject($existingIdTitlePair[0], $existingIdTitlePair[1], null, null, null);
                }
            }
            $updateSuccess = $this->Dbinsert;
            //$updateSuccess = TRUE; // TODO remove
            if (isset($updateSuccess) && $updateSuccess == true) {
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
