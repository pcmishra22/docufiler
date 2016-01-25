<!DOCTYPE html>
<html>
<head>
	<title>Docufilier</title>
		<meta charset="utf-8">
		<link href="<?php echo base_url();?>css/style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> 
		addEventListener("load", function() 
		{ setTimeout(hideURLbar, 0); }, false); 
		function hideURLbar(){ window.scrollTo(0,1); } 
        </script>
		<!--webfonts-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,300,600,700' rel='stylesheet' type='text/css'>
		<!--//webfonts-->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>js/frontend/jquery.validate.min.js"></script>
        <style>
		#login label.error {
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
            $("#login").validate({
                rules: {
                    username: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
					 captcha: {
                        required: true,
                        minlength: 8
                    }
                },
                messages: {
					username: "Please enter a valid email address",
                    password: {
                        required: "Please provide password",
                        minlength: "Your password must be at least 5 characters long"
                    },
					 captcha: {
                        required: "Please provide captcha",
                        minlength: "Your captcha must be at least 8 characters long"
                    }
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
			<h1>Member Login</h1>
					<div class="head">
						<img src="<?php echo base_url();?>images/frontend/user.png" alt=""/>
					</div>
                   <?php
					    if($this->session->flashdata('flash_message') == 'invaliduser')
        				{
							echo '<div  style="color:red;" align="center" class="alert alert-danger"><strong>Email or Password mismatch !</strong></div>';
						}
                         if($this->session->flashdata('flash_message') == 'changedpassword')
        				{
							echo '<div  style="color:red;" align="center" class="alert alert-danger"><strong>Password changed successfully !</strong></div>';
						}
					   ?>
				<form action="<?php echo base_url()?>users/dashboard" method="post" name="login" id="login">
						<input type="text" class="input" placeholder="Enter your username" name="username" id="username">
						<input type="password" class="input" placeholder="Enter your password" name="password" id="password"> 
                        
                        
                        <div class="captche">
                            <?php echo $captcha['image']; ?>
                            <div class="type-box">
                            	<p class="information-text">you can type the words here:</p>
                                <input type="text" name="captcha" id="captcha" class="text-box">
                            </div>

                            <!--<div class="image-recaptche">
                            	<img src="Images/re-captche.png">
                            </div>-->
                            <div style="clear:both;"></div>
                        </div>
                       
                       <?php
						if($this->session->flashdata('flash_message') == 'mismatch')
        				{
							echo '<label for="captcha" generated="true" class="error">Captcha Mismatch !</label>';
						}
					   ?>



						<div class="submit">
							<input type="submit" class="submitt" name="submit" id="submit" value="LOGIN" >
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