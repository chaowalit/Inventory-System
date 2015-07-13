<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//start session
session_start();
class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __contruct(){
		parent::__construct();
		$this->load->model('storemodel','',TRUE);
	}
	
	public function index(){
		
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			
			redirect('template/store','refresh');
		}else{
			redirect('login','refresh');
		}
	}
	
	function logout(){
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('home','refresh');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */