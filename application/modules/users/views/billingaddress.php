<?php
if(!empty($userdetails[0]))
{
	$address=$userdetails[0]['baddress'];
	$city=$userdetails[0]['bcity'];
	$state=$userdetails[0]['bstate'];
	$zip=$userdetails[0]['bzip'];
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
		function getdata(val)
		{
			$.ajax
			({
				url: "<?=base_url();?>users/billingaddressdata",
				type: "POST",
				data: "id="+val,
				success: function(data) 
				{
					$('#billadddiv').html(data);
				}
			});
		}
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
       	<?php
			print LeftPanel();
		?>
        </div>
   
   
		<!--main page content area-->
        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 zero-padding">
        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 zero-padding dark-yellow-box">
            	<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 zero-padding text-size">
                <span class="files-number"><img src="<?php echo base_url();?>images/frontend/no of files.png" /></span><?php echo $totalfiles;?> Files
                </div>
                
                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 zero-padding">
                	<input type='text' placeholder='Search...' id='search-text-input' />
                    <div id='button-holder'>
                        <img src='<?php echo base_url();?>images/frontend/search.png' class="img-responsive" />
                    </div>
                </div>
            </div><!--dark-yellow-box-->
            
            
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 zero-padding color-blue">	   
  		<?php
			print subTitleDisplay();
		?>
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
<style>
 select {
            width:434px;
			height:40px;
            border:none;
            background:#fff;
        }
</style>
        <form action="" method="post" id="register-form" novalidate>
                	       
              <h2 class="account-infomation">Billing Address</h2>
			  <select name="cc" id="cc" align="left" onchange="getdata(this.value)">
			  <option value="0" select>Credit Card Name</option>
			  <?php
			  foreach($carddetails as $cc)
			  {
			  ?>
				<option value="<?php echo $cc['id']?>"><?php echo $cc['cardname']?></option>
			  <?php
			  }
			  ?>
			  </select>
			  <br/><br/>
              <span id='billadddiv'>
			  <input type="text" name="address" placeholder="Enter your Address" class="input-account-infomation"  value="<?php echo $address?>"/>
              <input type="text" name="city" placeholder="Enter Your City" class="input-account-infomation"  value="<?php echo $city?>"/>
              <input type="text" name="state" placeholder="Enter Your State" class="input-account-infomation"  value="<?php echo $state?>"/>
              <input type="text" name="zip" placeholder="Enter Your Zip" class="input-account-infomation"  value="<?php echo $zip?>"/>
              </span>
			  
			  
			  <input type="submit" class="submitt correction" onclick="myFunction()" value="UPDATE"/> 
                
        </form>
            </div>
        </div>
        </div><!--col-lg-10-->
        
        <!--Tabs-->
        


		</div><!--col-lg-12-->
</div><!--middle-->
<!--end of middle section-->