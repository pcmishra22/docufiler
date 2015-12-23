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
	//list payments
	public function listpayments()
	{
		$this->checkloginadmin();
		$data['allpayments']=$this->users_model->listAllPayments();
		$this->template->write('title', 'Welcome to the Docufiler Admin Dashboard !');
		$this->template->write_view('content', 'listpayments',$data);
		$this->template->render();
	}
	//list listplans
	
	public function listplans()
	{
		$this->checkloginadmin();
		$data['allplans']=$this->users_model->listAllPlans();
		$this->template->write('title', 'Welcome to the Docufiler Admin Dashboard !');
		$this->template->write_view('content', 'listplans',$data);
		$this->template->render();
	}
	//list promotion
	
	public function listpromotion()
	{
		$this->checkloginadmin();
		$data['allcodes']=$this->users_model->listAllPromoCodes();
		$this->template->write('title', 'Welcome to the Docufiler Admin Dashboard !');
		$this->template->write_view('content', 'listpromotion',$data);
		$this->template->render();
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
	//
	//delete files
	  public function deletefile($id)
	  {
		  	//check for user login
			$this->checkloginadmin();
			//get file details by id
			$filedetails=$this->users_model->getFile($id);
			
			$filename=$filedetails[0]['uniquename'];
			// Bucket Name
			$bucket="docufiler";
			
			//get accesskey from database
			$appdetails=$this->users_model->getSettings();
			//AWS access info
			if (!defined('awsAccessKey')) define('awsAccessKey', $appdetails[0]['awsAccessKey']);
			if (!defined('awsSecretKey')) define('awsSecretKey', $appdetails[0]['awsSecretKey']);
						
			//instantiate the class
			$s3 = new S3(awsAccessKey, awsSecretKey);

			if ($s3->deleteObject($bucket, $filename))
			{
				$this->users_model->deleteFile($id);
				$this->session->set_flashdata('flash_message', 'deleted');
			}
			else
			{
				$this->session->set_flashdata('flash_message', 'filenotfound');
			}

			redirect('admin/listfile');
	  }
	//list filesize
	public function listfile()
	{
		$this->checkloginadmin();
		$data['allfiles']=$this->users_model->listAllFiles();
		$this->template->write('title', 'Welcome to the Docufiler Admin Dashboard !');
		$this->template->write_view('content', 'listfile',$data);
		$this->template->render();
	}
	//list settings
	public function listsettings()
	{
		$this->checkloginadmin();
		$data['allsettings']=$this->users_model->listAllSettings();
		$this->template->write('title', 'Welcome to the Docufiler Admin Dashboard !');
		$this->template->write_view('content', 'listsettings',$data);
		$this->template->render();
	}
	//
	public function listpages()
	{
		$this->checkloginadmin();
		$data['allpages']=$this->users_model->listAllpages();
		$this->template->write('title', 'Welcome to the Docufiler Admin Dashboard !');
		$this->template->write_view('content', 'listpages',$data);
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
	
	//delete plan
	
	public function deleteplan($id)
	{
		$this->users_model->deletePlan($id);
		$this->session->set_flashdata('flash_message', 'deleted');
		redirect('admin/listplans');	
	}	
	
	//delete promotion
	
	public function deletepromotion($id)
	{
		$this->users_model->deletePromotion($id);
		$this->session->set_flashdata('flash_message', 'deleted');
		redirect('admin/listpromotion');	
	}
	//delete pages
	
	public function deletepage($id)
	{
		$this->users_model->deletePages($id);
		$this->session->set_flashdata('flash_message', 'deleted');
		redirect('admin/listpages');	
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
	//add plan
	public function addplan($id='')
	{
		if(isset($_REQUEST['submit']))
		{	
			if($_REQUEST['id']!='')
			{
				$data = array(
				'name' => $this->input->post('name'),
				'price' => $this->input->post('price'),
				'files' => $this->input->post('files'),
				'space' => $this->input->post('space'),
				'usertype' => $this->input->post('usertype'),
				'discount' => $this->input->post('discount')
				);
				
				//update data
				
				$this->users_model->updateData($_REQUEST['id'],'plans',$data);
				$this->session->set_flashdata('flash_message', 'updated');				

			}
			else
			{
				$data = array(
				'name' => $this->input->post('name'),
				'price' => $this->input->post('price'),
				'files' => $this->input->post('files'),
				'space' => $this->input->post('space'),
				'usertype' => $this->input->post('usertype'),
				'discount' => $this->input->post('discount')
				);
				//save data
				$this->users_model->saveData('plans',$data);
				$this->session->set_flashdata('flash_message', 'added');				
			}

			redirect('admin/listplans');
		}
		else
		{
			$data=array();
			if($id!='')
				$data['plandetails']=$this->users_model->listPlanById($id);
			$this->template->write('title', 'Welcome to the Docufiler Admin Dashboard !');
			$this->template->write_view('content', 'addplan',$data);
			$this->template->render();
		}

	}
	//add promotion
	public function addpromotion($id='')
	{
		if(isset($_REQUEST['submit']))
		{
			if($_REQUEST['id']!='')
			{
				$data = array(
				'codename' => $this->input->post('codename'),
				'percent' => $this->input->post('percent'),
				'status' => $this->input->post('settingdiscount'),
				'created_date' => date('Y-m-d h:i:s')
				);
				
				//update data
				
				$this->users_model->updateData($_REQUEST['id'],'promotionalcode',$data);
				$this->session->set_flashdata('flash_message', 'updated');				

			}
			else
			{
				$data = array(
				'codename' => $this->input->post('codename'),
				'percent' => $this->input->post('percent'),
				'status' => $this->input->post('settingdiscount'),
				'created_date' => date('Y-m-d h:i:s')
				);
				//save data
				$this->users_model->saveData('promotionalcode',$data);
				$this->session->set_flashdata('flash_message', 'added');				
			}

			redirect('admin/listpromotion');
		}
		else
		{
			$data=array();
			if($id!='')
				$data['promotiondetails']=$this->users_model->listPromotionById($id);
			$this->template->write('title', 'Welcome to the Docufiler Admin Dashboard !');
			$this->template->write_view('content', 'addpromotion',$data);
			$this->template->render();
		}

	}
	
	
	
	//add pages
	public function addpage($id='')
	{
		if(isset($_REQUEST['submit']))
		{
			if($_REQUEST['id']!='')
			{
				$data = array(
				'title' => $this->input->post('title'),
				'content' => $this->input->post('con'),
				'created_date' => date('Y-m-d h:i:s')
				);
				
				//update data
				
				$this->users_model->updateData($_REQUEST['id'],'pages',$data);
				$this->session->set_flashdata('flash_message', 'updated');				

			}
			else
			{
				$data = array(
				'title' => $this->input->post('title'),
				'content' => $this->input->post('con'),
				'created_date' => date('Y-m-d h:i:s')
				);
				//save data
				$this->users_model->saveData('pages',$data);
				$this->session->set_flashdata('flash_message', 'added');				
			}

			redirect('admin/listpages');
		}
		else
		{
			$data=array();
			if($id!='')
				$data['pagedetails']=$this->users_model->listPageById($id);
			$this->template->write('title', 'Welcome to the Docufiler Admin Dashboard !');
			$this->template->write_view('content', 'addpage',$data);
			$this->template->render();
		}

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
	//edit settings
	public function editsettings()
	{
		$data=array();
		$this->checkloginadmin();
		
		if(isset($_REQUEST['submit']))
		{

			$data1 = array(
				'awsAccessKey' => $_REQUEST['accesskey'],
				'awsSecretKey' => $_REQUEST['secretkey'],
				'discount' => $_REQUEST['discount'],
				'discountactive' => $_REQUEST['settingdiscount'],
				'paypalmerchanctemail' => $_REQUEST['meremail']
			);
			
			$this->users_model->updateData($_REQUEST['id'],'settings',$data1);
			$this->session->set_flashdata('flash_message', 'updated');
			//after save data
			redirect('admin/listsettings');
		}

		//load template
		$data['settingsdetails']=$this->users_model->getSettingsDetails();
		$this->template->write('title', 'Welcome to the Docufiler Admin Dashboard !');
		$this->template->write_view('content', 'editsetting',$data);
		$this->template->render();
	}
}
?>

