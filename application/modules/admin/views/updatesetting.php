<div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4><span>Update Exam Settings</span></h4>
                                </div>
                                <div class="panel-body">
                                   
                                    <form class="form-horizontal" method="post" id="form-validate" action="<?php echo  base_url(); ?>admin/updatesettings" role="form" >

                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="required">No of question :</label>
                                            <div class="col-lg-8">
                                                <input id="question" type="text" name="question" class="form-control" placeholder="Enter No. Of Question" value="<?php echo $settingdata[0]['noofquestion'];?>" required/>
                                            </div>

                                        </div><!-- End .form-group  -->  
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label" for="required">Exam time in minutes :</label>
                                            <div class="col-lg-8">
                                                <input id="time" type="text" name="time" class="form-control" placeholder="Enter time (in minutes)" value="<?php echo $settingdata[0]['examtime'];?>" required/>
                                            </div>

                                        </div><!-- End .form-group  -->  

                                           

                                        <div class="form-group">
                                            <div class="col-lg-offset-2">
                                                <button type="submit" name="submit" class="btn btn-default marginR10">Save</button>
                                                <button class="btn btn-danger">Cancel</button>
                                            </div>
                                        </div><!-- End .form-group  -->                                      
                                    </form>
                                </div>
                            </div><!-- End .panel -->
                        </div><!-- End .span12 -->
                    </div><!-- End .row -->  







  