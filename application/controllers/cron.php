<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cron extends CI_Controller {
          session_start();
		$this->load->helper(array('form', 'url'));
		$this->load->model('user/users_model');
		$this->load->model('business/business_model');
		$this->load->model('job/job_model');
		$this->load->model('message/message_model', 'message');
		$this->load->model('admin/pages_model');
		$this->load->library("pagination");
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
	 
	public function __construct()
	{
	    parent::__construct();
	   
	}
	public function index()
	{ 
		
		$this->load->view('welcome_message');
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */