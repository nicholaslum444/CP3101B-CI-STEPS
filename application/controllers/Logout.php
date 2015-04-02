<?php

class Logout extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        // unsets the logged in flag
        if ($this->session->isLoggedIn) {
            $this->session->set_userdata('isLoggedIn', FALSE);
        }

        // destroy the session == logout
        $this->session->sess_destroy();

        // send the user back to home page
        header("Location: /");
    }

}
