<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdminController extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('adminModel','',TRUE);
	}
	
	public function index(){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			
			$checkAdmin = $this->adminModel->checkedAdmin($session_data['username']);
			foreach($checkAdmin as $checkAdmin2){
				if($checkAdmin2->admin == "1"){
					
					echo "Welcome to Administrator page";
				}else{
					echo "You not permitted in admin page";
				}
			}
		}else{
			$this->load->helper(array('form'));
			$this->load->view('view_login');
		}
	}
	public function goToAdminPage(){
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['content_view'] = 'web/administrator';
		$this->load->view('home_view',$data);
	}
	public function change_password_page(){
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['content_view'] = 'web/change_password_page';
		$this->load->view('home_view',$data);
	}
	public function addUser(){
		$addNameUser = trim($this->input->post('addNameUser'));
		$addSurNameUser = trim($this->input->post('addSurNameUser'));
		$addDeptUser = trim($this->input->post('addDeptUser'));
		$addExtUser = trim($this->input->post('addExtUser'));
		$addUserName = trim($this->input->post('addUserName'));
		$addPassword2User = trim($this->input->post('addPassword2User'));
		$addStatusAdminUser = trim($this->input->post('addStatusAdminUser'));
		$result_add_user = $this->adminModel->addUser($addNameUser,$addSurNameUser,$addDeptUser,$addExtUser,$addUserName,$addPassword2User,$addStatusAdminUser);
		if($result_add_user){
			echo "Save Seccessfully to New User";
		}else{
			echo "Error to insert to new User";
		}
	}
	public function deleteUser(){
		$id = trim($this->input->post('user_Delete'));
		$result_del_user = $this->adminModel->deleteUser($id);
		if($result_del_user){
			echo "OK, Delete Seccessfully.";
		}else{
			echo "can't Seccess.";
		}
	}
	public function updatePass(){
		//fetch username		
		$session_data = $this->session->userdata('logged_in');
		$username = $session_data['username'];
		
		$oldpasswordup = trim($this->input->post('oldpasswordup'));
		$newpassword1up = trim($this->input->post('newpassword1up'));
		$newpassword2up = trim($this->input->post('newpassword2up'));

		$result_update_pass = $this->adminModel->updatePassword($username,$oldpasswordup,$newpassword1up,$newpassword2up);
	}
	public function getDataVender(){
		$vender = trim($this->input->post('vender'));
		$vender_db = $this->adminModel->showVenderDB();
		if(empty($vender_db))
		{
			echo "<option value=''>No available matches</option>";
		}
		else
		{
			foreach($vender_db as $select)
			{
				echo "<option value=\"$select->id\">$select->type"."</option>";
			}
			
		}
	}
	public function saveDataVender(){
		$newVender = trim($this->input->post('vender'));
		$result_add_vender = $this->adminModel->addNewVender($newVender);
		if($result_add_vender){
			echo "Save Seccessfully to New Vender";
		}else{
			echo "Error to insert to new Vender";
		}
		
	}
	public function deleteVender(){
		$venderDelete = trim($this->input->post('vender_Delete'));
		$result_del_vender = $this->adminModel->deleteVenderNow($venderDelete);
		if($result_del_vender){
			echo "OK, Delete Seccessfully.";
		}else{
			echo "can't Seccess.";
		}
	}
	public function getDataUserAccount(){
		$user_name_db = $this->adminModel->showUser();
		if(empty($user_name_db))
		{
			echo "<option value=''>No user data</option>";
		}
		else
		{
			foreach($user_name_db as $select)
			{
				echo "<option value=\"$select->id\">$select->username"."</option>";
			}
			
		}
	}
}
