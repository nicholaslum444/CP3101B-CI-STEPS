
<?php

class Dbquery extends CI_Model {


    public function __construct() {
			$this -> load -> database();
            parent::__construct();
    }
    
   public function getProjectListWithNoMemberByModule($moduleID) {
   		$sql = "SELECT * FROM project
				WHERE project.module_id = ?
				AND project.project_id NOT IN 
					(SELECT DISTINCT participate.project_id
					FROM participate 
					)";
		$query = $this->db->query($sql,array($moduleID));

		$result = array($query->num_rows());
		if($query->num_rows() > 0) {
			$i = 0;
			foreach($query->result_array() as $rows) {
				$result[$i] = array();
				$result[$i]['title'] = $rows['title'];
				$result[$i]['projectID'] = $rows['project_id'];
				
				++$i;
			}
		}
		return $result;
   } 

	public function getStudentsNotInProjectGroupByModule($moduleID) {
		
		$sql = "SELECT * FROM user
				JOIN enrolled 
				ON user.user_id = enrolled.user_id
				WHERE enrolled.module_id = ?
				AND user.user_id NOT IN 
					(SELECT user.user_id 
					FROM user JOIN participate 
					ON user.user_id = participate.user_id 
					JOIN project 
					ON project.project_id = participate.project_id
					WHERE project.module_id = ?
					)";


		$query = $this->db->query($sql,array($moduleID, $moduleID));

		$result = array($query->num_rows());
		if($query->num_rows() > 0) {
			$i = 0;
			foreach($query->result_array() as $rows) {
				$student = array();
				$student['userID'] = $rows['user_id'];
				$student['name'] = $rows['name'];
				$student['email'] = $rows['email'];
				$student['contact'] = $rows['contact'];
				$student['foodPref'] = $rows['food_preference'];
				$result[$i] = $student;
				++$i;
			}
		}
		return $result;
	}

    public function getLatestIteration() {
    	//SELECT max(iteration)
		//FROM STEPSiteration
		$this->db->from('STEPSiteration');
		$this->db->select_max('iteration');

		$query = $this->db->get();

		foreach ($query->result_array() as $row) {
			return intval($row['iteration']);
		}
		return array();
    }

	public function getStudentDetailByProject($projectID) {
		$query = $this->queryStudentByProject($projectID);
		$result;
		$i = 0;
		if($query->num_rows() > 0) {
			$result = array($query->num_rows());
			foreach ($query->result_array() as $row) {
				$result[$i] = array(4);
				$result[$i]['matricNo'] = $row['user_id'];
				$result[$i]['name'] = $row['name'];
				$result[$i]['email'] = $row['email'];
				$result[$i]['contact'] = $row['contact'];
				++$i;
			}
		} else {
			return array();
		}
		return $result;
	}

	private function queryStudentByProject($projectID) {
		//SELECT *
		//FROM participate
		//JOIN user ON participate.user_id = user.user_id
		//WHERE project_id = $projectID
		$this->db->from('participate');
		$this->db->join('user',
			'user.user_id = participate.user_id');
		$this->db->where('participate.project_id',$projectID);
		//$this->db->where('user_type',$STUDENT);
		//$this->db->select('user_id','name');
		$query = $this->db->get();
		return $query;
	}

	public function getSupervisorByModule($moduleID) {
		$query = $this-> querySupervisorByModule($moduleID);
		$result = array();
		$i = 0;
		if($query->num_rows() > 0) {
			$result = array($query->num_rows());
			foreach ($query->result_array() as $row) {
				$result[$i] = array();
				$result[$i]['userID'] = $row['user_id'];
				$result[$i]['name'] = $row['name'];
				++$i;
			}
		} else {
			return $result;
		}
		return $result;
	}

	private function querySupervisorByModule($moduleID) {
		$this->db->from('supervise');
		$this->db->join('user',
			'user.user_id = supervise.user_id');
		$this->db->where('supervise.module_id', $moduleID);
		$query = $this->db->get();

		return $query;
	}

	public function getProjectDetailsByProjectID($projectID) {
		$this->db->from('project');
		$this->db->where('project_id',$projectID);
		$query = $this->db->get();
		$result = array();
		if($query->num_rows() == 1) {
			$row = $query->result_array()[0];
			$result['title'] = $row['title'];
			$result['abstract'] = $row['abstract'];
			$result['poster'] = $row['poster'];
			$result['video'] = $row['video'];
			$result['projectId'] = $row['project_id'];
			$result['moduleID'] = $row['module_id'];
			$result['leaderID'] = $row['leader_user_id'];
			$result['members'] = $this->getMembersByProjectID($projectID);
			return $result;
		} else {
			return null;
		}
	} 

	public function getMembersByProjectID($projectID) {
		$this->db->from('project');
		$this->db->join('participate',
			'participate.project_id = project.project_id');
		$this->db->join('user',
			'user.user_id = participate.user_id');
		$this->db->where('project.project_id',$projectID);
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			$result = array();
			$i = 0;
			foreach ($query->result_array() as $row ) {
				$result[$i]['userID'] = $row['user_id'];
				$result[$i]['name'] = $row['name'];
				$result[$i]['email'] = $row['email'];
				$result[$i]['contact'] = $row['contact'];
				$result[$i]['foodPref'] = $row['food_preference'];
				++$i;
			}
			return $result;
		} else {
			return null;
		}
	}

	public function getProjectListByModule($moduleID) {
		$query = $this->queryProjectByModule($moduleID);
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
		} else {
			return array();
		}
		return $result;
	}

	private function queryProjectByModule($moduleID) {
		//SELECT *
		//FROM module
		//JOIN project ON project.module_code = module.module_code
		//			AND   module.iteration = project.iteration
		//WHERE module_code = $moduleCode
		//AND iteration = $iteration
		$this->db->from('module');
		$this->db->join('project',
			'module.module_id = project.module_id ');
		$this->db->where('module.module_id',$moduleID);
		$query = $this->db->get();
		return $query;
	}

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

	public function isLeader($userID, $projectID) {
		$this->db->from('project');
		$this->db->where('project_id', $projectID);
		$query = $this->db->get();
		if($query->num_rows() == 1) {
			foreach ($query->result_array() as $row ) {
				if($userID == $row['leader_user_id'])
					return true;
				else
					return false;
			}
		}
	}

	public function getModuleListByIteration($iteration) {
		$query = $this->queryModuleListByIteration($iteration);
		$result;
		$i = 0;
		if($query->num_rows() > 0) {
			$result = array($query->num_rows());
			foreach ($query->result_array() as $row) {
				$result[$i] = array();
				$result[$i]['moduleID'] = $row['module_id'];
				$result[$i]['moduleCode'] = $row['module_code'];
				$result[$i]['moduleName'] = $row['module_name'];
				$result[$i]['moduleDescription'] = $row['module_description'];
				$result[$i]['classSize'] = $row['class_size'];
				$result[$i]['projectList'] = 
					$this->getProjectListByModule($row['module_code'], 
													$iteration);
				++$i;
			}
		}
		else {
			$result = array();
		} 
		return $result;
	}

	public function queryModuleListByIteration($iteration) {
		//SELECT * FROM module WHERE iteration = $iteration;
		$this->db->from('module');
		$this->db->where('module.iteration', $iteration);
		$query = $this->db->get();
		return $query;
	}

	public function getModuleDetailByModuleID($moduleID) {
		$query = $this->queryModuleByModuleID($moduleID);
		$result;
		if($query->num_rows() == 1) {
			foreach ($query->result_array() as $row) {
				$result = array($query->num_rows());
				$result['moduleID'] = $row['module_id'];
				$result['moduleCode'] = $row['module_code'];
				$result['moduleName'] = $row['module_name'];
				$result['moduleDescription'] = $row['module_description'];
				$result['classSize'] = $row['class_size'];
				$result['projectList'] = 
					$this->getProjectListByModule($moduleID);
							
			}
			
			$query = $this->queryProjectByModule($moduleID);
			$project = array($query->num_rows());
			$i = 0;
			if($query->num_rows() > 0) {
				foreach ($query->result_array() as $row) {
					$project[$i] = array(2);
					$project[$i]['projectID'] = $row['project_id'];
					$project[$i]['projectTitle'] = $row['title'];
					++$i;
				}
			}
			$result['project'] = $project;
		}
		else {
			$result = array();
		} 
		return $result;
	}

	private function queryModuleByModuleID($moduleID) {
		//SELECT * FROM module
		//WHERE module_code = $moduleCode
		//AND iteration = $iteration;
		$this->db->from('module');
		$this->db->where('module.module_id', $moduleID);
		$query = $this->db->get();
		return $query;
	}

	public function getSupervisedModuleByID($matricNo, $iteration) {
		$query = $this->querySupervisedModuleByMatric($matricNo, $iteration);
		$result = array();
		$i = 0;
		if($query->num_rows() > 0) {
			$result = array($query->num_rows());
			foreach ($query->result_array() as $row) {
				$result[$i] = array();
				$result[$i]['moduleID'] = $row['module_id'];
				$result[$i]['moduleCode'] = $row['module_code'];
				$result[$i]['moduleName'] = $row['module_name'];
				$result[$i]['moduleDescription'] = $row['module_description'];
				$result[$i]['classSize'] = $row['class_size'];
				$result[$i]['projectList'] = 
					$this->getProjectListByModule($row['module_id']);
				++$i;
			}
		} else {
			return array();
		}
		return $result;
	}


	public function getStudentInfoByID($matricNo) {
		$this->db->from('user');
		$this->db->where('user_id',$matricNo);
		$this->db->where('user_type',USER_TYPE_STUDENT);
		$query = $this->db->get();
		$result = array();
		if($query->num_rows() == 1) {
			foreach ($query->result_array() as $row ) {
				$result['userID'] = $row['user_id'];
				$result['name'] = $row['name'];
				$result['email'] = $row['email'];
				$result['contact'] = $row['contact'];
				$result['foodPref'] = $row['food_preference'];
			}
			
		}
		return $result;
	}

	public function getModuleProjectForStudent($matricNo, $iteration) {
		$result = $this->getStudentInfoByID($matricNo);
		
		if(count($result) == 0) {
			return null;
		}

		$this->db->from('enrolled');
		$this->db->join('module',
			'module.module_id = enrolled.module_id');
		$this->db->where('module.iteration', $iteration);
		$this->db->where('enrolled.user_id',$matricNo);

		$query = $this->db->get();
		if($query->num_rows() > 0) {
			$i = 0;
			foreach($query->result_array() as $row) {
				$result['enrolled'][$i]['moduleID'] = $row['module_id'];
				$result['enrolled'][$i]['moduleCode'] = $row['module_code'];
				$result['enrolled'][$i]['moduleName'] = $row['module_name'];
				$result['enrolled'][$i]['iteration'] = $row['iteration'];
				$result['enrolled'][$i]['project'] = 
					$this->getProjectListByStudentModule($matricNo,	$row['module_id']);
				++$i;
			}	
		}

		return $result;
	}

	private function getProjectListByStudentModule($matricNo, $moduleID) {
		$this->db->from('project');
		$this->db->join('participate',
			'participate.project_id = project.project_id');
		$this->db->where('project.module_id', $moduleID);
		$this->db->where('participate.user_id',$matricNo);

		$query = $this->db->get();

		if($query->num_rows() == 1) {
			$result = array();
			foreach ($query->result_array() as $row) {
				$result['title'] = $row['title'];
				$result['abstract'] = $row['abstract'];
				$result['poster'] = $row['poster'];
				$result['video'] = $row['video'];
				$result['projectID'] = $row['project_id'];
				$result['leader'] = $row['leader_user_id'];
				$result['members'] = $this->getMembersByProjectID($row['project_id']);
			}
			return $result;
		} else {
			return null;
		}
	}

	private function querySupervisedModuleByMatric($matricNo,$iteration) {
		//SELECT * FROM supervise
		//JOIN module ON module.module_code AND supervise.module_code
		//WHERE supervise.user_id = $matricNo
		//AND supervise.iteration = $iteration;
		$this->db->from('supervise');
		$this->db->join('module',
			'module.module_id = supervise.module_id');
		$this->db->where('supervise.user_id',$matricNo);
		$this->db->where('module.iteration',$iteration);
		$query = $this->db->get();
		return $query;
	}

	public function getStudentByModule($moduleID) {
		$query = $this->queryStudentByModule($moduleID);
		$result;
		$i = 0;
		if($query->num_rows() > 0) {
			$result = array($query->num_rows());
			foreach ($query->result_array() as $row) {
				$result[$i] = array(5);
				$result[$i]['matricNo'] = $row['user_id'];
				$result[$i]['name'] = $row['name'];
				$result[$i]['email'] = $row['email'];
				$result[$i]['contact'] = $row['contact'];
				$result[$i]['foodPref'] = $row['food_preference'];
				++$i;
			}
		} else {
			return array();
		}
		return $result;
	}

	private function queryStudentByModule($moduleID) {
		//SELECT * FROM user
		//JOIN enrolled ON user.user_id = enrolled.user_id
		//JOIN module ON module.module_code = enrolled.module_code
		//WHERE module.module_code = $moduleCode
		//AND module.iteration = $iteration
		//AND user.user_type = 3;
		$this->db->from('user');
		$this->db->join('enrolled',
			'user.user_id = enrolled.user_id');
		$this->db->join('module',
			'module.module_id = enrolled.module_id');
		$this->db->where('module.module_id',$moduleID);
		$this->db->where('user.user_type', USER_TYPE_STUDENT);
		$this->db->order_by('user.name ASC');
		$query = $this->db->get();
		return $query;
	}

	public function userExistByID($matricNo, $userType) {
		$this->db->from('user');

		$this->db->where('user.user_type',$userType);
		$this->db->where('user.user_id',$matricNo);
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

		} else {
			return array();
		}
		return $result;
	}

	private function queryFoodPrefByIteration($iteration) {
		//SELECT user.food_preference, COUNT(*)
		//FROM user JOIN participate 
		//ON user.user_id = participate.user_id
		//JOIN project ON participate.project_id = project.project_id
		//JOIN module ON project.module_code = module.module_code
		//			AND project.iteration = module.iteration
		//WHERE module.iteration = 6 GROUP BY user.food_preference;
		$this->db->from('user');
		$this->db->join('participate',
			'user.user_id = participate.user_id');
		$this->db->join('project',
			'participate.project_id = project.project_id');
		$this->db->join('module',
			'project.module_id = module.module_id');

		$this->db->where('module.iteration',$iteration);

		$this->db->group_by('food_preference');
		$this->db->select('food_preference , count(*) AS count');
		$query = $this->db->get();
		return $query;
	}

	public function isLecturer($userID) {
		$this->db->from('user');
		$this->db->where('user_id',$userID);
		$this->db->where('user_type',USER_TYPE_LECTURER);

		$query = $this->db->get();
		if($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}

	public function isStudent($userID) {
		$this->db->from('user');
		$this->db->where('user_id',$userID);
		$this->db->where('user_type',USER_TYPE_STUDENT);

		$query = $this->db->get();
		if($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}

	}
}
?>
