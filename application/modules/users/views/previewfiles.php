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
				echo $this->session->userdata('totalfiles');
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
        
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 zero-padding sign-up-information">
                
    
	
<!--end of folder tree menu-->


	<!--Right-side-file-->
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 zero-padding white-backgroud">
        	<div class="all-catogeries change clearfix">
            
            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 zero-padding">
                 <?php
				$cnt=0;
				foreach($filedetails as $filedata)
				{
					
					$fn=explode('.',$filedata['uniquename']);
					$imgfn=$fn[0].'.jpg';
					$fullpath=FCPATH."/files_images/".$imgfn;
					if(file_exists($fullpath))
					{
						
						$filename=$imgfn;
					}
					else
					{
						
						$filename='default.jpg';
					}
				?>
                	<div id="<?php echo $filedata['id'];?>" class="col-lg-3 col-md-3 col-sm-6 col-xs-6 all-boxess zero-padding" draggable="true" ondragstart="drag(event)">
                        <div class="radius-box-innerpage text-center showhim">
                            <p class="box-inner"> <span class="move-icon"> < | << </span>   1/1   <span class="move-icon-two"> >> | > </span></p>   
                            
                            <img src="<?php echo base_url()?>files_images/<?php echo $filename;?>" class="pdf img-responsive margin" style="width:816px;height:300px;">
                            <p class="box-inner font"><?php echo $filedata['name'];?></p>
                            <p class="date"><?php echo date('m/d/Y H:I',strtotime($filedata['created_date']));?></p>
							
							
							<div class="showme">
								<a href="javascript:void(0);" onclick="javascript:alert('pop');"><h5 class="head-text font-size"> 
								<span class="Download"><a href="#"><img src="<?php echo base_url();?>images/frontend/1st.png" class="iconss"></a></span>
								<span class="Download"><a href="#"><img src="<?php echo base_url();?>images/frontend/2nd.png" class="iconss"></a></span>
								<span class="Download"><a href="#"><img src="<?php echo base_url();?>images/frontend/3rd.png" class="iconss"></a></span>
								<span class="Download"><a href="<?php echo base_url();?>users/deletefilepreview/<?php echo $filedata['id'];?>"><img src="<?php echo base_url();?>images/frontend/4rth.png" class="iconss"></a></span>
								<span class="Download"><a href="<?php echo base_url();?>users/downloadfile/<?php echo $filedata['id'];?>"><img src="<?php echo base_url();?>images/frontend/5th.png" class="iconss"></a></span></h5></a>
							</div>
							
						
						
						</div>
                    </div>
                <?php
				$cnt++;
				if($cnt%4==0)
				{
					?>

                    <?php
				}
				}
				?>
                
                </div>
                
              

        
        </div><!--col-lg-10-->
        
        
        


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
