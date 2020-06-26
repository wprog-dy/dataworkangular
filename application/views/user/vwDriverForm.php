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
					
					<form action="<?php echo base_url('user/driver/form/').$id;?>" id="driver_form" method="POST" enctype="multipart/form-data" autocomplete="off">
					<!-- /.box-title -->
					<div class="row">
						<input type="hidden" id="driver_id" value="<?php echo set_value('id', $id);?>">
						<div class="form-group col-lg-6">
							<label for="vendor_name">Vendor <span class="text-danger">*</span></label>
							<select name="vendor_id" class="form-control select2_1" required="required">
								<option value="">Select...</option>
								<?php
								foreach ($vendors as $key => $value) 
								{
									?>
									<option value="<?= $value->id; ?>" <?=  ($v_id == $value->id) ? 'selected' : ''; ?> <?=  ($value->id==$vendor_id) ? 'selected' : ''; ?>  ><?= ucwords($value->first_name.' '.$value->last_name); ?></option>
									<?php
								}
								?>
							</select>
						</div>
						<div class="form-group col-lg-6">
							<label for="driver_name">Driver Name <span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="driver_name" name="driver_name" value="<?php echo set_value('driver_name', $driver_name);?>">
						</div>
						<div class="form-group col-lg-6">
							<label for="driver_type">Driver Type<span class="text-danger">*</span></label>
							<select class="form-control select2_1" id="driver_type" name="driver_type">
									<option value="" readonly>Select type of your driver...</option>
									<option value="Biker" <?php echo $driver_type == "Biker" ? 'selected' : ''; ?>>Biker</option>
									<option value="Commercial Drop" <?php echo $driver_type == "Commercial Drop" ? 'selected' : ''; ?>>Commercial Drop</option>
									
							</select>
						</div>
						<div class="form-group col-lg-6">
							<label for="phone_no">Mobile No.<span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="phone_no" name="phone_no" value="<?php echo set_value('phone_no', $phone_no);?>">
						</div>
						<div class="form-group col-lg-6">
							<label for="phone_no">Driving License No.<span class="text-danger">*</span></label>
							<input type="text" class="form-control"  name="driving_license_no" value="<?php echo set_value('driving_license_no', $driving_license_no);?>">
						</div>
						<div class="form-group col-lg-6">
							<label for="phone_no">Driving License Type<span class="text-danger">*</span></label>
							<select class="form-control" name="driving_license_type"  required="required" >
								<option value="">Select</option>
								<option <?php if($driving_license_type =='Permanent License') { echo "selected"; } ?>   value="Permanent License">Permanent License</option>
								<option <?php if($driving_license_type =='Heavy Motor Vehicle License') { echo "selected"; } ?> value="Heavy Motor Vehicle License">Heavy Motor Vehicle License</option>
								<option <?php if($driving_license_type =='Light Motor Vehicle License') { echo "selected"; } ?> value="Light Motor Vehicle License">Light Motor Vehicle License</option>
								<option <?php if($driving_license_type =='International Driving License') { echo "selected"; } ?> value="International Driving License">International Driving License</option>
							</select>
						</div>
						
						<div class="form-group col-lg-6">
							<label for="dob">Date Of Birth</label>
							<input type="date" class="form-control" id="dob" name="dob" value="<?php echo set_value('dob', $dob);?>">
						</div>
						<div class="form-group col-lg-6">
							<label for="dob">Driving License Issue Date</label>
							<input type="date" class="form-control" name="driving_license_issue_date" value="<?php echo set_value('driving_license_issue_date', $driving_license_issue_date);?>">
						</div>
						<div class="form-group col-lg-6">
							<label for="dob">Driving License Valid Till</label>
							<input type="text" class="form-control" name="driving_license_valid_till" value="<?php echo set_value('driving_license_valid_till', $driving_license_valid_till);?>">
						</div>
						
						<div class="form-group col-lg-6">
							<label for="aadhar_number">Aadhar No.</label>
							<input type="text" class="form-control" id="aadhar_number" name="aadhar_number" value="<?php echo set_value('aadhar_number', $aadhar_number);?>">
						</div>

						<div class="form-group col-lg-6">
							<label for="address">Address</label>
							<textarea class="form-control" id="address" name="address"><?php echo set_value('address', $address);?></textarea>
						</div>
						
						<div class="form-group pt-3 padding-20 col-lg-6">
							<label for="driving_license_front">Upload Driving License (front & back)</label><br>
							<input type="file" id="driving_license_front" name="driving_license_front">
							
							<?php 
								$imageIcon 	= 'fa-file-image';
								$pdfIcon 	= 'fa-file-pdf';
								$docIcon 	= 'fa-file';
								$excelIcon 	= 'fa-file-excel';
								
								if(($id) && !empty($driving_license_front)){
							?>
								<div class="mt-1" style="display: flex; flex-wrap: wrap;">
							<?php 
									$dbFile = $driving_license_front;
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
										<a href="<?php echo base_url("uploads/driver/$dbFile");?>" download><i class="fa <?php echo $classIcon; ?>" aria-hidden="true" style="font-size: xx-large;"></i></a>
									</div>
								</div>
							<?php 
									}
							?>
							
						</div>
						<div class="form-group pt-3 padding-20 col-lg-6">
							<label for="aadhar_card_front_back">Upload Aadhar Card (front & back)</label><br>
							<input type="file" id="aadhar_card_front_back" name="aadhar_card_front_back">
							
							<?php 
								$imageIcon 	= 'fa-file-image';
								$pdfIcon 	= 'fa-file-pdf';
								$docIcon 	= 'fa-file';
								$excelIcon 	= 'fa-file-excel';
								
								if(($id) && !empty($aadhar_card_front_back)){
							?>
								<div class="mt-1" style="display: flex; flex-wrap: wrap;">
							<?php 
									$dbFile = $aadhar_card_front_back;
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
									<a href="<?php echo base_url("uploads/driver/$dbFile");?>" download><i class="fa <?php echo $classIcon; ?>" aria-hidden="true" style="font-size: xx-large;"></i></a>
								</div>
								</div>
							<?php 
									}
							?>
							
						</div>
						<div class="form-group pt-3 padding-20 col-lg-6">
							<label for="profile_image">Upload Profile image</label><br>
							<input type="file" id="profile_image" name="profile_image">
							
							<?php 
								$imageIcon 	= 'fa-file-image';
								$pdfIcon 	= 'fa-file-pdf';
								$docIcon 	= 'fa-file';
								$excelIcon 	= 'fa-file-excel';
								
								if(($id) && !empty($profile_image)){
							?>
								<div class="mt-1" style="display: flex; flex-wrap: wrap;">
							<?php 
									$dbFile = $profile_image;
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
									<a href="<?php echo base_url("uploads/driver/$dbFile");?>" download><i class="fa <?php echo $classIcon; ?>" aria-hidden="true" style="font-size: xx-large;"></i></a>
								</div>
									</div>
							<?php 
									}
							?>
						
						</div>
						
						<div class="form-group pt-3 padding-20 col-lg-6">
							<label for="verification_images">Verification Images</label><br>
							<input type="file" id="verification_images" name="verification_images[]" multiple="multiple" >
							
							<?php 
								$imageIcon 	= 'fa-file-image';
								$pdfIcon 	= 'fa-file-pdf';
								$docIcon 	= 'fa-file';
								$excelIcon 	= 'fa-file-excel';
								
								if(($id) && !empty($verification_images))
								{
							?>
								<div class="mt-1" style="display: flex; flex-wrap: wrap;">
							<?php 
									foreach(json_decode($verification_images) as $dbFile)
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
									<a href="<?php echo base_url("uploads/driver/$dbFile");?>" download><i class="fa <?php echo $classIcon; ?>" aria-hidden="true" style="font-size: xx-large;"></i></a>
								</div>
								</div>
							<?php 
									} 
								} 
							?>
						</div>
							<div class="form-group col-lg-6">
							<label for="driver_mobile_type">Driver Mobile Type<span class="text-danger">*</span></label>
							<select class="form-control" name="driver_mobile_type"  required="required" >
								<option value="">Select</option>
								<option <?php if($driver_mobile_type =='Smart Phone') { echo "selected"; } ?>   value="Smart Phone">Smart Phone</option>
								<option <?php if($driver_mobile_type =='Basic Handset') { echo "selected"; } ?> value="Basic Handset">Basic Handset</option>
							</select>
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