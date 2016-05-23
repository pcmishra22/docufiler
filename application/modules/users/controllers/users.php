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
	  //checking cron
	  public function cron()
	  {
							//upload file to bucket explorer

		  ////////////////////////////////////////////////////
		  $files=$this->users_model->imageNotConvertedFiles();

		  $filepath='/var/www/html/docufiler/files_images/';
		  
		  if(count($files)>0)
		  {
			  foreach($files as $file)
			  {
				//check file type	
				$farray = explode('.', $file['uniquename']);
				$fextension = end($farray);
				$fn=explode('.',$file['uniquename']);
				//filepath
				$filename=$filepath.$file['uniquename'];
				//check file extension
				if($fextension!='pdf')  
				{
				  //convert to pdf
				  $cmd='unoconv -f pdf ';
				  $command=$cmd.$filename;
				  exec($command);
				}
				  //convert -density 300 p.pdf -quality 100 o.jpg
				  //convert to jpg
				  //$cmd='unoconv -f jpg ';
				  $cmd='convert -density 300 ';
				  $filename=$filepath.$fn[0].'.pdf';
				  $filename2=$filepath.$fn[0].'.jpg';
				  $cmd2=' -quality 100 ';
				  $command=$cmd.$filename.$cmd2.'    '.$filename2;
				  exec($command);
				  //update table field to set image is created
				  $data=array('is_image_created' =>'1');
				  //update query
				  $this->users_model->updateData('id',$file['id'],'user_files',$data);
				  // Bucket Name
							$bucket="docufilerpreviewimage";
							//get accesskey from database
							$appdetails=$this->users_model->getSettings();
							//AWS access info
							if (!defined('awsAccessKey')) define('awsAccessKey', $appdetails[0]['awsAccessKey']);
							if (!defined('awsSecretKey')) define('awsSecretKey', $appdetails[0]['awsSecretKey']);
							//instantiate the class
							$s3 = new S3(awsAccessKey, awsSecretKey);
							//Source path
							 $sourcePath = FCPATH."files_images/"; 			// Storing source path of the file in a variable
							//FILE UNIQUE NAME
							$fileuniquename=$fn[0].'.jpg';
							//$fileuniquename='1464017955_s.jpg';
							$sourcePathname=$sourcePath.$fileuniquename;
							if($s3->putObjectFile1($sourcePathname, $bucket , $fileuniquename, S3::ACL_PUBLIC_READ) )
							{
							 //delete files from temp folder....		
							  
							  $cmd='rm -f ';
							  $filename=$sourcePath.$fn[0].'.*';
							  $command=$cmd.$filename;
							  exec($command);
							  
							 //delete files from folder.......... 
							}
							else
							{
								echo 'File not uploaded on S3.';
							}
				//s3 upload code here
				//delete file after upload......
			  }
		  }
	  }
	  //save menu 
	  public function savedynamicmenu()
	  {
		$fileid=$this->input->post('fileid'); 
		$folderid=$this->input->post('folderid'); 
		//data to store
		$data = array(
                    'menuid' => $folderid,
                    'fileid' => $fileid,
					'accountid' => $this->session->userdata('userid')
        ); 	
		//save 
		$this->users_model->saveData('files_category_meu', $data);
		//message
		echo 'File save in this category.';
	  }
	  //dynamic menu
	  public function dynamicmenu()
	  {
	    //variable assignments.................................................
	    $str='';
        //get data from database...............................................
		$submenu= $this->users_model->dynamicSubMenu($this->input->post('id'));
		if(count($submenu)>0)
		{
			foreach($submenu as $menudata)
			{
				$submenuid= $this->users_model->dynamicSubMenu($menudata['menuid']);
				$str.='<li>';
				$str.='<a style="border:1px;" id="'.$menudata['menuid'].'" href="javascript:void(0);" ondrop="drop(event,this.id)" ondragover="allowDrop(event)" onclick="submenu('.$menudata['menuid'].');">'.$menudata['label'].'('.count($submenuid).')</a>';
								
				if(count($submenuid)>0)
				{
					$str.='<ul id="c'.$menudata['menuid'].'"></ul>';
				}
				$str.='</li>';
			}		
		}
        echo $str;
	  }
	  //select subscription 
	  public function subscription()
	  {
		$data=array();
		$data['subscriptiondetails']=$this->users_model->subscriptionDetails();
		$this->load->view('subscription',$data);
	  }
	  //select subscription 
	  public function filesubscription()
	  {
		$data=array();
		$data['subscriptiondetails']=$this->users_model->subscriptionDetails();
		$this->load->view('filesubscription',$data);
	  }
	  //promo details
	  public function promodiscount()
	  {
		$details=$this->users_model->promoDiscount($this->input->post('code'));
		$percent=$details[0]['percent'];
		$total=$this->input->post('total');
		$discount=($total*$percent)/100;
		$dis=$total-$discount;
		$str1="<div><div id='inner_1'>$".$discount."</div><div id='inner_2'>$".$dis."</div></div>";
		echo $str1;
	  }
	  //signup page calling
	  public function signup($id='')
	  {
		//if($id=='')
			//redirect('users/subscription');
		
		
		$planname='';
				
		if($id==1)
			$planname='personal';
		if($id==2)
			$planname='household';
		if($id==3)
			$planname='business';
		
		
		if($this->session->userdata('userid')>0)
		{
			//set plan name
			$this->session->set_userdata('planname',$planname);
			//check for referal
			if(strpos(@$_SERVER['HTTP_REFERER'],'filesubscription'))
			{
				$usercardlist=count($this->users_model->userCardList($this->session->userdata('userid')));
				//user card list
				if($usercardlist>0)
					redirect('users/filebillingorder');
				else
					redirect('users/filecardinfo');
			}
			else
			{
				//redirect('users/billingorder');
			}				
		}		
		if(isset($_REQUEST['submit']))
		{
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
					//save data in user table
					$uid=$this->users_model->saveData('users', $data_to_store);
					//save data in menu table
					$data1 = array(
						'label' =>'Date',
						'accountid' =>$uid,
						'parent_id' => '0',
						'filescount' => '0'
					 );
					$uid1=$this->users_model->saveData('dynnmic_menu', $data1);
					//record two
					$data2 = array(
						'label' =>'Docufiler',
						'accountid' =>$uid,
						'parent_id' => '0',
						'filescount' => '0'
					 );					 
					$uid2=$this->users_model->saveData('dynnmic_menu', $data2);
					//record three
					$data3 = array(
						'label' =>'Miscellaneous',
						'accountid' =>$uid,
						'parent_id' => '0',
						'filescount' => '0'
					 );					 
					$uid3=$this->users_model->saveData('dynnmic_menu', $data3);					
					//record four
					$data4 = array(
						'label' =>'Today',
						'accountid' =>$uid,
						'parent_id' => '1',
						'filescount' => '0'
					 );					 
					$uid4=$this->users_model->saveData('dynnmic_menu', $data4);					
					
					//record five
					$data5 = array(
						'label' =>'Yerterday',
						'accountid' =>$uid,
						'parent_id' => '1',
						'filescount' => '0'
					 );					 
					$uid5=$this->users_model->saveData('dynnmic_menu', $data5);					
					//record six
					$data6 = array(
						'label' =>'Last Week',
						'accountid' =>$uid,
						'parent_id' => '1',
						'filescount' => '0'
					 );					 
					$uid6=$this->users_model->saveData('dynnmic_menu', $data6);					
					//record seven
					$data7 = array(
						'label' =>'Last Month',
						'accountid' =>$uid,
						'parent_id' => '1',
						'filescount' => '0'
					 );					 
					$uid7=$this->users_model->saveData('dynnmic_menu', $data7);						
					//redirect to login page
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
			'email' => $this->input->post('email'),
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
					$this->users_model->updateData('emailid',$this->input->post('email'),'users',$data);
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
	  // Function to convert NTP string to an array
		function NVPToArray($NVPString)
		{
				$proArray = array();
				while(strlen($NVPString))
				{
					// name
					$keypos= strpos($NVPString,'=');
					$keyval = substr($NVPString,0,$keypos);
					// value
					$valuepos = strpos($NVPString,'&') ? strpos($NVPString,'&'): strlen($NVPString);
					$valval = substr($NVPString,$keypos+1,$valuepos-$keypos-1);
					// decoding the respose
					$proArray[$keyval] = urldecode($valval);
					$NVPString = substr($NVPString,$valuepos+1,strlen($NVPString));
				}
				return $proArray;
		}
		//
		public function test()
		{
				$this->template->set_template('front');
				$this->template->write('title', 'Welcome to the Docufiler Billing !');
				$this->template->write_view('content','payment');
				$this->template->render();	
		}	
		//payment
	  public function payment()
	  {
		//set data array	
		$carddetails=$this->users_model->cardDetailsById($_REQUEST['cardname']);
		$substype=$_REQUEST['Annually'];
		$price=$_REQUEST['dataprice'];
		$discount=$_REQUEST['datadiscount'];
		$total=$_REQUEST['datatotal'];
		$total=number_format($total, 2, '.', '');
		//set data in session
		
		// Set sandbox (test mode) to true/false.
		$sandbox = TRUE;
		// Set PayPal API version and credentials.
		$api_version = '85.0';
		$api_endpoint = $sandbox ? 'https://api-3t.sandbox.paypal.com/nvp' : 'https://api-3t.paypal.com/nvp';
		$api_username = $sandbox ? 'sonam92_api1.gmail.com' : 'LIVE_USERNAME_GOES_HERE';
		$api_password = $sandbox ? '1401035965' : 'LIVE_PASSWORD_GOES_HERE';
		$api_signature = $sandbox ? 'AFcWxV21C7fd0v3bYYYRCpSSRl31AgxPwfg-5AkhPp7C2E5vTUhEpjX6' : 'LIVE_SIGNATURE_GOES_HERE';
		// Store request params in an array
		$request_params = array
					(
					'METHOD' => 'DoDirectPayment', 
					'USER' => $api_username, 
					'PWD' => $api_password, 
					'SIGNATURE' => $api_signature, 
					'VERSION' => $api_version, 
					'PAYMENTACTION' => 'Sale', 					
					'IPADDRESS' => $_SERVER['REMOTE_ADDR'],
					'CREDITCARDTYPE' => $carddetails[0]['cardname'], 
					'ACCT' => $carddetails[0]['cardno'], 						
					'EXPDATE' => $carddetails[0]['expirymonth'].$carddetails[0]['expiryyear'], 			
					'CVV2' => $carddetails[0]['cardcvv'], 
					'FIRSTNAME' => $carddetails[0]['cardholderfname'], 
					'LASTNAME' => $carddetails[0]['cardholderlname'], 
					'STREET' => $carddetails[0]['baddress'], 
					'CITY' => $carddetails[0]['bcity'], 
					'STATE' => $carddetails[0]['bstate'], 					
					'COUNTRYCODE' => 'US', 
					'ZIP' => $carddetails[0]['bzip'], 
					'AMT' => $total, 
					'CURRENCYCODE' => 'USD', 
					'DESC' => 'Docufiler subscription payment' 
					);

		// Loop through $request_params array to generate the NVP string.
		
	//echo '<pre>';
	//print_r($request_params);
	//echo '</pre>';
	
		$nvp_string = '';
		foreach($request_params as $var=>$val)
		{
			$nvp_string .= '&'.$var.'='.urlencode($val);	
		}
//echo $nvp_string; 		

		// Send NVP string to PayPal and store response
		$curl = curl_init();
				curl_setopt($curl, CURLOPT_VERBOSE, 1);
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
				curl_setopt($curl, CURLOPT_TIMEOUT, 30);
				curl_setopt($curl, CURLOPT_URL, $api_endpoint);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($curl, CURLOPT_POSTFIELDS, $nvp_string);

		$result = curl_exec($curl);

		//echo $result.'<br /><br />';
		curl_close($curl);
		// Parse the API response
		$data['result_array'] = $this->NVPToArray($result);
		$tid='';
		$tid=@$data['result_array']['TRANSACTIONID'];
		//save data to database table
		$data_to_store=array(
			'transactionid' => $tid,
			'accountno' => $this->session->userdata('userid'), 
			'userid' => $this->session->userdata('userid'),
			'created_date' => date("Y-m-d H:i:s"),
			'ccno' => $carddetails[0]['cardno'],
			'ccname' => $carddetails[0]['cardname'],
			'amt' => $total,
			'status' => $data['result_array']['ACK']
		);
		//save transaction to database 
		$this->users_model->saveData('billing', $data_to_store);
		//email code
		$body='';	   
		$url_logo=base_url().'/images/frontend/logo.png';
		$body.='<html><body><table width="700" border="0" cellpadding="7" cellspacing="7" bgcolor="#E6F0EF" align="center" style="font-family:arial;font-size:14px; font-weight:normal;">
		  <tr><td align="left" bgcolor="#BAA786"><a href=""><img title="" alt="" src="'.$url_logo.'"></a></td>
		  </tr>
		  <tr>
			<td align="left">Hi '.$this->session->userdata('firstname').',</td>
		  </tr>
		 
		  <tr>
			<td align="left">Thank you!</td>
		  </tr>
		  <tr>
			<td align="left">We have received your order and created a new account for you in Docufiler. </td>
		  </tr>
		  <tr>
			<td align="left">
			you can start using your system automatically by going to https://app.docufiler.com
			</td>
		  </tr>
		  <tr>
			<td align="left">
			Should you have any questions do not hesitate to reach out to us either by email at
			team@docufiler.com, or by creating a case at https://support.docufiler.com (please 
			make sure you use the same email you have on your account to open the case.)
			
			To learn more about Docufiler features you can access the documentation by going to
			https://support.docufiler.com/FAQ
			
			
			</td>
		  </tr>
		  <tr>
			<td align="left">Your friends at Docufiler</td>
		  </tr>
		</table>
		</body>
		</html>';

		//email sender
                $from='team@docufiler.com';
                
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .= "From: ".$from."\r\nReply-To: ".$from; 
				$email = $this->session->userdata('email');
				$subject = 'Thanks for your order';
				
				if(@mail($email,$subject,$body,$headers)){
						//echo "email send";             
				}
				else
				{
					//echo "email  not send ";
				}
		
		//template
		
		
		if(strpos(@$_SERVER['HTTP_REFERER'],'filebillingorder'))
		{
			$this->template->set_template('front1');
		}
		else
		{
			$this->template->set_template('front');
		}
		$this->template->write('title', 'Welcome to the Docufiler Billing !');
		$this->template->write_view('content','payment',$data);
		$this->template->render();	

	  }
	  //billing order
	  public function billingorder()
	  {
		  //die('here now............');
		  $name=$this->session->userdata('planname');
		  if($name=='')
			  //redirect("users/subscription");

			$data=array();
			$data['subscriptiondetails']=$this->users_model->subscriptionDetails();	
			$data['cardinfo']=$this->users_model->userCardList($this->session->userdata('userid'));				
			$this->template->set_template('front');
			$this->template->write('title', 'Welcome to the Docufiler Billing !');
			$this->template->write_view('content','billingorder',$data);
			$this->template->render();  
	  }
	  //billing order
	  public function filebillingorder()
	  {
		  $name=$this->session->userdata('planname');
		  if($name=='')
			  redirect("users/subscription");

			$data=array();
			$data['subscriptiondetails']=$this->users_model->subscriptionDetails();	
			$data['cardinfo']=$this->users_model->userCardList($this->session->userdata('userid'));				
			$this->template->set_template('front1');
			$this->template->write('title', 'Welcome to the Docufiler Billing !');
			$this->template->write_view('content','filebillingorder',$data);
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
	  public function filebillingaddress()
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
				//redirect to billing order page
				redirect('users/filebillingorder');
			}
			else
			{	//total files by user
		  		$data['totalfiles']=count($this->users_model->allUserFilesByUserId($this->session->userdata('userid')));		
				//get user details by id
		  		$data['carddetails']=$this->users_model->userCardList($this->session->userdata('userid'));
		  		//set data in session
				$this->template->set_template('front1');
				$this->template->write('title', 'Welcome to the Docufiler Admin Dashboard !');
				$this->template->write_view('content','filebillingaddress',$data);
				$this->template->render();
			}
	  
	  
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
			{	//total files by user
		  		$data['totalfiles']=count($this->users_model->allUserFilesByUserId($this->session->userdata('userid')));		
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
			$targetPath = "files_images/".$fileuniquename; 			// Target path where file is to be stored
			copy($sourcePath,$targetPath); 	
			// Moving Uploaded file
			$uniqfn=explode('.',$fileuniquename);
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
				//save data to server.
				$this->users_model->saveData('user_files', $data_to_store);
				
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
	  //delete file preview
	  public function deletefilepreview($id)
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

			redirect('users/previewfiles');
	  }
	  //delete files
	  public function deletefile($id)
	  {
		  	//check for user login
			$this->loginCheck();
			//get file details by id
			$filedetails=$this->users_model->getFile($id);
			$filename=$filedetails[0]['uniquename'];
			//remove file from preview folder
			$foldername='files_images/';
			unlink($foldername.$filename);
			//remove file from preview folder
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
	  //df
	  public function df()
	  { 
	  
			$file=FCPATH."downloaded/1462026746_IMG_2015.JPG"; //file location 
			if(file_exists($file)) {
			
			header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename='.basename($file));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();
            readfile($file);
            exit;
			}
			else {
				die('The provided file path is not valid.');
			}
	  }
	  
	  //download file
	  public function downloadfile($id)
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
			$filedetails=$this->users_model->getFile($id);	 
			$file=$filedetails[0]['location'];
			$filesize=$filedetails[0]['size'];
			$filename=$filedetails[0]['uniquename'];	
			$dfile=FCPATH."downloaded/".$filename;
			
			$findme='_';

			$pos = strpos($filename, $findme);

			$newstr=(substr($filename,$pos+1,strlen($filename)));
			
			$url=$s3->getObject($bucket, $filename,$dfile);
			if(file_exists($dfile)) {
				header('Content-Description: File Transfer');
				header('Content-Type: application/octet-stream');
				header('Content-Disposition: attachment; filename='.$newstr);
				header('Content-Transfer-Encoding: binary');
				header('Expires: 0');
				header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
				header('Pragma: public');
				header('Content-Length: ' . filesize($dfile));
				ob_clean();
				flush();
				readfile($dfile);
				exit;
			}
			else {
				die('The provided file path is not valid.');
			}
			
	  }
	  //preview files
	  public function previewfiles()
	  {
		  		//check for user login
				$this->loginCheck();
				//set data in session
				$data['userdetails']=$this->users_model->userDetailsById($this->session->userdata('userid'));
		  		
				//user files details
				$data['filedetails']=$this->users_model->userFilesByUserId($this->session->userdata('userid'));
				//template settings
				
				//total files by user
					$data['totalfiles']=$this->users_model->record_count_total_files($this->session->userdata('userid'));
				//total files
			
				
				$this->template->set_template('front');
				$this->template->write('title', 'Welcome to the Docufiler Admin Dashboard !');
				$this->template->write_view('content','previewfiles',$data);
				$this->template->render();
	  }
	  //
	  public function previewfilesdata($id)
	  {
		  $filedetails=$this->users_model->userFilesDataByUserId($this->session->userdata('userid'),$id);
		  if(count($filedetails)>0)
		  {
				$cnt=0;
				foreach($filedetails as $filedata)
				{
					
					$fn=explode('.',$filedata['uniquename']);
					
					$imgfn=$fn[0].'.jpg';
					
					
				?>
				<input type="hidden" class="pagenum" value="<?php echo $id;?>" />
                	<div id="<?php echo $filedata['id'];?>" class="col-lg-3 col-md-3 col-sm-6 col-xs-6 all-boxess zero-padding" draggable="true" ondragstart="drag(event)">
                        <div class="radius-box-innerpage text-center showhim">
                            <p class="box-inner"> <span class="move-icon"> < | << </span>   1/1   <span class="move-icon-two"> >> | > </span></p>   
                            
                            <img src="https://s3-us-west-2.amazonaws.com/docufilerpreviewimage/<?php echo $imgfn;?>" class="pdf img-responsive margin" style="width:816px;height:300px;">
                            <p class="box-inner font"><?php echo $filedata['name'];?></p>
                            <p class="date"><?php echo date('m/d/Y H:I',strtotime($filedata['created_date']));?></p>
							
							
							<div class="showme">
								<a href="javascript:void(0);" onclick="javascript:alert('pop');"><h5 class="head-text font-size"> 
								<span class="Download"><a href="#"><img src="<?php echo base_url();?>images/frontend/1st.png" class="iconss"></a></span>
								<span class="Download"><a href="#"><img src="<?php echo base_url();?>images/frontend/2nd.png" class="iconss"></a></span>
								<span class="Download"><a href="#"><img src="<?php echo base_url();?>images/frontend/3rd.png" class="iconss"></a></span>
								<span class="Download"><a href="<?php echo base_url();?>users/deletefilepreview/<?php echo $filedata['id'];?>"><img src="<?php echo base_url();?>images/frontend/4rth.png" class="iconss"></a></span>
								<span class="Download"><a href="<?php echo base_url();?>users/downloadfile/<?php echo $filedata['id'];?>"><img src="<?php echo base_url();?>images/frontend/5th.png" class="iconss"></a></span></h5></a>
							</div>
							
						
						
						</div>
                    </div>
  <?php
				$cnt++;
				if($cnt%4==0)
				{
					
				}
				}					
		  }		
	  }
	  //user list files
	  public function listfiles()
	  {
			//check for user login
			$this->loginCheck();
			//check for user login end here	
			$filename='';
			if(isset($_REQUEST['searchfile']))
				$filename=$_REQUEST['searchfile'];

			//setting for pagination
			$config = array();
			$config["base_url"] = base_url() . "users/listfiles";
			$config["total_rows"] = $this->users_model->record_count_total_files($this->session->userdata('userid'),$filename);
			$config["per_page"] = 10;
			$config["uri_segment"] = 3;
			//pagination initialization
			$this->pagination->initialize($config);
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			//get user details by id
			$data['userdetails']=$this->users_model->userAllFiles($this->session->userdata('userid'),$config["per_page"], $page,$filename);
			$data["links"] = $this->pagination->create_links();
			
			//total files by user
			$data['totalfiles']=$this->users_model->record_count_total_files($this->session->userdata('userid'));
				
			//set data in session
			$this->template->set_template('front');
			$this->template->write('title', 'Welcome to the Docufiler Admin Dashboard !');
			$this->template->write_view('content','listfiles',$data);
			$this->template->render();
			
	  }
	  //file upload 
	  public function uploadfiles()
	  {
		  	//check for user login
			$this->loginCheck();
			//get user details by id
		  	$data['userdetails']=$this->users_model->userDetailsById($this->session->userdata('userid'));
		  	//get total files from session
			$totalfiles=count($this->users_model->allUserFilesByUserId($this->session->userdata('userid')));		
			//check for payment details
			$payment=$this->users_model->paymentDetailsById($this->session->userdata('userid'));
			$totalfiles=55;
			$data['totalfiles']=$totalfiles;
			if($totalfiles>50)
			{
				
					if(count($payment)>0)
					{
						//paid user
						//set template
						$this->template->set_template('front');
						$this->template->write('title', 'Welcome to the Docufiler Admin Dashboard !');
						$this->template->write_view('content','uploadfiles',$data);
						$this->template->render();
					}
					else
					{
						//free user
						//set template
						$this->template->set_template('front');
						$this->template->write('title', 'Welcome to the Docufiler Admin Dashboard !');
						$this->template->write_view('content','warninguploadfiles',$data);
						$this->template->render();	
					}
			}
			else
			{
				//set template
				$this->template->set_template('front');
				$this->template->write('title', 'Welcome to the Docufiler Admin Dashboard !');
				$this->template->write_view('content','uploadfiles',$data);
				$this->template->render();	
			}	

	  }

	  //cardinfo from file
	  public function filecardinfo($id='')
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
					'cardholderfname' => $this->input->post('fname'),
					'cardholderlname' => $this->input->post('lname'),
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

				redirect('users/filebillingaddress');
			}
			else
			{
				//card details by id
				if($id!='')
					$data['carddetails']=$this->users_model->cardDetailsById($id);
		  		//total files by user
				 $data['totalfiles']=$this->users_model->record_count_total_files($this->session->userdata('userid'));
				//set data in session
				$this->template->set_template('front1');
				$this->template->write('title', 'Welcome to the Docufiler Admin Dashboard !');
				$this->template->write_view('content','filecardinfo',$data);
				$this->template->render();
			}
	  
	    
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
					'cardholderfname' => $this->input->post('fname'),
					'cardholderlname' => $this->input->post('lname'),
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
		  		//total files by user
				 $data['totalfiles']=$this->users_model->record_count_total_files($this->session->userdata('userid'));
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
				if($this->session->userdata('userid')=='')
					redirect('users/login');
				
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
					
					
					//total files by user
					$data['totalfiles']=$this->users_model->record_count_total_files($this->session->userdata('userid'));
					//total files
					$this->session->set_userdata('totalfiles', $data['totalfiles']);
					//set template
					$this->template->set_template('front');
					$this->template->write('title', 'Welcome to the Docufiler Admin Dashboard !');
					$this->template->write_view('content', 'dashboard',$data);
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
