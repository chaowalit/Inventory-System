<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Process_store extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('storemodel','',TRUE);
		$this->load->helper('url');
	}
	
	public function index()
	{	
		$session_data = $this->session->userdata('logged_in');
		$add_by = $session_data['username'];
		
		$model = $this->input->post('model');
		$model = trim($model);
		$brand = $this->input->post('brand');
		$brand = trim($brand);
		$quantity = $this->input->post('quantity');
		$quantity = trim($quantity);
		$type = $this->input->post('type');
		$type = trim($type);
		$building = $this->input->post('building');
		$building = trim($building);
		$minimum_quantity = $this->input->post('minimum_quantity');
		$support_Printer = $this->input->post('support_Printer');
		
		$result_addStore = $this->storemodel->add_store($model,$brand,$quantity,$type,$building,$minimum_quantity,$support_Printer,$add_by);
		if($result_addStore==false){
			$this->load->view('web/query_error/cannot-save-to-store');
		}else{
			$this->load->view('web/store_form_add_success');
		}
	}
	
	public function del($id)
	{
		$id = base64_decode($id);
		$this->db->where('id',$id);
		$this->db->delete('store'); //should delete in model not controller

		redirect('template/store','refresh');
	}
	
	public function showwithdraw($id)
	{
		$id = base64_decode($id);
		$data['resultWithdraw'] = $this->storemodel->returnRecordWithdraw($id);
		
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		$data['content_view'] = 'web/withdraw';
		$this->load->view('home_view',$data);
	}
	
	public function saveWithdrawController()
	{
		$quantity = $this->input->post('quantity');
		$quantity = trim($quantity);
		$costcenter = $this->input->post('costcenter');
		$costcenter = trim($costcenter);
		$department = $this->input->post('department');
		$department = trim($department);
		$manager = $this->input->post('manager');
		$manager = trim($manager);
		$owner = $this->input->post('owner');
		$owner = trim($owner);
		$en = $this->input->post('en');
		$en = trim($en);
		$ext = $this->input->post('ext');
		$ext = trim($ext);
		$building = $this->input->post('buildingTo');

		$model = $this->input->post('model');
		$type = $this->input->post('type');
		$brand = $this->input->post('brand');
		$description = $brand;
		$quantity_old = $this->input->post('quantity_old');
		$support_prt = $this->input->post('support_prt');
		

		
		$quantity_update = ($quantity_old - $quantity);
		
		$id_form = $this->input->post('id');
		$result = $this->storemodel->saveWithdrawModel($en,$department,$owner,$costcenter,$ext,$manager,$quantity,$building,$model,$type,$brand,$description,$quantity_update,$support_prt,$id_form);
		if($result==false){
			$this->load->view('web/query_error/cannot-save-to-process');
		}else{
			redirect('template/store','refresh');
		}
	}
	
	public function delProcess($id,$ID_Store,$Quantity_withdraw)
	{
		$id = base64_decode($id);
		$ID_Store = base64_decode($ID_Store);
		$StoreQuanity = 0;
		
		$getQuantityStore = $this->storemodel->returnRecordUpdateStore($ID_Store);
		foreach($getQuantityStore as $row){
			$StoreQuanity = $row->quantity;
		}
		$updateStoreQuantity = ($Quantity_withdraw + $StoreQuanity);
		$this->storemodel->updateStoreQuanitity($updateStoreQuantity,$ID_Store);
		
		$this->db->where('ID',$id);
		$this->db->delete('withdraw'); //should delete in model not controller

		redirect('template/process','refresh');
	}
	
	public function getTypeData()
	{
		$category =  trim($this->input->post('categorySend')); 
		$resultCategory = $this->storemodel->showCategory($category);
		if(empty($resultCategory))
		{
			echo "<option value=''>No available matches</option>";
		}
		else
		{
			foreach($resultCategory as $key)
			{
				echo "<option>".$key->type."</option>";
			}
			
		}
	}
	
	public function update_Edit_Store($id)
	{
		$id = base64_decode($id);
		$data['resultRecordUpdate'] = $this->storemodel->returnRecordUpdateStore($id);
		
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		
		$data['content_view'] = 'web/updateStore_form';
		$this->load->view('home_view',$data);
	}
	
	public function saveUpdateStore()
	{
		$model = trim($this->input->post('model'));
		$type = trim($this->input->post('type'));
		$brand = trim($this->input->post('brand'));
		$building = trim($this->input->post('building'));
		
		$old_quantity = trim($this->input->post('old_quantity'));
		$update_quantity = trim($this->input->post('update_quantity'));
		$new_quantity = ($old_quantity + $update_quantity);
		
		$minimum_quantity = trim($this->input->post('minimum_quantity'));
		$id_form = $this->input->post('id_form');
		$support_Printer = $this->input->post('support_Printer');
		$result = $this->storemodel->updateStoreNow($model,$type,$brand,$new_quantity,$minimum_quantity,$building,$support_Printer,$id_form);
		
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		if($result==false){
			$data['content_view'] = 'web/query_error/database-error-update-store';
			$this->load->view('home_view',$data);
		}else{
			redirect('template/store','refresh');
		}
	}
	
	public function editProcess($id)
	{
		$id = base64_decode($id);
		$data['resultRecordEdit'] = $this->storemodel->returnRecordEditProcess($id);
		
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
		
		$data['content_view'] = 'web/editProcess_form';
		$this->load->view('home_view',$data);
	}
	
	public function saveEditProcess()
	{
		$description = trim($this->input->post('description'));
		$newQuantity = abs(trim($this->input->post('quantity')));
		$costcenter = trim($this->input->post('costcenter'));
		$department = trim($this->input->post('department'));
		$manager = trim($this->input->post('manager'));
		$owner = trim($this->input->post('owner'));
		$en = trim($this->input->post('en'));
		$ext = trim($this->input->post('ext'));
		
		$id_withdraw = $this->input->post('id_form');
		$id_store = $this->input->post('id_store');
		$Old_Quantity_Withdraw = $this->input->post('old_Quantity_withdraw');
		$newQuantityUpdateToStore = ($newQuantity - $Old_Quantity_Withdraw);
		
		$Old_Total_Store = 0;
		$getTatalFromStore = $this->storemodel->returnRecordUpdateStore($id_store);
		foreach($getTatalFromStore as $row){
			$Old_Total_Store = $row->quantity;
		}
		
		if(($newQuantityUpdateToStore > 0) && ($newQuantityUpdateToStore <= $Old_Total_Store)){
			$newQuantityStoreCurrent = ($Old_Total_Store - $newQuantityUpdateToStore);
			$result_Add = $this->updateNewQuantityToStore($id_store,$newQuantityStoreCurrent);
			if($result_Add == true){
				$result = $this->storemodel->updateProcessNow($description,$newQuantity,$costcenter,$department,$manager,$owner,$en,$ext,$id_withdraw);
				redirect('template/process','refresh');
			}else{
				//$data['error_form'] = "Can't Update Current Quantity to Store table";
				$data['content_view'] = 'web/query_error/database-error-update-store';
				$this->load->view('home_view',$data);
			}
		}else if($newQuantityUpdateToStore <= 0){
			$newQuantityStoreCurrent = ($Old_Total_Store + abs($newQuantityUpdateToStore));
			$result_Add = $this->updateNewQuantityToStore($id_store,$newQuantityStoreCurrent);
			if($result_Add == true){
				$result = $this->storemodel->updateProcessNow($description,$newQuantity,$costcenter,$department,$manager,$owner,$en,$ext,$id_withdraw);
				redirect('template/process','refresh');
			}else{
				//$data['error_form'] = "Can't Update Current Quantity to Store table";
				$data['content_view'] = 'web/query_error/database-error-update-store';
				$this->load->view('home_view',$data);
			}
		}else{
			//$data['error_form'] = "This is Quantity not correct";
			$data['content_view'] = 'web/query_error/database-error-update-store';
			$this->load->view('home_view',$data);
		}
	}
	
	public function updateNewQuantityToStore($id_store,$newQuantityStoreCurrent)
	{
		$UpdateToStore = $this->storemodel->updateQuantityToStore($id_store,$newQuantityStoreCurrent);
		return $UpdateToStore;
	}
}
