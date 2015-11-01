<?php 
$servername = "localhost";
$username = "inreturnuser";
$password = "nCWJGPHP7D4fh5V5";

// Create connection
$conn = mysql_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$db=mysql_select_db('inreturn_db',$conn);
$sql = "SELECT initiator_id,count(*) as totalmessage FROM `in_messages` WHERE `firstread` = '0'";
$query = mysql_query($sql);
while($result = mysql_fetch_assoc($query)){
	//echo count($result);exit;
$userId = $result['initiator_id'];
$message = $result['totalmessage'];
$sql2 = "SELECT * FROM `in_user` WHERE `id` = '$userId' and is_active=1";
$query2 = mysql_query($sql2);
$result2 = mysql_fetch_assoc($query2);
$url_logo="http://198.58.115.76/images/icon/logo.png";
$url_login="http://198.58.115.76/user/login";
if($result2){ 

$body='';
	   $body.='<html><body><table width="700" border="0" cellpadding="7" cellspacing="7" bgcolor="#E6F0EF" align="center" style="font-family:arial;font-size:14px; font-weight:normal;">
  <tr><td align="left" bgcolor="#BAA786"><a href=""><img title="" alt="" src="'.$url_logo.'"></a></td>
  </tr>
  <tr>
    <td align="left">Hi '.$result2['name'].'</td>
  </tr>
  <tr>
    <td align="left">Email: '.$result2['email'].'</td>
  </tr>
  <tr>
    <td align="left">You Have '.$message.' unread messages in. Please click<a style="text-decoration:none;font-weight:bold;font-family:sans-serif;" href="'.$url_login.'"> here</a> to login</td>
  </tr>
  <tr>
    <td align="left"></td>
  </tr>
  <tr>
    <td align="left">Thanks,<br/> The Inreturn Team.</td>
  </tr>
</table>
</body>
</html>';

//$admin=$this->config->item('adminEmail');
                 $from="no-reply@inreturnstrategies.com";
                
			    //$body = $this->renderPartial('/mails/registration_email', array('userfullname' => $userfullname,'url'=>$url), true);
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .= "From: ".$from."\r\nReply-To: ".$from; 
				$subject = "You have unread messages";  
				if(mail("testingbusiness1@gmail.com",$subject,$body,$headers)){
						echo "email send";             
				}else{
					echo "email  not send ";
				}
				}
}

?>
