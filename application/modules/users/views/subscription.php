<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Subscription</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/font-awesome.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/style.css" />


</head>

<body style="background:#fff;">
<div class="docufilier-header">
	<div class="container upper">
    	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 zero-padding">
        	<div class="peShiner">
            <a href="#"><img src="<?php echo base_url();?>images/frontend/logo.png" class="img-responsive margin" data-color="sepia" data-reverse="false" data-duration="7" alt="DocuFiler - Document Management Solutions" />
            </a>
        	</div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 zero-padding">
        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 zero-padding pull-right">
            	<ul class="pull-right docufilier-about-us" >
                	<li><a href="#" class="first-child">ABOUT US</a></li>
                    <li><a href="#">CONTACT US</a></li>
                </ul>    
            </div>
            
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 zero-padding pull-right">
            	<ul class="pull-right docufilier-navigation-bar" >
                	<li><a href="#" class="">HOME</a></li>
                    <li><a href="#">FEATURES</a></li>
                     <li><a href="#">HOW ITS WORKS</a></li>
                      <li><a href="#">SECURE</a></li>
                </ul>    
            </div>
        </div>
    </div>
</div>

<div class="pricing-area">
	<div class="container">
    	<h2 class="bule-text"> Select Option</h2>
    </div>
    <div class="rate-tag-blue">
    	<div class="container">
        	 <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 zero-padding whole-blue-pad">
                
                <div class="col-lg-4 col-sm-4 col-xs-4 col-md-4 zero-padding padding-one personal-plan">
                	<div class="color-full-box-ratetag">
                    	<div class="color-full-box-ratetag">
                    	<h5 class="heading-ratetag">
                        	<?php echo $subscriptiondetails[0]['name'];?> Plan
                        </h5>
                        <h1 class="rate">
                        	<b><?php echo $subscriptiondetails[0]['price'];?></b><small class="Dollar">$</small>
                        </h1>
                        <h5 class="per-month">
                        	<em>per month</em>
                        </h5>
                        <p class="white-backgroud information-quality color-code-grey"> <?php echo number_format($subscriptiondetails[0]['files']);?> Files</p>
                        <p class="white-backgroud information-quality color-code-light-grey"><?php echo $subscriptiondetails[0]['space'];?> Max File Storage</p>
                        <p class="white-backgroud information-quality color-code-grey" ><?php if($subscriptiondetails[0]['usertype']==1){echo 'Single User';}?></p>
                        <p class="white-backgroud information-quality color-code-light-grey" ><?php echo $subscriptiondetails[0]['discount'];?></p> 
                        <ul class="button-personal-plan personal-plan-pad">
                        	<li><a href="<?php echo base_url()?>users/signup/1"><span><img src="<?php echo base_url();?>images/frontend/star40.png" class="img-responsive star" </span>Get Personal Plan</a></li>
                        </ul>    
                    </div>
                    
                    </div>
                </div>
                
                <div class="col-lg-4 col-sm-4 col-xs-4 col-md-4 zero-padding padding-one middle-orange-pad-two">
                    <div class="color-full-box-ratetag">
                    	<div class="color-full-box-ratetag">
                    	<h5 class="heading-ratetag border-orange middle-orange">
                        	Household Plan
                        </h5>
                        <h1 class="rate greenish orange">
                        	<b><?php echo $subscriptiondetails[1]['price'];?></b><small class="Dollar">$</small>
                        </h1>
                        <h5 class="per-month greenish orangish orange">
                        	<em>per month</em>
                        </h5>
                        <p class="white-backgroud information-quality color-code-grey"> <?php echo number_format($subscriptiondetails[1]['files']);?> Files</p>
                        <p class="white-backgroud information-quality color-code-light-grey"><?php echo $subscriptiondetails[1]['filesize'];?> MB Max File Storage</p>
                        <p class="white-backgroud information-quality color-code-grey" ><?php echo $subscriptiondetails[1]['usertype'];?> User</p>
                        <p class="white-backgroud information-quality color-code-light-grey" ><?php echo $subscriptiondetails[1]['discount'];?></p> 
                        <ul class="button-personal-plan">
                        	<li><a href="<?php echo base_url()?>users/signup/2" class="household-plan-a"><span><img src="<?php echo base_url();?>images/frontend/tag25.png" class="img-responsive star" </span>Get Household  Plan</a></li>
                        </ul>    
                    </div>
                    
                    </div>
                </div>
                
                <div class="col-lg-4 col-sm-4 col-xs-4 col-md-4 zero-padding padding-one personal-plan">
                	<div class="color-full-box-ratetag">
                    	<div class="color-full-box-ratetag">
                    	<h5 class="heading-ratetag border-greenish">
                        	Buisness Plan
                        </h5>
                        <h1 class="rate greenish">
                        	<b><?php echo $subscriptiondetails[2]['price'];?></b><small class="Dollar">$</small>
                        </h1>
                        <h5 class="per-month greenish">
                        	<em>per month</em>
                        </h5>
                        <p class="white-backgroud information-quality color-code-grey"> <?php echo number_format($subscriptiondetails[2]['files']);?> Files</p>
                        <p class="white-backgroud information-quality color-code-light-grey"><?php echo $subscriptiondetails[2]['space'];?> File Storage</p>
                        <p class="white-backgroud information-quality color-code-grey" ><?php echo $subscriptiondetails[0]['usertype'];?> User</p>
                        <p class="white-backgroud information-quality color-code-light-grey" ><?php echo $subscriptiondetails[0]['discount'];?></p> 
                        <ul class="button-personal-plan personal-plan-pad">
                        	<li><a href="<?php echo base_url()?>users/signup/3"><span><img src="<?php echo base_url();?>images/frontend/gear39.png" class="img-responsive star" </span>Get Buisness Plan</a></li>
                        </ul>    
                    </div>
                    
                    </div>
                </div>
                
             </div>   
        </div>
    </div>
</div>

<div class="footer clearfix" style="clear:both;">
	<div class="container clearfix">
    		<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 zero-padding">
            	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 zero-padding">
            	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 zero-padding white-text text-center">
                	<h3>Company</h3>
                    	<ul class="footer-list">
                        	<li><a href="#">About Us</a></li>
                        </ul>    
                </div>	
               
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 zero-padding white-text text-center">
                	<h3>Costumer Service</h3>
                    	<ul class="footer-list">
                        	<li><a href="#">Contact Us</a></li>
                        </ul>    
                </div>	
                
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 zero-padding white-text text-center">
                	<h3>My Account</h3>
                    	<ul class="footer-list">
                        	<li><a href="#">About Us</a></li>
                        </ul>    
                </div>	
                
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 zero-padding white-text text-center">
                	<h3>Support</h3>
                    	<ul class="footer-list">
                        	<li><a href="#">Videos</a></li>
                        </ul>    
                </div>	
                
            </div>
            
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 zero-padding white-text text-center">
            	<h3>Company</h3>
                <img src="<?php echo base_url();?>images/frontend/world-map.png" class="img-responsive margin world-map" />
                <address class="address">OFFICE ADDRESS:<br />
                            105 N Ketch Dr, <br />
                            Sunrise, FL 33326 <br />
                            USA<br />
                  </address> 
                  
                  <address class="address differ">EMAIL ADDRESS:
											info@docufiler.com
                      </address>                              
            </div>
    	</div>
        
        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 zero-padding white-text text-left">
        	<h3 class="facebook-page">Like us on Facebook</h3>
            <img src="<?php echo base_url();?>images/frontend/screenshot.png" class="img-responsive margin"/>
        </div>
        
        
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 zero-padding white-text border-top-copyright">
    	<div class="container">
        	<p class="copyright">COPYRIGHT © 2015 <a  class="link-kartik-system" href="#">DOCUFILER</a> BY <a class="link-kartik-system" href="#">KARTIK SYSTEM</a> ALL RIGHTS RESERVED.</p>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    
    <script src="js/bootstrap.min.js"></script>
<script src="file:///C|/Users/Administrator/Desktop/jquery.pixelentity.shiner.min.js" type="text/javascript"></script>

</body>
</html>
