<?php

class Lecturer extends CI_Controller {

    /* Created this for easy viewing, please go ahead to change it
        as desired */

    public function index() {

        $this->load->view("persistent/Header");
        $this->load->view("users/LecturerPage");
        $this->load->view("persistent/Footer");
    }

    public function newModule() {

        $this->load->view("persistent/Header");
        $this->load->view("users/newModulePage");
        $this->load->view("persistent/Footer");
    }
}

