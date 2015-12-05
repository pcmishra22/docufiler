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
		$this->load->library('s3');
	  }
	  //select subscription
	  public function subscription()
	  {
			//set data in session
			$this->load->view('subscription');
	  }
	  //signup page calling
	  public function signup($id='')
	  {
		  if(isset($_REQUEST['submit']))
		  {
				$planname='';
				if($id==1)
					$planname='personal';
				if($id==2)
					$planname='household';
				if($id==3)
					$planname='business';
					
				$data_to_store_account = array(
                    'owneremailid' => $this->input->post('email'),
                    'planname' => $planname,
					'createddate' => date("Y-m-d H:i:s")
                 ); 
				
				
			//check email exists	 
				$checkEmailAccount = $this->users_model->register_email_exists_account($this->input->post('email'));
			//save data to table account
				if(!empty($checkEmailAccount[0]))
				{
					$this->session->set_flashdata('flash_message', 'emailexists');
					redirect('users/signup/'.$id);
				}
				else
				{
					$this->users_model->saveData('accounts', $data_to_store_account);
				}
				
			//save data in users table	
				
			$data_to_store = array(
                    'firstname' => $this->input->post('firstname'),
                    'lastname' => $this->input->post('lastname'),
                    'emailid' => $this->input->post('email'),
                    'password' => md5($this->input->post('password')),
					'create_datetime' => date("Y-m-d H:i:s")
                 ); 
			
			//check email exists	 
				$checkEmail = $this->users_model->register_email_exists($this->input->post('email'));
			//save data to table	
				if(!empty($checkEmail[0]))
				{
					$this->session->set_flashdata('flash_message', 'emailexists');
					redirect('users/signup');
				}
				else
				{
					$this->session->set_flashdata('flash_message', 'success');
					$this->users_model->saveData('users', $data_to_store);
					redirect('users/login');
				}
		  }
		  else
		  {
		  	$this->load->view('signup');
		  }
	  }
	  //login page calling
	  public function login()
	  {
		  
		  $this->load->helper('captcha');
		  $random_number = substr(number_format(time() * rand(),0,'',''),0,8);
      	  // setting up captcha config
      	  $vals = array(
             'word' => $random_number,
             'img_path' => './captcha/',
             'img_url' => base_url().'captcha/',
			 'font_path'	=>base_url().'fonts/Raleway-SemiBold.ttf',
			 'img_url' => base_url().'captcha/',
             'img_width' => 304,
             'img_height' => 61,
             'expiration' => 7200
            );
      	
			$data['captcha'] = create_captcha($vals);
      		$this->session->set_userdata('captchaWord',$data['captcha']['word']);
		  	$this->load->view('login',$data);
	  }
	  //reset password
	  public function resetpassword($code)
	  {
		  
			if(isset($_REQUEST['email']) && $_REQUEST['email']!='')
			{
				//update password
				$data=array(
					'password' => md5($this->input->post('password')),
					'passwordreset' =>''
					);
					
				$this->users_model->updateData('emailid',$this->input->post('email'),'users',$data);
				//redirected to login page
				$this->session->set_flashdata('flash_message', 'changedpassword');
				redirect('users/login');
			}
			else
			{
					$data['checkdetails'] = $this->users_model->checkcodedata($code);
			
					if(!empty($data['checkdetails'][0]))
					{
						$this->session->set_flashdata('flash_message', 'mismatch');
						$this->load->view('resetpassword',$data);
					}
					else
					{
						$this->session->set_flashdata('flash_message', 'unauthrisedaccess');
						$this->load->view('resetpassword');
					}				
			}

	  }
//invite friend
public function invitefriend()
{
				//check for user login
			$this->loginCheck();
			//check for user login end here
	if(isset($_REQUEST['email']) && !empty($this->input->post('email')))
	{
	//check email exists	 
		$checkEmail = $this->users_model->register_email_exists($this->input->post('email'));
	
	//save data to table	
	if(empty($checkEmail))
	{
		//email code 
		$resetid='userid/'.$this->session->userdata('userid');		
		//update user table
		
		$data=array(
			'emailid' => $this->input->post('email'),
            'usertype' => '1',
			'create_datetime' => date("Y-m-d H:i:s")
			
		);
        //update user table
		$this->users_model->saveData('users',$data);
        //update user details table 
		$data=array(
			'emailid' => $this->input->post('email'),
			'user_id' => $this->session->userdata('userid'),
			'create_datetime' => date("Y-m-d H:i:s")
			
		);       
        $this->users_model->saveData('user_details',$data);
		//update user table
		$body='';
		$activation_url=base_url().'users/signup/'.urlencode($resetid);
			   
		$url_logo=base_url().'/images/frontend/logo.png';
		$body.='<html><body><table width="700" border="0" cellpadding="7" cellspacing="7" bgcolor="#E6F0EF" align="center" style="font-family:arial;font-size:14px; font-weight:normal;">
		  <tr><td align="left" bgcolor="#BAA786"><a href=""><img title="" alt="" src="'.$url_logo.'"></a></td>
		  </tr>
		  <tr>
			<td align="left">Hi '.$this->session->userdata('firstname').',</td>
		  </tr>
		 
		  <tr>
			<td align="left">You are invited by '.$this->session->userdata('firstname').'.</td>
		  </tr>
		  <tr>
			<td align="left">to see the documents on docufiler.com</td>
		  </tr>
		  <tr>
			<td align="left">Please click the link below to see the documents.</td>
		  </tr>
		  <tr>
			<td align="left"><a href="'.$activation_url.'">Click here</a></td>
		  </tr>
		  <tr>
			<td align="left">Thanks,<br/> The Docufiler</td>
		  </tr>
		</table>
		</body>
		</html>';

		//email sender
                $from=$this->session->userdata('email');
                

				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .= "From: ".$from."\r\nReply-To: ".$from; 
				
				  
				$email = $this->input->post('email');
				$subject = 'Invite User';
				
				echo $body;exit;
				
				if(mail($email,$subject,$body,$headers)){
						echo "email send";             
				}
				else
				{
					echo "email  not send ";
				}
					//email code
					$this->session->set_flashdata('flash_message', 'emailsent');
					redirect('users/invitefriend');
				}
				else
				{
					$this->session->set_flashdata('flash_message', 'emailexists');
					redirect('users/invitefriend');
				}
		  }
		  else
		  {
		  	//set data in session
			$this->template->set_template('front');
			$this->template->write('title', 'Welcome to the Docufiler invitefriend !');
			$this->template->write_view('content','invitefriend');
			$this->template->render();
		  }
		 

}
	  //forget password calling
	  public function forgetpassword()
	  {

		  if(isset($_REQUEST['email']) && !empty($this->input->post('email')))
		  {
			  //check email exists	 
				$checkEmail = $this->users_model->register_email_exists($this->input->post('email'));
			  //save data to table	
				if(!empty($checkEmail[0]))
				{
					//email code 
					$resetid=time();		
			   		//update user table
					$data=array('passwordreset' => $resetid);
					$this->users_model->updateData('email',$this->input->post('email'),'users',$data);
					//update user table
					$body='';
			   		$activation_url=base_url().'users/resetpassword/'.$resetid;
			   
			   $url_logo=base_url().'/images/frontend/logo.png';
			   $body.='<html><body><table width="700" border="0" cellpadding="7" cellspacing="7" bgcolor="#E6F0EF" align="center" style="font-family:arial;font-size:14px; font-weight:normal;">
		  <tr><td align="left" bgcolor="#BAA786"><a href=""><img title="" alt="" src="'.$url_logo.'"></a></td>
		  </tr>
		  <tr>
			<td align="left">Hi '.$checkEmail[0]['firstname'].',</td>
		  </tr>
		 
		  <tr>
			<td align="left">Please click below link to reset your password</td>
		  </tr>
		  <tr>
			<td align="left"><a href="'.$activation_url.'">Click here</a></td>
		  </tr>
		  <tr>
			<td align="left">Thanks,<br/> The Docufiler</td>
		  </tr>
		</table>
		</body>
		</html>';
				
				 $admin=$this->config->item('adminEmail');
                 $from="team@docufiler.com@docufiler.com";
                

				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .= "From: ".$from."\r\nReply-To: ".$admin; 
				
				  
				$email = $this->input->post('email');
				$subject = 'Reset Password';
				//echo $body;exit;
				
				if(mail($email,$subject,$body,$headers)){
						echo "email send";             
				}
				else
				{
					echo "email  not send ";
				}
					//email code
					$this->session->set_flashdata('flash_message', 'emailsent');
					redirect('users/forgetpassword');
				}
				else
				{
					$this->session->set_flashdata('flash_message', 'emailnotexists');
					redirect('users/forgetpassword');
				}
		  }
		  else
		  {
			   $this->load->view('forgetpassword');
		  }
		 
	  }
	  //account information
	  public function accountinfo()
	  {
		  			//check for user login
			$this->loginCheck();
			//check for user login end here
		 if(isset($_REQUEST['email']) && $_REQUEST['email']!='')
			{
				//update password
				$data1=array(
					'firstname' => $this->input->post('firstname'),
					'lastname' => $this->input->post('lastname'),
					'emailid' => $this->input->post('email'),
					'phone' => $this->input->post('phone')
					);
				
				$this->users_model->updateData('id',$this->session->userdata('userid'),'users',$data1);
				//redirected to login page
				$this->session->set_flashdata('flash_message', 'updated');
				//get user details by id
		  		$data['userdetails']=$this->users_model->userDetailsById($this->session->userdata('userid'));
		  		//set data in session
				$this->template->set_template('front');
				$this->template->write('title', 'Welcome to the Docufiler Admin Dashboard !');
				$this->template->write_view('content','accountinfo',$data);
				$this->template->render();
			}
			else
			{
		  		//get user details by id
		  		$data['userdetails']=$this->users_model->userDetailsById($this->session->userdata('userid'));
		  		//set data in session
				$this->template->set_template('front');
				$this->template->write('title', 'Welcome to the Docufiler Admin Dashboard !');
				$this->template->write_view('content','accountinfo',$data);
				$this->template->render();
			}
	  }
	   //mailingaddress information
	  public function mailingaddress()
	  {
			//check for user login
			$this->loginCheck();
			//check for user login end here		 
		 if(isset($_REQUEST['address']) || isset($_REQUEST['city']) || isset($_REQUEST['state']) || isset($_REQUEST['zip']))
			{
				//update password
				$data1=array(
					'address' => $this->input->post('address'),
					'city' => $this->input->post('city'),
					'state' => $this->input->post('state'),
					'zip' => $this->input->post('zip')
					);
				
				$this->users_model->updateData('id',$this->session->userdata('userid'),'users',$data1);
				//redirected to login page
				$this->session->set_flashdata('flash_message', 'updated');
				//get user details by id
		  		$data['userdetails']=$this->users_model->userDetailsById($this->session->userdata('userid'));
		  		//set data in session
				$this->template->set_template('front');
				$this->template->write('title', 'Welcome to the Docufiler Admin Dashboard !');
				$this->template->write_view('content','mailingaddress',$data);
				$this->template->render();
			}
			else
			{
		  		//get user details by id
		  		$data['userdetails']=$this->users_model->userDetailsById($this->session->userdata('userid'));
		  		//set data in session
				$this->template->set_template('front');
				$this->template->write('title', 'Welcome to the Docufiler Admin Dashboard !');
				$this->template->write_view('content','mailingaddress',$data);
				$this->template->render();
			}
	  
	  }
	  //billing order
	  public function billingorder()
	  {
			$data=array();
			$this->template->set_template('front');
			$this->template->write('title', 'Welcome to the Docufiler Billing !');
			$this->template->write_view('content','billingorder',$data);
			$this->template->render();  
	  }
	  //billing address data
	  public function billingaddressdata()
	  {
			$id=$this->input->post('id'); 
			$carddetails=$this->users_model->cardDetailsById($id);
			//initialize variables
			$address='';
			$city='';
			$state='';
			$zip='';
			//
			if(!empty($carddetails[0]))
			{		
				$address=$carddetails[0]['baddress'];
				$city=$carddetails[0]['bcity'];
				$state=$carddetails[0]['bstate'];
				$zip=$carddetails[0]['bzip'];
			}
		?>
			  <input type="text" name="address" placeholder="Enter your Address" class="input-account-infomation"  value="<?php echo $address?>"/>
              <input type="text" name="city" placeholder="Enter Your City" class="input-account-infomation"  value="<?php echo $city?>"/>
              <input type="text" name="state" placeholder="Enter Your State" class="input-account-infomation"  value="<?php echo $state?>"/>
              <input type="text" name="zip" placeholder="Enter Your Zip" class="input-account-infomation"  value="<?php echo $zip?>"/>
		
		<?php
	  }
	   //billing address information
	  public function billingaddress()
	  {
		  	//check for user login
			$this->loginCheck();
			//check for user login end here

		  	if(isset($_REQUEST['address']) || isset($_REQUEST['city']) || isset($_REQUEST['state']) || isset($_REQUEST['zip']))
			{
				//update password
				$data1=array(
					'baddress' => $this->input->post('address'),
					'bcity' => $this->input->post('city'),
					'bstate' => $this->input->post('state'),
					'bzip' => $this->input->post('zip')
					);
				
				$this->users_model->updateData('id',$this->input->post('cc'),'user_cardinfo',$data1);
				//redirected to login page
				$this->session->set_flashdata('flash_message', 'updated');
				//get user details by id
		  		$data['carddetails']=$this->users_model->userCardList($this->session->userdata('userid'));
		  		//set data in session
				$this->template->set_template('front');
				$this->template->write('title', 'Welcome to the Docufiler Admin Dashboard !');
				$this->template->write_view('content','billingaddress',$data);
				$this->template->render();
			}
			else
			{
		  		//get user details by id
		  		$data['carddetails']=$this->users_model->userCardList($this->session->userdata('userid'));
		  		//set data in session
				$this->template->set_template('front');
				$this->template->write('title', 'Welcome to the Docufiler Admin Dashboard !');
				$this->template->write_view('content','billingaddress',$data);
				$this->template->render();
			}
	  
	  
	  }
	  //test upload
	  public function testupload()
	  {
		$this->load->view('testupload');  
	  }
	  //file upload ajax call
	  public function upload()
	  {
		if(!empty($_FILES))
		{
			// Bucket Name
			$bucket="docufiler";
			
			//get accesskey from database
			$appdetails=$this->users_model->getSettings();
			//AWS access info
			if (!defined('awsAccessKey')) define('awsAccessKey', $appdetails[0]['awsAccessKey']);
			if (!defined('awsSecretKey')) define('awsSecretKey', $appdetails[0]['awsSecretKey']);
			
			//instantiate the class
			$s3 = new S3(awsAccessKey, awsSecretKey);

			//$s3->putBucket($bucket, S3::ACL_PUBLIC_READ);
			$sourcePath = $_FILES['file']['tmp_name']; 			// Storing source path of the file in a variable
			$fileuniquename=time().'_'.$_FILES['file']['name'];	//fileuniquename
			$targetPath = "uploads/".$fileuniquename; 			// Target path where file is to be stored
			//move_uploaded_file($sourcePath,$targetPath) ; 		// Moving Uploaded file
			//data variable defined here
			$folder='';
			$devicedetails=$_SERVER['HTTP_USER_AGENT'];
			
			$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
			$srvname='https://s3-us-west-2.amazonaws.com/';
			$location=$srvname.$bucket.'/'.$fileuniquename;
			
			$fcdt=date ("F d Y H:i:s.", filectime($_FILES['file']['name']));
			$fldt=date ("F d Y H:i:s.", filemtime($_FILES['file']['name']));
			
			if($s3->putObjectFile($sourcePath, $bucket , $fileuniquename, S3::ACL_PUBLIC_READ) )
			{
				//save data to table
				$data_to_store=array(
					'userid' => $this->session->userdata('userid'),
					'name' => $_FILES['file']['name'],
					'uniquename' => $fileuniquename,
					'folder' => $folder,
					'device' => $hostname,
					'devicedetails' => $devicedetails,
					'filetype' =>$_FILES["file"]["type"],
					'location' => $location,
					'file_created_date' => $fcdt,
					'file_last_modified_date' => $fldt,
					'size' => $_FILES["file"]["size"],
					'created_date' => date("Y-m-d H:i:s")	
				);
				$this->users_model->saveData('user_files', $data_to_store);
				//save data to table here
				
			}
			else
			{
				echo 'File not uploaded on S3.';
			}
			//s3 upload code here
		}
	  }
	  //delete card
	  public function deletecard($id)
	  {
		$this->users_model->deleteCard($id);
		$this->session->set_flashdata('flash_message', 'deleted'); 
		redirect('users/cardlist');		
	  }
	  //delete files
	  public function deletefile($id)
	  {
		  	//check for user login
			$this->loginCheck();
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

			redirect('users/listfiles');
	  }
	  //user list files
	  public function listfiles()
	  {
			//check for user login
			$this->loginCheck();
			//check for user login end here		
		    //setting for pagination
			$config = array();
			$config["base_url"] = base_url() . "users/listfiles";
			$config["total_rows"] = $this->users_model->record_count_total_files($this->session->userdata('userid'));
			$config["per_page"] = 10;
			$config["uri_segment"] = 3;

			//pagination initialization
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			//get user details by id
		  	$data['userdetails']=$this->users_model->userAllFiles($this->session->userdata('userid'),$config["per_page"], $page);
			$data["links"] = $this->pagination->create_links();
			

			
			//set data in session
			$this->template->set_template('front');
			$this->template->write('title', 'Welcome to the Docufiler Admin Dashboard !');
			$this->template->write_view('content','listfiles',$data);
			$this->template->render();
			
	  }
	  //file upload 
	  public function uploadfiles()
	  {
		  //echo $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
		  //echo '<pre>';
		 // print_r($_SERVER);
		  //echo '</pre>';
		  //die;
		  //get user details by id
		  		$data['userdetails']=$this->users_model->userDetailsById($this->session->userdata('userid'));
		  		//set data in session
				$this->template->set_template('front');
				$this->template->write('title', 'Welcome to the Docufiler Admin Dashboard !');
				$this->template->write_view('content','uploadfiles',$data);
				$this->template->render();
	  }
	   //cardinfo information
	  public function cardinfo($id='')
	  {
			$data=array();
			//check for user login
			$this->loginCheck();
			//check for user login end here cardtype
		  	if(isset($_REQUEST['cardname']) || isset($_REQUEST['cardno']) || isset($_REQUEST['cardcvv']) || isset($_REQUEST['expirymonth']) || isset($_REQUEST['expiryyear']))
			{
				//update password
				$data1=array(
					'userid' => $this->session->userdata('userid'),
					'cardname' => $this->input->post('cardtype'),
					'cardholdername' => $this->input->post('name'),
					'cardno' => $this->input->post('cardno'),
					'cardcvv' => $this->input->post('cvv'),
					'expirymonth' => $this->input->post('expirymonth'),
					'expiryyear' => $this->input->post('expiryyear'),
					'create_datetime' => date("Y-m-d H:i:s")	
					);
				
				if($_REQUEST['id']!='')
				{
					//update data to table
					$this->users_model->updateData('id',$id,'user_cardinfo',$data1);
					//redirected to login page
					$this->session->set_flashdata('flash_message', 'updated');
				}
				else
				{
					//save data to table
					$this->users_model->saveData('user_cardinfo',$data1);
					//redirected to login page
					$this->session->set_flashdata('flash_message', 'added');
				}

				redirect('users/cardlist');
			}
			else
			{
				//card details by id
				if($id!='')
					$data['carddetails']=$this->users_model->cardDetailsById($id);
		  		

				//set data in session
				$this->template->set_template('front');
				$this->template->write('title', 'Welcome to the Docufiler Admin Dashboard !');
				$this->template->write_view('content','cardinfo',$data);
				$this->template->render();
			}
	  
	  
	  }
	  //cardlist
	  public function cardlist()
	  {
				$data=array();
				$data['cardlist']=$this->users_model->userCardList($this->session->userdata('userid'));
				$this->template->set_template('front');
				$this->template->write('title', 'Welcome to the Docufiler Admin Dashboard !');
				$this->template->write_view('content', 'cardlist',$data);
				$this->template->render();  
	  }
	  //accesspermission information
	  public function accesspermission()
	  {
			//check for user login
			$this->loginCheck();
			//check for user login end here
			
			if(isset($_REQUEST))
			{
				foreach($_REQUEST as $key=>$value)
				{
					$val= explode('_',$key);
					$data=array('rights' => $value);
					$this->users_model->updateData('id',$val[1],'user_details',$data);
					$this->session->set_flashdata('flash_message', 'updated');
				}
				
			}	
				//get user details by id
				$data['userdetails']=$this->users_model->userDetailsById($this->session->userdata('userid'));
				//all invited user list
				$data['inviteduser']=$this->users_model->invitedUserById($this->session->userdata('userid'));
				//set data in session
				$this->template->set_template('front');
				$this->template->write('title', 'Welcome to the Docufiler Admin Dashboard !');
				$this->template->write_view('content', 'accesspermission',$data);
				$this->template->render();
			

	  }
	  //accesspermission information
	  public function securityquestion()
	  {
			//check for user login
			$this->loginCheck();
			//check for user login end here

		  	if(isset($_REQUEST['question']) || isset($_REQUEST['answer']))
			{
				//update password
				$data1=array(
					'question' => $this->input->post('question'),
					'answer' => $this->input->post('answer')
					);
				
				$this->users_model->updateData('id',$this->session->userdata('userid'),'users',$data1);
				//redirected to login page
				
				//get user details by id
		  		$data['userdetails']=$this->users_model->userDetailsById($this->session->userdata('userid'));
		  		//set data in session
				$this->session->set_flashdata('flash_message', 'updated');
				$this->template->set_template('front');
				$this->template->write('title', 'Welcome to the Docufiler Admin Dashboard !');
				$this->template->write_view('content','securityquestion',$data);
				$this->template->render();
			}
			else
			{
		  		//get user details by id
		  		$data['userdetails']=$this->users_model->userDetailsById($this->session->userdata('userid'));
		  		//set data in session
				$this->template->set_template('front');
				$this->template->write('title', 'Welcome to the Docufiler Admin Dashboard !');
				$this->template->write_view('content','securityquestion',$data);
				$this->template->render();
			}
	  
	  
	  
	  }
	  
	  //logout method calling
	  public function logout()
	  {
		  $this->session->unset_userdata('firstname');
		  $this->session->unset_userdata('lastname');
		  $this->session->unset_userdata('email');
		  redirect('users/login');
	  }
	  //dashboard method calling
	  public function dashboard()
	  {
			//check for user login
			//$this->loginCheck();
			//check for user login end here
		 	if($this->session->userdata('captchaWord')==$_REQUEST['captcha'])
			{
				$result=$this->users_model->checkUser($this->input->post('username'),$this->input->post('password'));
				if(!empty($result[0]['emailid']))
				{
					//set data in session
						$this->session->set_userdata('userid', $result[0]['id']);
						$this->session->set_userdata('email', $result[0]['emailid']);
						$this->session->set_userdata('firstname',$result[0]['firstname']);
						$this->session->set_userdata('lastname', $result[0]['lastname']);
					//set data in session
					$this->template->set_template('front');
					$this->template->write('title', 'Welcome to the Docufiler Admin Dashboard !');
					$this->template->write_view('content', 'dashboard');
					$this->template->render();
							 
				}
				else
				{
					$this->session->set_flashdata('flash_message', 'invaliduser');
					redirect('users/login');
				}

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
		  	//check for user login
			$this->loginCheck();
			//check for user login end here
		  $this->load->view('categorydetails');
	  }
	  //
	  	public function loginCheck(){
		//echo $_SERVER['REQUEST_URI'];exit;
	    if(empty($this->session->userdata('email')))
		redirect('users/login');

	}
	  
}
 /* End of file member.php */
/* Location: ./application/controllers/welcome.php */
