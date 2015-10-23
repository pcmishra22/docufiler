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
		  
		  $this->load->helper('captcha');
		  $random_number = substr(number_format(time() * rand(),0,'',''),0,6);
      	  // setting up captcha config
      	  $vals = array(
             'word' => $random_number,
             'img_path' => './captcha/',
             'img_url' => base_url().'captcha/',
			 'font_path'	=>base_url().'fonts/Raleway-SemiBold.ttf',
			 'img_url' => base_url().'captcha/',
             'img_width' => 150,
             'img_height' => 32,
             'expiration' => 7200
            );
      	
			$data['captcha'] = create_captcha($vals);
      		$this->session->set_userdata('captchaWord',$data['captcha']['word']);
		  	$this->load->view('login',$data);
	  }
	  //forget password calling
	  public function forgetpassword()
	  {
		  $this->load->view('forgetpassword');
	  }
	  //logout method calling
	  public function logout()
	  {
		  echo 'Logout';
	  }
	  //dashboard method calling
	  public function dashboard()
	  {
		  
		  if($this->session->userdata('captchaWord')==$_REQUEST['captcha'])
			{
				$this->template->set_template('front');
				$this->template->write('title', 'Welcome to the Docufiler Admin Dashboard !');
				$this->template->write_view('content', 'dashboard');
				$this->template->render();
			}
			else
			{
				$this->session->set_flashdata('flash_message', 'mismatch');
				redirect('users/login');
			}

	  }
	  //details category page
	  public function details()
	  {
		  $this->load->view('categorydetails');
	  }
	  //
	  
}
 /* End of file member.php */
/* Location: ./application/controllers/welcome.php */