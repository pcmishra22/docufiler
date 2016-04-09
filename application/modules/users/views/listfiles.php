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
                <span class="files-number"><img src="<?php echo base_url();?>images/frontend/no of files.png" /></span>
				<?php
				echo $totalfiles;
				?> Files
                </div>
                
    <form  name="searchform" id="searchform" action="<?php echo base_url();?>users/listfiles" method="post">
                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 zero-padding">
                	<input type='text' name="searchfile" placeholder='Search...' id='search-text-input' />
                    <div id='button-holder'>
                        <img src='<?php echo base_url();?>images/frontend/search.png' class="img-responsive" onclick="document.searchform.submit();";/>
                    </div>
                </div>
				</form>
            </div><!--dark-yellow-box-->
            
            
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 zero-padding color-blue">	   
  		<?php
			print subTitleDisplay();
		?>
        </div>
        <!--end Tandsp-->
        
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 zero-padding">
                
    
	
<!--end of folder tree menu-->


	<!--Right-side-file-->
		<div class="col-lg-12 col-md- col-sm-12 col-xs-12 zero-padding white-backgroud">
        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 zero-padding right-bar-head text-center">
            	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 zero-padding border-left">
                	<h4 class="head-text"> Name</h4>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4 zero-padding border-left">
                	<h4 class="head-text"> Type</h4>
                </div>
                
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4 zero-padding border-left">
                	<h4 class="head-text"> Date</h4>
                </div>
                
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4 zero-padding border-left">
                	<h4 class="head-text font-size" style="margin-top:0 !important;"> Share/Email/Print/<br />Delete/Download</h4>
                </div>
                
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4 zero-padding border-left">
                	<h4 class="head-text"> Version</h4>
                </div>
            </div>
            <?php
			if($this->session->flashdata('flash_message') == 'filenotfound')
        	{
				echo '<div  style="color:red;" align="center" class="alert alert-danger"><strong>File not found. !</strong></div>';
			}
			if($this->session->flashdata('flash_message') == 'deleted')
        	{
				echo '<div  style="color:red;" align="center" class="alert alert-danger"><strong>File deleted successfully !</strong></div>';
			}
			?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 zero-padding text-right pagementation">
			<span class="right"><?php echo $links;?></span>
            </div><!--pagementation-->
            <?php
			if(!empty($userdetails[0]))
			{
				foreach($userdetails as $userfiles)
				{
					$id=$userfiles->id;
					$userid=$userfiles->userid;
					$name=$userfiles->name;
					$uniquename=$userfiles->uniquename;
					$folder=$userfiles->folder;
					$device=$userfiles->device;
					$filetype=$userfiles->filetype;
					$location=$userfiles->location;
					$size=$userfiles->size;
					$created_date=$userfiles->created_date;
			?>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 zero-padding border-top border-bottom text-center">
            	<div align="left" class="col-lg-4 col-md-4 col-sm-4 col-xs-4 zero-padding" style="padding-left:20px;">
                	<h5 class="head-text"> <span class="box" align="left"><img src="<?php echo base_url();?>images/frontend/box.png" />
					</span><?php echo $name;?></h5>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4 zero-padding" align="left">
                	<h5 class="head-text"> <?php echo $filetype;?></h5>
                </div>
                
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4 zero-padding ">
                	<h5 class="head-text"> <?php echo date('Y-m-d i:s',strtotime($created_date));?></h5>
                </div>
                
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4 zero-padding ">
                	<h5 class="head-text font-size" style="margin-top:0 !important;"> <span class="Download"><a href="#"><img src="<?php echo base_url();?>images/frontend/1st.png" /></a></span>
                    <span class="Download"><a href="#"><img src="<?php echo base_url();?>images/frontend/2nd.png" /></a></span>
                    <span class="Download"><a href="#"><img src="<?php echo base_url();?>images/frontend/3rd.png" /></a></span>
                    <span class="Download"><a href="<?php echo base_url();?>users/deletefile/<?php echo $id;?>"><img src="<?php echo base_url();?>images/frontend/4rth.png" /></a></span>
                    <?php
					if($filetype=='image/jpeg')
					{
					?>
						<span class="Download">
						<a href="<?php echo $location;?>" target="_blank">
						<img src="<?php echo base_url();?>images/frontend/5th.png" />
						</a>
						</span>
					<?php					
					}
					else
					{
					?>
						<span class="Download"><a href="<?php echo base_url();?>users/downloadfile/<?php echo $id;?>"><img src="<?php echo base_url();?>images/frontend/5th.png" /></a></span>
					<?php					
					}
					?>
					
					</h5>
				</div>
                
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-4 zero-padding ">
                	<h5 class="head-text"> 1</h5>
                </div>
            </div>
                
			<?php
				}
			}
			else
			{
				echo '<br/><br/><br/><br/><div  style="color:red;" align="center" class="alert alert-danger"><strong>No File Uploaded Yet !</strong></div>';
			}
			?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 zero-padding text-right pagementation">
            
			<span class="right"><?php echo $links;?></span>
				
            </div><!--pagementation-->
        </div>

<!--End of Right-side-file-->
</div><!--col-lg-12-->
</div><!--middle-->
<!--end of middle section-->

        </div>
        </div><!--col-lg-10-->
        
        <!--Tabs-->
        


		</div><!--col-lg-12-->
</div><!--middle-->
<!--end of middle section-->