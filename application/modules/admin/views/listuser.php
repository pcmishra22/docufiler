<div class="row">
                        <div class="col-lg-12">
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
		<th>Roll No</th>
		<th>Name</th>
		<th>Dept.</th>
		<th>University</th>
		<th>Technical Marks</th>
		<th>Aptitude Marks</th>
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
		<td><?php echo $users['rollno']?></td>
		<td><?php echo $users['name']?></td>
		<td><?php echo $users['deptartment']?></td>
		<td><?php echo $users['university']?></td>
		<td><?php echo $users['technical_marks']?></td>
		<td><?php echo $users['aptitude_marks']?></td>
		<td>
			<a title='remove' class="btn btn-danger" href="<?php echo base_url();?>admin/deleteuser/<?php echo $users['id']?>" class="btn btn-danger">
				<span class="icon12 icomoon-icon-remove"></span></a>
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














