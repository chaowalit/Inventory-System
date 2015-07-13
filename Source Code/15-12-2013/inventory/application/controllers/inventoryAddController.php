<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class InventoryAddController extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('storemodel','',TRUE);
		$this->load->helper(array('form', 'url'));
	}
	
	function index()
	{
		$this->load->view('web/store_form');
	}

	
}
	

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
