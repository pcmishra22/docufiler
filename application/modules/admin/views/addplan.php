<?php
if(isset($plandetails))
{
	$id=$plandetails[0]['id'];	
	$name=$plandetails[0]['name'];
	$price=$plandetails[0]['price'];
	$files=$plandetails[0]['files'];
	$space=$plandetails[0]['space'];
	$usertype=$plandetails[0]['usertype'];
	$discount=$plandetails[0]['discount'];
	$title='Update';
	$btn='Update';
}
else
{
	$id='';
	$name='';
	$price='';
	$files='';
	$space='';
	$usertype='';
	$discount='';
	$title='Add';
	$btn='Save';
}
?>
<div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4><span><?php echo $title;?> Plan</span></h4>
                                </div>
                                <div class="panel-body">
                                   
                                    <form class="form-horizontal" method="post" id="form-validate" action="<?php echo  base_url(); ?>admin/addplan" role="form" >

<input type='hidden' name='id' value="<?php echo $id;?>" />

                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="required">Name :</label>
                                            <div class="col-lg-8">
                                                <input id="name" type="text" name="name" class="form-control" placeholder="Enter your plan name" value="<?php echo $name;?>"/>
                                            </div>

                                        </div><!-- End .form-group  --> 
                                      <div class="form-group">
                                            <label class="col-lg-2 control-label" for="required">Price :</label>
                                            <div class="col-lg-8">
                                                <input id="price" type="text" name="price" class="form-control" placeholder="Enter your plan price" value="<?php echo $price;?>"/>
                                            </div>

                                        </div><!-- End .form-group  --> 
                                    	<div class="form-group">
                                            <label class="col-lg-2 control-label" for="required">Files :</label>
                                            <div class="col-lg-8">
                                                <input id="files" type="text" name="files" class="form-control" placeholder="Enter no of files" value="<?php echo $files;?>"/>
                                            </div>

                                        </div><!-- End .form-group  --> 
                                    	<div class="form-group">
                                            <label class="col-lg-2 control-label" for="required">Space :</label>
                                            <div class="col-lg-8">
                                                <input id="space" type="text" name="space" class="form-control" placeholder="Enter plan space" value="<?php echo $space;?>"/>
                                            </div>

                                        </div><!-- End .form-group  --> 
                                    	<div class="form-group">
                                            <label class="col-lg-2 control-label" for="required">User Type :</label>
                                            <div class="col-lg-8">
                                                <input id="usertype" type="text" name="usertype" class="form-control" placeholder="Enter user type" value="<?php echo $usertype;?>"/>
                                            </div>

                                        </div><!-- End .form-group  --> 
                                    	
										<div class="form-group">
                                            <label class="col-lg-2 control-label" for="required">Discount :</label>
                                            <div class="col-lg-8">
                                                <input id="discount" type="text" name="discount" class="form-control" placeholder="Enter plan discount" value="<?php echo $discount;?>"/>
                                            </div>

                                        </div><!-- End .form-group  --> 
                                    					
                                        <div class="form-group">
                                            <div class="col-lg-offset-2">
                                                <button type="submit" name="submit" class="btn btn-default marginR10"><?php echo $btn;?></button>
                                                <button class="btn btn-danger" onclick="goBack()">Cancel</button>
                                            </div>
                                        </div><!-- End .form-group  -->                                      
                                    </form>
                                </div>
                            </div><!-- End .panel -->
                        </div><!-- End .span12 -->
                    </div><!-- End .row -->  


<script>
function goBack() {
    window.history.back();
}
</script>




  