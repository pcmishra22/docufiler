
	<!-- Add jQuery library -->
	<script src="http://code.jquery.com/jquery-1.11.0.js"></script>

	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="<?php echo base_url()?>fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
	<script>
	var $$ = jQuery.noConflict();
	</script>
	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="<?php echo base_url()?>fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />

	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
	<script type="text/javascript" src="<?php echo base_url()?>fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
	<script type="text/javascript" src="<?php echo base_url()?>fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="<?php echo base_url()?>fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>


	<script type="text/javascript">
		$$(document).ready(function() {
			$$(".fancybox").fancybox({
				'width':1200
				//autoDimensions: true
 			/*
			'afterLoad': function() { 
       			$(".fancybox-overlay").delay(40000).fadeOut(); 
    		}
			*/
			});
		});
	</script>
	<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}
	</style>

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
       
               	       
            <h2 class="account-infomation" style="padding-bottom:0%;">
			You can upload only 50 Files as a free user.<br/>
			If you want to upload more files, please buy our subscription.
			<br/>&nbsp;
			

<a class="fancybox fancybox.iframe" href="<?php echo base_url();?>users/filesubscription">Click Here</a> to buy our subscription.

			
			<br/><br/>&nbsp;
			Please refresh page after payment is successfull.
			<br/>&nbsp;
			</h2>
				<div class="image_upload_div">

				</div> 	
			</div> 
                
    

        </div>
        </div><!--col-lg-10-->
        
        <!--Tabs-->
        


		</div><!--col-lg-12-->
</div><!--middle-->
<!--end of middle section-->