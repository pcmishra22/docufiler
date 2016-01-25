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
							echo '<div  style="color:red;" align="center" class="alert alert-danger"><strong>Records Updated Successfully !</strong></div>';
						}
				?>
            	<form action="<?php echo base_url()?>users/accesspermission" method="post" name="login" id="login">
                                       <?php	
      //flash messages
      if($this->session->flashdata('flash_message'))
      {
        if($this->session->flashdata('flash_message') == 'deleted')
        {
			echo '<div class="alert alert-danger fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>Card Deleted Successfully.</div>';       
        }
  	  }
      ?>
				
				
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 zero-padding security">
                	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 zero-padding as-usaul">
                    	<h4 class="account-security-head arrange-cardname-cardno"><b>Card Name</b></h4>
                        <h4 class="account-security-head padddd arrange-cardname-cardno"><b>Card No</b></h4>
                        <h4 class="account-security-head padddd arrange-cardname-cardno"><b>Cvv</b></h4>
                        <h4 class="account-security-head padddd arrange-cardname-cardno" align="right" ><b>Options</b></h4>
                                
                    </div>
                    
                    <?php
					$cnt=0;
					foreach($cardlist as $card)
					{
						if($cnt%2==0)
							$css='one';
						else
							$css='two';
					?>
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 zero-padding nornal backgroud-color-<?php echo $css;?>">
                    	
                        	<ul class="accounts-availability">
                               	<li class="account-security-headd arrange-cardname-cardno" >
									<a href="#" class="acoount-single">
									<?php echo $card['cardname'];?>
									</a>
								</li>

                                <li class="account-security-headd pa arrange-cardname-cardno">
									<a href="#" class="acoount-single paddd">
										<?php echo $card['cardno'];?>
									</a>
								</li>
                                <li class="account-security-headd pa arrange-cardname-cardno">
									<a href="#" class="acoount-single paddd">
										<?php echo $card['cardcvv'];?>
									</a>
								</li>
                                <li class="account-security-headd pa arrange-cardname-cardno">
									<a href="<?php echo base_url()?>users/cardinfo/<?php echo $card['id'];?>" class="acoount-single paddd edit-option">
										<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
									</a>
									<a href="<?php echo base_url()?>users/deletecard/<?php echo $card['id'];?>" class="acoount-single paddd edit-option">
										<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
									</a>
								</li>
                                       
                            </ul>	
                    </div>
					<?php
					$cnt++;
					}
					?>
                </div>
                       
                
                </form>
                <h6 class="dark-grey"><em>&nbsp;</em></h6>

            </div>
        </div>
        </div><!--col-lg-10-->
        
        <!--Tabs-->
        


		</div><!--col-lg-12-->
</div><!--middle-->
<!--end of middle section-->