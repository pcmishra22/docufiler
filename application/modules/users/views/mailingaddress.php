<?php
if(!empty($userdetails[0]))
{
	$address=$userdetails[0]['address'];
	$city=$userdetails[0]['city'];
	$state=$userdetails[0]['state'];
	$zip=$userdetails[0]['zip'];
}
else
{
	$address='';
	$city='';
	$state='';
	$zip='';
}
?>
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
                    }
                },
                messages: {
                    firstname: "Please enter your firstname",
                    lastname: "Please enter your lastname",
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
<!--start of middle section-->
<div class="middle">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 zero-padding">
    	<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 zero-padding grey">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 right-box zero-padding">
        	<ul class="nav nav-list-main">
      <li class=""><label class="nav-toggle nav-header top-header"><span class="nav-toggle-icon glyphicon glyphicon-chevron-right"></span> Folder 1</label>
            <ul class="nav nav-list nav-left-ml">
                <li><a  class="color" href="#">Link</a></li>
                <li><a  class="color" href="#">Link</a></li>
                <li><label class="nav-toggle nav-header top-header"><span class="nav-toggle-icon glyphicon glyphicon-chevron-right"></span> Folder1.1</label>
                    <ul class="nav nav-list nav-left-ml">
                        <li><a class="color" href="#">Link</a></li>
                        <li><a class="color" href="#">Link</a></li>
                        <li><label class="nav-toggle nav-header top-header"><span class="nav-toggle-icon glyphicon glyphicon-chevron-right"></span> Folder 1.1.1</label>
                            <ul class="nav nav-list nav-left-ml">
                                <li><a class="color" href="#">Link</a></li>
                                <li><a class="color" href="#">Link</a></li>
                            </ul><!--nav-left-ml-->
                        </li><!--li blank-->
                    </ul><!--nav-left-ml-->
                </li><!--li blank-->
            </ul><!--nav-left-ml-->
        </li><!--li class-""-->
        
        
    </ul><!--nav-list-main-->
        </div>
        
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 right-box zero-padding">
        	<ul class="nav nav-list-main">
      <li class=""><label class="nav-toggle nav-header top-header"><span class="nav-toggle-icon glyphicon glyphicon-chevron-right"></span> Folder 1</label>
            <ul class="nav nav-list nav-left-ml">
                <li><a  class="color" href="#">Link</a></li>
                <li><a  class="color" href="#">Link</a></li>
                <li><label class="nav-toggle nav-header top-header"><span class="nav-toggle-icon glyphicon glyphicon-chevron-right"></span> Folder1.1</label>
                    <ul class="nav nav-list nav-left-ml">
                        <li><a class="color" href="#">Link</a></li>
                        <li><a class="color" href="#">Link</a></li>
                        <li><label class="nav-toggle nav-header top-header"><span class="nav-toggle-icon glyphicon glyphicon-chevron-right"></span> Folder 1.1.1</label>
                            <ul class="nav nav-list nav-left-ml">
                                <li><a class="color" href="#">Link</a></li>
                                <li><a class="color" href="#">Link</a></li>
                            </ul><!--nav-left-ml-->
                        </li><!--li blank-->
                    </ul><!--nav-left-ml-->
                </li><!--li blank-->
            </ul><!--nav-left-ml-->
        </li><!--li class-""-->
        
        
    </ul><!--nav-list-main-->
        </div>
        
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 right-box zero-padding">
        	<ul class="nav nav-list-main">
      <li class=""><label class="nav-toggle nav-header top-header"><span class="nav-toggle-icon glyphicon glyphicon-chevron-right"></span> Folder 1</label>
            <ul class="nav nav-list nav-left-ml">
                <li><a  class="color" href="#">Link</a></li>
                <li><a  class="color" href="#">Link</a></li>
                <li><label class="nav-toggle nav-header top-header"><span class="nav-toggle-icon glyphicon glyphicon-chevron-right"></span> Folder1.1</label>
                    <ul class="nav nav-list nav-left-ml">
                        <li><a class="color" href="#">Link</a></li>
                        <li><a class="color" href="#">Link</a></li>
                        <li><label class="nav-toggle nav-header top-header"><span class="nav-toggle-icon glyphicon glyphicon-chevron-right"></span> Folder 1.1.1</label>
                            <ul class="nav nav-list nav-left-ml">
                                <li><a class="color" href="#">Link</a></li>
                                <li><a class="color" href="#">Link</a></li>
                            </ul><!--nav-left-ml-->
                        </li><!--li blank-->
                    </ul><!--nav-left-ml-->
                </li><!--li blank-->
            </ul><!--nav-left-ml-->
        </li><!--li class-""-->
        
        
    </ul><!--nav-list-main-->
        </div>
        
        </div>
   
   
		<!--main page content area-->
        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 zero-padding">
        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 zero-padding dark-yellow-box">
            	<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 zero-padding text-size">
                <span class="files-number"><img src="<?php echo base_url();?>images/frontend/no of files.png" /></span>3,765 Files
                </div>
                
                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 zero-padding">
                	<input type='text' placeholder='Search...' id='search-text-input' />
                    <div id='button-holder'>
                        <img src='<?php echo base_url();?>images/frontend/search.png' class="img-responsive" />
                    </div>
                </div>
            </div><!--dark-yellow-box-->
            
            
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 zero-padding color-blue">	   
   			<ul class="tab-blue">
            	<li><a href="#">Main</a></li>
                <li><a href="#">Date</a></li>
                <li><a href="#">Search</a></li>
                <li><a href="#">Automobiles</a></li>
                <li><a href="#">Utilities</a></li>
                <li><a href="#">Finance</a></li>
                <li><a href="#">Automobile</a></li>
             </ul>   
        </div>
        <!--end Tandsp-->
        
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 zero-padding sign-up-information">
        <div class="login-form width text-center">
        <?php
			if($this->session->flashdata('flash_message') == 'updated')
        	{
				echo '<div  style="color:red;" align="center" class="alert alert-danger"><strong>Record updated successfully !</strong></div>';
			}
?>
        <form action="" method="post" id="register-form" novalidate>
                	       
              <h2 class="account-infomation">Mailing Address</h2>
              <input type="text" name="address" placeholder="Enter your Address" class="input-account-infomation"  value="<?php echo $address?>"/>
              <input type="text" name="city" placeholder="Enter Your City" class="input-account-infomation"  value="<?php echo $city?>"/>
              <input type="text" name="state" placeholder="Enter Your State" class="input-account-infomation"  value="<?php echo $state?>"/>
              <input type="text" name="zip" placeholder="Enter Your Zip" class="input-account-infomation"  value="<?php echo $zip?>"/>
              <input type="submit" class="submitt correction" onclick="myFunction()" value="UPDATE"/> 
                
        </form>
            </div>
        </div>
        </div><!--col-lg-10-->
        
        <!--Tabs-->
        


		</div><!--col-lg-12-->
</div><!--middle-->
<!--end of middle section-->