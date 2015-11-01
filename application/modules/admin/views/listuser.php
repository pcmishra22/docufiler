<div class="row">
                        <div class="col-lg-12">
                        <?php	
      //flash messages
      if($this->session->flashdata('flash_message'))
      {
        if($this->session->flashdata('flash_message') == 'deleted')
        {
			echo '<div class="alert alert-danger fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>User Deleted Successfully.</div>';       
        }
        if($this->session->flashdata('flash_message') == 'added')
        {
			echo '<div class="alert alert-success fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>User Added Successfully.</div>';       
        }
        if($this->session->flashdata('flash_message') == 'updated')
        {
			echo '<div class="alert alert-success fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>User Updated Successfully.</div>';       
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
if(count($allusers)>0)
{
	?>
                                    <table cellpadding="0" cellspacing="0" border="0" class="dynamicTable display table table-bordered" width="100%">
                                        <thead>
                                            <tr>
		<th>Id</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Email</th>
        <th>Created Date</th>
		<th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

	<?php
	foreach($allusers as $users)
	{
		?>
		<tr class="odd gradeX">
		<td><?php echo $users['id']?></td>
		<td><?php echo $users['firstname']?></td>
		<td><?php echo $users['lastname']?></td>
		<td><?php echo $users['email']?></td>
		<td><?php echo $users['create_datetime']?></td>
<td>
 <a title='remove' class="btn btn-remove" href="<?php echo base_url();?>admin/deleteuser/<?php echo $users['id']?>">
  	<span class="icon12 icomoon-icon-remove"></span></a>  
 <a title='edit' class="btn btn-pencil" href="<?php echo base_url();?>admin/adduser/<?php echo $users['id']?>">
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














