<?php

class Modules extends CI_Controller {


    public function index($moduleCode = null) {
        // the chosen module is shown in the url
        if (is_null($moduleCode)) {
            // show overview page if no module clicked
        } else {
            // show module page with projects
            // for now it's dummy data

            // create an associative array that carries the data for the page
            // insert the data with appropriate keys
            // the keys will become variable names in the page
            // see the modulespage.php file to see how its used
            $data = [];
            $data["moduleCode"] = $moduleCode;
            $data["moduleName"] = "Facebook And Society";

            $this->load->view("persistent/Header");
            // pass the data into modulespage
            $this->load->view("public/ModulesPage", $data);
            $this->load->view("persistent/Footer");
        }
    }

    // to allow nice url e.g. steps.tk/index.php/modules/CP3101B
    public function _remap($param) {
        $this->index($param);
    }

}
