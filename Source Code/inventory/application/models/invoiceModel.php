<?php
	class InvoiceModel extends CI_Model{
		function addInvoice($invoice_po,$invoice_vendor,$invoice_receiveBy,
				$invoice_receiveByName,$invoice_recieveDate,$invoice_detail,$invoice_comment,$file_name,$file_path)
		{
			$data = array(
				'po_number' => "$invoice_po",
				'vendor' => "$invoice_vendor",
				'receiveBy' => "$invoice_receiveBy",
				'receiveByName' => "$invoice_receiveByName",
				'recieveDate' => "$invoice_recieveDate",
				'detail' => "$invoice_detail",
				'comment' => "$invoice_comment",
				'fileName' => "$file_name",
				'filePath' => "$file_path"
			);
			$query_add_invoice = $this->db->insert('invoice',$data);
			return $query_add_invoice;
		}

		function showInvoice(){
			$this->db-> select('po_number,vendor,receiveBy,receiveByName,detail,comment,fileName,filePath');
			$this->db->select("date_format(recieveDate,'%d-%m-%Y') as recieveDate",FALSE);
			$this->db->from('invoice');
			$query = $this -> db -> get();
			return $query->result();
		}
		
		function fileName($po_number){
			$this->db->select('fileName');
			$this->db->from('invoice');
			$this->db->where('po_number',$po_number);
			$query = $this -> db -> get();
			return $query->result();
		}
		
		function getRecordEditInvoice($po_number)
		{
			$this->db-> select('*');
			$this->db->from('invoice');
			$this->db->where('po_number',$po_number);
			$query = $this -> db -> get();
			return $query->result();
		}
		
		function updateEditInvoice($invoice_po,$invoice_vendor,$invoice_receiveBy,$invoice_receiveByName,$invoice_recieveDate,$invoice_detail,$invoice_comment,$id_edit)
		{
			$dataUpdateInvoice = array(
				'po_number' => "$invoice_po",
				'vendor' => "$invoice_vendor",
				'receiveBy' => "$invoice_receiveBy",
				'receiveByName' => "$invoice_receiveByName",
				'recieveDate' => "$invoice_recieveDate",
				'detail' => "$invoice_detail",
				'comment' => "$invoice_comment"
			);
			$this->db->where('po_number',$id_edit);
			$result_update_invoice = $this->db->update('invoice',$dataUpdateInvoice);
			return $result_update_invoice;
		}
		
		function getPO($po_number){
			$this->db-> select('*');
			$this->db->from('invoice');
			$this->db->where('po_number',$po_number);
			$query = $this -> db -> get();
			$num = $query->num_rows();
			return $num;
		}
	}
?>
