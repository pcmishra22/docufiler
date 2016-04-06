<?php
//subscription name
$name=$this->session->userdata('planname');

if($name=='personal')
	$i=0;
if($name=='household')
	$i=1;
if($name=='business')
	$i=2;
//plan details
$planprice=$subscriptiondetails[$i]['price'];
$discount=0.00;
$promodiscount=0.00;
$total=$planprice-$discount;
//plan details annual
$planpriceyearly=$subscriptiondetails[$i]['price']*12;
$discountyearly=($planpriceyearly*10)/100;
$totalyearly=$planpriceyearly-$discountyearly;
?>
<script>

function planchange(val)
{
	if(val=='annually')
	{
		planprice=<?php echo $planpriceyearly;?>;
		discount=<?php echo $discountyearly;?>;
		total=<?php echo $totalyearly;?>;
		
		//set html value
		
		$("#planprice").html("$"+planprice);
		$("#discount").html("$"+discount);
		$("#total").html("$"+total);
		
		//set data value
		
		$("#dataprice").val(planprice);
		$("#datadiscount").val(discount);
		$("#datatotal").val(total);		
	}
	if(val=='monthly')
	{
		planprice=<?php echo $planprice;?>;
		discount=<?php echo $discount;?>;
		total=<?php echo $total;?>;
		
		//set html value
		
		$("#planprice").html("$"+planprice);
		$("#discount").html("$"+discount);
		$("#total").html("$"+total);
		
		//set data value
		
		$("#dataprice").val(planprice);
		$("#datadiscount").val(discount);
		$("#datatotal").val(total);	
	}
}
</script>
<div class="analize">
	<h1 class="finalize-text">Finalize and Authorize</h1>
    
    <div class="rate-tag-blue analizing-page-mar">
    	<div class="container">
        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 zero-padding authorize">
            	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 zero-padding">
            	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                	<div class="color-full-box-ratetag">
                    	<h5 class="heading-ratetag border-orange">
                        	<?php echo $name;?> Plan <br /> Monthly
                        </h5>
                        <h1 class="rate greenish orange">
                        	<b><?php echo $subscriptiondetails[$i]['price'];?></b><small class="Dollar">$</small>
                        </h1>
						<h5 class="per-month greenish orangish orange">
                        	<em>Charge Monthly</em>
                        </h5>
                         <p class="white-backgroud information-quality color-code-grey"> <?php echo number_format($subscriptiondetails[$i]['files']);?> Files</p>
                        <p class="white-backgroud information-quality color-code-light-grey"><?php echo $subscriptiondetails[$i]['space'];?> Max File Storage</p>
                        <p class="white-backgroud information-quality color-code-grey" ><?php if($subscriptiondetails[$i]['usertype']==1 || $subscriptiondetails[$i]['usertype']==2){echo 'Single User';}?></p>
                        <p class="white-backgroud information-quality color-code-light-grey" ><?php echo $subscriptiondetails[$i]['discount'];?></p> 
                    </div>    
                </div>
                
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                	<div class="color-full-box-ratetag">
                    	<h5 class="heading-ratetag border-orange">
                        	<?php echo $name;?> Plan <br /> Monthly
                        </h5>
                        <h1 class="rate greenish orange">
                        	<b><?php echo $subscriptiondetails[$i]['price'];?></b><small class="Dollar">$</small>
                        </h1>
                        <h5 class="per-month greenish orangish orange charged-annualy">
                        	10% Discount<br /> 
                            <em>per month</em><br />
                            <em>Charged Annualy</em>
                        </h5>
                         <p class="white-backgroud information-quality color-code-grey"> <?php echo number_format($subscriptiondetails[$i]['files']);?> Files</p>
                        <p class="white-backgroud information-quality color-code-light-grey"><?php echo $subscriptiondetails[$i]['space'];?> Max File Storage</p>
                        <p class="white-backgroud information-quality color-code-grey" ><?php if($subscriptiondetails[$i]['usertype']==1 || $subscriptiondetails[$i]['usertype']==2){echo 'Single User';}?></p>
                        <p class="white-backgroud information-quality color-code-light-grey" ><?php echo $subscriptiondetails[$i]['discount'];?></p> 
                    </div>    
                </div>
                <input type="text" placeholder="Promotional Code :" name="promocode" id="promocode" onchange ="promocodechange(this.value)" value="" class="Promotional-code"  />
                </div>
                
                
                
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                	<div class="charges">
                    <form method="post" action="<?php echo base_url()?>users/payment" name="card" id="card">
					
					<input type="hidden" name="dataprice" id="dataprice" value="<?php echo $planprice;?>">
					<input type="hidden" name="datadiscount" id="datadiscount" value="<?php echo $discount;?>">
					<input type="hidden" name="datatotal" id="datatotal" value="<?php echo $total;?>">
					
                    	<div class="Annually-monthly">
                        	<div class="Monthly"><h3 class="white-text"> <input type="radio" name="Annually" class="radio-annually" value="annually" onclick="planchange(this.value)"/>Annually</h3></div>
                            <div class="Anuually"><h3 class="white-text"> <input type="radio"  name="Annually" class="radio-annually" value="monthly" checked="checked" onclick="planchange(this.value)"/>Monthly</h3></div>
                        </div>
                        <div class="diffrent-type-charges">
                        	
							<span id="plandetails">
								<h5 class="text-charges"><span>Plan Charges:</span><span class="pull-right" id="planprice">$<?php echo $planprice;?></span></h5>
								<h5 class="text-charges"><span>Discount:</span><span class="pull-right" id="discount">$<?php echo $discount;?></span></h5>
								<h5 class="text-charges"><span>Promotional Discount:</span><span class="pull-right" id="promodiscount">$<?php echo $promodiscount;?></span></h5>
								<h5 class="text-charges"><span>Total Order:</span><span class="pull-right" id="total">$<?php echo $total;?></span></h5>
                            </span>
							<span id="carderror" style="background-color: white;"></span>
							<select class="select" name="cardname" id="cardname">
                                  <option value="">Credit Card Name</option>
                                  <?php
								  foreach($cardinfo as $card)
								  {
									 ?>
									<option value="<?php echo $card['id'];?>"><?php echo $card['cardname'];?></option>
									<?php									 
									  
								  }
								  
								  ?>
								  
								                                
							</select>
                             <span class="white-backgroud terms-condition">By completing your order you agree with Docufiler’s<br />  													                                    <a href="#">Terms and Conditions</a>
							 </span> <input type="checkbox" name="agree" id="agree" value="yes" class="pricing-checkbox">
                             <span id="agreeerror" style="background-color: white;"></span>
							 <ul class="button-personal-plan other-page">
                        	<li><a href="javascript:void(0);" onclick="return formvalidate();" class="household-plan-a">
							<span>
							<img src="<?php echo base_url()?>images/frontend/tag25.png" class="img-responsive star" </span>
							Get <?php echo $name;?>  Plan</a></li>
                        </ul>
                        </div>
                    </form>    
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

<script>
function promocodechange(val)
{
	total=$("#datatotal").val();	
	$.ajax
			({
				url: "<?=base_url();?>users/promodiscount",
				type: "POST",
				data: "code="+val+"&total="+total,
				success: function(resp) 
				{
					$('#promodiscount').html($('#inner_1',resp).html());
					$('#total').html($('#inner_2',resp).html());	
				}
			});
}
function formvalidate()
{
	checking=$('input:checkbox[name=agree]').is(':checked');
	cardvalue=$('#cardname').val();
	
	if(cardvalue=='')
	{
		$("#carderror").html("<font color='red'>Please select card</font>");
		$("#cardname").focus();
		return false;
	}
	if(checking)
	{
		var form;
		form = document.getElementById("card");
		form.submit();
	}
	else
	{
		$("#agreeerror").html("<font color='red'>Please select term and condition</font>");
		$("#agree").focus();
		return false;
	}
}
</script>