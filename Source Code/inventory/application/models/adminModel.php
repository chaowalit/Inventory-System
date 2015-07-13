<?php
	class AdminModel extends CI_Model{
		function addUser($addNameUser,$addSurNameUser,$addDeptUser,$addExtUser,$addUserName,$addPassword2User,$addStatusAdminUser){
			$data = array(
				'username' => "$addUserName",
				'password' => MD5($addPassword2User),
				'name' => "$addNameUser",
				'surname' => "$addSurNameUser",
				'department' => "$addDeptUser",
				'ext_user' => "$addExtUser",
				'admin' => "$addStatusAdminUser"
			);
			$result = $this->db->insert('user',$data);
			if($result){
				return true;
			}else{
				return false;
			}
		}
		function showUser(){
			$this->db->select('*');
			$this->db->from('user');
			$query = $this->db->get();
			return $query->result();
		}
		function deleteUser($id){
			$this->db->where('id',$id);
			$result = $this->db->delete('user');
			if($result){
				return true;
			}else{
				return false;
			}
		}
		function updatePassword($username,$oldpasswordup,$newpassword1up,$newpassword2up){
			$oldpasswordupMD5 = md5($oldpasswordup);
			//http://stackoverflow.com/questions/14788695/codeigniter-single-result-without-foreach-loop
			$userpasswordSQL = $this->db->query("SELECT * FROM user WHERE password='$oldpasswordupMD5' AND username='$username' LIMIT 1")->row_array();
			if(count($userpasswordSQL)==0){
				$this->load->view('web/update_password_fail');
			}else{			
				if($oldpasswordupMD5 == $userpasswordSQL['password']){
					//update password					
					$updatePassword = array(
						'password'=>MD5($newpassword2up)
					);
					$this->db->where('password',$userpasswordSQL['password']);
					$this->db->where('username',$username);
					$this->db->update('user',$updatePassword);
					//end update password
					$this->load->view('web/update_password_complete');
				}else{
					$this->load->view('web/update_password_fail');
				}
			}
		}
		function showVenderDB()
		{
			$this->db->select('*');
			$this->db->from('store_category');
			$this->db->where('category','vender');
			$query = $this->db->get();
			return $query->result();
		}
		function addNewVender($newVender){
			$data = array(
				'category' => "vender",
				'type' => "$newVender"
			);
			$validate_add_vender = $this->db->insert('store_category',$data);
			if($validate_add_vender){
				return true;
			}else{
				return false;
			}
			
		}
		function deleteVenderNow($venderDelete){
			$this->db->where('id',$venderDelete);
			$result = $this->db->delete('store_category');
			if($result){
				return true;
			}else{
				return false;
			}
		}
		function checkedAdmin($username){
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where('username',"$username");
			$query = $this->db->get();
			return $query->result();
		}
	}
?>
