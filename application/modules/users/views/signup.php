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
			<h1>Sign Up</h1>
					<div class="head sign-up">
						<img src="<?php echo base_url();?>images/frontend/sihnin.png" alt=""/>
					</div>
				<form>
						<input type="text"  placeholder="USERNAME" class="input"  >
                        <input type="text"  placeholder="E-MAIL ID" class="input" >
						<input type="password" placeholder="New Password" class="input" >
                        <input type="password" placeholder="Confirm Password" class="input" >
                       
						<div class="submit">
							<input type="submit" class="submitt" onclick="myFunction()" value="SIGN UP" >
					</div>	
					<p><a href="<?php echo base_url();?>users/forgetpassword">Forgot Password ?</a></p>
                    
                    <p><a href="<?php echo base_url();?>users/login">Login</a></p>
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