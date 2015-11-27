<div class="row">
                        <div class="col-lg-12">
                        <?php	
      //flash messages
      if($this->session->flashdata('flash_message'))
      {
        if($this->session->flashdata('flash_message') == 'deleted')
        {
			echo '<div class="alert alert-danger fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>Page Deleted Successfully.</div>';       
        }
        if($this->session->flashdata('flash_message') == 'added')
        {
			echo '<div class="alert alert-success fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>Page Added Successfully.</div>';       
        }
        if($this->session->flashdata('flash_message') == 'updated')
        {
			echo '<div class="alert alert-success fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>Page Updated Successfully.</div>';       
        }
  	  }
      ?>
                            <div class="panel panel-default gradient">
                                <div class="panel-heading">
                                    <h4>
                                        <span>List Pages</span>
                                    </h4>
                                </div>
                                <div class="panel-body noPad clearfix">
                                	<?php
if(count($allpages)>0)
{
	?>
                                    <table cellpadding="0" cellspacing="0" border="0" class="dynamicTable display table table-bordered" width="100%">
                                        <thead>
                                            <tr>
		<th>Id</th>
		<th>Title</th>
		<th>Content</th>
        <th>Created Date</th>
		<th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

	<?php
	foreach($allpages as $page)
	{
		?>
		<tr class="odd gradeX">
		<td><?php echo $page['id']?></td>
		<td><?php echo $page['title']?></td>
		<td><?php echo $page['content']?></td>
		<td><?php echo $page['created_date']?></td>
<td>
 <a title='remove' class="btn btn-remove" href="<?php echo base_url();?>admin/deletepage/<?php echo $page['id']?>">
  	<span class="icon12 icomoon-icon-remove"></span></a>  
 <a title='edit' class="btn btn-pencil" href="<?php echo base_url();?>admin/addpage/<?php echo $page['id']?>">
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














