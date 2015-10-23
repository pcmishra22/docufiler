<?php
class Admin extends MX_Controller
{

	 function __construct()
    {
        // this is your constructor
        parent::__construct();
		session_start();
		
		$this->load->model('admin/users_model');
    }

	/*
	check if user is logged in to the admin panel
	default function of the controller when the loads
	*/
	function index()
	{
		if($this->session->userdata('is_logged_in_admin'))
		{
			redirect('admin/dashboard');
		}else{
			$data['message_error'] = TRUE;
			$this->load->view('admin/login');
		}
	}

	 /**
    * encript the password 
    * @return mixed
    */	
    function __encrip_password($password) {
       return md5($password);
    }	
	 /**
    * check the username and the password with the database
    * @return void
    */
	function validate_credentials()
	{	
		$user_name = $this->input->post('username');
		$password = $this->__encrip_password($this->input->post('password'));
		
		$is_valid = $this->users_model->validate($user_name, $password);

		if($is_valid)
			{
			$data = array(
				'user_name' => $user_name,
				'is_logged_in_admin' => true
			);
			$this->session->set_userdata($data);
			redirect('admin/dashboard');
		}
		else // incorrect username or password
		{
			$data['message_error'] = TRUE;
			$this->load->view('admin/login', $data);	
		}
	}	
	/**
    * admin dashboard function after login
    * @return void
    */		
	function dashboard()
	{
		$this->checkloginadmin();
		$this->template->write('title', 'Welcome to the Docufiler Admin Dashboard !');
		$this->template->write_view('content', 'dashboard');
		$this->template->render();
	}
	
	//Logout function
	function logout()
	{
		$this->session->sess_destroy();
		redirect('admin/index');
	}
	
	//list users
	public function listuser()
	{
		$this->checkloginadmin();
		$data['allusers']=$this->users_model->listAllusers();
		$this->template->write('title', 'Welcome to the Docufiler Admin Dashboard !');
		$this->template->write_view('content', 'listuser',$data);
		$this->template->render();
	}
	
	//list users
	public function listtemplate()
	{
		$this->checkloginadmin();
		$data['alltemplates']=$this->users_model->listAlltemplates();
		$this->template->write('title', 'Welcome to the Docufiler Admin Dashboard !');
		$this->template->write_view('content', 'listtemplate',$data);
		$this->template->render();
	}
	
	//checklogin admin
	public function checkloginadmin()
	{	
	   if(!$this->session->userdata('user_name')=='admin')
		redirect('admin');
	}
	
	//delete template
	public function delettemplate($id)
	{
		$this->users_model->deleteTemplate($id);
		$this->session->set_flashdata('flash_message', 'deleted');
		redirect('admin/listtemplate');	
	}
	//delete user
	public function deleteuser($id)
	{
		$this->users_model->deleteUser($id);
		$this->session->set_flashdata('flash_message', 'deleted');
		redirect('admin/listuser');	
	}
	//edit template
	public function addtemplate($id='')
	{
		$data=array();
		$this->checkloginadmin();
		if($id!='')
			$data['templatedetails']=$this->users_model->listTemplateById($id);
		$this->template->write('title', 'Welcome to the Docufiler Admin Dashboard !');
		$this->template->write_view('content', 'addtemplate',$data);
		$this->template->render();
	}
}
?>

