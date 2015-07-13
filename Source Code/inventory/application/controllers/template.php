<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Template extends CI_Controller {

	function __construct()
	{
		parent::__construct();
			
		//if(!$this->input->cookie('template',true)){
			//$this->input->set_cookie(array('name'=>'template','value'=>'1','expire' =>'86500'));
		//}
		
		$this->load->model('storemodel','',TRUE);
	}
	
	public function store()
	{	

		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			
			$data['result']=$this->storemodel->storee();
			$data['content_view'] = 'web/store';
			$this->load->view('home_view',$data);
		}else{
			$this->load->helper(array('form'));
			$this->load->view('view_login');
		}
		//delete_cookie('template');
		//$this->input->set_cookie(array('name'=>'template','value'=>'1','expire' =>'86500'));
		//Field validation succeeded.  Validate against database
		
		//query the database, user is model
		
	}
	
	public function process()
	{
		//delete_cookie('template');
		//$this->input->set_cookie(array('name'=>'template','value'=>'1','expire' =>'86500'));
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			
			$data['result_process']=$this->storemodel->showWithdraw();
			$data['content_view'] = 'web/process';
			$this->load->view('home_view',$data);
		}else{
			$this->load->helper(array('form'));
			$this->load->view('view_login');
		}
		
	}
	//26-11-2013 Add Function by TCK , You can erase if program is incorrect

	//end invoice 26-11-2013
	
	public function contact()
	{
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			
			$data['content_view'] = 'web/contact';
			$this->load->view('home_view',$data);
		}else{
			$this->load->helper(array('form'));
			$this->load->view('view_login');
		}
		
		//$this->load->view('default'.$this->input->cookie('template',true),$data);
	}

	public function manual()
	{
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			
			$data['content_view'] = 'web/manual';
			$this->load->view('home_view',$data);
		}else{
			$this->load->helper(array('form'));
			$this->load->view('view_login');
		}
		
		//$this->load->view('default'.$this->input->cookie('template',true),$data);
	}
	
}
?>
