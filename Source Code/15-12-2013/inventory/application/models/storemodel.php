<?php
	class Storemodel extends CI_Model{
		function storee(){
			$this->db-> select('*');
			$this->db->from('store');
			$this->db->order_by('add_time','desc');
			$query = $this -> db -> get();
			return $query->result();
		}
		function showWithdraw(){
			$this->db->select('ID,ID_Store,Type,Description,Quantity,Cost_Center,Department,Manager,Owner,En,Ext,Model');
			$this->db->select("date_format(Date_time,'%d-%m-%Y') as Date_time",FALSE);
			$this->db->from('withdraw');
			$this->db->order_by('id','desc');
			$query = $this -> db -> get();
			return $query->result();
		}
		function add_store($model,$brand,$quantity,$type,$building,$minimum_quantity,$support_Printer,$add_by){
			$data = array(
				'model' => "$model",
				'type' => "$type",
				'brand' => "$brand",
				'quantity' => "$quantity",
				'min' => "$minimum_quantity",
				'building' => "$building",
				'Support_Prt' => "$support_Printer",
				'add_by' => "$add_by"
			);
			$result_addStore = $this->db->insert('store',$data);
			return $result_addStore;
		}
		
		function returnRecordWithdraw($id){
			$this->db->select('*');
			$this->db->from('store');
			$this->db->where('id', $id);
			$query = $this->db->get();
			return $query->result();
		}
		
		function saveWithdrawModel($en,$department,$owner,$costcenter,$ext,$manager,$quantity,$building,$model,$type,$brand,$description,$quantity_update,$support_prt,$id_form){
			//echo "$quantity_update";
			//Save to withdraw table
			$now = date("Y-m-d");
			$data = array(
				'ID_Store' => "$id_form",
				'Type' => "$type",
				'Description' => "$description",
				'Quantity'=>"$quantity",
				'Cost_Center'=>"$costcenter",
				'Department' => "$department",
				'Manager'=>"$manager",
				'Owner'=>"$owner",
				'En' => "$en",
				'Ext'=>"$ext",
				'Model' => "$model",
				'Support_Prt' => "$support_prt",
				'Building' => "$building",
				'Date_time'=>$now
			);
			//http://stackoverflow.com/questions/6354315/inserting-now-into-database-with-codeigniters-active-record
			//$date = date('d-m-Y');
			//$this->db->set('Date',$date,FALSE);
			$query_process_result = $this->db->insert('withdraw',$data);
			//Update Store Table
			$dataUpdateStore = array(
				'quantity' => "$quantity_update"
			);
			$this->db->where('id',$id_form);
			$this->db->update('store',$dataUpdateStore);
			
			return $query_process_result;
		}
		function showCategory($category){
			$this->db->select('*');
			$this->db->from('store_category');
			$this->db->where('category', $category);
			$this->db->order_by('type','asc');
			$query = $this->db->get();
			return $query->result();
		}
		
		function returnRecordUpdateStore($id)
		{
			$this->db->select('*');
			$this->db->from('store');
			$this->db->where('id', $id);
			$query = $this->db->get();
			return $query->result();
		}
		
		function updateStoreNow($model,$type,$brand,$new_quantity,$minimum_quantity,$building,$support_Printer,$id_form)
		{
			$dataUpdateStore = array(
				'model'=>$model,
				'type'=>$type,
				'brand'=>$brand,
				'quantity'=>$new_quantity,
				'min'=>$minimum_quantity,
				'building'=>$building,
				'Support_Prt' => $support_Printer
			);
			$this->db->where('id',$id_form);
			$result_update_store = $this->db->update('store',$dataUpdateStore);
			return $result_update_store;
		}
		
		function returnRecordEditProcess($id)
		{
			$this->db->select('*');
			$this->db->from('withdraw');
			$this->db->where('id', $id);
			$query = $this->db->get();
			return $query->result();
		}
		
		function updateProcessNow($description,$quantity,$costcenter,$department,$manager,$owner,$en,$ext,$id_form)
		{
			$dataUpdateStore = array(
				'Description'=>$description,
				'Quantity'=>$quantity,
				'Cost_Center'=>$costcenter,
				'Department'=>$department,
				'Manager'=>$manager,
				'Owner'=>$owner,
				'En'=>$en,
				'Ext'=>$ext
			);
			$this->db->where('id',$id_form);
			$this->db->update('withdraw',$dataUpdateStore);
		}
		
		function returnRecordToExportExcel($datepickerfrom,$datepickerto)
		{
			$this->db->select('*');
			$this->db->from('withdraw');
			$this->db->where('Date_time >=', "$datepickerfrom");
			$this->db->where('Date_time <=', "$datepickerto");
			$query = $this->db->get();
			return $query->result();
		}
		function updateStoreQuanitity($updateStoreQuantity,$id)
		{
			$data = array(
				'quantity' => $updateStoreQuantity
			);
			$this->db->where('id',$id);
			$this->db->update('store',$data);
		}
		function updateQuantityToStore($id_store,$newQuantityStoreCurrent){
			$data = array(
				'quantity' => $newQuantityStoreCurrent
			);
			$this->db->where('id',$id_store);
			$result = $this->db->update('store',$data);
			return $result;
		}
	}
?>
