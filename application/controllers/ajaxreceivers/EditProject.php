<?php

// this call returns JSON objects.
header("Content-Type: application/json");

/* This class updates project information*/

class EditProject extends CI_Controller {

    public function __construct() {
      parent::__construct();
    }

    public function index() {
        if (!(isset($_POST["project"]))) 
            exit($this->_buildIncompleteFormResponse());

        if (!$this->session->isLoggedIn) {
            exit($this->_buildAccessDeniedResponse());
        }

        exit($this->_buildResponse($_POST["project"]));
    }

    private function _buildResponse($project) {

        $project = $this->_filter($project);
        $insertResult = $this->_insertIntoDb($project);

        return json_encode($insertResult);
    }

    private function _insertIntoDb($project) {
      $poster = null;
      $video = null;
      $abstract = null;
      $projectID = null;
      $title = null;
      if($project['projectId'] == null) {
        $fail = ["success" => FALSE,
        "error" => "No_PROJECT_ID"];

        return json_encode($fail);
      }

      $projectID = $project['projectId'];

      //should not be here? since only lecturer can give project title under EditModule
      //commented out for it to work for software pitch 
     /* if(($project['title'] == null) && $this->session->userType === USER_TYPE_LECTURER) {
        $title = $project['title'];
      }*/

      if($project['poster'] != null) {
        $poster = $project['poster'];
      }
      if($project['video'] != null) {
        $video = $project['video'];
      }
      if($project['abstract'] != null) {
        $abstract = $project['abstract'];
      }
    
     $this->Dbinsert->updateProject($projectID, $title, $abstract, $poster, $video); 
  

       return [
       "success" => TRUE
       ];
    }

    private function _filter($project) {
      if($project['poster'] != null) {
        $poster = $project['poster'];
        $project['poster'] = filter_var($poster, FILTER_SANITIZE_URL);
      }
      if($project['video'] != null) {
        $video = $project['video'];
        $project['video'] = filter_var($video, FILTER_SANITIZE_URL);
      }
      if($project['abstract'] != null) {
        $abstract = $project['abstract'];
        $project['abstract'] = filter_var($abstract, FILTER_SANITIZE_STRING);
      }
      return $project;
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
