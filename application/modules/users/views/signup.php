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
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>js/frontend/jquery.validate.min.js"></script>
        <style>
		#register-form label.error {
		color: #FB3A3A;
		display: inline-block;
		margin: 0px 0px 10px;
		padding: 0px;
		text-align: left;
		width: 330px;
		}
		</style>
        <script type="text/javascript">
/**
  * Basic jQuery Validation Form Demo Code
  * Copyright Sam Deering 2012
  * Licence: http://www.jquery4u.com/license/
  */
(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#register-form").validate({
                rules: {
                    firstname: "required",
                    lastname: "required",
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
					 conpass: {
                        required: true,
                        minlength: 5,
						equalTo: "#password"
                    }
                },
                messages: {
                    firstname: "Please enter your firstname",
                    lastname: "Please enter your lastname",
                    password: {
                        required: "Please provide password",
                        minlength: "Your password must be at least 5 characters long"
                    },
					conpass: {
                        required: "Please provide confirmed password",
                        minlength: "Your password must be at least 5 characters long",
						equalTo: "Password and confirmed password should be same"
                    },
                    email: "Please enter a valid email address"
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);
</script>
</head>

<body class="color-login">
	 <!-----start-main---->
	 <div class="main">
		<div class="login-form">
			<h1>Sign Up</h1>
            
					<div class="head sign-up">
						<img src="<?php echo base_url();?>images/frontend/sihnin.png" alt=""/>
					</div>
                     <?php
					    if($this->session->flashdata('flash_message') == 'emailexists')
        				{
							echo '<div  style="color:red;" align="center" class="alert alert-danger"><strong>Email already exist !</strong></div>';
						}
					   ?>
				<form action="" method="post" id="register-form" novalidate>
						<input type="text"  placeholder="Enter your firstname" name="firstname" id="firstname" class="input"  >
                        <input type="text"  placeholder="Enter your lastname" name="lastname" id="lastname" class="input"  >
                        <input type="text"  placeholder="Enter your email" class="input" name="email" id="email">
						<input type="password" placeholder="Enter your password" class="input" name="password" id="password">
                        <input type="password" placeholder="Enter Confirmed Password" class="input" name="conpass" id="conpass">
                       
						<div class="submit">
                        
							<input type="submit" class="submitt" name="submit" id="submit" value="SIGN UP" >
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