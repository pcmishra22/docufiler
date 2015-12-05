<div class="row">
                        <div class="col-lg-12">
                        <?php	
      //flash messages
      if($this->session->flashdata('flash_message'))
      {
        if($this->session->flashdata('flash_message') == 'deleted')
        {
			echo '<div class="alert alert-danger fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>Promotion Deleted Successfully.</div>';       
        }
        if($this->session->flashdata('flash_message') == 'added')
        {
			echo '<div class="alert alert-success fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>Promotion Added Successfully.</div>';       
        }
        if($this->session->flashdata('flash_message') == 'updated')
        {
			echo '<div class="alert alert-success fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>Promotion Updated Successfully.</div>';       
        }
  	  }
      ?>
                            <div class="panel panel-default gradient">
                                <div class="panel-heading">
                                    <h4>
                                        <span>List Promotion Code</span>
                                    </h4>
                                </div>
                                <div class="panel-body noPad clearfix">
                                	<?php
if(count($allcodes)>0)
{
	?>
                                    <table cellpadding="0" cellspacing="0" border="0" class="dynamicTable display table table-bordered" width="100%">
                                        <thead>
                                            <tr>
		<th>Id</th>
		<th>Code Name</th>
		<th>Percent</th>
		<th>Status</th>
        <th>Created Date</th>
		<th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

	<?php
	foreach($allcodes as $code)
	{
		?>
		<tr class="odd gradeX">
		<td><?php echo $code['id']?></td>
		<td><?php echo $code['codename']?></td>
		<td><?php echo $code['percent']?></td>
		<td><?php echo $code['status']?></td>
		<td><?php echo $code['created_date']?></td>
<td>
 <a title='remove' class="btn btn-remove" href="<?php echo base_url();?>admin/deletepromotion/<?php echo $code['id']?>">
  	<span class="icon12 icomoon-icon-remove"></span></a>  
 <a title='edit' class="btn btn-pencil" href="<?php echo base_url();?>admin/addpromotion/<?php echo $code['id']?>">
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














