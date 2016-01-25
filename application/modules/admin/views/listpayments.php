<div class="row">
                        <div class="col-lg-12">
                        <?php	
      //flash messages
      if($this->session->flashdata('flash_message'))
      {
        if($this->session->flashdata('flash_message') == 'deleted')
        {
			echo '<div class="alert alert-danger fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>Payment Deleted Successfully.</div>';       
        }
        if($this->session->flashdata('flash_message') == 'added')
        {
			echo '<div class="alert alert-success fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>payment Added Successfully.</div>';       
        }
        if($this->session->flashdata('flash_message') == 'updated')
        {
			echo '<div class="alert alert-success fade in">
    <a href="#" class="close" data-dismiss="alert">&times;</a>Payment Updated Successfully.</div>';       
        }
  	  }
      ?>
                            <div class="panel panel-default gradient">
                                <div class="panel-heading">
                                    <h4>
                                        <span>List Payments</span>
                                    </h4>
                                </div>
                                <div class="panel-body noPad clearfix">
                                	<?php
if(count($allpayments)>0)
{
	?>
                                    <table cellpadding="0" cellspacing="0" border="0" class="dynamicTable display table table-bordered" width="100%">
                                        <thead>
                                            <tr>
		<th>Id</th>
		<th>TransactionID</th>
		<th>Accountno</th>
		<th>UserId</th>
        <th>Date</th>
		<th>CCNO</th>
		<th>CCName</th>
        <th>Amt</th>
        <th>Status</th>
		
                                            </tr>
                                        </thead>
                                        <tbody>

	<?php
	foreach($allpayments as $payment)
	{
		?>
		<tr class="odd gradeX">
		<td><?php echo $payment['id']?></td>
		<td><?php echo $payment['transactionid']?></td>
		<td><?php echo $payment['accountno']?></td>
		<td><?php echo $payment['userid']?></td>
		<td><?php echo $payment['created_date']?></td>
		<td><?php echo $payment['ccno']?></td>
		<td><?php echo $payment['ccname']?></td>
        <td><?php echo $payment['amt']?></td>
		<td><?php echo $payment['status']?></td>
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














