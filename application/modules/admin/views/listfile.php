<div class="row">
                        <div class="col-lg-12">
                        <?php	
      //flash messages
      if($this->session->flashdata('flash_message'))
      {
        if($this->session->flashdata('flash_message') == 'deleted')
        {
			echo '<div class="alert alert-danger fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>File Deleted Successfully.</div>';       
        }
		if($this->session->flashdata('flash_message') == 'filenotfound')
        {
			echo '<div class="alert alert-danger fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>File Not Found.</div>';       
        }
  	  }
      ?>
                            <div class="panel panel-default gradient">
                                <div class="panel-heading">
                                    <h4>
                                        <span>List Files</span>
                                    </h4>
                                </div>
                                <div class="panel-body noPad clearfix">
                                	<?php
if(count($allfiles)>0)
{
	?>
                                    <table cellpadding="0" cellspacing="0" border="0" class="dynamicTable display table table-bordered" width="100%">
                                        <thead>
                                            <tr>
		<th>Id</th>
		<th>UserId</th>
		<th>Name</th>
		<th>Folder</th>
		<th>Device</th>
		<th>Size</th>
        <th>Created Date</th>
		<th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

	<?php
	foreach($allfiles as $file)
	{
		?>
		<tr class="odd gradeX">
		<td><?php echo $file['id']?></td>
		<td><?php echo $file['userid']?></td>
		<td><?php echo $file['name']?></td>
		<td><?php echo $file['folder']?></td>
		<td><?php echo $file['device']?></td>
		<td><?php echo $file['size']?></td>
		<td><?php echo $file['created_date']?></td>
<td>
 <a title='remove' class="btn btn-remove" href="<?php echo base_url();?>admin/deletefile/<?php echo $file['id']?>">
  	<span class="icon12 icomoon-icon-remove"></span></a>         
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














