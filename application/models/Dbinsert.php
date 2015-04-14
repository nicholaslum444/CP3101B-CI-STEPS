<?php

class Dbinsert extends CI_Model {

    public function __construct(){
			$this -> load -> database();
            parent::__construct();
    }

    /*
	*
	*
    */
    public function insertAndEnrolStudent($userID, $name, $moduleID) {
    	$this->db->from('user');
    	$this->db->where('user_id',$userID);
    	$this->db->where('user_type',USER_TYPE_STUDENT);

    	$query = $this->db->get();

    	if($query->num_rows() == 0) {
    		$this->insertStudentBaseInfo($userID, $name);
    	}

    	$data = array(
    		'user_id' => $userID,
    		'module_id' => $moduleID
    		);
    	$this->db->insert('enrolled',$data);

    	return true;
    }

    /*
	*
	*
    */
    public function dismissStudentfromModule($userID, $moduleID) {
    	$this->db->where('module_id', $moduleID);
    	$this->db->where('user_id', $userID);
    	
		$this->db->delete('enrolled');

		return true;
    }
	
	/*
	*
	*
    */
	public function insertStudentBaseInfo($userID, $name) {
		$data = array(
			'user_id' => $userID,
			'name' => $name,
			'user_type' => USER_TYPE_STUDENT
		);
		$this->db->insert('user', $data);

		return true;
	}

	/*
	*
	*
    */
	public function updateStudentDetail($userID, $email, $contact, $food) {
		$data = array();
		if($email == null && $contact == null && $food == null) {
			return true;
		}
		if($email != null) {
			$data['email'] = $email;
		}
		if($contact != null) {
			$data['contact'] = $contact;
		}
		if($food != null) {
			$data['food_preference'] = $food;
		}

		$this->db->where('user_id', $userID);
		$this->db->where('user_type', USER_TYPE_STUDENT);
		$this->db->update('user', $data);

		return true;
	}

	/*
	*
	*
    */
	public function insertProfBasicDetail($userID, $name) {
		$data = array(
			'user_id' => $userID,
			'name' => $name,
			'user_type' => USER_TYPE_LECTURER
		);
		$this->db->insert('user', $data);

		return true;
	}

	/*
	*
	*
    */
	public function updateProfDetail($userID, $name, $email, $food, $contact) {

		$data = array();
		if($email == null && $contact == null && $food == null) {
			return true;
		}
		if($email != null) {
			$data['email'] = $email;
		}
		if($contact != null) {
			$data['contact'] = $contact;
		}
		if($food != null) {
			$data['food_preference'] = $food;
		}

		$this->db->where('user_id', $userID);
		$this->db->where('user_type', $this->PROFESSOR);
		$this->db->update('user', $data);

		return true;
	}

	/*
	*
	*
    */
	public function isModuleExist($moduleID) {
		$this->db->from('module');
		$this->db->where('module.module_id',$moduleID);
		$query = $this->db->get();

		if($query->num_rows() == 1) {
			return true;
		}
		else {
			return false;
		}
	}

	/*
	*
	*
    */
	public function createModule($moduleCode, $moduleName, $moduleID, $iteration, $userID) {
		$data = array(
			'module_code' => $moduleCode,
			'iteration' => $iteration,
			'module_name' => $moduleName,
			'module_id' => $moduleID,

		);
		$this->db->insert('module',$data);

		$this->insertModuleSupervision($userID, $moduleID);

		return true;
	}

	/*
	*
	*
    */
	public function updateModuleDescription($moduleID, $moduleName, $description, $classSize) {
		
		if($moduleName == null && $description == null && $classSize == null) {
			return true;
		}

		$data = array();
		if($description == null && $classSize == null && $moduleName == null) {
			return true;
		}
		if($moduleName != null) {
			$data['module_name'] = $moduleName;
		}
		if($description != null) {
			$data['module_description'] = $description;
		}
		if($classSize != null) {
			$data['class_size'] = $classSize;
		}
		$this->db->where('module_id', $moduleID);
		
		$this->db->update('module',$data);
		return true;
	}

	/*
	*
	*
    */
	public function createProject($projectName, $moduleID) {
		$data = array(
			'title' => $projectName,
			'module_id' => $moduleID
		);

		$this->db->insert('project',$data);

		return true;

	}

	/*
	*
	*
    */
	public function updateProject($id, $title, $abstract, $poster, $video) {

		$data = array();
		if($title == null && $abstract == null && $video == null && $poster == null) {
			return true;
		}

		if($title != null) {
			$data['title'] = $title;
		}
		if($abstract != null) {
			$data['abstract'] = $abstract;
		}
		if($poster != null) {
			$data['poster'] = $poster;
		}
		if($video != null) {
			$data['video'] = $video;
		}

		$this->db->where('project_id', $id);
		$this->db->update('project',$data);

		return true;
	}

	/*
	*
	*
    */
	public function deleteProject($id) {
		$this->db->where('project_id', $id);
		$this->db->delete('project');

		return true;

	}
	
	/*
	*
	*
    */
	public function checkParticipatedProjectInModule($moduleID, $userID) {
		$this->db->from('participate');
		$this->db->join('project',
			'participate.project_id = project.project_id');
		$this->db->join('module',
			'module.module_id = project.module_id');
		$this->db->where('participate.user_id',$userID);
		$this->db->where('module.module_id',$moduleID);

		$query = $this->db->get();
		if($query->num_rows() == 1) {
			foreach ($query->result() as $row) {
				return $row;
			}
		}
		else if($query->num_rows() == 0) {
			return 0;
		}
		else {
			return $query->num_rows() * -100;
		}
		return -1;
	}

	/*
	*
	*
    */
	public function insertStudentToProject($id, $userID) {
		$data = array(
			'user_id' => $userID,
			'project_id' => $id
		);

		$this->db->insert('participate',$data);

		return true;
	}

	/*
	*
	*
    */
	public function setLeaderForProject($userID, $Pid) {
		$data = array(
			'leader_user_id' => $userID,
		);
		$this->db->where('project_id', $Pid);

		$this->db->update('project',$data);

		return true;
	}

	/*
	*
	*
    */
	public function deleteStudentFromProject($id, $userID) {
		$this->db->where('project_id', $id);
		$this->db->where('user_id', $userID);
		$this->db->delete('participate');

		return true;
	}

	/*
	*
	*
    */
	public function insertModuleSupervision($userID, $moduleID) {
		$data = array(
			'user_id' => $userID,
			'module_id' => $moduleID
		);

		$this->db->insert('supervise',$data);

		return true;
	}

	/*
	*
	*
    */
	public function dropSupervising($userID, $moduleID) {

		$this->db->where('module_id', $moduleID);
		$this->db->where('user_id', $userID);

		$this->db->delete('supervise');

		return true;
	}

	/*
	*
	*
    */
	public function dropParticipatingModule($moduleID) {

		$this->db->where('module_id', $moduleID);

		$this->db->delete('module');

		return true;
	}

	public function rankProjectInModule($moduleID, $projectID, $rank) {
		$data = array(
			'module_id' => $moduleID,
			'project_id' => $projectID,
			'rank' => $rank
		);

		$this->db->insert('ranking', $data);

		return true;
	}

	public function dropRanking($projectID) {
		$this->db->where('project_id',$projectID);
		$this->db->delete('ranking');

		return true;
	}

	public function addMediaToModule($moduleID, $poster, $video) {
		$data = array();
		if($poster == null && $video == null) {
			return true;
		}

		if($poster != null) {
			$data['poster'] = $poster;
		}
		if($video != null) {
			$data['video'] = $video;
		}

		$this->db->where('module_id', $moduleID);
		$this->db->update('module',$data);

		return true;
	}
}
?>
