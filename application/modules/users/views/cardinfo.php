<?php
if(!empty($userdetails[0]))
{
	$cardname=$userdetails[0]['cardname'];
	$cardno=$userdetails[0]['cardno'];
	$cardcvv=$userdetails[0]['cardcvv'];
	$expirymonth=$userdetails[0]['expirymonth'];
	$expiryyear=$userdetails[0]['expiryyear'];
}
else
{
	$cardname='';
	$cardno='';
	$cardcvv='';
	$expirymonth='';
	$expiryyear='';
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
                	<h2 class="account-infomation">Credit Card</h2>
                    <input type="text" name="name" placeholder="Card holder name" class="input-account-infomation" value="<?php echo $cardname?>"/>
                    <input type="text" name="cardno" placeholder="Card no" class="input-account-infomation" value="<?php echo $cardno?>"/>
                    <input type="text" name="cvv" placeholder="CVV no" class="input-account-infomation" value="<?php echo $cardcvv?>"/>
                    
          <div class="row padding-year-month">
            <div class="col-xs-3">
              <select class="form-control col-sm-2" name="expirymonth" id="expiry-month">
                <option>Month</option>
                <option value="01" <?php if($expirymonth=='01'){echo 'selected="selected"';}?>>Jan (01)</option>
                <option value="02" <?php if($expirymonth=='02'){echo 'selected="selected"';}?>>Feb (02)</option>
                <option value="03" <?php if($expirymonth=='03'){echo 'selected="selected"';}?>>Mar (03)</option>
                <option value="04" <?php if($expirymonth=='04'){echo 'selected="selected"';}?>>Apr (04)</option>
                <option value="05" <?php if($expirymonth=='05'){echo 'selected="selected"';}?>>May (05)</option>
                <option value="06" <?php if($expirymonth=='06'){echo 'selected="selected"';}?>>June (06)</option>
                <option value="07" <?php if($expirymonth=='07'){echo 'selected="selected"';}?>>July (07)</option>
                <option value="08" <?php if($expirymonth=='08'){echo 'selected="selected"';}?>>Aug (08)</option>
                <option value="09" <?php if($expirymonth=='09'){echo 'selected="selected"';}?>>Sep (09)</option>
                <option value="10" <?php if($expirymonth=='10'){echo 'selected="selected"';}?>>Oct (10)</option>
                <option value="11" <?php if($expirymonth=='11'){echo 'selected="selected"';}?>>Nov (11)</option>
                <option value="12" <?php if($expirymonth=='12'){echo 'selected="selected"';}?>>Dec (12)</option>
              </select>
            </div>
            <div class="col-xs-3">
              <select class="form-control" name="expiryyear">
              	<option value="15" <?php if($expirymonth=='15'){echo 'selected="selected"';}?>>2015</option>
                <option value="16" <?php if($expirymonth=='16'){echo 'selected="selected"';}?>>2016</option>
                <option value="17" <?php if($expirymonth=='17'){echo 'selected="selected"';}?>>2017</option>
                <option value="18" <?php if($expirymonth=='18'){echo 'selected="selected"';}?>>2018</option>
                <option value="19" <?php if($expirymonth=='19'){echo 'selected="selected"';}?>>2019</option>
                <option value="20" <?php if($expirymonth=='20'){echo 'selected="selected"';}?>>2020</option>
                <option value="21" <?php if($expirymonth=='21'){echo 'selected="selected"';}?>>2021</option>
                <option value="22" <?php if($expirymonth=='22'){echo 'selected="selected"';}?>>2022</option>
                <option value="23" <?php if($expirymonth=='23'){echo 'selected="selected"';}?>>2023</option>
                <option value="24" <?php if($expirymonth=='24'){echo 'selected="selected"';}?>>2024</option>
                <option value="25" <?php if($expirymonth=='25'){echo 'selected="selected"';}?>>2025</option>
              </select>
            </div>
          </div>
                    
                    <input type="submit" class="submitt correction" onclick="myFunction()" value="UPDATE"/>
                </form>
            </div>
        </div>
        </div><!--col-lg-10-->
        
        <!--Tabs-->
        


		</div><!--col-lg-12-->
</div><!--middle-->
<!--end of middle section-->