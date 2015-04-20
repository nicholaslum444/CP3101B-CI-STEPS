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
        $moduleId = $_POST["moduleId"];
        $projectsNotDeleted = [];
        $cannotDelete = false;
        if (!$this->Dbquery->isModuleExist($moduleId)) {
            // make fail obj
            return [
                "success" => FALSE,
                "error" => "MODULE_DO_NOT_EXISTS"
            ];
        } else {

            if(isset($_POST["editedClassSize"])) {
                $editedClassSize = $_POST["editedClassSize"];    
            }
            else {
                $editedClassSize = null;   
            }

            if(isset($_POST["editedModuleDescription"])) {
                $editedModuleDescription = $_POST["editedModuleDescription"];    
            }
            else {
                $editedModuleDescription = null;   
            }

            if(isset($_POST["editedNewProjectTitles"])) {
                $editedNewProjectTitles = $_POST["editedNewProjectTitles"];    
            }
            else {
                $editedNewProjectTitles = null;   
            }

            if(isset($_POST["editedExistingProjectTitles"])) {
                $editedExistingProjectTitles = $_POST["editedExistingProjectTitles"];    
            }
            else {
                $editedExistingProjectTitles = null;   
            }

            if(isset($_POST["deletedProjects"])) {
                $deletedProjects = $_POST["deletedProjects"];    
            }
            else {
                $deletedProjects = null;   
            }

            $updateSuccess = $this->Dbinsert->updateModuleDescription($moduleId, null, $editedModuleDescription, $editedClassSize);
            
/*            echo $editedExistingProjectTitles;
            echo "<br>" . $editedNewProjectTitles;
*/
            //Update new project titles
            if(!is_null($editedNewProjectTitles) && !empty($editedNewProjectTitles)) {
                foreach($editedNewProjectTitles as $newTitle) {
                    $updateSuccess = $this->Dbinsert->createProject($newTitle, $moduleId);
                }
            }
            //Update existing project titles
            //print_r($editedExistingProjectTitles);
            if(!is_null($editedExistingProjectTitles) && !empty($editedExistingProjectTitles)) {
                foreach($editedExistingProjectTitles as $existingIdTitlePair) {
                    $updateSuccess = $this->Dbinsert->updateProject($existingIdTitlePair[0], $existingIdTitlePair[1], null, null, null);
                }
            }

            //Delete existing project titles
            if(!is_null($deletedProjects) && !empty($deletedProjects)) {
                foreach($deletedProjects as $deleteId) {
                    $deleteInfo = $this->Dbquery->getProjectDetailsByProjectID($deleteId);
                    if(count($deleteInfo['members']) > 1) {
                        array_push($projectsNotDeleted, $deleteInfo);
                        $cannotDelete = true;
                    }
                }

                if(!$cannotDelete) {
                    foreach($deletedProjects as $deleteId) {
                        $updateSuccess = $this->Dbinsert->deleteProject($deleteId);
                    }
                }
            }

            //$updateSuccess = $this->Dbinsert;
            //$updateSuccess = TRUE; // TODO remove
            if (isset($updateSuccess) && $updateSuccess == true) {
                if(count($projectsNotDeleted) == 0) {
                    return [
                        "success" => TRUE
                    ];
                }
                else {
                    return [
                        "success" => TRUE,
                        "undeletedProjects" => $projectsNotDeleted
                    ];
                }
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
