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

                    email: {
                        required: true,
                        email: true
                    }

                },
                messages: {
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
			<h1>Forget Password</h1>
            
					<div class="head sign-up">
						<img src="<?php echo base_url();?>images/frontend/sihnin.png" alt=""/>
					</div>
                     <?php
					    if($this->session->flashdata('flash_message') == 'emailsent')
        				{
							echo '<div  style="color:red;" align="center" class="alert alert-danger"><strong>Please check your email, Click the link to reset your password</strong></div>';
						}
						if($this->session->flashdata('flash_message') == 'emailnotexists')
        				{
							echo '<div  style="color:red;" align="center" class="alert alert-danger"><strong>Email not exist !</strong></div>';
						}
					   ?>
				<form action="" method="post" id="register-form" novalidate>
						
                        <input type="text"  placeholder="Enter your email" class="input" name="email" id="email">
						<div class="submit">
                        
							<input type="submit" class="submitt" name="submit" id="submit" value="Submit" >
					</div>	
					
                    
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