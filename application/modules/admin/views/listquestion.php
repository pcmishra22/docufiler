 <form action="#" method="post">
                                 <div class="row">
                                    <div class="col-lg-4">
                                        <button type="submit" class="btn btn-xs btn-default" href="javascript:void(0);">Delete Selected</button>
                                         <div class="marginB10"></div>
                                    </div><!-- End .span4 -->
                                </div>
<div class="row">
                        <div class="col-lg-12">
                        	<?php	
      //flash messages
      if($this->session->flashdata('flash_message'))
      {
        if($this->session->flashdata('flash_message') == 'deleted')
        {
			echo '<div class="alert alert-danger fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>Question Deleted Successfully.</div>';       
        }
        if($this->session->flashdata('flash_message') == 'added')
        {
			echo '<div class="alert alert-success fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>Question Added Successfully.</div>';       
        }
        if($this->session->flashdata('flash_message') == 'updated')
        {
			echo '<div class="alert alert-success fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>Question Updated Successfully.</div>';       
        }
  	  }
      ?>
                            <div class="panel panel-default gradient">
                                <div class="panel-heading">
                                    <h4>
                                        <span>List Questions</span>
                                    </h4>
                                </div>
                                <br/>

                                <div class="panel-body noPad clearfix">
                                	<?php
if(count($allquestions)>0)
{
	?>
                                    <table cellpadding="0" cellspacing="0" border="0" class="dynamicTable display table table-bordered" width="100%">
                                        <thead>
                                            <tr>
		<th>Select</th>
        <th>Id</th>
		<th>Name</th>
		<th>Option1</th>
		<th>Option2</th>
		<th>Option3</th>
		<th>Option4</th>
		<th>Answer</th>
		<th>Date</th>
		<th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

	<?php
	foreach($allquestions as $question)
	{
		?>
		<tr class="odd gradeX">
       
		<td> <input type='checkbox' name='checkboxvar[]' value='<?php echo $question['id']?>'></td>
       
        <td><?php echo $question['id']?></td>
		<td width="40%"><?php echo $question['name']?></td>
		<td><?php echo $question['option1']?></td>
		<td><?php echo $question['option2']?></td>
		<td><?php echo $question['option3']?></td>
		<td><?php echo $question['option4']?></td>
		<td><?php echo $question['answer']?></td>
		<td><?php echo date('Y-m-d',strtotime($question['date'])) ?></td>
		<td>
			<a title='remove' class="btn btn-remove" href="<?php echo base_url();?>admin/deletequestion/<?php echo $question['id']?>">
				<span class="icon12 icomoon-icon-remove"></span></a>
                
            <a title='edit' class="btn btn-pencil" href="<?php echo base_url();?>admin/addquestion/<?php echo $question['id']?>">
				<span class="icon12 icomoon-icon-pencil"></span></a>
</td>
		</tr>

		<?php

	}
	?>


                                        </tbody>
                                    </table>

	<?php
}

?>



                                </div>

                            </div>
                        </div>

                    </div>


 </form>











