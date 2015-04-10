
<?php

class Dbquery extends CI_Model {


    public function __construct() {
			$this -> load -> database();
            parent::__construct();
    }

	/*
	* This function return the projects list of module where no one
	* has joined the project
	* @param moduleID 	module code
	* Return: 	Array of project obj: {title,projectID}
    */
   public function getProjectListWithNoMemberByModule($moduleID) {

		$query = $this->queryProjectListWithNoMemberByModule($moduleID);

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

	/*
	* This function return the SQL query of projects list of module where no one
	* has joined the project
	* @param moduleID 	module code
	* Return: 	SQL query of projects
    */
	private function queryProjectListWithNoMemberByModule($moduleID) {
   		$sql = "SELECT * FROM project
				WHERE project.module_id = ?
				AND project.project_id NOT IN
					(SELECT DISTINCT participate.project_id
					FROM participate
					)";
		$query = $this->db->query($sql,array($moduleID));

		return $query;
	}

	/*
	* This function return the students of a module who have not
	* have joined any projects
	* @param moduleID 	module code
	* Return: 	Array of sudent obj: {userID,name,email,contact,foodPref}
    */
	public function getStudentsNotInProjectGroupByModule($moduleID) {

		$query = $this->queryStudentsNotInProjectGroupByModule($moduleID);

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

	/*
	* This function return the SQL query of students of a module who have not
	* have joined any projects
	* @param moduleID 	module code
	* Return: 	SQL query of students
    */
	private function queryStudentsNotInProjectGroupByModule($moduleID) {
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

		return $query;
	}

	/*
	* This function return the latest iteration of STEPS
	* Return: Integer of latest STEPS iteration, if not found, return -1;
    */
    public function getLatestIteration() {
    	//SELECT max(iteration)
		//FROM STEPSiteration
		$this->db->from('STEPSiteration');
		$this->db->select_max('iteration');

		$query = $this->db->get();

		foreach ($query->result_array() as $row) {
			return intval($row['iteration']);
		}
		return -1;
    }

    public function getIterationInfoByIterate($iterate) {
		$this->db->from('STEPSiteration');
		$this->db->where('iteration',$iterate);

		$query = $this->db->get();
		$result = array();
		if($query->num_rows() == 1) {
			$row = $query->result_array()[0];
			$result['iteration'] = intval(strtotime($row['iteration']));
			$result['cutOff'] = intval(strtotime($row['cut_off']));
			$result['startTime'] = intval(strtotime($row['start_time']));
			$result['endTime'] = intval(strtotime($row['end_time']));
			$result['regisDate'] = intval(strtotime($row['registration_date']));
			$result['semester'] = $row['semester'];
		}
		return $result;
    }

    public function getLatestIterationInfo() {
		$iterate = $this->getLatestIteration();

		return $this->getIterationInfoByIterate($iterate);
    }

//     getIterationInfo(ite)
// getLatestIterationInfo
// -> open registration
// -> cut off info
// -> event start time
// -> end time
// -> iteration
// -> iteration semester


	/*
	* This function return the students details by project ID
	* @param projectID 	project ID
	* Return: 	Array of sudent obj: {userID,name,email,contact,foodPref}
    */
	public function getStudentDetailByProject($projectID) {
		$query = $this->queryStudentByProject($projectID);
		$result;
		$i = 0;
		if($query->num_rows() > 0) {
			$result = array($query->num_rows());
			foreach ($query->result_array() as $row) {
				$result[$i] = array(4);
				$result[$i]['userID'] = $row['user_id'];
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

	/*
	* This function return the SQL query of students details by project ID
	* @param projectID 	project ID
	* Return: 	SQL query of students
    */
	private function queryStudentByProject($projectID) {
		//SELECT *
		//FROM participate
		//JOIN user ON participate.user_id = user.user_id
		//WHERE project_id = $projectID
		//AND user_type = STUDENT
		$this->db->from('participate');
		$this->db->join('user',
			'user.user_id = participate.user_id');
		$this->db->where('participate.project_id',$projectID);
		$this->db->where('user_type',USER_TYPE_STUDENT);
		$query = $this->db->get();
		return $query;
	}

	/*
	* This function return the supervisor details by module ID
	* @param moduleID 	module ID
	* Return: 	Array of supervisor obj: {userID,name}
    */
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

	/*
	* This function return the SQL query of supervisor details by module ID
	* @param moduleID 	module ID
	* Return: 	SQL query of supervisor
    */
	private function querySupervisorByModule($moduleID) {
		//SELECT *
		//FROM supervise
		//JOIN user
		//ON user.user_id = supervise.user_id
		//WHERE supervise.module_id = $moduleID
		$this->db->from('supervise');
		$this->db->join('user',
			'user.user_id = supervise.user_id');
		$this->db->where('supervise.module_id', $moduleID);
		$query = $this->db->get();

		return $query;
	}

	/*
	* This function return the project details
	* @param projectID 	project ID
	* Return:	project obj: {title,abstract,poster,video,
	*							projectID,moduleID,leaderID,
	*							members:[{userID,name,email,
	*										contact,foodPref
	*									},{...}]
	*						}
    */
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

	/*
	* This function return the members of a project
	* @param projectID 	project ID
	* Return:	array of members object: {userID,name,email,
	*										contact,foodPref}
	*			null if no members
    */
	public function getMembersByProjectID($projectID) {

		$query = $this->queryMembersByProjectID($projectID);

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

	/*
	* This function return the SQL query of members of a project
	* @param projectID 	project ID
	* Return:	SQL query of project members
    */
	private function queryMembersByProjectID($projectID) {
		//SELECT 	*
		//FROM 		project
		//JOIN 		participate
		//ON 		participate.project_id = project.project_id
		//JOIN      user
		//ON 		user.user_id = participate.project_id
		//WHERE 	project.project_id = $projectID
		$this->db->from('project');
		$this->db->join('participate',
			'participate.project_id = project.project_id');
		$this->db->join('user',
			'user.user_id = participate.user_id');
		$this->db->where('project.project_id',$projectID);
		$this->db->where('user.user_type',USER_TYPE_STUDENT);
		$query = $this->db->get();

		return $query;
	}

	/*
	* This function return the all project details under a module
	* @param moduleID 	module ID
	* Return 	array of project object: {projectID,title,abstract,poster,video,
	*									 array of members:[{userID,name,email,
	*													contact,foodPref},{...}]
	*									 }
    */
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
                $result[$i]['members'] = $this->getMembersByProjectID($row['project_id']);
				++$i;
			}
		} else {
			return array();
		}
		return $result;
	}

	/*
	* This function return SQL query of the all project details under a module
	* @param moduleID 	module ID
	* Return: 	SQL query of projects
    */
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

	/*
	* This function return the boolean response of existance of module
	* @param moduleID 	module ID
	* Return: true if module exist, otherwise false
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
	* This function return the boolean response of a particular person
	* is the leader of a project team
	* @param userID 	user ID
	* @param projectID 	project ID
	* Return: true if user is the leader of the project, otherwise false
    */
	public function isLeader($userID, $projectID) {
		//SELECT 	*
		//FROM 		project
		//WHERE 	project_id = $projectID
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

	/*
	* This function return the all module details in a STEPS iteration
	* @param iteration 	STEPS iteration
	* Return: 	array of module object:
	*		{moduleID, moduleCode, moduleName,
	* 		 moduleDescription,classSize,
	*		 array of projectList: [
	*					{projectID,title,abstract,poster,video,
	*					 array of members:[{ userID,name,email,
	*										contact,foodPref},
	*									  {...}]
	*					 }
	*		}
    */
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
					$this->getProjectListByModule($row['module_id']);
                $result[$i]['supervisors'] =
                    $this->getSupervisorByModule($row['module_id']);
				++$i;
			}
		}
		else {
			$result = array();
		}
		return $result;
	}

	/*
	* This function return the SQL query all module details in a STEPS iteration
	* @param iteration 	STEPS iteration
	* Return: SQL query of Module
    */
	public function queryModuleListByIteration($iteration) {
		//SELECT 	*
		//FROM  	module
		//WHERE 	module.iteration = $iteration;
		$this->db->from('module');
		$this->db->where('module.iteration', $iteration);
		$query = $this->db->get();
		return $query;
	}

	/*
	* This function return the module detail
	* @param moduleID 	module ID
	* Return: 	module obj:  {moduleID, moduleCode, moduleName,
	* 		 				  moduleDescription,classSize,
	*		 				  array of projectList: [
	*								{projectID,title,abstract,poster,video,
	*					 			 array of members:[{ userID,name,email,
	*													contact,foodPref},
	*									 				 {...}]
	* 								}
	*					 	  }
    */
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
		}
		else {
			$result = array();
		}
		return $result;
	}

	/*
	* This function return the SQL query of module detail
	* @param moduleID 	module ID
	* Return: 	SQL query of module
    */
	private function queryModuleByModuleID($moduleID) {
		//SELECT * FROM module
		//WHERE module_id = $moduleID
		$this->db->from('module');
		$this->db->where('module.module_id', $moduleID);
		$query = $this->db->get();
		return $query;
	}

	/*
	* This function return the module supervised by the lecturer in the current iteration
	* @param userID 	lecturer ID
	* @param iteration 	STEPS iteration
	* Return: 	array of module obj: {moduleID, moduleCode,
	* 								  moduleDescription, classSize,
	*								  array of projectList: [
	*									{projectID,title,abstract,poster,video,
	*					 			 	 array of members:[{ userID,name,email,
	*														contact,foodPref},
	*									 				 {...}]
	*					 	  			}
	*								 }
    */
	public function getSupervisedModuleByID($userId, $iteration) {
		$query = $this->querySupervisedModuleByID($userId, $iteration);
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
				$result[$i]['projectList'] = $this->getProjectListByModule($row['module_id']);
				++$i;
			}
		} else {
			return array();
		}
		return $result;
	}


	/*
	* This function return the student basic information
	* @param userID student ID
	* Return: student obj: {userID, name, email, contact, foodPref}
    */
	public function getStudentInfoByID($userId) {
		$this->db->from('user');
		$this->db->where('user_id',$userId);
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

	/*
	* This function return the SQL query of student basic information
	* @param userID student ID
	* Return: SQL query of student
    */
	private function queryStudentInfoByID($userId) {
		//SELECT 	*
		//FROM 		user
		//WHERE 	user_id = $userID
		//AND 		user_type = STUDENT
		$this->db->from('user');
		$this->db->where('user_id',$userId);
		$this->db->where('user_type',USER_TYPE_STUDENT);
		$query = $this->db->get();
		return $query;
	}

	/*
	* This function return student detail information including modules
	* that will be participating in STEPS
	* @param userID 	student ID
	* @param iteration  STEPS iteration
	* Return: student obj:
	* 	{userID, name, email, contact, foodPref,
	* 	 array of enrolled: [{moduleID,moduleCode,moduleName,
	* 						 iteration,project:{title,abstract,poster,video,
	*											projectID,leader,
	*											array of members: [{userID,name,email,
	*																contact,foodPref},
	*										  						{...}]
	*											}
	*
	*						},{Another module...}]
	*   }
    */
	public function getModuleProjectForStudent($userId, $iteration) {
		$result = $this->getStudentInfoByID($userId);

		if(count($result) == 0) {
			return null;
		}

		$this->db->from('enrolled');
		$this->db->join('module',
			'module.module_id = enrolled.module_id');
		$this->db->where('module.iteration', $iteration);
		$this->db->where('enrolled.user_id',$userId);

		$query = $this->db->get();
		if($query->num_rows() > 0) {
			$i = 0;
			foreach($query->result_array() as $row) {
				$result['enrolled'][$i]['moduleID'] = $row['module_id'];
				$result['enrolled'][$i]['moduleCode'] = $row['module_code'];
				$result['enrolled'][$i]['moduleName'] = $row['module_name'];
				$result['enrolled'][$i]['iteration'] = $row['iteration'];
				$result['enrolled'][$i]['project'] =
					$this->getProjectListByStudentModule($userId, $row['module_id']);
				++$i;
			}
		}

		return $result;
	}

	/*
	* This function return project detail information
	* @param userID 	student ID
	* @param moduleID  	module ID
	* Return: project obj: {title,abstract,poster,video,
	*						projectID,leader,
	*						array of members: [{userID,name,email,
	*											contact,foodPref},
	*										  {...}]
	*						}
	*
    */
	private function getProjectListByStudentModule($userId, $moduleID) {
		$query = $this->queryProjectListByStudentModule($userId, $moduleID);

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

	/*
	* This function return the SQL query of project detail information
	* @param userID 	student ID
	* @param moduleID  	module ID
	* Return: SQL query of project and participants
    */
	private function queryProjectListByStudentModule($userId, $moduleID) {
		//SELECT 	*
		//FROM 		project
		//JOIN 		participate
		//ON 		participate.project_id = project.project_id
		//WHERE 	project.module_id = $moduleID
		//AND 		participate.user_id = $userID
		$this->db->from('project');
		$this->db->join('participate',
			'participate.project_id = project.project_id');
		$this->db->where('project.module_id', $moduleID);
		$this->db->where('participate.user_id',$userId);

		$query = $this->db->get();
		return $query;
	}

	/*
	* This function return the SQL query of module supervised by the lecturer
	* in the current iteration
	* @param userID 	lecturer ID
	* @param iteration 	STEPS iteration
	* Return: 	SQL query of module
    */
	private function querySupervisedModuleByID($userId,$iteration) {
		//SELECT * FROM supervise
		//JOIN module ON module.module_code AND supervise.module_code
		//WHERE supervise.user_id = $userId
		//AND supervise.iteration = $iteration;
		$this->db->from('supervise');
		$this->db->join('module',
			'module.module_id = supervise.module_id');
		$this->db->where('supervise.user_id',$userId);
		$this->db->where('module.iteration',$iteration);
		$query = $this->db->get();
		return $query;
	}

	/*
	* This function return all students information who enrolled in a module
	* @param moduleID 	module ID
	* Return: array of student obj:{userID,name,email,contact,foodPref}
    */
	public function getStudentByModule($moduleID) {
		$query = $this->queryStudentByModule($moduleID);
		$result;
		$i = 0;
		if($query->num_rows() > 0) {
			$result = array($query->num_rows());
			foreach ($query->result_array() as $row) {
				$result[$i] = array(5);
				$result[$i]['userID'] = $row['user_id'];
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

	/*
	* This function return SQL query of students information who enrolled in a module
	* @param moduleID 	module ID
	* Return: SQL query of students in a module
    */
	private function queryStudentByModule($moduleID) {
		//SELECT * FROM user
		//JOIN enrolled ON user.user_id = enrolled.user_id
		//JOIN module ON module.module_id = enrolled.module_id
		//WHERE module.module_id = $moduleID
		//AND user.user_type = STUDENT;
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

	/*
	* This function return the boolean response of existance of a
	* user of certain type: lecturer or student
	* @param userID  	user ID
	* @param userType 	user Type - STUDENT / LECTURER
	* Return: 	True if user exist, otherwise false
    */
	public function userExistByID($userId, $userType) {
		//SELECT 	*
		//FROM 		user
		//WHERE 	user.user_type = $userType
		//AND 		user.user_id   = $userID
		$this->db->from('user');

		$this->db->where('user.user_type',$userType);
		$this->db->where('user.user_id',$userId);
		$query = $this->db->get();
		if($query->num_rows() == 1) {
			return true;
		}
		else {
			return false;
		}
	}

	/*
	* This function compute the total food count of an iteration
	* @param: iteration STEPS iteration
	* Return: obj of {VEGE:int, NON_VEGE:int, MUSLIM:int, NON_MUSLIM:int}
    */
	public function getFoodPrefByIteration($iteration) {
		$query = $this->queryFoodPrefByIteration($iteration);
		$result;
		$i = 0;
		if($query->num_rows() > 0) {
			$result = array($query->num_rows());

			foreach ($query->result_array() as $row) {
				if($row['food_preference'] == FOOD_PREFERENCE_VEGETARIAN) {
					$result["VEGE"] = $row["count"];
				}
				if($row['food_preference'] == FOOD_PREFERENCE_NON_VEGETARIAN) {
					$result["NON_VEGE"] = $row["count"];
				}
				if($row['food_preference'] == FOOD_PREFERENCE_MUSLIM) {
					$result["MUSLIM"] = $row["count"];
				}
				if($row['food_preference'] == FOOD_PREFERENCE_NON_MUSLIM) {
					$result["NON_MUSLIM"] = $row["count"];
				}
			}

		} else {
			return array();
		}
		return $result;
	}

	/*
	* This function compute the total food count of an iteration
	* @param: iteration STEPS iteration
	* Return: SQL query of COUNT of food prefence
    */
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

	/*
	* This function return the boolean response of a particular
	* user is a lecturer
	* @param userID  	user ID
	* Return: 	True if lecturer exist, otherwise false
    */
	public function isLecturer($userID) {
		return userExistByID($userId, USER_TYPE_LECTURER);
	}

	/*
	* This function return the boolean response of a particular
	* user is a student
	* @param userID  	student ID
	* Return: 	True if student exist, otherwise false
    */
	public function isStudent($userID) {
		return userExistByID($userId, USER_TYPE_STUDENT);
	}
}
?>
