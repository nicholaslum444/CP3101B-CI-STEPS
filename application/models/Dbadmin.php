<?php

class Dbadmin extends CI_Model {

	public function __construct()
    {
			$this -> load -> database();
			$this -> load -> model('Dbquery');
            parent::__construct();
    }

	/*
	*
	*
    */
	public function addAdminToStep($username, $password, $name, $email, $contact) {
			if(!$this->usernameExist($username)) {
				$data = array(
					'user_id' => $username,
					'password' => password_hash($password, PASSWORD_DEFAULT),
					'name' => $name,
					'email' => $email,
					'contact' => $contact
				);
				$this->db->insert('admin',$data);

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
	public function editAdminInfo($username, $password, $name, $email, $contact) {
			if($this->isAdmin($username,$password)) {

				$data = array();

				if($name != null) {
					$data['name'] = $name;
				}
				if($email != null) {
					$data['email'] = $email;
				}
				if($contact != null) {
					$data['contact'] = $contact;
				}

				$this->db->where('user_id',$username);
				$this->db->update('admin',$data);
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
	public function getAdminDetails($username, $password) {
		if ($this->isAdmin($username, $password)) {
			$this->db->from('admin');
			$this->db->where('user_id',$username);
			$query = $this->db->get();
			$result = array();
			foreach($query->result_array() as $row) {
				$result['name'] = $row['name'];
				$result['email'] = $row['email'];
				$result['contact'] = $row['contact'];
			}
			return $result;
		}
	}

	/*
	*
	*
    */
	public function changeAdminPassword($username, $oldPW, $newPW) {
		if($this->isAdmin($username, $oldPW)) {
			$data = array(
					'password' => password_hash($newPW, PASSWORD_DEFAULT)
			);
			$this->db->where('user_id',$username);

			$this->db->update('admin',$data);
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
	public function isAdmin($username, $password) {
		if ($this->usernameExist($username)) {
			$this->db->from('admin');
			$this->db->where('user_id',$username);

			$query = $this->db->get();

			if ($query->num_rows() == 1) {
				foreach($query->result_array() as $row) {
					return password_verify($password, $row['password']);
				}
			}
		}

		return false;
	}

	/*
	*
	*
    */
	public function usernameExist($username) {
		$this->db->from('admin');
		$this->db->where('user_id',$username);

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
	public function openSteps($username, $password, $stepSem, $startTime, $endTime, $cutOff, $regis) {
		if($this->isAdmin($username, $password)) {
			$data = array(
				'semester' => $stepSem,
				'registration_date' => $regis,
				'start_time' => $startTime,
				'end_time' => $endTime,
				'cut_off' => $cutOff
			);
			$this->db->insert('STEPSiteration',$data);
			return true;
		}
		else {

			return false;
		}
	}

	public function editSteps($username, $password, $STEPSiteration, $stepSem, 
								$startTime, $endTime, $cutOff, $regis) {

		if($this->isAdmin($username, $password)) {
			$data = array();
			if($stepSem != null) {
				$data['semester'] = $stepSem;
			}
			if($stepSem != null) {
				$data['semester'] = $stepSem;
			}
			if($startTime != null) {
				$data['start_time'] = $startTime;
			}
			if($endTime != null) {
				$data['end_time'] = $endTime;
			}
			if($cutOff != null) {
				$data['cut_off'] = $cutOff;
			}
			if($regis != null) {
				$data['registration_date'] = $regis;
			}

			$this->db->where('iteration',$STEPSiteration);
			$this->db->update('STEPSiteration',$data);
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
	public function dropSteps($username, $password, $stepIterate) {
		if($this->isAdmin($username, $password)) {
			$this->db->where('iteration',$stepIterate);
			$this->db->delete('STEPSiteration');
			$this->updateStepCount();
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
	public function editIteration($username, $password, $stepFrom, $stepTo) {
		if($this->isAdmin($username, $password)) {
			if($this->stepsIterationExist($stepFrom) &&
				!$this->stepsIterationExist($stepTo)) {

				$data = array(
					'iteration' => $stepTo
				);

				$this->db->where('iteration',$stepFrom);
				$this->db->update('STEPSiteration',$data);
				$this->updateStepCount();

				return true;
			} else {
				return false;
			}
		}
		else {
			return false;
		}
	}

	/*
	*
	*
    */
	private function updateStepCount() {
		$sql = "ALTER TABLE STEPSiteration AUTO_INCREMENT = ?";
		$this->db->query($sql, array($this->Dbquery->getLatestIteration() + 1));

	}

	/*
	*
	*
    */
	public function stepsIterationExist($iterate) {
		$this->db->from('STEPSiteration');
		$this->db->where('iteration',$iterate);
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
	public function getAllModulesByIteration($iteration) {
		$query = $this->Dbquery->queryModuleListByIteration($iteration);
		$result = array();
		$i = 0;
		if($query->num_rows() > 0) {
			$result = array();
			foreach ($query->result_array() as $row) {
				$result[$i] = array();
				$result[$i]['moduleID'] = $row['module_id'];
				$result[$i]['moduleCode'] = $row['module_code'];
				$result[$i]['moduleName'] = $row['module_name'];
				$result[$i]['moduleDescription'] = $row['module_description'];
				$result[$i]['classSize'] = $row['class_size'];
				$result[$i]['supervisor'] = $this->Dbquery->getSupervisorByModule($row['module_id']);
				$result[$i]['projectList'] = $this->Dbquery->getProjectListByModule($row['module_id']);
				++$i;
			}
		} else {
			return array();
		}
		return $result;
	}

	/*
	*
	*
    */
	private function queryAllModulesByIteration($iteration) {
		//SELECT * FROM supervise
		//JOIN module ON module.module_code AND supervise.module_code
		//AND supervise.iteration = $iteration;
		$this->db->from('module');
		$this->db->join('project',
			'project.module_id = module.module_id');
		$this->db->where('module.iteration',$iteration);
		$this->db->order_by('module.module_code ASC');

		$query = $this->db->get();
		return $query;
	}
}

?>