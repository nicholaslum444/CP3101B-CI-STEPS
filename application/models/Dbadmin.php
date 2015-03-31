<?php

class Dbadmin extends CI_Model {

	public function __construct()
    {
			$this -> load -> database();
            parent::__construct();
    }

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

	public function isAdmin($username, $password) {
		$this->db->from('admin');
		$this->db->where('user_id',$username);
		
		$query = $this->db->get();

		if($query->num_rows() == 1) {
			foreach($query->result_array() as $row)
				if(password_verify($password,$row['password'])) {
					return true;
				}	
				else {
					return false;
				}
		}
		else {
			
			return false;
		}
	}

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
}

?>