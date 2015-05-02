<?php

// this call returns JSON objects.
header("Content-Type: application/json");

/* This class create a new instance of STePS*/

class Lookup extends CI_Controller {

    public function __construct() {
      parent::__construct();
    }

    public function index() {

        if(!(isset($_GET["searchTerm"])) || trim($_GET["searchTerm"]) === "") {
            exit($this->_buildIncompleteFormResponse());
        }
        
        $searchTerm = htmlspecialchars($_GET["searchTerm"]);
        
        exit($this->_buildResponse($searchTerm));
    }

    private function _buildResponse($searchTerm) {

        $result = $this->_getSearchResults($searchTerm);

        return json_encode($result);
    }

    private function _getSearchResults($searchTerm) {

        $searchResults = $this->Dbquery->searchDatabase($searchTerm);
        $resultObj = [];
        $resultObj["success"] = TRUE;
        $resultObj["searchTerm"] = $searchTerm;
        $resultObj["searchResults"] = $searchResults;
        
        return $resultObj;
    }

    private function _buildIncompleteFormResponse() {
        $fail = [
          "success" => FALSE,
          "error" => "INCOMPLETE_FORM"
        ];

        return json_encode($fail);
    }
}
