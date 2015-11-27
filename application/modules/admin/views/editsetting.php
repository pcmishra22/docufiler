<?php
if(isset($settingsdetails)>0)
{
	$id=$settingsdetails[0]['id'];
	$accesskey=$settingsdetails[0]['awsAccessKey'];
	$secretkey=$settingsdetails[0]['awsSecretKey'];
	$title='Update';
	$btn='Update';
}
else
{
	$id='';
	$secretkey='';
	$secretkey='';
	$title='Add';
	$btn='Save';
}
?>
<div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4><span><?php echo $title;?> Settings</span></h4>
                                </div>
                                <div class="panel-body">
                                   
                                    <form class="form-horizontal" method="post" id="form-validate" action="<?php echo  base_url(); ?>admin/editsettings" role="form" >

<input type='hidden' name='id' value="<?php echo $id;?>" />

                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="required">Access Key :</label>
                                            <div class="col-lg-8">
                                                <input id="accesskey" type="text" name="accesskey" class="form-control" placeholder="Enter your accesskey" value="<?php echo $accesskey;?>"/>
                                            </div>

                                        </div><!-- End .form-group  --> 
                                                                                <div class="form-group">
                                            <label class="col-lg-2 control-label" for="required">Secret Key :</label>
                                            <div class="col-lg-8">
                                                <input id="secretkey" type="text" name="secretkey" class="form-control" placeholder="Enter your secretkey" value="<?php echo $secretkey;?>"/>
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




  