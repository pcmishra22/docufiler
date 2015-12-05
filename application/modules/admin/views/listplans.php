<div class="row">
                        <div class="col-lg-12">
                        <?php	
      //flash messages
      if($this->session->flashdata('flash_message'))
      {
        if($this->session->flashdata('flash_message') == 'deleted')
        {
			echo '<div class="alert alert-danger fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>Plan Deleted Successfully.</div>';       
        }
        if($this->session->flashdata('flash_message') == 'added')
        {
			echo '<div class="alert alert-success fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>Plan Added Successfully.</div>';       
        }
        if($this->session->flashdata('flash_message') == 'updated')
        {
			echo '<div class="alert alert-success fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>Plan Updated Successfully.</div>';       
        }
  	  }
      ?>
                            <div class="panel panel-default gradient">
                                <div class="panel-heading">
                                    <h4>
                                        <span>List Users</span>
                                    </h4>
                                </div>
                                <div class="panel-body noPad clearfix">
                                	<?php
if(count($allplans)>0)
{
	?>
                                    <table cellpadding="0" cellspacing="0" border="0" class="dynamicTable display table table-bordered" width="100%">
                                        <thead>
                                            <tr>
		<th>Id</th>
		<th>Name</th>
		<th>Price</th>
		<th>Files</th>
        <th>Space</th>
		<th>Usertype</th>
		<th>Discount</th>
		<th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

	<?php
	foreach($allplans as $plan)
	{
		?>
		<tr class="odd gradeX">
		<td><?php echo $plan['id']?></td>
		<td><?php echo $plan['name']?></td>
		<td><?php echo $plan['price']?></td>
		<td><?php echo $plan['files']?></td>
		<td><?php echo $plan['space']?></td>
		<td><?php echo $plan['usertype']?></td>
		<td><?php echo $plan['discount']?></td>
<td>
 <a title='remove' class="btn btn-remove" href="<?php echo base_url();?>admin/deleteplan/<?php echo $plan['id']?>">
  	<span class="icon12 icomoon-icon-remove"></span></a>  
 <a title='edit' class="btn btn-pencil" href="<?php echo base_url();?>admin/addplan/<?php echo $plan['id']?>">
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














