<?php 
if(!isset($csvdata['error'])){ 

	if(!$processedData){
?>
		<h3>Preview: </h3>
<?php
	} 
?>
	<table id="" class="table table-striped table-bordered display dataTable table-responsive" style="width: 100%;" role="grid" aria-describedby="example_info">
		<thead>
			<tr role="row">
				<?php 
					if(isset($processedData) && !empty($processedData)){ 
						$textDanger = 'text-danger';
						$textRow 	= 'Row No.';
					}else{ 
						$textDanger = '';
						$textRow 	= 'S.No.';
					}
				?>
				<th class="<?php echo $textDanger; ?>" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending"><?php echo $textRow; ?></th>
				
				<?php if(isset($processedData) && !empty($processedData)){ ?>
				
				<th class=" <?php echo $textDanger; ?>" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" style="min-width: 120px;">Possible Reasons</th>
					
				<?php }	?>
				
				
				<th class="" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">First Name</th>
				
				<th class="" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Last Name</th>
				
				<th class="" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Email</th>
				
				<th class="" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Phone</th>
				
				<th class="" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Password</th>
				
				<th class="" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Other Phone</th>
				
				<th class="" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Landline</th>
				
				<th class="" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Pancard</th>
				
				<th class="" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Industry Type</th>
				
				<?php if($user_type == 'vendor'){ ?>
				
				<th class="" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Additional Info</th>
				
				<th class="" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Main Services</th>
				
				<th class="" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Services</th>
				
				<?php } ?>
				
				<th class="" tabindex="0" aria-controls="example" rowspan="1" colspan="1">City</th>
				
				<th class="" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Contact Person</th>
				
				<th class="" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Contact Name</th>
				
				<th class="" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Company Type</th>
				
				<th class="" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Company Website</th>
				
				<th class="" tabindex="0" aria-controls="example" rowspan="1" colspan="1">GSTIN Number</th>
				
				<th class="" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Business Years</th>
				
				<th class=" text-center" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Block/Unblock</th>
				
				<?php if($user_type == 'vendor'){ ?>
				
				<th class=" text-center" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Featured</th>
				
				<?php } ?>
			</tr>
		</thead>
		<!--<tfoot>
			<tr><th rowspan="1" colspan="1">Name</th><th rowspan="1" colspan="1">Position</th><th rowspan="1" colspan="1">Office</th><th rowspan="1" colspan="1">Age</th><th rowspan="1" colspan="1">Start date</th><th rowspan="1" colspan="1">Salary</th></tr>
		</tfoot>-->
		<tbody>	
		<?php 
			$i = 0; 
			if(isset($processedData) && !empty($processedData)){ 
				$csvdata = $processedData['error']['errorRow'];
			}
			foreach($csvdata as $errorRow => $csv){
				++$i;
				$tr_class = "odd";
				if($i%2 == 0){
					$tr_class = "even";
				}
		?>
			<tr role="row" class="<?=$tr_class?>">
				
				<td class="">
				<?php 
					if(isset($processedData) && !empty($processedData)){ 
						echo $errorRow;
					}else{ 
						echo $i;
					}
				?>
				</td>
				<?php if(isset($processedData) && !empty($processedData)){ ?>
				<td><?php echo $processedData['error']['errorReason'][$i+1];?></td>
				<?php } ?>
				<td><?php echo ucwords($csv['First Name']); ?></td>
				<td><?php echo ucwords($csv['Last Name']); ?></td>
				<td><?php echo $csv['Email']; ?></td>
				<!--<td><?php/*  echo $csv->login_code; */ ?></td>-->
				<td><?php echo $csv['Phone']; ?></td>
				<td><?php echo $csv['Password']; ?></td>
				<td><?php echo $csv['Other Phone']; ?></td>
				<td><?php echo $csv['Landline']; ?></td>
				<td><?php echo $csv['Pancard No']; ?></td>
				<td><?php echo $csv['Industry Type']; ?></td>
				
				<?php if($user_type == 'vendor'){ ?>
				
				<td><?php echo $csv['Additional Info']; ?></td>
				<td><?php echo $csv['Main Services']; ?></td>
				<td><?php echo $csv['Services']; ?></td>
				
				<?php } ?>
				
				<td><?php echo $csv['City']; ?></td>
				<td><?php echo $csv['Contact Person']; ?></td>
				<td><?php echo ucwords($csv['Company Name']); ?></td>
				<td><?php echo $csv['Company Type']; ?></td>
				<td><?php echo $csv['Company Website']; ?></td>
				<td><?php echo $csv['GSTIN Number']; ?></td>
				<td><?php echo $csv['Business Years']; ?></td>
				
				<td class="text-center">
					<div class="switch danger">
					<?php 
						$checkbox = "";
						// if($csv['Status'] == 0){
						if(strtolower($csv['Blocked']) == 'yes'){
							$checkbox = "checked";
						}
					?>
						<input type="checkbox" class="" name="status" <?=$checkbox?>>
						
						<label for="status">&nbsp;</label>
					</div>
				</td>
				
				<?php if($user_type == 'vendor'){ ?>
				
				<td class="text-center">
					<div class="switch danger">
					<?php 
						$checkbox = "";
						// if($csv['Featured'] == 1){
						if(strtolower($csv['Featured']) == 'yes'){
							$checkbox = "checked";
						}
					?>
						<input type="checkbox" class="" name="featured" <?=$checkbox?>>
						
						<label id="label_featured" for="featured">&nbsp;</label>
					</div>
				</td>
				
				<?php } ?>
			</tr>
			<?php } ?>
		</tbody>
	</table>

	<?php if(!$processedData){ ?>
		<button type="button" class="btn btn-sm btn-success" onclick="window.location.href='<?php echo base_url("user/common/processExcel/$user_type/$uploaded_file_name"); ?>'"><i class="fas fa-save"></i> Save <?=ucwords($user_type)?>s</button>
	<?php } ?>

<?php } else{ ?>
	<h3>Wrong format uploaded!!</h3>
<?php } ?>