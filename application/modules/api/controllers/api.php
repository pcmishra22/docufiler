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
	 //get aws credential
	 function getCredential()
	 {
		//get accesskey from database
		$appdetails=$this->users_model->getSettings();
		//result array to return
		$result = array(
			'awsAccessKey' => $appdetails[0]['awsAccessKey'],
			'awsSecretKey' => $appdetails[0]['awsSecretKey']
		);
		//print json 
		print_r(json_encode($result));	
	 }
	 //save data
	 function saveData()
	 {
		//$alldata=$this->input->post('alldata'); 
			
			$alldata='[{"setName":"test2.png",
			"uniqueFileName":"00022222_test2.png",
			"setExtencion":".png",
			"ownSize":10878,
			"ownFileCreated":"7/4/2016 9:47:00 PM",
			"ownFolder":"D:/docufiler/new",
			"ownFileUpdate":"7/4/2016 9:46:44 PM",
			"ownComputerName":"DESKTOP-TOF0IA4",
			"ownIpAddress":"192.168.1.107",
			"ownUserid":2,
			"ownDeviceDetails":"mobile samsung",
			"ownLocation":"mobile location"}]';	
			
			//convert json data to array
			$datatoarray=json_decode($alldata,true); 
		
			//set variables to save in database
			$fn=$datatoarray[0]['setName'];
			$fileuniquename=$datatoarray[0]['uniqueFileName'];
			$fcdt=$datatoarray[0]['ownFileCreated'];
			$fldt=$datatoarray[0]['ownFileUpdate'];
			$filesize=$datatoarray[0]['ownSize'];
			$hostname=$datatoarray[0]['ownComputerName'];
			$filetype=$datatoarray[0]['setExtencion'];
			$userid=$datatoarray[0]['ownUserid'];
			$folder=$datatoarray[0]['ownFolder'];
			$devicedetails=$datatoarray[0]['ownDeviceDetails'];
			$location=$datatoarray[0]['ownLocation'];			
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
				//message
				print_r(json_encode($this->message('File Saved.')));
		
	 }
	 //fileUpload api/api_model
	 function fileUploadToS3()
	 {
		 
			$alldata='[{"setName":"files.txt","setExtencion":".txt","ownSize":369,
			"ownFileCreated":"6/22/2016 9:15:49 PM",
			"ownFileUpdate":"5/20/2016 2:46:51 PM",
			"ownComputerName":"DESKTOP-TOF0IA4",
			"ownIpAddress":"192.168.1.107",
			"ownBytes":[97,112,112,108,105,99,97,116,105,111,110,32,47,32,99,111,110,102,105,103,47,32,99,111,110,102,105,103,46,112,104,112,13,10,97,112,112,108,105,99,97,116,105,111,110,32,47,99,111,110,116,114,111,108,108,101,114,47,97,100,109,105,110,99,111,110,116,114,111,108,108,101,114,46,112,104,112,13,10,97,112,112,108,105,99,97,116,105,111,110,47,104,101,108,112,101,114,47,99,111,109,109,111,110,95,104,101,108,112,101,114,46,112,104,112,13,10,97,112,112,108,105,99,97,116,105,111,110,47,109,111,100,101,108,47,97,100,109,105,110,95,109,111,100,101,108,46,112,104,112,13,10,13,10,118,105,101,119,47,99,111,114,101,47,118,105,101,119,115,112,101,99,105,102,105,99,117,115,101,114,99,111,110,116,101,110,116,46,112,104,112,13,10,118,105,101,119,117,115,101,114,115,99,111,110,116,101,110,116,46,112,104,112,13,10,101,100,105,116,117,115,101,114,99,111,110,116,101,110,116,46,112,104,112,13,10,97,100,100,117,115,101,114,99,111,110,116,101,110,116,46,112,104,112,13,10,108,105,115,116,112,101,114,109,105,115,115,105,111,110,99,111,110,116,101,110,116,46,112,104,112,13,10,108,105,115,116,112,101,114,109,105,115,115,105,111,110,46,112,104,112,13,10,97,100,100,112,101,114,109,105,115,115,105,111,110,99,111,110,116,101,110,116,46,112,104,112,13,10,97,100,100,112,101,114,109,105,115,115,105,111,110,46,112,104,112,13,10,109,101,110,117,47,108,101,102,116,109,101,110,117,46,112,104,112,13,10,13,10],
			"ownBytestring":"YXBwbGljYXRpb24gLyBjb25maWcvIGNvbmZpZy5waHANCmFwcGxpY2F0aW9uIC9jb250cm9sbGVy\r\nL2FkbWluY29udHJvbGxlci5waHANCmFwcGxpY2F0aW9uL2hlbHBlci9jb21tb25faGVscGVyLnBo\r\ncA0KYXBwbGljYXRpb24vbW9kZWwvYWRtaW5fbW9kZWwucGhwDQoNCnZpZXcvY29yZS92aWV3c3Bl\r\nY2lmaWN1c2VyY29udGVudC5waHANCnZpZXd1c2Vyc2NvbnRlbnQucGhwDQplZGl0dXNlcmNvbnRl\r\nbnQucGhwDQphZGR1c2VyY29udGVudC5waHANCmxpc3RwZXJtaXNzaW9uY29udGVudC5waHANCmxp\r\nc3RwZXJtaXNzaW9uLnBocA0KYWRkcGVybWlzc2lvbmNvbnRlbnQucGhwDQphZGRwZXJtaXNzaW9u\r\nLnBocA0KbWVudS9sZWZ0bWVudS5waHANCg0K"}]';	
			
			//$alldata=$this->input->post('alldata'); 
			
			$alldata='[{"setName":"test2.png","setExtencion":".png","ownSize":10878,
			"ownFileCreated":"7/4/2016 9:47:00 PM",
			"ownFolder":"D:\\docufiler\\new",
			"ownFileUpdate":"7/4/2016 9:46:44 PM",
			"ownComputerName":"DESKTOP-TOF0IA4",
			"ownIpAddress":"192.168.1.107",
			"ownBytes":[117,94,173,108,220,242,35,252,138,50,226,163,21,182,121,87,234,245,248,14,118,153,35,203,102,245,107,167,141,223,35,102,17,25,80,139,41,108,87,69,218,178,1,128,76,35,126,213,249,32,155,213,151,141,155,23,108,102,187,79,206,223,230,91,191,232,48,5,245,169,206,170,68,235,196,218,65,244,56,106,242,41,42,205,48,232,198,162,78,8,225,129,236,35,126,213,249,8,43,233,203,198,185,165,221,102,239,46,232,127,198,224,139,138,37,75,76,193,85,167,69,121,245,225,47,179,42,209,58,19,54,71,124,217,157,13,139,170,125,10,111,75,98,219,205,133,16,30,104,44,18,81,157,235,203,198,221,66,42,251,145,10,41,186,55,157,216,167,116,203,172,174,246,74,186,127,71,115,114,188,179,208,59,119,222,36,154,207,228,38,13,190,31,158,88,243,57,11,162,171,33,132,7,26,10,168,206,179,1,8,225,129,198,2,170,243,12,0,66,120,160,225,128,66,12,0,128,112,64,33,6,0,64,56,224,83,0,0,16,14,248,20,0,0,132,35,17,213,121,116,57,118,21,85,199,161,58,245,151,9,49,56,0,120,145,88,172,243,200,50,77,127,69,170,211,144,73,48,5,196,224,0,224,69,82,170,243,186,49,69,18,128,24,28,0,124,72,68,117,206,194,228,216,99,212,151,163,220,147,151,178,238,59,84,33,238,9,158,46,85,100,169,78,11,227,247,135,120,33,16,131,3,64,181,72,42,214,185,42,134,160,47,218,160,172,37,23,33,74,39,148,171,15,141,138,44,41,122,159,43,117,53,215,16,166,192,20,98,112,0,208,68,82,177,206,125,6,76,70,48,30,124,127,78,86,136,50,133,238,91,147,41,212,21,137,2,144,134,125,134,11,0,50,138,164,98,157,215,204,20,42,221,119,236,76,17,139,79,1,49,56,208,34,72,42,214,185,222,162,224,51,66,75,174,214,125,251,20,226,246,245,186,171,143,68,124,10,136,193,129,22,65,252,170,115,165,108,92,138,117,206,252,26,115,255,142,166,171,251,62,77,41,196,157,47,80,132,87,228,249,142,94,188,159,246,135,24,28,104,13,64,117,30,9,16,131,3,45,2,168,206,107,7,196,224,64,235,0,10,49,0,0,194,1,133,24,0,0,225,128,79,1,0,64,56,224,83,0,0,16,14,248,20,0,0,132,3,62,5,0,0,225,128,79,1,0,64,56,224,83,0,0,16,14,248,20,0,0,132,3,62,5,0,0,225,128,79,1,0,64,56,224,83,0,0,16,14,248,20,0,0,132,3,62,5,0,0,225,128,79,1,0,64,56,192,20,0,0,132,3,171,15,0,0,194,1,159,2,0,128,112,192,167,0,0,32,28,177,249,20,229,245,47,223,186,176,102,209,202,193,249,98,36,49,42,49,94,148,203,235,75,239,92,176,191,216,125,180,127,217,183,175,58,245,238,105,63,176,114,241,27,118,189,247,142,95,47,62,111,254,200,9,137,245,65,185,252,194,236,71,91,115,73,118,2,0,36,141,216,124,138,7,47,95,190,205,134,44,67,13,78,12,133,101,252,115,71,180,76,186,252,194,241,27,251,38,150,111,60,56,207,207,80,30,166,168,182,216,154,33,215,2,166,0,154,0,241,248,20,220,24,246,117,244,111,92,224,9,14,78,36,234,149,86,133,73,27,100,52,179,230,72,215,174,55,226,45,54,66,87,128,41,128,38,68,60,62,133,57,177,111,61,231,51,87,95,162,53,207,91,209,253,124,203,4,43,209,90,23,152,150,191,103,181,80,204,100,167,130,107,164,43,223,202,115,107,84,45,52,8,27,150,106,167,239,142,155,122,199,209,213,179,188,58,183,241,110,69,193,141,207,141,239,48,153,226,0,43,30,122,94,204,14,0,25,194,255,7,77,244,207,54,118,30,155,133,0,0,0,0,73,69,78,68,174,66,96,130],
			"ownBytestring":"dV6tbNzyI/yKMuKjFbZ5V+r1+A52mSPLZvVrp43fI2YRGVCLKWxXRdqyAYBMI37V+SCb1ZeNmxds\r\nZrtPzt/mW7/oMAX1qc6qROvE2kH0OGryKSrNMOjGok4I4YHsI37V+Qgr6cvGuaXdZu8u6H/G4IuK\r\nJUtMwVWnRXn14S+zKtE6EzZHfNmdDYuqfQpvS2LbzYUQHmgsElGd68vG3UIq+5EKKbo3ndindMus\r\nrvZKun9Hc3K8s9A7d94kms/kJg2+H55Y8zkLoqshhAcaCqjOswEI4YHGAqrzDABCeKDhgEIMAIBw\r\nQCEGAEA44FMAABAO+BQAAIQjEdV5dDl2FVXHoTr1lwkxOAB4kVis88gyTX9FqtOQSTAFxOAA4EVS\r\nqvO6MUUSgBgcAHxIRHXOwuTYY9SXo9yTl7LuO1Qh7gmeLlVkqU4L4/eHeCEQgwNAtUgq1rkqhqAv\r\n2qCsJRchSieUqw+Niiwpep8rdTXXEKbAFGJwANBEUrHOfQZMRjAefH9OVogyhe5bkynUFYkCkIZ9\r\nhgsAMoqkYp3XzBQq3XfsTBGLTwExONAiSCrWud6i4DNCS67WffsU4vb1uquPRHwKiMGBFkH8qnOl\r\nbFyKdc78GnP/jqar+z5NKcSdL1CEV+T5jl68n/aHGBxoDUB1HgkQgwMtAqjOawfE4EDrAAoxAADC\r\nAYUYAADhgE8BAEA44FMAABAO+BQAAIQDPgUAAOGATwEAQDjgUwAAEA74FAAAhAM+BQAA4YBPAQBA\r\nOOBTAAAQDvgUAACEAz4FAADhgE8BAEA4wBQAAIQDqw8AAMIBnwIAgHDApwAAIByx+RTl9S/furBm\r\n0crB+WIkMSoxXpTL60vvXLC/2H20f9m3rzr17mk/sHLxG3a9945fLz5v/sgJifVBufzC7Edbc0l2\r\nAgAkjdh8igcvX77NhixDDU4MhWX8c0e0TLr8wvEb+yaWbzw4z89QHqaottiaIdcCpgCaAPH4FNwY\r\n9nX0b1zgCQ5OJOqVVoVJG2Q0s+ZI16434i02QleAKYAmRDw+hTmxbz3nM1dfojXPW9H9fMsEK9Fa\r\nF5iWv2e1UMxkp4JrpCvfynNrVC00CBuWaqfvjpt6x9HVs7w6t/FuRcGNz43vMJniACseel7MDgAZ\r\nwv8HTfTPNnYem4UAAAAASUVORK5CYII="}]';	
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
				 $filepath.$fileuniquename;
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