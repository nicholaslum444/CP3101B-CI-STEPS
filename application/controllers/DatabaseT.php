
<?php

class DatabaseT extends CI_Controller {

	// private $STUDENT = 3;
	// private $PROFESSOR = 2;

	private $VEGE = 1;
	private $NON_VEGE = 2;
	private $MUSLIM = 3;
	private $NON_MUSLIM = 4;


	public function index() {

        $this -> load -> model('Dbquery');
		$this -> load -> model('Dbinsert');

		//$result1 =  $this->Dbinsert->insertStudentBaseInfo("A0201314B","Testing me");
		$result2 =  $this->Dbinsert
		->updateStudentDetail("A0201314B","hahaha@gmail.com",333644,$this->MUSLIM);
		//$result3 =  $this->Dbinsert->insertProfBasicDetail("A0090003N","Prof ABC");
		$result4 =  $this->Dbinsert
		->updateProfDetail("A0101075B", "Prof ABC", "profA@nus.edu",$this->VEGE,87654237);
		$result5 =  $this->Dbinsert->createModule("CS4321",5,"TESTING MOD");
		$result31 =  $this->Dbinsert
		->createProject(51,"PLAY game","CS4321",5);
		$result32 =  $this->Dbinsert
		->updateProject(51,"Play another game","play play play","www.post.com/abs","www.video.com/fjdb");
		
		$result34 =  $this->Dbinsert
		->checkParticipatedProjectInModule(5,"CS4321","A0201314B");
		$result35 =  $this->Dbinsert
		->insertStudentToProject(51,"A0201314B");
		$result36 =  $this->Dbinsert
		->checkParticipatedProjectInModule(5,"CS4321","A0201314B");
		$result38 =  $this->Dbinsert
		->insertModuleSupervision("A0201314B","CS4321",5);

		$result37 =  $this->Dbinsert
		->deleteStudentFromProject(51,"A0201314B");
		$result33 =  $this->Dbinsert
		->deleteProject(51);
		$result39 =  $this->Dbinsert
		->dropSupervising("A0201314B","CS4321",5);
		$result40 =  $this->Dbinsert
		->dropParticipatingModule(5,"CS4321");



		$result =  $this->Dbquery->getStudentByModule("SS3101",6);
		$result6 =  $this->Dbquery->getStudentDetailByProject(1001);
		$result7 =  $this->Dbquery->getProjectListByModule("SS3101",6);
		$result8 =  $this->Dbquery->getModuleListByIteration(6);
		$result9 =  $this->Dbquery->getSupervisedModuleByID("A0101085B", 6);
		$result0 =  $this->Dbquery->getFoodPrefByIteration(6);
		
		echo "<table style='border: solid 1px;'>";
		echo "<tr  style='border: solid 1px;'><td>Matric No</td><td>Name</td><td>Contact</td><td>FoodPref</td>";
		for($i = 0; $i < count($result); ++$i) {

			echo "<tr>";	
			echo "<td style='border: solid 1px;'>".$result[$i]['matricNo']."</td>";
			echo "<td style='border: solid 1px;'>".$result[$i]['name']."</td>";
			echo "<td style='border: solid 1px;'>".$result[$i]['contact']."</td>";
			echo "<td style='border: solid 1px;'>".$result[$i]['foodPref']."</td>";	
			echo "</tr>";
		}
		echo "</table>";


	}

	// public function getStudentDetailByProject($projectID) {
	// 	$query = $this->queryStudentByProject($projectID);
	// 	$result;
	// 	$i = 0;
	// 	if($query->num_rows() > 0) {
	// 		$result = array($query->num_rows());
	// 		foreach ($query->result_array() as $row) {
	// 			$result[$i] = array(4);
	// 			$result[$i]['matricNo'] = $row['matric_no']; 
	// 			$result[$i]['name'] = $row['name'];
	// 			$result[$i]['email'] = $row['email'];
	// 			$result[$i]['contact'] = $row['contact'];
	// 			++$i;
	// 		}
	// 	}
	// 	return $result;
	// }	

	// private function queryStudentByProject($projectID) {
	// 	//SELECT * 
	// 	//FROM participate 
	// 	//JOIN user ON participate.matric_no = user.matric_no
	// 	//WHERE project_id = $projectID
	// 	$this->db->from('participate');
	// 	$this->db->join('user',
	// 		'user.matric_no = participate.matric_no');
	// 	$this->db->where('participate.project_id',$projectID);
	// 	//$this->db->where('user_type',$STUDENT);
	// 	//$this->db->select('matric_no','name');
	// 	$query = $this->db->get();
	// 	return $query;
	// }

	// public function getProjectListByModule($moduleCode, $Iteration) {
	// 	$query = $this->queryProjectByModule($moduleCode, $Iteration);
	// 	$result;
	// 	$i = 0;
	// 	if($query->num_rows() > 0) {
	// 		$result = array($query->num_rows());
	// 		foreach ($query->result_array() as $row) {
	// 			$result[$i] = array(5);
	// 			$result[$i]['projectID'] = $row['project_id']; 
	// 			$result[$i]['title'] = $row['title'];
	// 			$result[$i]['abstract'] = $row['abstract']; 
	// 			$result[$i]['poster'] = $row['poster'];
	// 			$result[$i]['video'] = $row['video']; 
	// 			++$i;
	// 		}
	// 	}	
	// 	return $result;
	// }

	// private function queryProjectByModule($moduleCode, $Iteration) {
	// 	//SELECT * 
	// 	//FROM module 
	// 	//JOIN project ON project.module_code = module.module_code
	// 	//			AND   module.iteration = project.iteration
	// 	//WHERE module_code = $moduleCode
	// 	//AND iteration = $iteration
	// 	$this->db->from('module');
	// 	$this->db->join('project',
	// 		'module.module_code = project.module_code '.
	// 		'AND module.iteration = project.iteration');
	// 	$this->db->where('module.module_code',$moduleCode);
	// 	$this->db->where('module.iteration',$iteration);
	// 	$query = $this->db->get();
	// 	return $query;
	// }

	// public function getModuleListBySem($iteration) {
	// 	$query = $this->queryModuleListBySem($iteration);
	// 	$result;
	// 	$i = 0;
	// 	if($query->num_rows() > 0) {
	// 		$result = array($query->num_rows());
	// 		foreach ($query->result_array() as $row) {
	// 			$result[$i] = array(2);
	// 			$result[$i]['moduleCode'] = $row['module_code']; 
	// 			$result[$i]['moduleName'] = $row['module_name'];
	// 			++$i;
	// 		}
	// 	}	
	// 	return $result;
	// }


	// private function queryModuleListBySem($iteration) {
	// 	//SELECT * FROM module WHERE iteration = $iteration; 
	// 	$this->db->from('module');
	// 	$this->db->where('module.iteration', $iteration);
	// 	$query = $this->db->get();
	// 	return $query;
	// }	

	// public function getSupervisedModuleByID($matricNo, $iteration) {
	// 	$query = $this->querySupervisedModuleByMatric($matricNo, $iteration);
	// 	$result;
	// 	$i = 0;
	// 	if($query->num_rows() > 0) {
	// 		$result = array($query->num_rows());
	// 		foreach ($query->result_array() as $row) {
	// 			$result[$i] = array(2);
	// 			$result[$i]['moduleCode'] = $row['module_code']; 
	// 			$result[$i]['moduleName'] = $row['module_name'];
	// 			++$i;
	// 		}
	// 	}	
	// 	return $result;
	// }

	// private function querySupervisedModuleByMatric($matricNo,$iteration) {
	// 	//SELECT * FROM supervise 
	// 	//JOIN module ON module.module_code AND supervise.module_code
	// 	//WHERE supervise.matric_no = $matricNo 
	// 	//AND supervise.iteration = $iteration;
	// 	$this->db->from('supervise');
	// 	$this->db->join('module',
	// 		'module.module_code = supervise.module_code');
	// 	$this->db->where('supervise.matric_no',$matricNo);
	// 	$this->db->where('module.iteration',$iteration);
	// 	$query = $this->db->get();
	// 	return $query;
	// }

	// public function getStudentByModule($moduleCode, $iteration) {
	// 	$query = $this->queryStudentByModule($moduleCode, $iteration);
	// 	$result;
	// 	$i = 0;
	// 	if($query->num_rows() > 0) {
	// 		$result = array($query->num_rows());
	// 		foreach ($query->result_array() as $row) {
	// 			$result[$i] = array(5);
	// 			$result[$i]['matricNo'] = $row['matric_no']; 
	// 			$result[$i]['name'] = $row['name'];
	// 			$result[$i]['email'] = $row['email'];
	// 			$result[$i]['contact'] = $row['contact'];
	// 			$result[$i]['foodPref'] = $row['food_preference'];
	// 			++$i;
	// 		}
	// 	}	
	// 	return $result;
	// }

	// private function queryStudentByModule($moduleCode, $iteration) {
	// 	//SELECT * FROM user 
	// 	//JOIN participate ON user.matric_no = participate.matric_no 
	// 	//JOIN project ON project.project_id = participate.project_id 
	// 	//JOIN module ON module.module_code = project.module_code 
	// 	//WHERE module.module_code = $moduleCode
	// 	//AND module.iteration = $iteration 
	// 	//AND user.user_type = 3;
	// 	$this->db->from('user');
	// 	$this->db->join('participate',
	// 		'user.matric_no = participate.matric_no');
	// 	$this->db->join('project',
	// 		'project.project_id = participate.project_id');
	// 	$this->db->join('module',
	// 		'module.module_code = project.module_code'.
	// 		' AND module.iteration = project.iteration');
	// 	$this->db->where('project.module_code',$moduleCode);
	// 	$this->db->where('project.iteration',$iteration);
	// 	$this->db->where('user.user_type', $this->STUDENT);
	// 	$query = $this->db->get();
	// 	return $query;
	// }

	// public function getFoodPrefBySem($iteration) {
	// 	$query = $this->queryFoodPrefBySem($iteration);
	// 	$result;
	// 	$i = 0;
	// 	if($query->num_rows() > 0) {
	// 		$result = array($query->num_rows());

	// 		foreach ($query->result_array() as $row) {
	// 			if($row['food_preference'] == $this->VEGE) {
	// 				$result["VEGE"] = $row["count"];
	// 			}
	// 			if($row['food_preference'] == $this->NON_VEGE) {
	// 				$result["NON_VEGE"] = $row["count"];
	// 			}
	// 			if($row['food_preference'] == $this->MUSLIM) {
	// 				$result["MUSLIM"] = $row["count"];
	// 			}
	// 			if($row['food_preference'] == $this->NON_MUSLIM) {
	// 				$result["NON_MUSLIM"] = $row["count"];
	// 			}
	// 		}
				
	// 	}	
	// 	return $result;
	// }

	// private function queryFoodPrefBySem($iteration) {
	// 	//SELECT user.food_preference, COUNT(*) 
	// 	//FROM user JOIN participate ON user.matric_no = participate.matric_no 
	// 	//JOIN project ON participate.project_id = project.project_id 
	// 	//JOIN module ON project.module_code = module.module_code 
	// 	//			AND project.iteration = module.iteration 
	// 	//WHERE module.iteration = 6 GROUP BY user.food_preference;
	// 	$this->db->from('user');
	// 	$this->db->join('participate',
	// 		'user.matric_no = participate.matric_no');
	// 	$this->db->join('project',
	// 		'participate.project_id = project.project_id');
	// 	$this->db->join('module',
	// 		'project.module_code = module.module_code'.
	// 		' AND project.iteration = module.iteration');
		
	// 	$this->db->where('module.iteration',$iteration);

	// 	$this->db->group_by('food_preference');
	// 	$this->db->select('food_preference , count(*) AS count');
	// 	$query = $this->db->get();
	// 	return $query;
	// }

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
