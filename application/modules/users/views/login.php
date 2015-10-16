<!DOCTYPE html>
<html>
<head>
	<title>Docufilier</title>
		<meta charset="utf-8">
		<link href="<?php echo base_url();?>css/style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!--webfonts-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,300,600,700' rel='stylesheet' type='text/css'>
		<!--//webfonts-->
</head>
<body class="color-login">
	 <!-----start-main---->
	 <div class="main">
		<div class="login-form">
			<h1>Member Login</h1>
					<div class="head">
						<img src="<?php echo base_url();?>images/frontend/user.png" alt=""/>
					</div>
				<form>
						<input type="text" class="input" value="USERNAME" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'USERNAME';}" >
						<input type="password" value="Password" class="input" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}">
						<div class="submit">
							<input type="submit" class="submitt" onclick="myFunction()" value="LOGIN" >
					</div>	
					<p><a href="<?php echo base_url();?>users/forgetpassword">Forgot Password ?</a></p>
                    
                    <p><a href="<?php echo base_url();?>users/signup">Sign UP</a></p>
				</form>
			</div>
			<!--//End-login-form-->
			 <!-----start-copyright---->
   					<div class="copy-right">
						<p>Files save in <a href="<?php echo base_url();?>">DOCUFILER</a></p> 
					</div>
				<!-----//end-copyright---->
		</div>
			 <!-----//end-main---->
		 		
</body>
</html>