<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends MX_Controller{
	
	  //constructor call	
	  function __construct()
	  {
        parent::__construct();
		session_start();
		$this->load->model('api/api_model');
		$this->load->model('users/users_model');
	  }
	 //Default access stopped...........
	 public function index($msg = NULL)
	 {
     	 die('STOP HERE :)');
     }
	 //error message 
	 public function message($message)
	 {
		 $arr = array('message' => $message);
		 return $arr;
	 }
	 //fileUpload api/api_model
	 function fileUploadToS3()
	 {
		 
			$alldata='[{"setName":"files.txt","setExtencion":".txt","ownSize":369,
			"ownFileCreated":"6/22/2016 9:15:49 PM",
			"ownFileUpdate":"5/20/2016 2:46:51 PM",
			"ownComputerName":"DESKTOP-TOF0IA4",
			"ownIpAddress":"192.168.1.107",
			"ownBytes":[97,112,112,108,105,99,97,116,105,111,110,32,47,32,99,111,110,102,105,103,47,32,99,111,110,102,105,103,46,112,104,112,13,10,97,112,112,108,105,99,97,116,105,111,110,32,47,99,111,110,116,114,111,108,108,101,114,47,97,100,109,105,110,99,111,110,116,114,111,108,108,101,114,46,112,104,112,13,10,97,112,112,108,105,99,97,116,105,111,110,47,104,101,108,112,101,114,47,99,111,109,109,111,110,95,104,101,108,112,101,114,46,112,104,112,13,10,97,112,112,108,105,99,97,116,105,111,110,47,109,111,100,101,108,47,97,100,109,105,110,95,109,111,100,101,108,46,112,104,112,13,10,13,10,118,105,101,119,47,99,111,114,101,47,118,105,101,119,115,112,101,99,105,102,105,99,117,115,101,114,99,111,110,116,101,110,116,46,112,104,112,13,10,118,105,101,119,117,115,101,114,115,99,111,110,116,101,110,116,46,112,104,112,13,10,101,100,105,116,117,115,101,114,99,111,110,116,101,110,116,46,112,104,112,13,10,97,100,100,117,115,101,114,99,111,110,116,101,110,116,46,112,104,112,13,10,108,105,115,116,112,101,114,109,105,115,115,105,111,110,99,111,110,116,101,110,116,46,112,104,112,13,10,108,105,115,116,112,101,114,109,105,115,115,105,111,110,46,112,104,112,13,10,97,100,100,112,101,114,109,105,115,115,105,111,110,99,111,110,116,101,110,116,46,112,104,112,13,10,97,100,100,112,101,114,109,105,115,115,105,111,110,46,112,104,112,13,10,109,101,110,117,47,108,101,102,116,109,101,110,117,46,112,104,112,13,10,13,10],"ownBytestring":"YXBwbGljYXRpb24gLyBjb25maWcvIGNvbmZpZy5waHANCmFwcGxpY2F0aW9uIC9jb250cm9sbGVy\r\nL2FkbWluY29udHJvbGxlci5waHANCmFwcGxpY2F0aW9uL2hlbHBlci9jb21tb25faGVscGVyLnBo\r\ncA0KYXBwbGljYXRpb24vbW9kZWwvYWRtaW5fbW9kZWwucGhwDQoNCnZpZXcvY29yZS92aWV3c3Bl\r\nY2lmaWN1c2VyY29udGVudC5waHANCnZpZXd1c2Vyc2NvbnRlbnQucGhwDQplZGl0dXNlcmNvbnRl\r\nbnQucGhwDQphZGR1c2VyY29udGVudC5waHANCmxpc3RwZXJtaXNzaW9uY29udGVudC5waHANCmxp\r\nc3RwZXJtaXNzaW9uLnBocA0KYWRkcGVybWlzc2lvbmNvbnRlbnQucGhwDQphZGRwZXJtaXNzaW9u\r\nLnBocA0KbWVudS9sZWZ0bWVudS5waHANCg0K"}]';	
			
			//$alldata=$this->input->post('alldata'); 
			
			
			//convert json data to array
			$datatoarray=json_decode($alldata,true);
			//set variables to save in database
			$fn=$datatoarray[0]['setName'];
			$data=$datatoarray[0]['ownBytestring'];
			$fcdt=$datatoarray[0]['ownFileCreated'];
			$fldt=$datatoarray[0]['ownFileUpdate'];
			$filesize=$datatoarray[0]['ownSize'];
			$hostname=$datatoarray[0]['ownComputerName'];
			$filetype=$datatoarray[0]['setExtencion'];
			//need to add these 4 variables
			$userid='';
			$folder='';
			$devicedetails='';
			$location='';
			
			//set file path
			$filepath=FCPATH."/files_images/";
			$fileuniquename=time().'_'.$fn;
			//check data
			if($fn!='' && $data!='')
			{
				$fp = fopen($filepath.$fileuniquename, 'wb+');
				file_put_contents($filepath.$fileuniquename,base64_decode($data));
				fclose($fp);
				
				//save data to table
				$data_to_store=array(
					'userid' => $userid,
					'name' => $fn,
					'uniquename' => $fileuniquename,
					'folder' => $folder,
					'device' => $hostname,
					'devicedetails' => $devicedetails,
					'filetype' =>$filetype,
					'location' => $location,
					'file_created_date' => $fcdt,
					'file_last_modified_date' => $fldt,
					'size' => $filesize,
					'created_date' => date("Y-m-d H:i:s")	
				);
					//save data to server.
				$this->users_model->saveData('user_files', $data_to_store);
			}
		// Bucket Name
		$bucket="docufiler";
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
		
		$sourcePathname=$filepath.$fileuniquename;
		
		if($s3->putObjectFile1($sourcePathname, $bucket , $fileuniquename, S3::ACL_PUBLIC_READ) )
		{
				print_r(json_encode($this->message('File Uploaded on Bucket s3.')));
		}
		else
		{
				print_r(json_encode($this->message('File not uploaded on Bucket S3.')));
		}	
				
	 }
	  //get account information
	  function getAccount()
	  {
		//input user and password
		$username=$this->input->post('username'); 
		$password=$this->input->post('password'); 	
		//check for user and password exist
		if($username=='' || $password=='')
		{
			print_r(json_encode($this->message('Enter user and password.')));
		}
		else
		{
			$result=$this->users_model->checkUser($username,$password);
			//check result
			if(count($result)>0)
			{
				//total files
				$totalfiles=$this->users_model->record_count_total_files($result[0]['id']);
				//total processing files
				$nooffilesprocessing=$this->users_model->record_count_total_files_processing($result[0]['id']);
				//added in array
				$result[0]['nooffiles']=$totalfiles;
				$result[0]['nooffilesprocessing']=$nooffilesprocessing;				
				//return json value
				print_r(json_encode($result));	
			}
			else
			{
				print_r(json_encode($this->message('User not exist.')));
			}
			
		}
		
		
	  }
	  
}  