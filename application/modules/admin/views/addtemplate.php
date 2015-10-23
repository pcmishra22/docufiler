<?php
if(isset($templatedetails)>0)
{
	$id=$templatedetails[0]['id'];
	$name=$templatedetails[0]['template_name'];
	$con=$templatedetails[0]['template_contents'];
	$subject=$templatedetails[0]['template_subject'];
	$title='Update';
	$btn='Update';
}
else
{
	$id='';
	$name='';
	$con='';
	$subject='';
	$title='Add';
	$btn='Save';
}
?>
<div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4><span><?php echo $title;?> Email Template</span></h4>
                                </div>
                                <div class="panel-body">
                                   
                                    <form class="form-horizontal" method="post" id="form-validate" action="<?php echo  base_url(); ?>admin/addtemplate" role="form" >

<input type='hidden' name='id' value="<?php echo $id;?>" />

                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="required">Subject :</label>
                                            <div class="col-lg-8">
                                                <input id="subject" type="text" name="subject" class="form-control" placeholder="Enter your subject" value="<?php echo $subject;?>"/>
                                            </div>

                                        </div><!-- End .form-group  --> 
                                                                                <div class="form-group">
                                            <label class="col-lg-2 control-label" for="required">Name :</label>
                                            <div class="col-lg-8">
                                                <input id="name" type="text" name="name" class="form-control" placeholder="Enter your name" value="<?php echo $name;?>"/>
                                            </div>

                                        </div><!-- End .form-group  --> 
                                      <div class="form-group">
                                            <label class="col-lg-2 control-label" for="required">Content :</label>
                                            <div class="col-lg-8">
                                                <input id="con" type="text" name="con" class="form-control" placeholder="Enter your content" value="<?php echo $con;?>"/>
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




  