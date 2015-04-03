<?php

class IvleApiBypass extends CI_Controller {

    public function __construct() {
		parent::__construct();
    }

    public function index() {
        exit();
    }

    public function getIvleStaffedModules() {
        echo json_encode(IvleApi::getAllModules($this->session->userToken));
        exit();
    }


}
