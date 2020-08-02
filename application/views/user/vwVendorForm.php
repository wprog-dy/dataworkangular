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
	
	<!--<nav class="nav_breadcrumb mb-3" aria-label="breadcrumb">
		<ol class="breadcrumb secondary-color">
		  <li class="breadcrumb-item"><a class="white-text" href="#">Home</a></li>
		  <li class="breadcrumb-item"><a class="white-text" href="#">Library</a></li>
		  <li class="breadcrumb-item active">Data</li>
		</ol>
	</nav>-->
	
		<!-- .row -->
		<div class="row small-spacing ">
			
			<div class="col-lg-12">
				<div class="box-content">
					<h4 class="box-title"><?php echo $page_title; ?>

					<hr>
					</h4>
					
					<?php $this->load->view('user/vwError'); ?>
					
					<form action="<?php echo base_url('user/vendor/form/').$id;?>" id="user_form" method="POST" enctype="multipart/form-data" autocomplete="off">
					<!-- /.box-title -->
					<div class="row">
						<input type="hidden" name="user_type" value="vendor">
						<input type="hidden" id="user_id" value="<?php echo set_value('id', $id);?>">
						<div class="form-group col-lg-6">
							<label for="first_name">First Name <span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo set_value('first_name', $first_name);?>">
						</div>

						<div class="form-group col-lg-6">
							<label for="last_name">Last Name</label>
							<input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo set_value('last_name', $last_name);?>">
						</div>
						
						<div class="form-group col-lg-6">
							<label for="email">Email<span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="email" name="email" value="<?php echo set_value('email', $email);?>">
						</div>

						<div class="form-group col-lg-6">
							<label for="phone">Phone</label>
							<input type="text" class="form-control" id="phone" name="phone" value="<?php echo set_value('phone', $phone);?>">
						</div>

						<div class="form-group col-lg-6">
							<label for="other_phone">Other Mobile Number</label>
							<input type="text" class="form-control" id="other_phone" name="other_phone" value="<?php echo set_value('other_phone', $other_phone);?>">
						</div>

						<div class="form-group col-lg-6">
							<label for="landline">Other Landline Number</label>
							<input type="text" class="form-control" id="landline" name="landline" value="<?php echo set_value('landline', $landline);?>">
						</div>

						<div class="form-group col-lg-6">
							<label for="pancard_no">PAN Card No.</label>
							<input type="text" class="form-control" id="pancard_no" name="pancard_no" value="<?php echo set_value('pancard_no', $pancard_no);?>">
						</div>

						<div class="form-group col-lg-6">
							<label for="industry_type">Industry Type<span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="industry_type" name="industry_type" value="<?php echo set_value('industry_type', $industry_type);?>">
						</div>

						<div class="form-group col-lg-12">
							<label for="additional_info" >Tell customer something about your company<span class="text-danger">*</span></label>
							<textarea class="form-control" placeholder="Write description" name="additional_info" id="additional_info"><?php echo set_value('additional_info', $additional_info);?></textarea>
						</div>

						<div class="form-group col-lg-6">
							<label for="main_services">Main Services.<span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="main_services" name="main_services" value="<?php echo set_value('main_services', $main_services);?>">
						</div>
						
						<div class="form-group col-lg-6">
							<label for="services">Services<span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="services" name="services" value="<?php echo set_value('services', $services);?>">
						</div>
						
						<div class="form-group col-lg-6">
							<label for="city">City<span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="city" placeholder="Enter a location" name="city" value="<?php echo set_value('city', $city);?>">
						</div>

						<div class="form-group col-lg-6">
							<label for="contact_person">Contact Person<span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="contact_person" name="contact_person" value="<?php echo set_value('contact_person', $contact_person);?>">
						</div>

						<div class="form-group col-lg-6">
							<label for="company_type">Type of company<span class="text-danger">*</span></label>
							<select class="form-control select2_1" id="company_type" name="company_type">
									<option value="" readonly>Select type of your company...</option>
									<option value="Partnership" <?php echo $company_type == "Partnership" ? 'selected' : ''; ?>>Partnership</option>
									<option value="Proprietorship" <?php echo $company_type == "Proprietorship" ? 'selected' : ''; ?>>Proprietorship</option>
									<option value="Pvt. Ltd." <?php echo $company_type == "Pvt. Ltd." ? 'selected' : ''; ?>>Pvt. Ltd.</option>
									<option value="Ltd." <?php echo $company_type == "Ltd." ? 'selected' : ''; ?>>Ltd.</option>
									
							</select>
						</div>
						
						<div class="form-group col-lg-6">
							<label for="company_name">Company Name<span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="company_name" name="company_name" value="<?php echo set_value('company_name', $company_name);?>">
						</div>
						

						<div class="form-group col-lg-6">
							<label for="company_website">Company Website</label>
							<input type="text" class="form-control" id="company_website" placeholder="http://www.example.com" name="company_website" value="<?php echo set_value('company_website', $company_website);?>">
						</div>
						
						<div class="form-group col-lg-6">
							<label for="business_years">No. of year in business<span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="business_years" name="business_years" value="<?php echo set_value('business_years', $business_years);?>">
						</div>

						<div class="form-group col-lg-6">
							<label for="password">Password<span class="text-danger">*</span></label>
							<input type="password" class="form-control" id="password" name="password" autocomplete="new-password" value="<?php echo set_value('password', $password);?>">
						</div>
						
						<!--<div class="form-group col-lg-6">
							<label for="confirm_password">Confirm Password<span class="text-danger">*</span></label>
							<input type="password" class="form-control" id="confirm_password" name="confirm_password" autocomplete="new-password" value="<?php /* echo set_value('password', $password); */?>">
						</div>-->

						<div class="form-group col-lg-6">
							<label for="gst_no">GSTIN Number</label>
							<input type="text" class="form-control" id="gst_no" name="gst_no" value="<?php echo set_value('first_name', $first_name);?>">
						</div>
						
						<div class="form-group pt-3 padding-20 col-lg-6">
							<label for="verification_docs">Upload verification docs</label><br>
							<input type="file" id="verification_docs" name="verification_docs[]" multiple>
							
							<?php 
								$imageIcon 	= 'fa-file-image';
								$pdfIcon 	= 'fa-file-pdf';
								$docIcon 	= 'fa-file';
								$excelIcon 	= 'fa-file-excel';
								
								if(($id) && !empty($verification_docs)){
							?>
								<div class="mt-1" style="display: flex; flex-wrap: wrap;">
							<?php 
									foreach(json_decode($verification_docs) as $dbFile){
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
									<a href="<?php echo base_url("uploads/vendor/$dbFile");?>" download><i class="fa <?php echo $classIcon; ?>" aria-hidden="true" style="font-size: xx-large;"></i></a>
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
							<label for="verification_docs">Upload Company GST Certificate (Remarks- If not applicable, then submit Declaration Form)</label><br>
							 <input type="file" id="gst_certificate"  name="gst_certificate[]" multiple="multiple" >
							 <?php 
                        $imageIcon  = 'fa-file-image';
                        $pdfIcon    = 'fa-file-pdf';
                        $docIcon    = 'fa-file';
                        $excelIcon  = 'fa-file-excel';
                        
                        if(($id) && !empty($gst_certificate))
                        {
                     ?>
                        <div class="mt-1" style="display: flex; flex-wrap: wrap;">
                     <?php 
                           foreach(json_decode($gst_certificate) as $dbFile)
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
                           			<a href="<?php echo base_url("uploads/vendor/$dbFile");?>" download><i class="fa <?php echo $classIcon; ?>" aria-hidden="true" style="font-size: xx-large;"></i></a>
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
							<label for="verification_docs">Upload PAN Card</label><br>
							 <input type="file" id="pan_cart_image"  name="pan_cart_image[]" multiple="multiple" >
							 <?php 
                        $imageIcon  = 'fa-file-image';
                        $pdfIcon    = 'fa-file-pdf';
                        $docIcon    = 'fa-file';
                        $excelIcon  = 'fa-file-excel';
                        
                        if(($id) && !empty($pan_cart_image))
                        {
                     ?>
                        <div class="mt-1" style="display: flex; flex-wrap: wrap;">
                     <?php 
                           foreach(json_decode($pan_cart_image) as $dbFile)
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
                           			<a href="<?php echo base_url("uploads/vendor/$dbFile");?>" download><i class="fa <?php echo $classIcon; ?>" aria-hidden="true" style="font-size: xx-large;"></i></a>
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
							<label for="verification_docs">Upload PAN Card</label><br>
							 <input type="file" id="cancelled_cheque"  name="cancelled_cheque[]" multiple="multiple" >
							 <?php 
                        $imageIcon  = 'fa-file-image';
                        $pdfIcon    = 'fa-file-pdf';
                        $docIcon    = 'fa-file';
                        $excelIcon  = 'fa-file-excel';
                        
                        if(($id) && !empty($cancelled_cheque))
                        {
                     ?>
                        <div class="mt-1" style="display: flex; flex-wrap: wrap;">
                     <?php 
                           foreach(json_decode($cancelled_cheque) as $dbFile)
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
                           			<a href="<?php echo base_url("uploads/vendor/$dbFile");?>" download><i class="fa <?php echo $classIcon; ?>" aria-hidden="true" style="font-size: xx-large;"></i></a>
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
							<label for="verification_docs">Upload Director ID Proof</label><br>
							 <input type="file" id="director_id_roof"  name="director_id_roof[]" multiple="multiple" >
							 <?php 
                        $imageIcon  = 'fa-file-image';
                        $pdfIcon    = 'fa-file-pdf';
                        $docIcon    = 'fa-file';
                        $excelIcon  = 'fa-file-excel';
                        
                        if(($id) && !empty($director_id_roof))
                        {
                     ?>
                        <div class="mt-1" style="display: flex; flex-wrap: wrap;">
                     <?php 
                           foreach(json_decode($director_id_roof) as $dbFile)
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
                           			<a href="<?php echo base_url("uploads/vendor/$dbFile");?>" download><i class="fa <?php echo $classIcon; ?>" aria-hidden="true" style="font-size: xx-large;"></i></a>
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
							<label for="verification_docs">Upload MSME Certificate, if applicable.</label><br>
							 <input type="file" id="msme_certificate"  name="msme_certificate[]" multiple="multiple" >
							 <?php 
                        $imageIcon  = 'fa-file-image';
                        $pdfIcon    = 'fa-file-pdf';
                        $docIcon    = 'fa-file';
                        $excelIcon  = 'fa-file-excel';
                        
                        if(($id) && !empty($msme_certificate))
                        {
                     ?>
                        <div class="mt-1" style="display: flex; flex-wrap: wrap;">
                     <?php 
                           foreach(json_decode($msme_certificate) as $dbFile)
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
                           			<a href="<?php echo base_url("uploads/vendor/$dbFile");?>" download><i class="fa <?php echo $classIcon; ?>" aria-hidden="true" style="font-size: xx-large;"></i></a>
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
							<label for="adhar_card_img">Adhar card</label><br>
							<input type="file" id="adhar_card_img" name="adhar_card_img[]" multiple>
							
							<?php 
								$imageIcon 	= 'fa-file-image';
								$pdfIcon 	= 'fa-file-pdf';
								$docIcon 	= 'fa-file';
								$excelIcon 	= 'fa-file-excel';
								
								if(($id) && !empty($adhar_card_img)){
							?>
								<div class="mt-1" style="display: flex; flex-wrap: wrap;">
							<?php 
									foreach(json_decode($adhar_card_img) as $dbFile){
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
									<a href="<?php echo base_url("uploads/customer/$dbFile");?>" download><i class="fa <?php echo $classIcon; ?>" aria-hidden="true" style="font-size: xx-large;"></i></a>
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
							<label for="driving_linces_img">Driving linces</label><br>
							<input type="file" id="driving_linces_img" name="driving_linces_img[]" multiple>
							
							<?php 
								$imageIcon 	= 'fa-file-image';
								$pdfIcon 	= 'fa-file-pdf';
								$docIcon 	= 'fa-file';
								$excelIcon 	= 'fa-file-excel';
								
								if(($id) && !empty($driving_linces_img)){
							?>
								<div class="mt-1" style="display: flex; flex-wrap: wrap;">
							<?php 
									foreach(json_decode($driving_linces_img) as $dbFile){
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
									<a href="<?php echo base_url("uploads/customer/$dbFile");?>" download><i class="fa <?php echo $classIcon; ?>" aria-hidden="true" style="font-size: xx-large;"></i></a>
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
							<label for="other_docs">Other Docs</label><br>
							<input type="file" id="other_docs" name="other_docs[]" multiple>
							
							<?php 
								$imageIcon 	= 'fa-file-image';
								$pdfIcon 	= 'fa-file-pdf';
								$docIcon 	= 'fa-file';
								$excelIcon 	= 'fa-file-excel';
								
								if(($id) && !empty($other_docs)){
							?>
								<div class="mt-1" style="display: flex; flex-wrap: wrap;">
							<?php 
									foreach(json_decode($other_docs) as $dbFile){
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
									<a href="<?php echo base_url("uploads/customer/$dbFile");?>" download><i class="fa <?php echo $classIcon; ?>" aria-hidden="true" style="font-size: xx-large;"></i></a>
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
					<!--&emsp;
					By clicking 'Register' you agree to Logisticwala <a href="#">Terms & Condition</a>-->
					<!-- /.col-lg-6 -->
					</form>
				
					<!-- /.row -->
				</div>
				<!-- /.box-content -->
			</div>

<?php
	$this->load->view('user/vwadminfooter.php');
?>