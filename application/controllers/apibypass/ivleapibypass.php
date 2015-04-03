<?php

class IvleApiBypass extends CI_Controller {

    public function __construct() {
		parent::__construct();
    }

    public function index() {
        exit();
    }

    public function getIvleStaffedModules() {
        // TODO change the function to !!! getStaffedModules() !!!
        echo json_encode(IvleApi::getAllModules($this->session->userToken));
        exit();
    }

    public function getClassRoster() {
        if (isset($_POST["moduleId"])) {
            echo json_encode(IvleApi::getClassRoster($this->session->userToken, $_POST["moduleId"]);
            exit();
        } else {
            exit();
        }
    }


}
