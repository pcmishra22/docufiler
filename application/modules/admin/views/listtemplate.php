<div class="row">
                        <div class="col-lg-12">
                        <?php	
      //flash messages
      if($this->session->flashdata('flash_message'))
      {
        if($this->session->flashdata('flash_message') == 'deleted')
        {
			echo '<div class="alert alert-danger fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>Template Deleted Successfully.</div>';       
        }
        if($this->session->flashdata('flash_message') == 'added')
        {
			echo '<div class="alert alert-success fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>Template Added Successfully.</div>';       
        }
        if($this->session->flashdata('flash_message') == 'updated')
        {
			echo '<div class="alert alert-success fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>Template Updated Successfully.</div>';       
        }
  	  }
      ?>
                            <div class="panel panel-default gradient">
                                <div class="panel-heading">
                                    <h4>
                                        <span>List Template</span>
                                    </h4>
                                </div>
                                <div class="panel-body noPad clearfix">
                                	<?php
if(count($alltemplates)>0)
{
	?>
                                    <table cellpadding="0" cellspacing="0" border="0" class="dynamicTable display table table-bordered" width="100%">
                                        <thead>
                                            <tr>
		<th>Id</th>
		<th>Name</th>
		<th>Content</th>
		<th>Subject</th>
        <th>Created Date</th>
		<th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

	<?php
	foreach($alltemplates as $template)
	{
		?>
		<tr class="odd gradeX">
		<td><?php echo $template['id']?></td>
		<td><?php echo $template['template_name']?></td>
		<td><?php echo $template['template_contents']?></td>
		<td><?php echo $template['template_subject']?></td>
		<td><?php echo $template['date_created']?></td>
<td>
 <a title='remove' class="btn btn-remove" href="<?php echo base_url();?>admin/delettemplate/<?php echo $template['id']?>">
  	<span class="icon12 icomoon-icon-remove"></span></a>  
 <a title='edit' class="btn btn-pencil" href="<?php echo base_url();?>admin/addtemplate/<?php echo $template['id']?>">
	<span class="icon12 icomoon-icon-pencil"></span></a>        
</td>
		</tr>
		<?php
	}
	?>                           </tbody>
                                    </table>
<?php
}
?>

                                </div>

                            </div>
                        </div>

                    </div>














