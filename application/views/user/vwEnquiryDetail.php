<?php
	$this->load->view('user/vwadminheader.php');
?>
	
<div id="wrapper">
	<div class="main-content">
	<div class="row small-spacing">
		<div class="col-12">
				<div class="">
					<?php $this->load->view('user/vwError'); ?>
					<div class="row">

						<div class="box-content col-lg-4 col-12">
							<?php if($dbValue->origin_city) { ?>	 <p><h5>Origin City</h5>  <?= $dbValue->origin_city; ?></p><hr>  <?php } ?>	
							<?php if($dbValue->destination_city) { ?>	 <p><h5>Destination City</h5>  <?= $dbValue->destination_city; ?></p> <hr> <?php } ?>	
							<?php if($dbValue->scheduling_type) { ?>	 <p><h5>Scheduling Type</h5>  <?= $dbValue->scheduling_type; ?></p> <hr> <?php } ?>	
							<?php if($dbValue->when_required_date) { ?>	 <p><h5> <?php if($dbValue->scheduling_type =='One Time') { echo 'Loading Date'; } else { echo 'When Required'; } ?></h5>  <?= $dbValue->when_required_date; ?></p> <hr> <?php } ?>
							<?php if($dbValue->when_required_time) { ?>	 <p><h5> <?php if($dbValue->scheduling_type =='One Time') { echo 'Loading Time'; } else { echo 'When Required Time'; } ?></h5>  <?= $dbValue->when_required_time; ?></p> <hr> <?php } ?>	
							<?php if($dbValue->type_of_transaction) { ?>	 <p><h5>Type of Transaction</h5>  <?= $dbValue->type_of_transaction; ?></p> <hr> <?php } ?>	
							<?php if($dbValue->product) { ?>	 <p><h5>Product</h5>  <?= $dbValue->product; ?></p> <hr> <?php } ?>	
							<?php if($dbValue->weight) { ?>	 <p><h5>Weight MT</h5>  <?= $dbValue->weight; ?></p> <hr> <?php } ?>	
							<?php if($dbValue->freight) { ?>	 <p><h5>Freight</h5>  <?= $dbValue->freight; ?></p> <hr> <?php } ?>	
							<?php if($dbValue->paymentterms_percentage) { ?>	 <p><h5>Payment Terms Advance </h5>  
								<?php  
									$advance_per = json_decode($dbValue->paymentterms_percentage);
									echo $advance_per->advance_per;
								?></p> <hr> <?php } ?>	
							<?php if($dbValue->type_of_load) { ?>	 <p><h5>Type of Load</h5>  <?= $dbValue->type_of_load; ?></p> <hr> <?php } ?>
							<?php if($dbValue->industry_type) { ?>	 <p><h5>Industry Type</h5>  <?= $dbValue->industry_type; ?></p> <hr> <?php } ?>	
							<?php if($dbValue->product_commodities) { ?>	 <p><h5>Product/Commodities</h5>  <?= $dbValue->product_commodities; ?></p> <hr> <?php } ?>	
							<?php if($dbValue->approx_weight_kg) { ?>	 <p><h5>Approx Weight (Kg)</h5>  <?= $dbValue->approx_weight_kg; ?></p> <hr> <?php } ?>
							<?php if($dbValue->volume_weight) { ?>	 <p><h5>Volume Weight</h5>  <?= $dbValue->volume_weight; ?></p> <hr> <?php } ?>	
							<?php if($dbValue->no_of_packets) { ?>	 <p><h5>No of Packets</h5>  <?= $dbValue->no_of_packets; ?></p> <hr> <?php } ?>	
							<?php if($dbValue->pickup_address) { ?>	 <p><h5>Pickup Address</h5>  <?= $dbValue->pickup_address; ?></p> <hr> <?php } ?>
							<?php if($dbValue->drop_address) { ?>	 <p><h5>Drop Address</h5>  <?= $dbValue->drop_address; ?></p> <hr> <?php } ?>	
							<?php if($dbValue->specific_requirement) { ?>	 <p><h5>Any specific requirement (if any)</h5>  <?=  wordwrap($dbValue->specific_requirement,15,"<br>\n");?></p> <hr> <?php } ?>	
							<?php if($dbValue->area) { ?>	 <p><h5>Area</h5>  <?= $dbValue->area; ?></p> <hr> <?php } ?>
							<?php if($dbValue->area_dimension) { ?>	 <p><h5>Area Dimension</h5>  <?= $dbValue->area_dimension; ?></p> <hr> <?php } ?>	
							<?php if($dbValue->location) { ?>	 <p><h5>Location</h5>  <?= $dbValue->location; ?></p> <hr> <?php } ?>	
							<?php if($dbValue->whatsapp_no) { ?>	 <p><h5>WhatsApp no</h5>  <?= $dbValue->whatsapp_no; ?></p> <hr> <?php } ?>
							<?php if($dbValue->type_of_warehouse) { ?>	 <p><h5>Type of warehouse</h5>  <?= $dbValue->type_of_warehouse; ?></p> <hr> <?php } ?>	
					
							
							<?php if($dbValue->services) { ?>	 <p><h5>Services</h5>  <?= $dbValue->services; ?></p> <hr> <?php } ?>	
							<?php if($dbValue->city) { ?>	 <p><h5>City</h5>  <?= $dbValue->city; ?></p> <hr> <?php } ?>
							<?php if($dbValue->state) { ?>	 <p><h5>State</h5>  <?= $dbValue->state; ?></p> <hr> <?php } ?>	
							<?php if($dbValue->country) { ?>	 <p><h5>Country</h5>  <?= $dbValue->country; ?></p> <hr> <?php } ?>	
							<?php if($dbValue->name) { ?>	 <p><h5>Name</h5>  <?= $dbValue->name; ?></p> <hr> <?php } ?>
							<?php if($dbValue->contact_no) { ?>	 <p><h5>Contact No</h5>  <?= $dbValue->contact_no; ?></p> <hr> <?php } ?>	
							<?php if($dbValue->email) { ?>	 <p><h5>Email</h5>  <?= $dbValue->email; ?></p> <hr> <?php } ?>	
							<?php if($dbValue->expected_rate_sqr_feet) { ?>	 <p><h5>Expected Rate/Sqr Feet</h5>  <?= $dbValue->expected_rate_sqr_feet; ?></p> <hr> <?php } ?>
							<?php if($dbValue->shed_requirement) { ?>	 <p><h5>Shed Requirement</h5>  <?= $dbValue->shed_requirement; ?></p> <hr> <?php } ?>	
							<?php if($dbValue->area_required) { ?>	 <p><h5>Total Area Required (ft2/m2)</h5>  <?= $dbValue->area_required; ?></p> <hr> <?php } ?>	
							<?php if($dbValue->street_1) { ?>	 <p><h5>Street 1</h5>  <?= $dbValue->street_1; ?></p> <hr> <?php } ?>
							<?php if($dbValue->street_2) { ?>	 <p><h5>Street 2</h5>  <?= $dbValue->street_2; ?></p> <hr> <?php } ?>	
							<?php if($dbValue->town) { ?>	 <p><h5>Town</h5>  <?= $dbValue->town; ?></p> <hr> <?php } ?>	
							<?php if($dbValue->district) { ?>	 <p><h5>District</h5>  <?= $dbValue->district; ?></p> <hr> <?php } ?>
							<?php if($dbValue->pincode) { ?>	 <p><h5>Pincode</h5>  <?= $dbValue->pincode; ?></p> <hr> <?php } ?>	
							<?php if($dbValue->min_lockin_period) { ?>	 <p><h5>Min Lockin Period</h5>  <?= $dbValue->min_lockin_period; ?></p> <hr> <?php } ?>	
							<?php if($dbValue->dedicated_and_shared) { ?>	 <p><h5>Dedicated and Shared</h5>  <?= $dbValue->dedicated_and_shared; ?></p> <hr> <?php } ?>
							<?php if($dbValue->other_services_provide) { ?>	 <p><h5>Other Services Provide</h5>  <?= $dbValue->other_services_provide; ?></p> <hr> <?php } ?>	
							<?php if($dbValue->available_for) { ?>	 <p><h5>Available for</h5>  <?= $dbValue->available_for; ?></p> <hr> <?php } ?>	
							<?php if($dbValue->tentative_price_sqr_feet) { ?>	 <p><h5>Tentative Price/sqr Feet</h5>  <?= $dbValue->tentative_price_sqr_feet; ?></p> <hr> <?php } ?>
							<?php if($dbValue->currency_id) { ?>	 <p><h5>Currency</h5>  <?= $dbValue->currency_id; ?></p> <hr> <?php } ?>	
							<?php if($dbValue->my_expected_freight) { ?>	 <p><h5>Expect Freight Rate</h5>  <?= $dbValue->my_expected_freight; ?></p> <hr> <?php } ?>	
					
							<!-- /.lead -->
							<?php if($dbValue->type_of_service) { ?>	 <p><h5>Type of Service</h5>  <?= $dbValue->type_of_service; ?></p> <hr> <?php } ?>
							<?php if($dbValue->dimension) { ?>	 <p><h5>Dimension</h5>  
							<?php
							 	foreach (json_decode($dbValue->dimension) as $key => $values) 
							 	{
							 		foreach ($values as  $value) 
							 		{
							 			echo $key. ' : ' .' '.$value."  ";
							 		}
							 		echo "<br>";
							 	}

							?>
							 </p> <hr> <?php } ?>	
							<?php if($dbValue->target_pricing) { ?>	 <p><h5>Target Pricing</h5>  <?= $dbValue->target_pricing; ?></p> <hr> <?php } ?>	
							<?php if($dbValue->wishtomove) { ?>	 <p><h5>What do you wish to move</h5>  <?= $dbValue->wishtomove; ?></p> <hr> <?php } ?>
							<?php if($dbValue->mode_of_transport) { ?>	 <p><h5>Mode of Transport</h5>  <?= $dbValue->mode_of_transport; ?></p> <hr> <?php } ?>	
							<?php if($dbValue->starttime) { ?>	 <p><h5>Start Time</h5>  <?= $dbValue->starttime; ?></p> <hr> <?php } ?>	
							<?php if($dbValue->closingtime) { ?>	 <p><h5>Closing Time</h5>  <?= $dbValue->closingtime; ?></p> <hr> <?php } ?>
							<?php if($dbValue->vendor_based_post) { ?>	 <p><h5>Vendor Based Post</h5>  <?= $dbValue->vendor_based_post; ?></p> <hr> <?php } ?>	
							<?php if($dbValue->type_of_product) { ?>	 <p><h5>Type of Product</h5>  <?= $dbValue->type_of_product; ?></p> <hr> <?php } ?>	
							<?php if($dbValue->product_requirement) { ?>	 <p><h5>Product Requirement</h5>  <?= $dbValue->product_requirement; ?></p> <hr> <?php } ?>
							<?php if($dbValue->essential_requirement) { ?>	 <p><h5>Essential Requirement</h5>  <?= $dbValue->essential_requirement; ?></p> <hr> <?php } ?>	
							<?php if($dbValue->volume_or_dense) { ?>	 <p><h5>Volume Or Dense</h5>  <?= $dbValue->volume_or_dense; ?></p> <hr> <?php } ?>	
							<?php if($dbValue->no_of_vehicles) { ?>	 <p><h5>No Of Vehicles</h5>  <?= $dbValue->no_of_vehicles; ?></p> <hr> <?php } ?>
							<?php if($dbValue->container_type) { ?>	 <p><h5>Container Type</h5>  <?= $dbValue->container_type; ?></p> <hr> <?php } ?>	
							<?php if($dbValue->type_of_vehicle) { ?>	 <p><h5>Type of Vehicle</h5>  <?= $dbValue->type_of_vehicle; ?></p> <hr> <?php } ?>	
							<?php if($dbValue->my_expect_freight) { ?>	 <p><h5>Expect Freight</h5>  <?= $dbValue->my_expect_freight; ?></p> <hr> <?php } ?>
							<?php if($dbValue->tentation_rate_Kg_in_USD) { ?>	 <p><h5>Tentation Rate Kg In USD</h5>  <?= $dbValue->tentation_rate_Kg_in_USD; ?></p> <hr> <?php } ?>	
							<?php if($dbValue->expertise_of_industries) { ?>	 <p><h5>Expertise Of Industries</h5>  <?= $dbValue->expertise_of_industries; ?></p> <hr> <?php } ?>	
							<?php if($dbValue->port_airport_in_india) { ?>	 <p><h5>Port Airport In India</h5>  <?= $dbValue->port_airport_in_india; ?></p> <hr> <?php } ?>
							<?php if($dbValue->my_expected_charges_shipment) { ?>	 <p><h5>My Expected Charges Shipment</h5>  <?= $dbValue->my_expected_charges_shipment; ?></p> <hr> <?php } ?>
						</div>
						<!-- /.col-lg-4 -->

						<?php
							if($this->session->userdata('user_type') =='vendor')
							{
								?>
						<div class=" box-content col-lg-8">
							<table id="example" class="table table-striped table-bordered display dataTable" style="width: 100%;" role="grid" aria-describedby="example_info">
						<thead>
							<tr role="row">
								<th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">S.No.</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Rate Per Unit</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Credit Term</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Validity</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Message</th>
							</tr>
						</thead>
						<tbody>	
						<?php 
							$i = 0; 
							foreach($dbValueVendotBit as $db_value){
								++$i;
								$tr_class = "odd";
								if($i%2 == 0){
									$tr_class = "even";
								}
						?>
							<tr role="row" class="<?=$tr_class?>">
								<td class="sorting_1"><?= $i; ?></td>
								<td><?= $db_value->rate_per_unit; ?></td>
								<td><?= $db_value->credit_term; ?></td>
								<td><?= $db_value->validity; ?></td>
								<td><?= wordwrap($db_value->message,50,"<br>\n") ?></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>

							<form action="<?php echo base_url('user/vendor/vendorbit/');?>" method="POST" enctype="multipart/form-data" autocomplete="off">
							<!-- /.box-title -->
							<div class="row">
								<div class="form-group col-lg-6">
									<label for="rate_per_unit">Rate (Per unit) <span class="text-danger">*</span></label>
									<input type="hidden" name="enquiry_id" value="<?= $dbValue->id ?>">
									<input type="hidden" name="reference_id" value="<?= $dbValue->reference_id ?>">
									<input type="hidden" name="category_id" value="<?= $dbValue->category_id ?>">
									<input type="hidden" name="customerid" value="<?= $dbValue->customerid ?>">
									<input type="number" class="form-control" id="rate_per_unit" name="rate_per_unit" value="" required="required" >
								</div>
								<div class="form-group col-lg-6">
									<label for="validity">Validity<span class="text-danger">*</span></label>
									<input type="date" class="form-control" id="validity" name="validity" value="" required="required">
								</div>
								<div class="form-group col-lg-6">
									<label for="credit_term">Credit Term<span class="text-danger">*</span></label>
									<input type="text" class="form-control" name="credit_term" value="" required="required">
								</div>
								<div class="form-group col-lg-6">
									<label for="message">Message</label>
									<textarea class="form-control" id="message" name="message" maxlength="250" required="required"></textarea>
								</div>
							</div>
							<button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">Submit</button>
							</form>
						</div>
						<?php
					}
					?>
					</div>
					<!-- /.row -->
				</div>
				<!-- /.box-content -->
			</div>

 <?php
	$this->load->view('user/vwadminfooter.php');
?>
