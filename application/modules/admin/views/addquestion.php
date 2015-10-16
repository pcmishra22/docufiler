<?php
if(count($question)>0)
{
	$id=$question[0]['id'];
	
	$qname=$question[0]['name'];
	
	$o1=$question[0]['option1'];
	$o2=$question[0]['option2'];
	$o3=$question[0]['option3'];
	$o4=$question[0]['option4'];
	
	$ans=$question[0]['answer'];
	$type=$question[0]['type'];
	
	$title='Update';
	$btn='Update';
}
else
{
	$id='';
	$qname='';
	$o1='';
	$o2='';
	$o3='';
	$o4='';
	$ans='';
	$type='';
	
	$title='Add';
	$btn='Save';
}
?>
<div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4><span><?php echo $title;?> Question</span></h4>
                                </div>
                                <div class="panel-body">
                                   
                                    <form class="form-horizontal" method="post" id="form-validate" action="<?php echo  base_url(); ?>admin/addquestion" role="form" >

<input type='hidden' name='id' value="<?php echo $id;?>" />

                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="required">Question :</label>
                                            <div class="col-lg-8">
                                                <input id="question" type="text" name="question" class="form-control" placeholder="Enter your question" value="<?php echo $qname;?>"/>
                                            </div>

                                        </div><!-- End .form-group  -->  

                                            <div class="form-group">
                                            <label class="col-lg-2 control-label" for="select">Type :</label>
                                            <div class="col-lg-8">
                                                <select name="type" class="form-control">
                                                    
                                                    <option value="a" <?php if($type=='a'){ echo 'selected="selected"';}?>>Aptitude</option>
                                                    <option value="t" <?php if($type=='t'){ echo 'selected="selected"';}?>>Technical</option>
                                                </select>
                                            </div>
                                        </div><!-- End .form-group  -->
                                                                                <div class="form-group">
                                            <label class="col-lg-2 control-label" for="required">Option 1 :</label>
                                            <div class="col-lg-8">
                                                <input id="option1" type="text" name="option1" class="form-control" placeholder="Enter your option 1" value="<?php echo $o1;?>"/>
                                            </div>
                                            <div class="col-lg-2">
                                            <input type="radio" name="answer" value="1" <?php if($ans==1){ echo 'checked';}?>>
                                            </div>
                                        </div><!-- End .form-group  -->  
                                                                                <div class="form-group">
                                            <label class="col-lg-2 control-label" for="required">Option 2 :</label>
                                            <div class="col-lg-8">
                                                <input id="option2" type="text" name="option2" class="form-control" placeholder="Enter your option 2" value="<?php echo $o2;?>"/>
                                            </div>
                                            <div class="col-lg-2">
                                            <input type="radio" name="answer" value="2" <?php if($ans==2){ echo 'checked';}?>>
                                            </div>
                                        </div><!-- End .form-group  -->  
                                                                                <div class="form-group">
                                            <label class="col-lg-2 control-label" for="required">Option 3 :</label>
                                            <div class="col-lg-8">
                                                <input id="option3" type="text" name="option3" class="form-control" placeholder="Enter your option 3" value="<?php echo $o3;?>"/>
                                            </div>
                                                                                        <div class="col-lg-2">
                                            <input type="radio" name="answer" value="3" <?php if($ans==3){ echo 'checked';}?>>
                                            </div>
                                        </div><!-- End .form-group  -->  
                                                                                <div class="form-group">
                                            <label class="col-lg-2 control-label" for="required">Option 4 :</label>
                                            <div class="col-lg-8">
                                                <input id="option4" type="text" name="option4" class="form-control" placeholder="Enter your option 4" value="<?php echo $o4;?>"/>
                                            </div>
                                                                                        <div class="col-lg-2">
                                            <input type="radio" name="answer" value="4" <?php if($ans==4){ echo 'checked';}?>>
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




  