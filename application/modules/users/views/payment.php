<div class="analize">
    <div class="rate-tag-blue analizing-page-mar">
    	<div class="container">
        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 zero-padding authorize padd-check">
            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 zero-padding">
				<h1 class="message">
				<?php
				if($result_array['ACK']=='Success')
				{
				?>
	<img src="<?php echo base_url();?>images/frontend/checked21.png" class="tick">
	This transaction is completed sucessfully .
	</h1>
				<?php
				}
				else
				{
				?>					
				<h1 class="message">
				<img src="<?php echo base_url();?>images/frontend/delete85.png" class="tick">
				This transaction is not completed.
				<?php
					echo $result_array['L_LONGMESSAGE0'];
					print_r($result_array);
				?>
				</h1>
					<?php
				}
				?>


                </div>
            </div>
        </div>
    </div>
</div>

