<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/dropzone.css" />
<script type="text/javascript" src="<?php echo base_url();?>js/frontend/dropzone.js"></script>
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
       
               	       
            <h2 class="account-infomation" style="padding-bottom:0%;">Drag&amp;Drop Multiple Files Upload</h2>
				<div class="image_upload_div">
					<form action="<?php echo base_url();?>users/upload" class="dropzone">
					</form>
				</div> 	
			</div> 
                
    

        </div>
        </div><!--col-lg-10-->
        
        <!--Tabs-->
        


		</div><!--col-lg-12-->
</div><!--middle-->
<!--end of middle section-->