<?php

// this call returns JSON objects.
header("Content-Type: application/json");

class RegisterModule extends CI_Controller {

    public function index() {
        if (!(isset($_POST["moduleCode"]) && isset($_POST["moduleName"]))) {
            exit($this->_buildFailureResponse());
        }

        echo $this->_buildResponse($_POST["moduleCode"], $_POST["moduleName"]);
    }

    private function _buildResponse($moduleCode, $moduleName) {
        // try to insert to db
        // get response object from db telling me
        // whether it can insert or not

        $insertResult = $this->_insertIntoDb($moduleCode, $moduleName);

        return json_encode($insertResult);
    }

    private function _insertIntoDb($mc, $mn) {
        return [
            "success" => TRUE
        ];
    }

    private function _buildFailureResponse() {
        $fail = [
            "success" => FALSE,
            "error" => "INCOMPLETE_FORM"
        ];

        return json_encode($fail);
    }
}