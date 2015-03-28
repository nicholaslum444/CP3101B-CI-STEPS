<?php

class Dbinsert extends CI_Model {

	private $STUDENT = 3;
	private $PROFESSOR = 2;
	private $VEGE = 1;
	private $NON_VEGE = 2;
	private $MUSLIM = 3;
	private $NON_MUSLIM = 4;

    public function __construct()
    {
			$this -> load -> database();
            parent::__construct();
    }


	public function insertStudentBaseInfo($matricNo, $name) {
		$data = array(
			'matric_no' => $matricNo,
			'name' => $name,
			'user_type' => $this->STUDENT
		);
		$this->db->insert('user', $data);

		return true;
	}

	public function updateStudentDetail($matricNo, $email, $contact, $food) {
		$data = array(	
			'email' => $email,
			'contact' => $contact,
			'food_preference' => $food
		);
		
		$this->db->where('matric_no', $matricNo);
		$this->db->where('user_type', $this->STUDENT);
		$this->db->update('user', $data);

		return true;
	}

	

	public function insertProfBasicDetail($matricNo, $name) {
		$data = array(
			'matric_no' => $matricNo,
			'name' => $name,
			'user_type' => $this->PROFESSOR
		);
		$this->db->insert('user', $data);

		return true;
	}
	//TODO: DO prof update all at a time?
	public function updateProfDetail($matricNo, $name, $email, $food, $contact) {
		
		$data = array(
			'user_type' => $this->PROFESSOR,
			'email' => $email,
			'contact' => $contact,
			'food_preference' => $food
		);
		$this->db->where('matric_no', $matricNo);
		$this->db->where('user_type', $this->PROFESSOR);
		$this->db->update('user', $data);

		return true;
	}

	public function isModuleExist($moduleCode, $iteration) {
		$this->db->from('module');
		$this->db->where('module.module_code',$moduleCode);
		$this->db->where('module.iteration',$iteration);
		$query = $this->db->get();
		if($query->num_rows() == 1) {
			return true;
		}
		else {
			return false;
		}
	}

	public function createModule($moduleCode, $iteration, $moduleName) {
		$data = array(
			'module_code' => $moduleCode,
			'iteration' => $iteration,
			'module_name' => $moduleName
		);
		$this->db->insert('module',$data);

		return true;
	}
	//TODO PID should be generated
	public function createProject($Pid, $projectName,$moduleCode,$iteration) {
		$data = array(
			'project_id' => $Pid,
			'title' => $projectName,
			'module_code' => $moduleCode,
			'iteration' => $iteration
		);

		$this->db->insert('project',$data);

		return true;

	}

	public function updateProject($id, $title, $abstract, $poster, $video) {
		$data = array(
			'abstract' => $abstract,
			'title' => $title,
			'poster' => $poster,
			'video' => $video
		);

		$this->db->where('project_id', $id);
		$this->db->update('project',$data);

		return true;
	}

	public function deleteProject($id) {
		$this->db->where('project_id', $id);
		$this->db->delete('project');

		return true;

	}

	public function checkParticipatedProjectInModule($iteration, $moduleCode,$matricNo) {
		$this->db->from('participate');
		$this->db->join('project',
			'participate.project_id = project.project_id');
		$this->db->join('module',
			'module.module_code = project.module_code'.
			' AND project.iteration = module.iteration');
		$this->db->where('participate.matric_no',$matricNo);
		$this->db->where('module.module_code',$moduleCode);
		$this->db->where('module.iteration',$iteration);

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

	public function insertStudentToProject($id, $matricNo) {
		$data = array(
			'matric_no' => $matricNo,
			'project_id' => $id
		);

		$this->db->insert('participate',$data);

		return true;
	}

	public function deleteStudentFromProject($id,$matricNo) {
		$this->db->where('project_id', $id);
		$this->db->where('matric_no', $matricNo);
		$this->db->delete('participate');

		return true;
	}

	public function insertModuleSupervision($matricNo, $moduleCode,$iteration) {
		$data = array(
			'matric_no' => $matricNo,
			'module_code' => $moduleCode,
			'iteration' => $iteration
		);

		$this->db->insert('supervise',$data);

		return true;
	}

	public function dropSupervising($matricNo, $moduleCode,$iteration) {
		
		$this->db->where('iteration',$iteration);
		$this->db->where('module_code', $moduleCode);
		$this->db->where('matric_no', $matricNo);
		
		$this->db->delete('supervise');

		return true;
	}

	public function dropParticipatingModule($iteration, $moduleCode) {
		
		$this->db->where('iteration',$iteration);
		$this->db->where('module_code', $moduleCode);
		
		$this->db->delete('module');
		
		return true;
	}



    //******************************************
	// function insertStudentDetail() {
	// 	$data = array(
	// 		'matric_no' => $matricNo,
	// 	);
	// 	$this->db->insert('user', $data);
	// }
	// function insertStudentDetail() {
	// 	$data = array(
	// 		'matric_no' => $matricNo,
	// 	);
	// 	$this->db->insert('user', $data);
	// }
	// function insertStudentDetail() {
	// 	$data = array(
	// 		'matric_no' => $matricNo,
	// 	);
	// 	$this->db->insert('user', $data);
	// }
	// function insertStudentDetail() {
	// 	$data = array(
	// 		'matric_no' => $matricNo,
	// 	);
	// 	$this->db->insert('user', $data);
	// }
	// function insertStudentDetail() {
	// 	$data = array(
	// 		'matric_no' => $matricNo,
	// 	);
	// 	$this->db->insert('user', $data);
	// }
}
?>
