
<?php

class Dbquery extends CI_Model {

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


    public function getLatestIteration() {
    	//SELECT max(iteration)
		//FROM STEPSiteration
		$this->db->from('STEPSiteration');
		$this->db->select_max('iteration');

		$query = $this->db->get();
		foreach ($query->result_array() as $row) {
			return json_encode($row['iteration']);
		}
    }

	public function getStudentDetailByProject($projectID) {
		$query = $this->queryStudentByProject($projectID);
		$result;
		$i = 0;
		if($query->num_rows() > 0) {
			$result = array($query->num_rows());
			foreach ($query->result_array() as $row) {
				$result[$i] = array(4);
				$result[$i]['matricNo'] = $row['matric_no'];
				$result[$i]['name'] = $row['name'];
				$result[$i]['email'] = $row['email'];
				$result[$i]['contact'] = $row['contact'];
				++$i;
			}
		}
		return $result;
	}

	private function queryStudentByProject($projectID) {
		//SELECT *
		//FROM participate
		//JOIN user ON participate.matric_no = user.matric_no
		//WHERE project_id = $projectID
		$this->db->from('participate');
		$this->db->join('user',
			'user.matric_no = participate.matric_no');
		$this->db->where('participate.project_id',$projectID);
		//$this->db->where('user_type',$STUDENT);
		//$this->db->select('matric_no','name');
		$query = $this->db->get();
		return $query;
	}

	public function getProjectListByModule($moduleCode, $iteration) {
		$query = $this->queryProjectByModule($moduleCode, $iteration);
		$result;
		$i = 0;
		if($query->num_rows() > 0) {
			$result = array($query->num_rows());
			foreach ($query->result_array() as $row) {
				$result[$i] = array(5);
				$result[$i]['projectID'] = $row['project_id'];
				$result[$i]['title'] = $row['title'];
				$result[$i]['abstract'] = $row['abstract'];
				$result[$i]['poster'] = $row['poster'];
				$result[$i]['video'] = $row['video'];
				++$i;
			}
		}
		return $result;
	}

	private function queryProjectByModule($moduleCode, $iteration) {
		//SELECT *
		//FROM module
		//JOIN project ON project.module_code = module.module_code
		//			AND   module.iteration = project.iteration
		//WHERE module_code = $moduleCode
		//AND iteration = $iteration
		$this->db->from('module');
		$this->db->join('project',
			'module.module_code = project.module_code '.
			'AND module.iteration = project.iteration');
		$this->db->where('module.module_code',$moduleCode);
		$this->db->where('module.iteration',$iteration);
		$query = $this->db->get();
		return $query;
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

	public function getModuleListByIteration($iteration) {
		$query = $this->queryModuleListByIteration($iteration);
		$result;
		$i = 0;
		if($query->num_rows() > 0) {
			$result = array($query->num_rows());
			foreach ($query->result_array() as $row) {
				$result[$i] = array(2);
				$result[$i]['moduleCode'] = $row['module_code'];
				$result[$i]['moduleName'] = $row['module_name'];
				++$i;
			}
		}
		return $result;
	}


	private function queryModuleListByIteration($iteration) {
		//SELECT * FROM module WHERE iteration = $iteration;
		$this->db->from('module');
		$this->db->where('module.iteration', $iteration);
		$query = $this->db->get();
		return $query;
	}

	public function getSupervisedModuleByID($matricNo, $iteration) {
		$query = $this->querySupervisedModuleByMatric($matricNo, $iteration);
		$result = FALSE;
		$i = 0;
		if($query->num_rows() > 0) {
			$result = array($query->num_rows());
			foreach ($query->result_array() as $row) {
				$result[$i] = array(2);
				$result[$i]['moduleCode'] = $row['module_code'];
				$result[$i]['moduleName'] = $row['module_name'];
				++$i;
			}
		}
		return $result;
	}

	private function querySupervisedModuleByMatric($matricNo,$iteration) {
		//SELECT * FROM supervise
		//JOIN module ON module.module_code AND supervise.module_code
		//WHERE supervise.matric_no = $matricNo
		//AND supervise.iteration = $iteration;
		$this->db->from('supervise');
		$this->db->join('module',
			'module.module_code = supervise.module_code');
		$this->db->where('supervise.matric_no',$matricNo);
		$this->db->where('module.iteration',$iteration);
		$query = $this->db->get();
		return $query;
	}

	public function getStudentByModule($moduleCode, $iteration) {
		$query = $this->queryStudentByModule($moduleCode, $iteration);
		$result;
		$i = 0;
		if($query->num_rows() > 0) {
			$result = array($query->num_rows());
			foreach ($query->result_array() as $row) {
				$result[$i] = array(5);
				$result[$i]['matricNo'] = $row['matric_no'];
				$result[$i]['name'] = $row['name'];
				$result[$i]['email'] = $row['email'];
				$result[$i]['contact'] = $row['contact'];
				$result[$i]['foodPref'] = $row['food_preference'];
				++$i;
			}
		}
		return $result;
	}

	private function queryStudentByModule($moduleCode, $iteration) {
		//SELECT * FROM user
		//JOIN participate ON user.matric_no = participate.matric_no
		//JOIN project ON project.project_id = participate.project_id
		//JOIN module ON module.module_code = project.module_code
		//WHERE module.module_code = $moduleCode
		//AND module.iteration = $iteration
		//AND user.user_type = 3;
		$this->db->from('user');
		$this->db->join('participate',
			'user.matric_no = participate.matric_no');
		$this->db->join('project',
			'project.project_id = participate.project_id');
		$this->db->join('module',
			'module.module_code = project.module_code'.
			' AND module.iteration = project.iteration');
		$this->db->where('project.module_code',$moduleCode);
		$this->db->where('project.iteration',$iteration);
		$this->db->where('user.user_type', $this->STUDENT);
		$query = $this->db->get();
		return $query;
	}

	public function userExistByID($matricNo,$userType) {
		$this->db->from('user');
		
		$this->db->where('user.user_type',$userType);
		$this->db->where('user.matricNo',$matricNo);
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return true;
		}
		else {
			return false;
		}
	}

	public function getFoodPrefByIteration($iteration) {
		$query = $this->queryFoodPrefByIteration($iteration);
		$result;
		$i = 0;
		if($query->num_rows() > 0) {
			$result = array($query->num_rows());

			foreach ($query->result_array() as $row) {
				if($row['food_preference'] == $this->VEGE) {
					$result["VEGE"] = $row["count"];
				}
				if($row['food_preference'] == $this->NON_VEGE) {
					$result["NON_VEGE"] = $row["count"];
				}
				if($row['food_preference'] == $this->MUSLIM) {
					$result["MUSLIM"] = $row["count"];
				}
				if($row['food_preference'] == $this->NON_MUSLIM) {
					$result["NON_MUSLIM"] = $row["count"];
				}
			}

		}
		return $result;
	}

	private function queryFoodPrefByIteration($iteration) {
		//SELECT user.food_preference, COUNT(*)
		//FROM user JOIN participate ON user.matric_no = participate.matric_no
		//JOIN project ON participate.project_id = project.project_id
		//JOIN module ON project.module_code = module.module_code
		//			AND project.iteration = module.iteration
		//WHERE module.iteration = 6 GROUP BY user.food_preference;
		$this->db->from('user');
		$this->db->join('participate',
			'user.matric_no = participate.matric_no');
		$this->db->join('project',
			'participate.project_id = project.project_id');
		$this->db->join('module',
			'project.module_code = module.module_code'.
			' AND project.iteration = module.iteration');

		$this->db->where('module.iteration',$iteration);

		$this->db->group_by('food_preference');
		$this->db->select('food_preference , count(*) AS count');
		$query = $this->db->get();
		return $query;
	}

	/*

	// function getSupervisorByID($matric_no) {
	// 	$this->db->from('');
	// 	$this->db->join('','');
	// 	$this->db->where('',$);
	// 	$this->db->where('',$);
	// 	$this->db->where('',$);
	// 	$query = $this->db->get();
	// 	return $query;
	// }

	// function getSupervisorByID($matric_no) {
	// 	$this->db->from('');
	// 	$this->db->join('','');
	// 	$this->db->where('',$);
	// 	$this->db->where('',$);
	// 	$this->db->where('',$);
	// 	$query = $this->db->get();
	// 	return $query;
	// }

	$this->db->close();
	*/
}
?>
