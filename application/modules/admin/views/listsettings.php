<div class="row">
                        <div class="col-lg-12">
                        <?php	
      //flash messages
      if($this->session->flashdata('flash_message'))
      {
        if($this->session->flashdata('flash_message') == 'deleted')
        {
			echo '<div class="alert alert-danger fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>Settings Deleted Successfully.</div>';       
        }
        if($this->session->flashdata('flash_message') == 'added')
        {
			echo '<div class="alert alert-success fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>Settings Added Successfully.</div>';       
        }
        if($this->session->flashdata('flash_message') == 'updated')
        {
			echo '<div class="alert alert-success fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>Settings Updated Successfully.</div>';       
        }
  	  }
      ?>
                            <div class="panel panel-default gradient">
                                <div class="panel-heading">
                                    <h4>
                                        <span>List Settings</span>
                                    </h4>
                                </div>
                                <div class="panel-body noPad clearfix">
                                	<?php
if(count($allsettings)>0)
{
	?>
                                    <table cellpadding="0" cellspacing="0" border="0" class="dynamicTable display table table-bordered" width="100%">
                                        <thead>
                                            <tr>
		<th>Id</th>
		<th>Aws Access Key</th>
		<th>Aws Secret Key</th>
		<th>Discount</th>
		<th>Dis_Status</th>
		<th>Merchant_Email</th>
		<th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

	<?php
	foreach($allsettings as $setting)
	{
		?>
		<tr class="odd gradeX">
		<td><?php echo $setting['id']?></td>
		<td><?php echo $setting['awsAccessKey']?></td>
		<td><?php echo $setting['awsSecretKey']?></td>
		
		<td><?php echo $setting['discount']?></td>
		<td><?php echo $setting['discountactive']?></td>
		<td><?php echo $setting['paypalmerchanctemail']?></td>
		
		
<td>
 <a title='edit' class="btn btn-pencil" href="<?php echo base_url();?>admin/editsettings">
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














