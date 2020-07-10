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
					<h4 class="box-title"><?= $page_title; ?><hr></h4>
					<?php $this->load->view('user/vwError'); ?>
					
					<form action="<?= base_url("user/enquiries/form/$category_id/").$id;?>" method="POST" enctype="multipart/form-data" autocomplete="off">
					<!-- /.box-title -->
					<div class="row">
						<input type="hidden" name="category_id" value="<?= $category_id; ?>">
						<?php
						if(($category_id == '9')||($category_id == '10'))
						{
						?> 
						<div class="form-group col-lg-6">
							<label for="street_1">Street 1<span class="text-danger">*</span></label>
							<input type="text" class="form-control"  name="street_1" value="<?= set_value('street_1', $street_1);?>">
						</div>
						<?php
						}
						if(($category_id == '9')||($category_id == '10'))
						{
						?> 
						<div class="form-group col-lg-6">
							<label for="street_2">Street 2<span class="text-danger">*</span></label>
							<input type="text" class="form-control"  name="street_2" value="<?= set_value('street_2', $street_2);?>">
						</div>
						<?php
						}
						if(($category_id == '9')||($category_id == '10'))
						{
						?> 
						<div class="form-group col-lg-6">
							<label for="town">Town<span class="text-danger">*</span></label>
							<input type="text" class="form-control"  name="town" value="<?= set_value('town', $town);?>">
						</div>
						<?php
						}
						if(($category_id == '9')||($category_id == '10'))
						{
						?> 
						<div class="form-group col-lg-6">
							<label for="district">District<span class="text-danger">*</span></label>
							<input type="text" class="form-control"  name="district" value="<?= set_value('district', $district);?>">
						</div>
						<?php
						}
						if(($category_id == '2')||($category_id == '3')||($category_id == '17')||($category_id == '18')||($category_id == '19')||($category_id == '13')||($category_id == '14')||($category_id == '15')||($category_id == '22')||($category_id == '23'))
						{
						?> 
						<div class="form-group col-lg-6">
							<label for="origin_city">Origin City<span class="text-danger">*</span></label>
							<input type="text" class="form-control"  name="origin_city" value="<?= set_value('origin_city', $origin_city);?>">
						</div>
						<?php
						}
						if(($category_id == '2')||($category_id == '3')||($category_id == '17')||($category_id == '18')||($category_id == '19')||($category_id == '13')||($category_id == '14')||($category_id == '15')||($category_id == '22')||($category_id == '23'))
						{
						?>
						<div class="form-group col-lg-6">
							<label for="destination_city">Destination City<span class="text-danger">*</span></label>
							<input type="text" class="form-control"  name="destination_city" value="<?= set_value('destination_city', $destination_city);?>">
						</div>
						<?php
						}
						if(($category_id == '17')||($category_id == '18'))
						{
						?>
						<div class="form-group col-lg-6">
							<label for="target_pricing">Target Pricing<span class="text-danger">*</span></label>
							<input type="text" class="form-control"  name="target_pricing" value="<?= set_value('target_pricing', $target_pricing);?>">
						</div>
						<?php
						}
						if($category_id == '19')
						{
						?>
						<div class="form-group col-lg-6">
							<label for="product_requirement">Product Requirement<span class="text-danger">*</span></label>
							<select name="product_requirement" class="form-control" required="required">
								<option value="<?= set_value('product_requirement', $product_requirement); ?>">Select Product Requirement...</option>
								<option <?php if($product_requirement =='Time Bound') { echo "selected"; } ?> value="Time Bound">Time Bound</option>
								<option <?php if($product_requirement =='Odd Size') { echo "selected"; } ?> value="Odd Size">Odd Size </option>
								<option <?php if($product_requirement =='Special Permission') { echo "selected"; } ?> value="Special Permission">Special Permission</option>
								<option <?php if($product_requirement =='Securities') { echo "selected"; } ?> value="Securities">Securities</option>
							</select>
						</div>
						<?php
						}
						if($category_id == '19')
						{
						?>
						<div class="form-group col-lg-6">
							<label for="essential_requirement">Essential Requirement<span class="text-danger">*</span></label>
							<input type="text" class="form-control"  name="essential_requirement" value="<?= set_value('essential_requirement', $essential_requirement);?>">
						</div>
						<?php
						}
						if($category_id == '23')
						{
						?>
						<div class="form-group col-lg-6">
							<label for="tentation_rate_Kg_in_USD">Tentation Rate/Kg in USD<span class="text-danger">*</span></label>
							<input type="number" class="form-control"  name="tentation_rate_Kg_in_USD" value="<?= set_value('tentation_rate_Kg_in_USD', $tentation_rate_Kg_in_USD);?>">
						</div>
						<?php
						}
						if($category_id == '24')
						{
						?>
						<div class="form-group col-lg-6">
							<label for="expertise_of_industries">Expertise of Industries<span class="text-danger">*</span></label>
							<input type="number" class="form-control"  name="expertise_of_industries" value="<?= set_value('expertise_of_industries', $expertise_of_industries);?>">
						</div>
						<?php
						}
						if($category_id == '24')
						{
						?>
						<div class="form-group col-lg-6">
							<label for="port_airport_in_india">Port/Airport in India<span class="text-danger">*</span></label>
							<select name="port_airport_in_india" class="form-control" required="required">
								<option value="">Select Port/Airport</option>
								<option value="Singerbhil Airport (IXA)">Singerbhil Airport (IXA)</option>
								<option value="Agatti Island Airport (AGX)">Agatti Island Airport (AGX)</option>
								<option value="Kheria Airport (AGR)">Kheria Airport (AGR)</option>
								<option value="Ahmedabad Airport (AMD)">Ahmedabad Airport (AMD)</option>
								<option value="Aizawl Airport (AJL)">Aizawl Airport (AJL)</option>
								<option value="Akola Airport (AKD)">Akola Airport (AKD)</option>
								<option value="Bamrauli Airport (IXD)">Bamrauli Airport (IXD)</option>
								<option value="Along Airport (IXV)">Along Airport (IXV)</option>
								<option value="Raja Sansi Airport (ATQ)">Raja Sansi Airport (ATQ)</option>
								<option value="Chikkalthana Airport (IXU)">Chikkalthana Airport (IXU)</option>
								<option value="Bagdogra Airport (IXB)">Bagdogra Airport (IXB)</option>
								<option value="Balurghat Airport (RGH)">Balurghat Airport (RGH)</option>
								<option value="Hindustan Airport (BLR)">Hindustan Airport (BLR)</option>
								<option value="Bareli Airport (BEK)">Bareli Airport (BEK)</option>
								<option value="Sambre Airport (IXG)">Sambre Airport (IXG)</option>
								<option value="Bellary Airport (BEP)">Bellary Airport (BEP)</option>
								<option value="Bhatinda Airport (BUP)">Bhatinda Airport (BUP)</option>
								<option value="Bhavnagar Airport (BHU)">Bhavnagar Airport (BHU)</option>
								<option value="Bhopal Airport (BHO)">Bhopal Airport (BHO)</option>
								<option value="Bhubaneswar Airport (BBI)">Bhubaneswar Airport (BBI)</option>
								<option value="Rudra Mata Airport (BHJ)">Rudra Mata Airport (BHJ)</option>
								<option value="Bikaner Airport (BKB)">Bikaner Airport (BKB)</option>
								<option value="Bilaspur Airport (PAB)">Bilaspur Airport (PAB)</option>
								<option value="Chhatrapati Shivaji Airport (BOM)">Chhatrapati Shivaji Airport (BOM)</option>
								<option value="Netaji Subhas Chandra Airport (CCU)">Netaji Subhas Chandra Airport (CCU)</option>
								<option value="Car Nicobar Airport (CBD)">Car Nicobar Airport (CBD)</option>
								<option value="Chandigarh Airport (IXC)">Chandigarh Airport (IXC)</option>
								<option value="Peelamedu Airport (CJB)">Peelamedu Airport (CJB)</option>
								<option value="Cooch Behar Airport (COH)">Cooch Behar Airport (COH)</option>
								<option value="Cuddapah Airport (CDP)">Cuddapah Airport (CDP)</option>
								<option value="Daman Airport (NMB)">Daman Airport (NMB)</option>
								<option value="Daparizo Airport (DAE)">Daparizo Airport (DAE)</option>
								<option value="Darjeeling Airport (DAI)">Darjeeling Airport (DAI)</option>
								<option value="Dehra Dun Airport (DED)">Dehra Dun Airport (DED)</option>
								<option value="Indira Gandhi International Airport (DEL)">Indira Gandhi International Airport (DEL)</option>
								<option value="Deparizo Airport (DEP)">Deparizo Airport (DEP)</option>
								<option value="Dhanbad Airport (DBD)">Dhanbad Airport (DBD)</option>
								<option value="Gaggal Airport (DHM)">Gaggal Airport (DHM)</option>
								<option value="Chabua Airport (DIB)">Chabua Airport (DIB)</option>
								<option value="Dimapur Airport (DMU)">Dimapur Airport (DMU)</option>
								<option value="Diu Airport (DIU)">Diu Airport (DIU)</option>
								<option value="Gaya Airport (GAY)">Gaya Airport (GAY)</option>
								<option value="Dabolim Airport (GOI)">Dabolim Airport (GOI)</option>
								<option value="Gorakhpur Airport (GOP)">Gorakhpur Airport (GOP)</option>
								<option value="Guna Airport (GUX)">Guna Airport (GUX)</option>
								<option value="Borjhar Airport (GAU)">Borjhar Airport (GAU)</option>
								<option value="Gwalior Airport (GWL)">Gwalior Airport (GWL)</option>
								<option value="Hissar Airport (HSS)">Hissar Airport (HSS)</option>
								<option value="Hubli Airport (HBX)">Hubli Airport (HBX)</option>
								<option value="Begumpet Airport (HYD)">Begumpet Airport (HYD)</option>
								<option value="Municipal Airport (IMF)">Municipal Airport (IMF)</option>
								<option value="Indore Airport (IDR)">Indore Airport (IDR)</option>
								<option value="Jabalpur Airport (JLR)">Jabalpur Airport (JLR)</option>
								<option value="Jagdalpur Airport (JGB)">Jagdalpur Airport (JGB)</option>
								<option value="Sanganeer Airport (JAI)">Sanganeer Airport (JAI)</option>
								<option value="Jaisalmer Airport (JSA)">Jaisalmer Airport (JSA)</option>
								<option value="Satwari Airport (IXJ)">Satwari Airport (IXJ)</option>
								<option value="Govardhanpur Airport (JGA)">Govardhanpur Airport (JGA)</option>
								<option value="Sonari Airport (IXW)">Sonari Airport (IXW)</option>
								<option value="Jeypore Airport (PYB)">Jeypore Airport (PYB)</option>
								<option value="Jodhpur Airport (JDH)">Jodhpur Airport (JDH)</option>
								<option value="Rowriah Airport (JRH)">Rowriah Airport (JRH)</option>
								<option value="Kailashahar Airport (IXH)">Kailashahar Airport (IXH)</option>
								<option value="Kamalpur Airport (IXQ)">Kamalpur Airport (IXQ)</option>
								<option value="Kandla Airport (IXY)">Kandla Airport (IXY)</option>
								<option value="Kanpur Airport (KNU)">Kanpur Airport (KNU)</option>
								<option value="Keshod Airport (IXK)">Keshod Airport (IXK)</option>
								<option value="Khajuraho Airport (HJR)">Khajuraho Airport (HJR)</option>
								<option value="Khowai Airport (IXN)">Khowai Airport (IXN)</option>
								<option value="Kochi Airport (COK)">Kochi Airport (COK)</option>
								<option value="Kolhapur Airport (KLH)">Kolhapur Airport (KLH)</option>
								<option value="Kota Airport (KTU)">Kota Airport (KTU)</option>
								<option value="Calicut International Airport (CCJ)">Calicut International Airport (CCJ)</option>
								<option value="Bhuntar Airport (KUU)">Bhuntar Airport (KUU)</option>
								<option value="Leh Airport (IXL)">Leh Airport (IXL)</option>
								<option value="Lilabari Airport (IXI)">Lilabari Airport (IXI)</option>
								<option value="Amausi Airport (LKO)">Amausi Airport (LKO)</option>
								<option value="Ludhiana Airport (LUH)">Ludhiana Airport (LUH)</option>
								<option value="Chennai Airport (MAA)">Chennai Airport (MAA)</option>
								<option value="Madurai Airport (IXM)">Madurai Airport (IXM)</option>
								<option value="Malda Airport (LDA)">Malda Airport (LDA)</option>
								<option value="Bajpe Airport (IXE)">Bajpe Airport (IXE)</option>
								<option value="Mohanbari Airport (MOH)">Mohanbari Airport (MOH)</option>
								<option value="Muzaffarnagar Airport (MZA)">Muzaffarnagar Airport (MZA)</option>
								<option value="Muzaffarpur Airport (MZU)">Muzaffarpur Airport (MZU)</option>
								<option value="Mysore Airport (MYQ)">Mysore Airport (MYQ)</option>
								<option value="Sonegaon Airport (NAG)">Sonegaon Airport (NAG)</option>
								<option value="Nanded Airport (NDC)">Nanded Airport (NDC)</option>
								<option value="Gandhinagar Airport (ISK)">Gandhinagar Airport (ISK)</option>
								<option value="Neyveli Airport (NVY)">Neyveli Airport (NVY)</option>
								<option value="Osmanabad Airport (OMN)">Osmanabad Airport (OMN)</option>
								<option value="Pantnagar Airport (PGH)">Pantnagar Airport (PGH)</option>
								<option value="Pasighat Airport (IXT)">Pasighat Airport (IXT)</option>
								<option value="Pathankot Airport (IXP)">Pathankot Airport (IXP)</option>
								<option value="Patna Airport (PAT)">Patna Airport (PAT)</option>
								<option value="Pondicherry Airport (PNY)">Pondicherry Airport (PNY)</option>
								<option value="Porbandar Airport (PBD)">Porbandar Airport (PBD)</option>
								<option value="Port Blair Airport (IXZ)">Port Blair Airport (IXZ)</option>
								<option value="Lohegaon Airport (PNQ)">Lohegaon Airport (PNQ)</option>
								<option value="Puttaprathe Airport (PUT)">Puttaprathe Airport (PUT)</option>
								<option value="Raipur Airport (RPR)">Raipur Airport (RPR)</option>
								<option value="Rajahmundry Airport (RJA)">Rajahmundry Airport (RJA)</option>
								<option value="Civil Airport (RAJ)">Civil Airport (RAJ)</option>
								<option value="Rajouri Airport (RJI)">Rajouri Airport (RJI)</option>
								<option value="Ramagundam Airport (RMD)">Ramagundam Airport (RMD)</option>
								<option value="Ranchi Airport (IXR)">Ranchi Airport (IXR)</option>
								<option value="Ratnagiri Airport (RTC)">Ratnagiri Airport (RTC)</option>
								<option value="Rewa Airport (REW)">Rewa Airport (REW)</option>
								<option value="Rourkela Airport (RRK)">Rourkela Airport (RRK)</option>
								<option value="Rupsi Airport (RUP)">Rupsi Airport (RUP)</option>
								<option value="Salem Airport (SXV)">Salem Airport (SXV)</option>
								<option value="Satna Airport (TNI)">Satna Airport (TNI)</option>
								<option value="Shillong Airport (SHL)">Shillong Airport (SHL)</option>
								<option value="Sholapur Airport (SSE)">Sholapur Airport (SSE)</option>
								<option value="Kumbhirgram Airport (IXS)">Kumbhirgram Airport (IXS)</option>
								<option value="Simla Airport (SLV)">Simla Airport (SLV)</option>
								<option value="Srinagar Airport (SXR)">Srinagar Airport (SXR)</option>
								<option value="Surat Airport (STV)">Surat Airport (STV)</option>
								<option value="Salonibari Airport (TEZ)">Salonibari Airport (TEZ)</option>
								<option value="Tezu Airport (TEI)">Tezu Airport (TEI)</option>
								<option value="Thanjavur Airport (TJV)">Thanjavur Airport (TJV)</option>
								<option value="Thiruvananthapuram International Airport (TRV)">Thiruvananthapuram International Airport (TRV)</option>
								<option value="Civil Airport (TRZ)">Civil Airport (TRZ)</option>
								<option value="Tirupati Airport (TIR)">Tirupati Airport (TIR)</option>
								<option value="Tuticorin Airport (TCR)">Tuticorin Airport (TCR)</option>
								<option value="Dabok Airport (UDR)">Dabok Airport (UDR)</option>
								<option value="Vadodara Airport (BDQ)">Vadodara Airport (BDQ)</option>
								<option value="Varanasi Airport (VNS)">Varanasi Airport (VNS)</option>
								<option value="Vijayawada Airport (VGA)">Vijayawada Airport (VGA)</option>
								<option value="Visakhapatnam Airport (VTZ)">Visakhapatnam Airport (VTZ)</option>
								<option value="Warangal Airport (WGC)">Warangal Airport (WGC)</option>
								<option value="Zero Airport (ZER)">Zero Airport (ZER)</option>
							</select>
						</div>
						<?php
						}
						if($category_id == '24')
						{
						?>
						<div class="form-group col-lg-6">
							<label for="my_expected_charges_shipment">My Expected Charges/Shipment<span class="text-danger">*</span></label>
							<input type="number" class="form-control"  name="my_expected_charges_shipment" value="<?= set_value('my_expected_charges_shipment', $my_expected_charges_shipment);?>">
						</div>
						<?php
						}
						if($category_id == '17')
						{
						?>
						<div class="form-group col-lg-6">
							<label for="mode_of_transport">Mode of Transport<span class="text-danger">*</span></label>
							<select name="mode_of_transport" class="form-control" required="required">
								<option value="<?= set_value('mode_of_transport', $mode_of_transport); ?>">Select Type of Load...</option>
								<option <?php if($mode_of_transport =='Express') { echo "selected"; } ?> value="Express">Express</option>
								<option <?php if($mode_of_transport =='Normal') { echo "selected"; } ?> value="Normal">Normal </option>
								<option <?php if($mode_of_transport =='LTL') { echo "selected"; } ?> value="LTL">LTL</option>
								<option <?php if($mode_of_transport =='FTL') { echo "selected"; } ?> value="FTL">FTL</option>
							</select>
						</div>
						<?php
						}
						if(($category_id == '2')||($category_id == '3')||($category_id == '13')||($category_id == '14')||($category_id == '15'))
						{
						?>
						<div class="form-group col-lg-6">
							<label for="when_required_date">When Required<span class="text-danger">*</span></label>
							<input type="date" class="form-control"  name="when_required_date" value="<?= set_value('when_required_date', $when_required_date);?>">
						</div>
						<?php
						}
						if(($category_id == '2')||($category_id == '3')||($category_id == '13')||($category_id == '14')||($category_id == '15'))
						{
						?>
						<div class="form-group col-lg-6">
							<label for="when_required_time">When Required Time<span class="text-danger">*</span></label>
							<input type="time" class="form-control"  name="when_required_time" value="<?= set_value('when_required_time', $when_required_time);?>">
						</div>
						<?php
						}
						if(($category_id == '13')||($category_id=='14'))
						{
							if($category_id == '13')
							{
						?>
						<div class="form-group col-lg-4">
							<label for="when_required_time">Expect Freight Rate<span class="text-danger">*</span></label>
							<select name="currency_id" class="form-control" required="required" >
								<option value="">Select...</option>
								<?php
									foreach ($currencies as $value) 
									{
										?>
										<option <?= ($value->id == $currency_id) ? 'selected' : '' ?> value='<?= $value->id ?>'><?= $value->name ?></option>
										<?php
									}
								?>
							</select>	
							
						</div>
						<div class="form-group  col-lg-2">
							<label for="my_expected_freight">My expected Freight<span class="text-danger d-none">*</span></label><br>
							<input type="text" class="form-control"  name="my_expected_freight" value="<?= set_value('my_expected_freight', $my_expected_freight);?>">
						</div>
						<?php
							}
							if($category_id == '14')
							{
								?>
								<div class="form-group col-lg-6">
									<label for="mode_of_shipment">Mode of Shipment<span class="text-danger">*</span></label><br>
									<label><input type="radio" name="mode_of_shipment" value="LCL"  <?php if($mode_of_shipment =='LCL') { echo "checked"; } ?> > LCL </label>
									<label><input type="radio" name="mode_of_shipment" value="FCL" <?php if($mode_of_shipment =='FCL') { echo "checked"; } ?>> FCL </label>
								</div>
								<?php
							}
						}
						if(($category_id == '2')||($category_id == '3')||($category_id == '17')||($category_id == '18'))
						{
						?>
						<div class="form-group col-lg-6">
							<label for="type_of_transaction">Type of Transaction<span class="text-danger">*</span></label><br>
							<label><input type="radio" name="type_of_transaction" value="One Time"  <?php if($type_of_transaction =='One Time') { echo "checked"; } ?> > One Time </label>
							<label><input type="radio" name="type_of_transaction" value="Repeat" <?php if($type_of_transaction =='Repeat') { echo "checked"; } ?>> Repeat </label>
						</div>
						<?php
						}
						if($category_id == '22')
						{
						?>
						<div class="form-group col-lg-6">
							<label for="container_type">Container Type<span class="text-danger">*</span></label><br>
							<label><input type="radio" name="container_type" value="Close Body"  <?php if($container_type =='Close Body') { echo "checked"; } ?> > Close Body </label>
							<label><input type="radio" name="container_type" value="Open Body" <?php if($container_type =='Open Body') { echo "checked"; } ?>> Open Body </label>
							<label><input type="radio" name="container_type" value="GPS Enabled" <?php if($container_type =='GPS Enabled') { echo "checked"; } ?>> GPS Enabled </label>
							<label><input type="radio" name="container_type" value="GPS Disabled" <?php if($container_type =='GPS Disabled') { echo "checked"; } ?>> GPS Disabled </label>
						</div>
						<?php
						}
						if($category_id == '22')
						{
						?>
						<div class="form-group col-lg-6">
							<label for="type_of_vehicle">Type of Vehicle<span class="text-danger">*</span></label><br>
							<label><input type="checkbox" name="type_of_vehicle" value="Eco Van"  <?php if($type_of_vehicle =='Eco Van') { echo "checked"; } ?> > Eco Van </label>
							<label><input type="checkbox" name="type_of_vehicle" value="Champion" <?php if($type_of_vehicle =='Champion') { echo "checked"; } ?>> Champion </label>
							<label><input type="checkbox" name="type_of_vehicle" value="Tata Ace" <?php if($type_of_vehicle =='Tata Ace') { echo "checked"; } ?>> Tata Ace </label>
							<label><input type="checkbox" name="type_of_vehicle" value="TATA 407" <?php if($type_of_vehicle =='TATA 407') { echo "checked"; } ?>> TATA 407 </label>
							<label><input type="checkbox" name="type_of_vehicle" value="Canters" <?php if($type_of_vehicle =='Canters') { echo "checked"; } ?>> Canters </label>
							<label><input type="checkbox" name="type_of_vehicle" value="32ft Truck" <?php if($type_of_vehicle =='32ft Truck') { echo "checked"; } ?>> 32ft Truck </label>
							<label><input type="checkbox" name="type_of_vehicle" value="LPT 20ft Truck" <?php if($type_of_vehicle =='LPT 20ft Truck') { echo "checked"; } ?>> LPT 20ft Truck </label>
						</div>	
						<?php
						}
						if($category_id == '22')
						{
						?>
						<div class="form-group col-lg-6">
							<label for="my_expect_freight">My Expect Freight<span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="my_expect_freight" value="<?= set_value('my_expect_freight', $my_expect_freight);?>">
						</div>
						<?php
						}
						if($category_id == '18')
						{
						?>
						<div class="form-group col-lg-6">
							<label for="type_of_product">Type of Products<span class="text-danger">*</span></label><br>
							<label><input type="radio" name="type_of_product" value="Bank / Cash and Carry Logistics"  <?php if($type_of_product =='Bank / Cash and Carry Logistics') { echo "checked"; } ?> > Bank / Cash and Carry Logistics </label>
							<label><input type="radio" name="type_of_product" value="High Value Product like (Gold / Platinum/ Silver Jewellery/ with in city time definit deliveries)" <?php if($type_of_product =='High Value Product like (Gold / Platinum/ Silver Jewellery/ with in city time definit deliveries)') { echo "checked"; } ?>> High Value Product like (Gold / Platinum/ Silver Jewellery/ with in city time definit deliveries) </label>
						</div>
						<?php
						}
						if(($category_id == '13')||($category_id=='14')||($category_id=='15'))
						{
						?>
						<div class="form-group col-lg-6">
							<label for="type_of_service">Type of Service<span class="text-danger">*</span></label>
							<select name="type_of_service" class="form-control" required="required">
								<option value="<?= set_value('type_of_service', $type_of_service); ?>">Select Type of Service...</option>
								<option <?php if($type_of_service =='Doort to Door(DTD)') { echo "selected"; } ?> value="Doort to Door(DTD)">Doort to Door(DTD)</option>
								<option <?php if($type_of_service =='Door to Airport (DTA)') { echo "selected"; } ?> value="Door to Airport (DTA)">Door to Airport (DTA) </option>
								<option <?php if($type_of_service =='Airport to Airport(ATA)') { echo "selected"; } ?> value="Airport to Airport(ATA)">Airport to Airport(ATA)</option>
								<option <?php if($type_of_service =='Airport to Door(ATD)') { echo "selected"; } ?> value="Airport to Door(ATD)">Airport to Door(ATD)</option>
							</select>
						</div>
						<?php
						}
						if(($category_id == '2')||($category_id == '3'))
						{
						?>
						<div class="form-group col-lg-6">
							<label for="type_of_load">Type of Load<span class="text-danger">*</span></label>
							<select name="type_of_load" class="form-control" required="required">
								<option value="<?= set_value('type_of_load', $type_of_load); ?>">Select Type of Load...</option>
								<option <?php if($type_of_load =='Parcel') { echo "selected"; } ?> value="Parcel">Parcel</option>
								<option <?php if($type_of_load =='SLR') { echo "selected"; } ?> value="SLR">SLR </option>
								<option <?php if($type_of_load =='VP') { echo "selected"; } ?> value="VP">VP</option>
							</select>
						</div>
						<?php
						}
						if(($category_id == '2')||($category_id == '3')||($category_id == '17')||($category_id == '19')||($category_id == '13')||($category_id == '14')||($category_id == '15'))
						{
						?>
						<div class="form-group col-lg-6">
							<label for="industry_type">Industry Type<span class="text-danger">*</span></label>
							<select class="form-control" name="industry_type"  required="required" >
								<option value="<?= set_value('industry_type', $industry_type); ?>">Select Industry Type</option>
								<option <?php if($industry_type =='General') { echo "selected"; } ?> value="General">General</option>
								<option <?php if($industry_type =='Hi tech') { echo "selected"; } ?> value="Hi tech">Hi tech</option>
								<option <?php if($industry_type =='Automotive') { echo "selected"; } ?> value="Automotive">Automotive</option>
								<option <?php if($industry_type =='Pharmaceutical') { echo "selected"; } ?> value="Pharmaceutical">Pharmaceutical</option>
								<option <?php if($industry_type =='FMCG') { echo "selected"; } ?> value="FMCG">FMCG</option>
								<option <?php if($industry_type =='Aviation') { echo "selected"; } ?> value="Aviation">Aviation</option>
							</select>
						</div>
						<?php
						}
						if(($category_id == '2')||($category_id == '3')||($category_id == '17')||($category_id == '18')||($category_id == '19')||($category_id == '13')||($category_id == '14')||($category_id == '15'))
						{
						?>
						<div class="form-group col-lg-6">
							<label for="vehicle_no">Product/Commodities<span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="product_commodities" value="<?= set_value('product_commodities', $product_commodities);?>">
						</div>
						<?php
						}
						if($category_id == '17')
						{
						?>
						<div class="form-group col-lg-6">
							<label for="wishtomove">What do you wish to move?<span class="text-danger">*</span></label>
							<select name="wishtomove" class="form-control" required="required">
								<option value="<?= set_value('wishtomove', $wishtomove); ?>">Select Type of Load...</option>
								<option <?php if($wishtomove =='Cars') { echo "selected"; } ?> value="Cars">Cars</option>
								<option <?php if($wishtomove =='Two Wheelers') { echo "selected"; } ?> value="Two Wheelers">Two Wheelers </option>
								<option <?php if($wishtomove =='Almirah / bureau') { echo "selected"; } ?> value="Almirah / bureau">Almirah / bureau</option>
								<option <?php if($wishtomove =='Refrigerator') { echo "selected"; } ?> value="Refrigerator">Refrigerator</option>
								<option <?php if($wishtomove =='Sofa') { echo "selected"; } ?> value="Sofa">Sofa</option>
								<option <?php if($wishtomove =='Washing machine') { echo "selected"; } ?> value="Washing machine">Washing machine</option>
								<option <?php if($wishtomove =='Electronic appliance') { echo "selected"; } ?> value="Electronic appliance">Electronic appliance</option>
								<option <?php if($wishtomove =='Kitchen utensils') { echo "selected"; } ?> value="Kitchen utensils">Kitchen utensils</option>
								<option <?php if($wishtomove =='Others') { echo "selected"; } ?> value="Others">Others</option>
							</select>
						</div>
						<?php
						}
						if(($category_id == '2')||($category_id == '3')||($category_id == '13')||($category_id == '14')||($category_id == '15')||($category_id == '18')||($category_id == '19'))
						{
						?>
						<div class="form-group col-lg-6">
							<label for="vehicle_no">Approx Weight (Kg)<span class="text-danger">*</span></label>
							<input type="number" class="form-control"  name="approx_weight_kg" value="<?= set_value('approx_weight_kg', $approx_weight_kg);?>">
						</div>
						<?php
						}
						if(($category_id == '18')||($category_id == '19')) 
						{
							?>
							<div class="form-group col-lg-6">
								<label for="volume_or_dense">Volume or Dense<span class="text-danger">*</span></label>
								<select name="volume_or_dense" class="form-control" required="required">
									<option value="<?= set_value('volume_or_dense', $volume_or_dense); ?>">Select Type of Load...</option>
									<option <?php if($volume_or_dense =='Volume') { echo "selected"; } ?> value="Volume">Volume</option>
									<option <?php if($volume_or_dense =='Dense') { echo "selected"; } ?> value="Dense">Dense </option>
								</select>
							</div>
							<?php
						}
						if(($category_id == '2')||($category_id == '3')||($category_id == '17')||($category_id == '18')||($category_id == '19')||($category_id == '13')||($category_id == '14')||($category_id == '15'))
						{
						?>
						<div class="form-group col-lg-6">
							<label for="no_of_packets">No of Packets<span class="text-danger">*</span></label>
							<input type="number" class="form-control"  name="no_of_packets" value="<?= set_value('no_of_packets', $no_of_packets);?>">
						</div>
						<?php
						}
						if($category_id == '19')
						{
						?>
						<div class="form-group col-lg-6">
							<label for="no_of_vehicles">No of vehicles<span class="text-danger">*</span></label>
							<input type="number" class="form-control"  name="no_of_vehicles" value="<?= set_value('no_of_vehicles', $no_of_vehicles);?>">
						</div>
						<?php
						}
						if(($category_id == '17')||($category_id == '18')||($category_id == '19')||($category_id == '22')||($category_id == '23'))
						{
						?>
						<div class="form-group col-lg-6">
							<label for="starttime">
								<?php
								if($category_id == '22')
								{
									echo "Date from";
								}
								if($category_id == '23')
								{
									echo "Date Open";
								}
								if(($category_id == '17')||($category_id == '18')||($category_id == '19'))
								{
									echo "Start Time";
								}
								?>
							   <span class="text-danger">*</span></label>
							<input type="date" class="form-control"  name="starttime" value="<?= set_value('starttime', $starttime);?>">
						</div>
						<?php
						}
						if(($category_id == '17')||($category_id == '18')||($category_id == '19')||($category_id == '22')||($category_id == '23'))
						{
						?>
						<div class="form-group col-lg-6">
							<label for="closingtime">
								<?php
								if($category_id == '22')
								{
									echo "Date closure";
								}
								if($category_id == '23')
								{
									echo "Date closure";
								}
								if(($category_id == '17')||($category_id == '18')||($category_id == '19'))
								{
									echo "Closing Time";
								}
								?><span class="text-danger">*</span></label>
							<input type="date" class="form-control"  name="closingtime" value="<?= set_value('closingtime', $closingtime);?>">
						</div>
						<?php
						}
						if(($category_id == '13')||($category_id=='14')||($category_id=='15'))
						{
							?>
							<div class="form-group col-lg-6">
								<label for="volume_weight">Volume Weight<span class="text-danger">*</span></label>
								<select name="volume_weight" class="form-control" required="required">
									<option value="<?= set_value('volume_weight', $volume_weight); ?>">Select Volume Weight...</option>
									<option <?php if($volume_weight =='CM') { echo "selected"; } ?> value="CM">CM</option>
									<option <?php if($volume_weight =='Inches') { echo "selected"; } ?> value="Inches">Inches </option>
								</select>
							</div>
							<?php
						}
						if(($category_id == '13')||($category_id=='14')||($category_id=='15'))
						{
						?>
						<div class="form-group col-lg-12">
								<label>Dimension<span class="text-danger">*</span></label>
								<?php
								if($dimension)
								{
									foreach(json_decode($dimension) as  $values) 
									{
										?>
										<div class="row" >
												<div class="col-lg-2">
													<?php
													$c1 = 0;
													foreach ($values->length as  $value)
													{ 
														?>
														<div class="form-group rowCount<?= $c1 ?>">	
															<label for="length">length</label>
															<input type="number" class="form-control" required="required" name="length[]" value="<?= $value ?>">
														</div>
													<?php
														$c1++;
													}
													?>
												</div>
												<div class="col-lg-2">
													<?php	
													$c2 = 0;
													foreach ($values->breadth as $value) 
													{
														?>
														<div class="form-group rowCount<?= $c2 ?>">	
															<label for="breadth">Breadth</label>
															<input type="number" class="form-control" required="required"  name="breadth[]" value="<?= $value ?>">
														</div>
												<?php
														$c2++;
													}
													?>
												</div>
												<div class="col-lg-2">
													<?php
													$c3 = 0;
													foreach ($values->height as $value) 
													{
														?>
														<div class="form-group rowCount<?= $c3 ?>">	
															<label for="height">Height</label>
															<input type="number" class="form-control" required="required" name="height[]" value="<?= $value ?>">
														</div>
													<?php
														$c3++;
													}
													?>
												</div>
												<div class="col-lg-3">
													<?php
													$c4 = 0;
													foreach ($values->noofpackets as $value) 
													{
														?>
														<div class="form-group rowCount<?= $c4 ?>">	
															<label for="no_of_packets">X No of</label>
															<input type="number" class="form-control" required="required" name="noofpackets[]" value="<?= $value ?>">
														</div>
													<?php
														$c4++;
													}
													?>
												</div>
												<div class="col-lg-3">	
														
														<?php
															for ($i=0; $i<count($values->length); $i++) 
															{ 
																if($i!='0')
																{
																	?>
																	<div class="form-group rowCount<?= $i ?>">
																		<br><br><br>
																		<button type="button" value="<?= $i ?>" class="removeRow btn btn-danger btn-sm waves-effect waves-light"><i class="fa fa-minus"></i> </button>
																	</div>
															<?php
																}
																else
																{
																	?>
																	<div class="form-group">
																		<button type="button" class="addMoreRows btn btn-primary btn-sm waves-effect waves-light"><i class="fa fa-plus"></i> </button>
																	</div>		
																	<?php
																}	
																	
															}
														?>
												</div>
										</div>
									<?php
									}
								}
								else
								{
								?>		
								<div class="row">
									<div class="form-group col-lg-2">	
										<label for="length">length</label>
										<input type="number" class="form-control" required="required" name="length[]">
									</div>
									<div class="form-group col-lg-2">	
										<label for="breadth">Breadth</label>
										<input type="number" class="form-control" required="required"  name="breadth[]" >
									</div>
									<div class="form-group col-lg-2">	
										<label for="height">Height</label>
										<input type="number" class="form-control" required="required" name="height[]" >
									</div>
									<div class="form-group col-lg-3">	
										<label for="no_of_packets">X No of</label>
										<input type="number" class="form-control" required="required" name="noofpackets[]" >
									</div>
									<div class="form-group col-lg-3">	
											<button type="button" class="addMoreRows btn btn-primary btn-sm waves-effect waves-light"><i class="fa fa-plus"></i> </button>
									</div>
								</div>	
						<?php
							}
						?>
						<div class="addedRows"></div>
						</div>	
						
						<?php
						}
						if(($category_id == '2')||($category_id == '3')||($category_id == '17')||($category_id == '19')||($category_id == '13')||($category_id == '14')||($category_id == '15')||($category_id == '22')||($category_id == '23')||($category_id == '24'))
						{
						?>
						<div class="form-group col-lg-6">
							<label for="pickup_address">Pickup Address<span class="text-danger">*</span></label>
							<input type="text" class="form-control"  name="pickup_address" value="<?= set_value('pickup_address', $pickup_address);?>">
						</div>
						<?php
						}
						if(($category_id == '2')||($category_id == '3')||($category_id == '17')||($category_id == '19')||($category_id == '13')||($category_id == '14')||($category_id == '15')||($category_id == '22')||($category_id == '23')||($category_id == '24'))
						{
						?>
						<div class="form-group col-lg-6">
							<label for="drop_address">Drop Address<span class="text-danger">*</span></label>
							<input type="text" class="form-control"  name="drop_address" value="<?= set_value('drop_address', $drop_address);?>">
						</div>
						<?php
						}
						if(($category_id == '17')||($category_id == '18')||($category_id == '19'))
						{

							$vendorbasedpost_arr = json_decode($vendor_based_post);
							$vendor_based_posts = ($id) ? $vendorbasedpost_arr->vendor_based_post : '';
						?>
						<div class="row col-lg-12">
							<div class="form-group col-lg-3">
								<label for="vendor_based_post">Vendor Based Post<span class="text-danger"></span></label>
									<input type="checkbox" class="vendor_based_post" <?php if($vendor_based_posts=='1') { echo 'checked'; } ?> name="vendor_based_post" value="1">
							</div>
							<?php
							if(($category_id == '17')||($category_id == '19'))
							{
								
								$post_vendors = ($id) ? $vendorbasedpost_arr->post_vendor : '';
								?>
							<div class="form-group col-lg-3">
								<label for="post_vendor">Post Vendor<span class="text-danger">*</span></label>
								<input type="text" <?php if(empty($post_vendors)) { ?> disabled="disabled" <?php } ?> class="form-control vendor_based_post_use "  name="post_vendor" value="<?= $post_vendors ?>">
							</div>
							<?php
							}
							if(($category_id == '17')||($category_id == '18')||($category_id == '19'))
							{
								
								$turnover_of_companys = ($id) ? $vendorbasedpost_arr->turnover_of_company : '';
								$businessyears = ($id) ? $vendorbasedpost_arr->businessyear : '';
								?>
							<div class="form-group col-lg-3">
								<label for="turnover_of_company">Turnover of Company<span class="text-danger">*</span></label>
								<input type="text" <?php if(empty($turnover_of_companys)) { ?> disabled="disabled" <?php } ?> class="form-control vendor_based_post_use"  name="turnover_of_company" value="<?= $turnover_of_companys ?>">
							</div>
							<div class="form-group col-lg-3">
								<label for="businessyear">No of years in Business<span class="text-danger">*</span></label>
								<input type="text" <?php if(empty($businessyears)) { ?> disabled="disabled" <?php } ?> class="form-control vendor_based_post_use"  name="businessyear" value="<?= $businessyears ?>">
							</div>
							<?php
							}
							?>
						</div>
						<?php
						}
						if(($category_id == '5')||($category_id == '8')||($category_id == '11'))
						{
						?> 
						<div class="form-group col-lg-6">
							<label for="area">Area<span class="text-danger">*</span></label>
							<input type="text" class="form-control"  name="area" value="<?= set_value('area', $area);?>">
						</div>
						<?php
						}
						if(($category_id == '8')||($category_id == '9')||($category_id == '10')||($category_id == '11'))
						{
						?> 
						<div class="form-group col-lg-6">
							<label for="city">City<span class="text-danger">*</span></label>
							<input type="text" class="form-control"  name="city" value="<?= set_value('city', $city);?>">
						</div>
						<?php
						}
						if(($category_id == '8')||($category_id == '9')||($category_id == '10')||($category_id == '11'))
						{
						?> 
						<div class="form-group col-lg-6">
							<label for="state">State<span class="text-danger">*</span></label>
							<input type="text" class="form-control"  name="state" value="<?= set_value('state', $state);?>">
						</div>
						<?php
						}
						if(($category_id == '9')||($category_id == '10'))
						{
						?> 
						<div class="form-group col-lg-6">
							<label for="pincode">Pincode<span class="text-danger">*</span></label>
							<input type="text" class="form-control"  name="pincode" value="<?= set_value('pincode', $pincode);?>">
						</div>
						<?php
						}
						if(($category_id=='8')||($category_id == '11'))
						{
						?> 
						<div class="form-group col-lg-6">
							<label for="country">Country<span class="text-danger">*</span></label>
							<input type="text" class="form-control"  name="country" value="<?= set_value('country', $country);?>">
						</div>
						<?php
						}
						if(($category_id == '8')||($category_id == '9')||($category_id == '10')||($category_id == '11'))
						{
						?> 
						<div class="form-group col-lg-6">
							<label for="name">Name<span class="text-danger">*</span></label>
							<input type="text" class="form-control"  name="name" value="<?= set_value('name', $name);?>">
						</div>
						<?php
						}
						if(($category_id == '8')||($category_id == '9')||($category_id == '10')||($category_id == '11'))
						{
						?> 
						<div class="form-group col-lg-6">
							<label for="contact_no">Contact No.<span class="text-danger">*</span></label>
							<input type="text" class="form-control"  name="contact_no" value="<?= set_value('contact_no', $contact_no);?>">
						</div>
						<?php
						}
						if($category_id == '5')
						{
						?> 
						<div class="form-group col-lg-6">
							<label for="area_dimension">Area Dimension<span class="text-danger">*</span></label>
							<input type="text" class="form-control"  name="area_dimension" value="<?= set_value('area_dimension', $area_dimension);?>">
						</div>
						<?php
						}
						if($category_id == '5')
						{
						?> 
						<div class="form-group col-lg-6">
							<label for="origin_city">Location<span class="text-danger">*</span></label>
							<input type="text" class="form-control"  name="location" value="<?= set_value('location', $location);?>">
						</div>
						<?php
						}
						if(($category_id == '5')||($category_id == '8')||($category_id == '9')||($category_id == '10')||($category_id == '11'))
						{
						?> 
						<div class="form-group col-lg-6">
							<label for="whatsapp_no">WhatsApp No.<span class="text-danger">*</span></label>
							<input type="text" class="form-control"  name="whatsapp_no" value="<?= set_value('whatsapp_no', $whatsapp_no);?>">
						</div>
						<?php
						}
						if(($category_id == '8')||($category_id == '9')||($category_id == '10')||($category_id == '11'))
						{
						?> 
						<div class="form-group col-lg-6">
							<label for="whatsapp_no">Email<span class="text-danger">*</span></label>
							<input type="email" class="form-control"  name="email" value="<?= set_value('email', $email);?>">
						</div>
						<?php
						}
						if(($category_id == '9')||($category_id == '10'))
						{
						?> 
						
						<div class="form-group pt-3 padding-20 col-lg-6">
							<label for="photo_front">Front Photo<br></label><br>
							<input type="file" id="photo_front" name="photo_front">
							
							<?php 
								$imageIcon 	= 'fa-file-image';
								$pdfIcon 	= 'fa-file-pdf';
								$docIcon 	= 'fa-file';
								$excelIcon 	= 'fa-file-excel';
								
								if(($id) && !empty($photo_front)){
							?>
								<div class="mt-1" style="display: flex; flex-wrap: wrap;">
							<?php 
									foreach(json_decode($photo_front) as $dbFile){
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
									<a href="<?php echo base_url("uploads/enquiry/$dbFile");?>" download><i class="fa <?php echo $classIcon; ?>" aria-hidden="true" style="font-size: xx-large;"></i></a>
								</div>
							<?php 
									}
							?>
							</div>
							<?php 
								} 
							?>
						</div>
						<?php
						}if(($category_id == '9')||($category_id == '10'))
						{
						?> 
						
						<div class="form-group pt-3 padding-20 col-lg-6">
							<label for="photo_inside">Front Inside<br></label><br>
							<input type="file" id="photo_inside" name="photo_inside">
							
							<?php 
								$imageIcon 	= 'fa-file-image';
								$pdfIcon 	= 'fa-file-pdf';
								$docIcon 	= 'fa-file';
								$excelIcon 	= 'fa-file-excel';
								
								if(($id) && !empty($photo_inside)){
							?>
								<div class="mt-1" style="display: flex; flex-wrap: wrap;">
							<?php 
									foreach(json_decode($photo_inside) as $dbFile){
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
									<a href="<?php echo base_url("uploads/enquiry/$dbFile");?>" download><i class="fa <?php echo $classIcon; ?>" aria-hidden="true" style="font-size: xx-large;"></i></a>
								</div>
							<?php 
									}
							?>
							</div>
							<?php 
								} 
							?>
						</div>
						<?php
						}if(($category_id == '9')||($category_id == '10'))
						{
						?> 
						
						<div class="form-group pt-3 padding-20 col-lg-6">
							<label for="photo_back">Front Back<br></label><br>
							<input type="file" id="photo_back" name="photo_back">
							
							<?php 
								$imageIcon 	= 'fa-file-image';
								$pdfIcon 	= 'fa-file-pdf';
								$docIcon 	= 'fa-file';
								$excelIcon 	= 'fa-file-excel';
								
								if(($id) && !empty($photo_back)){
							?>
								<div class="mt-1" style="display: flex; flex-wrap: wrap;">
							<?php 
									foreach(json_decode($photo_back) as $dbFile){
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
									<a href="<?php echo base_url("uploads/enquiry/$dbFile");?>" download><i class="fa <?php echo $classIcon; ?>" aria-hidden="true" style="font-size: xx-large;"></i></a>
								</div>
							<?php 
									}
							?>
							</div>
							<?php 
								} 
							?>
						</div>
						<?php
						}if(($category_id == '9')||($category_id == '10'))
						{
						?> 
						
						<div class="form-group pt-3 padding-20 col-lg-6">
							<label for="photo_side">Front Side<br></label><br>
							<input type="file" id="photo_side" name="photo_side">
							
							<?php 
								$imageIcon 	= 'fa-file-image';
								$pdfIcon 	= 'fa-file-pdf';
								$docIcon 	= 'fa-file';
								$excelIcon 	= 'fa-file-excel';
								
								if(($id) && !empty($photo_side)){
							?>
								<div class="mt-1" style="display: flex; flex-wrap: wrap;">
							<?php 
									foreach(json_decode($photo_side) as $dbFile){
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
									<a href="<?php echo base_url("uploads/enquiry/$dbFile");?>" download><i class="fa <?php echo $classIcon; ?>" aria-hidden="true" style="font-size: xx-large;"></i></a>
								</div>
							<?php 
									}
							?>
							</div>
							<?php 
								} 
							?>
						</div>
						<?php
						}
						if(($category_id == '9')||($category_id == '10'))
						{
						?> 
						<div class="form-group col-lg-6">
							<label for="min_lockin_period">Min Lockin period<span class="text-danger">*</span></label>
							<input type="date" class="form-control"  name="min_lockin_period" value="<?= set_value('min_lockin_period', $min_lockin_period);?>">
						</div>
						<?php
						}
						if(($category_id == '9')||($category_id == '10'))
						{
						?> 
						<div class="form-group col-lg-6">
							<label for="dedicated_and_shared">Dedicated and Shared<span class="text-danger">*</span></label>
							<input type="text" class="form-control"  name="dedicated_and_shared" value="<?= set_value('dedicated_and_shared', $dedicated_and_shared);?>">
						</div>
						<?php
						}
						if(($category_id=='8')||($category_id == '11'))
						{
						?> 
						<div class="form-group col-lg-6">
							<label for="expected_rate_sqr_feet">Expected Rate/Sqr Feet<span class="text-danger">*</span></label>
							<input type="number" class="form-control"  name="expected_rate_sqr_feet" value="<?= set_value('expected_rate_sqr_feet', $expected_rate_sqr_feet);?>">
						</div>
						<?php
						}
						if(($category_id == '9')||($category_id == '10'))
						{
							$other_services_provides = explode(",",$other_services_provide);
						?> 
						<div class="form-group col-lg-6">
							<label for="other_services_provide">Other Services Provide<span class="text-danger">*</span></label><br>
							<input type="checkbox" class="child1" <?= (in_array('Man Power', $other_services_provides)) ? 'checked' : ''; ?> name="other_services_provide[]" value="Man Power"> Man Power
							<input type="checkbox" class="child1" <?= (in_array('Infrastructure', $other_services_provides)) ? 'checked' : ''; ?> name="other_services_provide[]" value="Infrastructure"> Infrastructure
							<input type="checkbox" class="child1" <?= (in_array('RCC/ Alabaster', $other_services_provides)) ? 'checked' : ''; ?> name="other_services_provide[]" value="RCC/ Alabaster"> RCC/ Alabaster
							<input type="checkbox" class="child1" <?= (in_array('Kirby', $other_services_provides)) ? 'checked' : ''; ?> name="other_services_provide[]" value="Kirby"> Kirby
							<input type="checkbox" class="child1" <?= (in_array('Open to Sky', $other_services_provides)) ? 'checked' : ''; ?> name="other_services_provide[]" value="Open to Sky"> Open to Sky
							<input type="checkbox"  name="other_services_provide[]" <?= (in_array('Select all', $other_services_provides)) ? 'checked' : ''; ?> data-id="1" class="parent" value="Select all"> Select all
						</div>
						<?php
						}
						if(($category_id=='8')||($category_id == '11'))
						{
							$shed_requirements = explode(",",$shed_requirement);
						?> 
						<div class="form-group col-lg-6">
							<label for="shed_requirement">Shed Requirement<span class="text-danger">*</span></label><br>
							<input type="checkbox" class="child1" <?= (in_array('RCC/ Alabaster', $shed_requirements)) ? 'checked' : ''; ?> name="shed_requirement[]" value="RCC/ Alabaster"> RCC/ Alabaster
							<input type="checkbox" class="child1" <?= (in_array('Kirby', $shed_requirements)) ? 'checked' : ''; ?> name="shed_requirement[]" value="Kirby"> Kirby
							<input type="checkbox" class="child1" <?= (in_array('Open to Sky', $shed_requirements)) ? 'checked' : ''; ?> name="shed_requirement[]" value="Open to Sky"> Open to Sky
							<input type="checkbox"  name="shed_requirement[]" <?= (in_array('Select all', $shed_requirements)) ? 'checked' : ''; ?> data-id="1" class="parent" value="Select all"> Select all
						</div>
						<?php
						}
						if(($category_id == '8')||($category_id == '9')||($category_id == '10')||($category_id == '11'))
						{
						?> 
						<div class="form-group col-lg-6">
							<label for="area_required">
								<?php
								if(($category_id == '9')||($category_id == '10')) 
								{
									echo "Area offered (ft2/m2)";
								}
								else
								{
									echo "Total Area Required (ft2/m2)";
								} 
								?>
								<span class="text-danger">*</span></label>
								<input type="number" class="form-control"  name="area_required" value="<?= set_value('area_required', $area_required);?>">
						</div>
						<?php
						}
						if(($category_id == '9')||($category_id == '10'))
						{
						?>
						<div class="form-group col-lg-6">
							<label for="available_for">Available for<span class="text-danger">*</span></label><br>
							<label><input type="radio" name="available_for" value="Rent"  <?php if($available_for =='Rent') { echo "checked"; } ?> > Rent </label>
							<label><input type="radio" name="available_for" value="Sale" <?php if($available_for =='Sale') { echo "checked"; } ?>> Sale </label>
						</div>
						<?php
						}
						if(($category_id == '9')||($category_id == '10'))
						{
						?> 
						<div class="form-group col-lg-6">
							<label for="tentative_price_sqr_feet">Tentative Price/sqr Feet<span class="text-danger">*</span></label>
								<input type="number" class="form-control"  name="tentative_price_sqr_feet" value="<?= set_value('tentative_price_sqr_feet', $tentative_price_sqr_feet);?>">
						</div>
						<?php
						}
						if($category_id == '5')
						{
							$type_of_warehouses = explode(",",$type_of_warehouse);
						?> 
						<div class="form-group col-lg-6">
							<label for="type_of_warehouse">Type of warehouse<span class="text-danger">*</span></label><br>
							<input type="checkbox" class="child1" <?= (in_array('RCC/ Alabaster', $type_of_warehouses)) ? 'checked' : ''; ?> name="type_of_warehouse[]" value="RCC/ Alabaster"> RCC/ Alabaster
							<input type="checkbox" class="child1" <?= (in_array('RCC/ Alabaster', $type_of_warehouses)) ? 'checked' : ''; ?> name="type_of_warehouse[]" value="Kirby"> Kirby
							<input type="checkbox" class="child1" <?= (in_array('RCC/ Alabaster', $type_of_warehouses)) ? 'checked' : ''; ?> name="type_of_warehouse[]" value="Open to Sky"> Open to Sky
							<input type="checkbox"  name="type_of_warehouse[]" <?= (in_array('RCC/ Alabaster', $type_of_warehouses)) ? 'checked' : ''; ?> data-id="1" class="parent" value="Select all"> Select all
						</div>
						<?php
						}
						if($category_id == '5')
						{
							$service = explode(",",$services);
						?> 
						<div class="form-group col-lg-6">
							<label for="services">Services<span class="text-danger">*</span></label><br>
							<input type="checkbox" class="child2" <?= (in_array('Storage', $service)) ? 'checked' : ''; ?> name="services[]" value="Storage"> Storage
							<input type="checkbox" class="child2" <?= (in_array('Transportation', $service)) ? 'checked' : ''; ?>  name="services[]" value="Transportation"> Transportation
							<input type="checkbox" class="child2" <?= (in_array('Other', $service)) ? 'checked' : ''; ?>  name="services[]" value="Other"> Other
							<input type="checkbox"  name="services[]" <?= (in_array('Select all', $service)) ? 'checked' : ''; ?> data-id="2" class="parent" value="Select all"> Select all
						</div>
						<?php
						}
						if(($category_id == '2')||($category_id == '3')||($category_id == '17')||($category_id == '18')||($category_id == '19')||($category_id == '5')||($category_id == '8')||($category_id == '9')||($category_id == '10')||($category_id == '11')||($category_id == '13')||($category_id == '14')||($category_id == '15')||($category_id == '22')||($category_id == '23')||($category_id == '24'))
						{
						?>
						<div class="form-group col-lg-6">
							<label for="drop_address">Any specific requirement (if any)<span class="text-danger">*</span></label>
							<textarea class="form-control" maxlength="250"  name="specific_requirement"><?= set_value('specific_requirement', $specific_requirement);?></textarea>
						</div>
						<?php
						}
						if(($category_id == '2')||($category_id == '3')||($category_id == '17')||($category_id == '18')||($category_id == '19')||($category_id == '8')||($category_id == '9')||($category_id == '10')||($category_id == '11')||($category_id == '13')||($category_id == '14')||($category_id == '15')||($category_id == '22')||($category_id == '23'))
						{
						?>
						<div class="form-group col-lg-12">
							<label for="drop_address"><input type="checkbox" name="checkcondition" required="required"> Should this query goes to more vendors?</label>
						</div>
						<?php
						}
						?>
					</div>
					<button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">Sent Enquiry</button>
					</form>
					<!-- /.row -->
				</div>
				<!-- /.box-content -->
			</div>
<?php $this->load->view('user/vwadminfooter.php'); ?>
<script type="text/javascript">
	$(document).ready(function() 
	{
	  	$(".parent").click(function() 
	  	{
	  		var clickclassid = $(this).attr('data-id');
	    	$(".child"+clickclassid).prop("checked", this.checked);
	  	});

  		$('.child').click(function() 
  		{
	    	if ($('.child:checked').length == $('.child').length) 
	    	{
	      		$('.parent').prop('checked', true);
	    	}
	    	else
	    	{
	      		$('.parent').prop('checked', false);
	    	}
  		});

	  	var rowCount = 1;
		$('.addMoreRows').click(function() 
		{
			rowCount ++;
			var recRow = '<div class="row rowCount'+rowCount+'"><div class="form-group col-lg-2"><label for="no_of_packets">length</label><input type="number" required="required" class="form-control"  name="length[]" value=""></div><div class="form-group col-lg-2">		<label for="no_of_packets">Breadth</label>	<input type="number" class="form-control" required="required" name="breadth[]" value=""></div><div class="form-group col-lg-2">		<label for="no_of_packets">Height</label>	<input type="number" required="required" class="form-control"  name="height[]" value=""></div><div class="form-group col-lg-3">		<label for="no_of_packets">X No of</label>	<input type="number" class="form-control" required="required" name="noofpackets[]" value=""></div><div class="form-group col-lg-3"><button type="button" value="'+rowCount+'" class="removeRow btn btn-danger btn-sm waves-effect waves-light"><i class="fa fa-minus"></i> </button></div></div>';
			$('.addedRows').append(recRow);
		}); 
		$(document).on("click", ".removeRow", function()
		{
			var removeNum = $(this).val();
			$('.rowCount'+removeNum).remove();
		});
		
		 $('.vendor_based_post').click(function()
		 {
           	if($(this).is(":checked"))
            {
                $(".vendor_based_post_use").removeAttr('disabled');
            }
            else if($(this).is(":not(:checked)"))
            {
            	$(".vendor_based_post_use").attr('disabled', 'disabled');
            }
        });
});	
</script>