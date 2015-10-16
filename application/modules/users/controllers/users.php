<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MX_Controller{
	
	  //constructor call	
	  function __construct()
	  {
        parent::__construct();
		session_start();
		$this->load->helper(array('form', 'url'));
		$this->load->model('users/users_model');
		$this->load->library("pagination");
	  }
	  //signup page calling
	  public function signup()
	  {
		  $this->load->view('signup');
	  }
	  //login page calling
	  public function login()
	  {
		  $this->load->view('login');
	  }
	  //forget password calling
	  public function forgetpassword()
	  {
		  $this->load->view('forgetpassword');
	  }
}
 /* End of file member.php */
/* Location: ./application/controllers/welcome.php */