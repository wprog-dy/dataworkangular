<?php
	$this->load->view('user/vwadminheader.php');
?>
<style>
	hr{
		margin-left: -20px;
    	margin-right: -20px;
	}
</style>

<div id="wrapper">
	<div class="main-content">
		<!-- .row -->
		<div class="row small-spacing ">
			
			<div class="col-lg-12">
				<div class="box-content">
					<h4 class="box-title"><?php echo $page_title; ?>

					<hr>
					</h4>
					
					<?php $this->load->view('user/vwError'); ?>
					
					<form action="<?php echo base_url('user/vehicle/form/').$id;?>" id="driver_form" method="POST" enctype="multipart/form-data" autocomplete="off">
					<!-- /.box-title -->
					<div class="row">
						<input type="hidden" id="driver_id" value="<?php echo set_value('id', $id);?>">
						<div class="form-group col-lg-6">
							<label for="vendor_name">Vendor <span class="text-danger">*</span></label>
							<select name="vendor_id" class="form-control select2_1" required="required">
								<option value="">Select...</option>
								<?php
								echo $v_id;
								foreach ($vendors as $key => $value) 
								{
									?>
									<option value="<?= $value->id; ?>" <?=  ($v_id==$value->id) ? 'selected' : ''; ?>  <?=  ($value->id==$vendor_id) ? 'selected' : ''; ?>  ><?= ucwords($value->first_name.' '.$value->last_name); ?></option>
									<?php
								}
								?>
							</select>
						</div>
						<div class="form-group col-lg-6">
							<label for="vehicle_type">Vehicle<span class="text-danger">*</span></label>
							<input type="text" class="form-control"  name="vehicle" value="<?php echo set_value('vehicle', $vehicle);?>">
						</div>
						<div class="form-group col-lg-6">
							<label for="vehicle_type">Vehicle Type<span class="text-danger">*</span></label>
							<select class="form-control select_vehicle_type" name="vehicle_type"  required="required" >
								<option value="">Select</option>
								<option <?php if($vehicle_type =='Open Body') { echo "selected"; } ?>   value="Open Body">Open Body</option>
								<option <?php if($vehicle_type =='Closed Container Body') { echo "selected"; } ?> value="Closed Container Body">Closed Container Body</option>
								<option <?php if($vehicle_type =='Flat Bed') { echo "selected"; } ?> value="Flat Bed">Flat Bed</option>
								<option <?php if($vehicle_type =='Dala Body') { echo "selected"; } ?> value="Dala Body">Dala Body</option>
								<option <?php if($vehicle_type =='Refer') { echo "selected"; } ?>  value="Refer">Refer</option>
								<option <?php if($vehicle_type =='Other') { echo "selected"; } ?> value="Other">Other</option>
							</select>
						</div>
						<div class="form-group col-lg-6 d-none vehicle_type_mention">
							<label for="vehicle_no">Vehicle Type Mention<span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="vehicle_type_mention" value="<?php echo set_value('vehicle_type_mention', $vehicle_type_mention);?>">
						</div>
						<div class="form-group col-lg-6">
							<label for="vehicle_no">Owner Name<span class="text-danger">*</span></label>
							<input type="text" class="form-control"  name="owner_name" value="<?php echo set_value('owner_name', $owner_name);?>">
						</div>
						<div class="form-group col-lg-6">
							<label for="vehicle_no">Registering Authority<span class="text-danger">*</span></label>
							<input type="text" class="form-control"  name="registering_authority" value="<?php echo set_value('registering_authority', $registering_authority);?>">
						</div>
						<div class="form-group col-lg-6">
							<label for="vehicle_no">Vehicle Class<span class="text-danger">*</span></label>
							<input type="text" class="form-control"  name="vehicle_class" value="<?php echo set_value('vehicle_class', $vehicle_class);?>">
						</div>
						<div class="form-group col-lg-6">
							<label for="vehicle_no">Fuel Type<span class="text-danger">*</span></label>
							<input type="text" class="form-control"  name="fuel_type" value="<?php echo set_value('fuel_type', $fuel_type);?>">
						</div>
						<div class="form-group col-lg-6">
							<label for="vehicle_no">Registration Date<span class="text-danger">*</span></label>
							<input type="date" class="form-control"  name="registration_date" value="<?php echo set_value('registration_date', $registration_date);?>">
						</div>
						<div class="form-group col-lg-6">
							<label for="vehicle_no">Fitness Valid upto<span class="text-danger">*</span></label>
							<input type="text" class="form-control"  name="fitness_valid_upto" value="<?php echo set_value('fitness_valid_upto', $fitness_valid_upto);?>">
						</div>
						<div class="form-group col-lg-6">
							<label for="vehicle_no">Insurance Valid upto<span class="text-danger">*</span></label>
							<input type="text" class="form-control"  name="insurance_valid_upto" value="<?php echo set_value('insurance_valid_upto', $insurance_valid_upto);?>">
						</div>
						<div class="form-group col-lg-6">
							<label for="vehicle_no">Tax Valid upto<span class="text-danger">*</span></label>
							<input type="text" class="form-control"  name="tax_valid_upto" value="<?php echo set_value('tax_valid_upto', $tax_valid_upto);?>">
						</div>
						<div class="form-group col-lg-6">
							<label for="vehicle_no">PUCC Valid upto<span class="text-danger">*</span></label>
							<input type="text" class="form-control"  name="pucc_valid_upto" value="<?php echo set_value('pucc_valid_upto', $pucc_valid_upto);?>">
						</div>
						
						<div class="form-group col-lg-6">
							<label for="vehicle_no">Registration/ Vehicle No<span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="vehicle_no" name="vehicle_no" value="<?php echo set_value('vehicle_no', $vehicle_no);?>">
						</div>
						<div class="form-group pt-3 padding-20 col-lg-6">
							<label for="vehicle_images">Photos of Vehicle  (Option to upload 5 Photos- one photo of each side and one photo of number place)</label><br>
							<input type="file" id="vehicle_images" name="vehicle_images[]" multiple="multiple" >
							
							<?php 
								$imageIcon 	= 'fa-file-image';
								$pdfIcon 	= 'fa-file-pdf';
								$docIcon 	= 'fa-file';
								$excelIcon 	= 'fa-file-excel';
								
								if(($id) && !empty($vehicle_images))
								{
							?>
								<div class="mt-1" style="display: flex; flex-wrap: wrap;">
							<?php 
									foreach(json_decode($vehicle_images) as $dbFile)
									{
										$dbFileArr = explode('.', $dbFile);
										$dbFileExtension = strtolower($dbFileArr[1]);
										
										switch ($dbFileExtension) {
											case 'jpg':	
											case 'jpeg':
											case 'png':
											case 'gif':
											case 'webp':
												$classIcon = $imageIcon;
												break;
											case 'pdf':	
												$classIcon = $pdfIcon;
												break;
											case 'xls':
											case 'xlsx':
												$classIcon = $excelIcon;
												break;
											default:
											   $classIcon = $docIcon;
										}
										
							?>
								<div class="mt-1" style="width: 15%;">
									<a href="<?php echo base_url("uploads/vehicle/$dbFile");?>" download><i class="fa <?php echo $classIcon; ?>" aria-hidden="true" style="font-size: xx-large;"></i></a>
								</div>
							<?php 
									}
							?>
							</div>
							<?php 
								} 
							?>
						</div>
						<div class="form-group pt-3 padding-20 col-lg-6">
							<label for="vehicle_images">Photos of Registration Certificate, Fitness, Insurance, Tax PUCC to be uploaded.</label><br>
							<input type="file" id="vehicle_important_images" name="vehicle_important_images[]" multiple="multiple" >
							
							<?php 
								$imageIcon 	= 'fa-file-image';
								$pdfIcon 	= 'fa-file-pdf';
								$docIcon 	= 'fa-file';
								$excelIcon 	= 'fa-file-excel';
								
								if(($id) && !empty($vehicle_images))
								{
							?>
								<div class="mt-1" style="display: flex; flex-wrap: wrap;">
							<?php 
									foreach(json_decode($vehicle_important_images) as $dbFile)
									{
										$dbFileArr = explode('.', $dbFile);
										$dbFileExtension = strtolower($dbFileArr[1]);
										
										switch ($dbFileExtension) {
											case 'jpg':	
											case 'jpeg':
											case 'png':
											case 'gif':
											case 'webp':
												$classIcon = $imageIcon;
												break;
											case 'pdf':	
												$classIcon = $pdfIcon;
												break;
											case 'xls':
											case 'xlsx':
												$classIcon = $excelIcon;
												break;
											default:
											   $classIcon = $docIcon;
										}
										
							?>
								<div class="mt-1" style="width: 15%;">
									<a href="<?php echo base_url("uploads/vehicle/$dbFile");?>" download><i class="fa <?php echo $classIcon; ?>" aria-hidden="true" style="font-size: xx-large;"></i></a>
								</div>
							<?php 
									}
							?>
							</div>
							<?php 
								} 
							?>
						</div>
						
					</div>
							
					<button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">Save</button>
					</form>
				
					<!-- /.row -->
				</div>
				<!-- /.box-content -->
			</div>

<?php
	$this->load->view('user/vwadminfooter.php');
?>
<script type="text/javascript">
	$('.select_vehicle_type').on('change', function()
	{
		if($(this).val()=='Other')
		{
			$('.vehicle_type_mention').removeClass('d-none');
		}
	});
</script>