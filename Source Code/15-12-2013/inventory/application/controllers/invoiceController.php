<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class InvoiceController extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('invoiceModel','',TRUE);
		$this->load->model('adminModel','',TRUE);
		$this->load->helper(array('form', 'url'));
		$this->load->helper("file");
	}
	
	function index()
	{
		$this->load->view('web/invoice_form');
	}

	function show_invoice(){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			
			$data['result_invoice']=$this->invoiceModel->showInvoice();
			$data['content_view'] = 'web/invoice';
			$this->load->view('home_view',$data);
		}else{
			$this->load->helper(array('form'));
			$this->load->view('view_login');
		}
		
	}
	
	function do_upload()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|pdf';
		$config['max_size']	= '10000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);
		
		$invoice_po = trim($this->input->post('invoice_po'));
		$invoice_vendor = trim($this->input->post('invoice_vendor'));
		$invoice_receiveBy = trim($this->input->post('invoice_receiveBy'));
		$invoice_receiveByName = trim($this->input->post('invoice_receiveByName'));
		
		$invoice_recievedate = $this->input->post('invoice_recievedate');
		$time = strtotime($invoice_recievedate);
		$invoice_recievedate = date('Y-m-d',$time);
		
		$invoice_detail = trim($this->input->post('invoice_detail'));
		$invoice_comment = trim($this->input->post('invoice_comment'));
		
		$numRow = $this->invoiceModel->getPO($invoice_po);
		if($numRow==0){
			if ( ! $this->upload->do_upload())
			{
				$error = array('error' => $this->upload->display_errors());

				$this->load->view('web/invoice_form', $error);
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
				
				$data_details = $this->upload->data();
				$file_name = $data_details['file_name'];
				$file_path = $data_details['full_path'];
				//Save to database

				$result_invoiceAddData = $this->invoiceModel->addInvoice($invoice_po,$invoice_vendor,$invoice_receiveBy,
					$invoice_receiveByName,$invoice_recievedate,$invoice_detail,$invoice_comment,$file_name,$file_path);
				//end Save
				if($result_invoiceAddData==false){
					$this->load->view('web/query_error/cannot-save-to-invoice');
				}else{
					$this->load->view('web/invoice_form_upload_success', $data);
				}
			}
		}else{
			$this->load->view('web/query_error/cannot-save-to-invoice');
		}
	}
	function delInvoice($po_number,$fileName)
	{
		$po_number = base64_decode($po_number);
		$fileName = base64_decode($fileName);
		//delete invoice
		$this->db->where('po_number',$po_number);
		$this->db->delete('invoice'); //should delete in model not controller
		$path = "./uploads/".$fileName;
		unlink($path);
		
		redirect('invoiceController/show_invoice','refresh');
	}
	
	function editInvoice($po_number)
	{
		$po_number = base64_decode($po_number);
		$data['returnRecordEditInvoice']=$this->invoiceModel->getRecordEditInvoice($po_number);
		$data['vender_db'] = $this->adminModel->showVenderDB();
		$session_data = $this->session->userdata('logged_in');
		$data['username'] = $session_data['username'];
			
		$data['content_view'] = 'web/editInvoice_form';
		$this->load->view('home_view',$data);
	}

	function saveEditInvoice()
	{
		$invoice_po = trim($this->input->post('invoice_po'));
		$invoice_vendor = trim($this->input->post('invoice_vendor'));
		$invoice_receiveBy = trim($this->input->post('invoice_receiveBy'));
		$invoice_receiveByName = trim($this->input->post('invoice_receiveByName'));
		$invoice_recievedate = trim($this->input->post('invoice_recievedate'));
		$time = strtotime($invoice_recievedate);
		$invoice_recievedate = date('Y-m-d',$time);

		$invoice_detail = trim($this->input->post('invoice_detail'));
		$invoice_comment = trim($this->input->post('invoice_comment'));
		$id_edit = $this->input->post('id_edit');
		
		$result = $this->invoiceModel->updateEditInvoice($invoice_po,$invoice_vendor,$invoice_receiveBy,$invoice_receiveByName,$invoice_recievedate,$invoice_detail,$invoice_comment,$id_edit);
		if($result==false){
			$data['content_view'] = 'web/query_error/database-error-update-invoice';
			$this->load->view('home_view',$data);
		}else{
			redirect('invoiceController/show_invoice','refresh');
		}
	}
}
	

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
