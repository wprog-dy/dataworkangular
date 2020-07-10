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
					<h4 class="box-title"><?= $page_title; ?>

					<hr>
					</h4>
					
					<?php $this->load->view('user/vwError'); ?>
					
					<form action="<?= base_url("user/enquiries2/form/$category_id/").$id;?>" method="POST" enctype="multipart/form-data" autocomplete="off">
					<!-- /.box-title -->
					<div class="row">
						<input type="hidden" name="category_id" value="<?= $category_id; ?>">
						<?php
						if($category_id == '26')
						{?>
						<div class="form-group col-lg-6">
							<label for="origin_city">Origin City<span class="text-danger">*</span></label>
							<input type="text" class="form-control"  name="origin_city" value="<?= set_value('origin_city', $origin_city);?>">
						</div>	
							<?php
						}
						if($category_id == '26')
						{
							if($id)
							{
								foreach (json_decode($destination_city) as $key => $value) 
									{

								?>
								<div class="form-group col-lg-6 rowDestinationCount<?= $key ?>">
									<label for="destination_city">Destination City<span class="text-danger">*</span></label>
									<input type="text" class="form-control"  name="destination_city[]" value="<?= $value ?>">
									<br>
									<?php if($key == '0') { ?>
										<button type="button" class="addDestinationMoreRows btn btn-primary btn-sm waves-effect waves-light"><i class="fa fa-plus"></i> </button>
									<?php } else { ?>
										<button type="button" value="<?= $key ?>" class="removeDestinationRow btn btn-danger btn-sm waves-effect waves-light"><i class="fa fa-minus"></i> </button>
									<?php } ?>
								</div>			
								<?php
									}
							}
							else
							{
							?>
								<div class="form-group col-lg-6">
									<label for="destination_city">Destination City<span class="text-danger">*</span></label>
									<input type="text" class="form-control"  name="destination_city[]" value="">
									<br>
									<button type="button" class="addDestinationMoreRows btn btn-primary btn-sm waves-effect waves-light"><i class="fa fa-plus"></i> </button>
									
								</div>	
							<?php
							}
						}
						if($category_id == '26')
						{
							?>
							<div class="form-group col-lg-6">
								<label for="scheduling_type">Scheduling Type<span class="text-danger">*</span></label><br>
								<label><input type="radio" checked name="scheduling_type" value="One Time"  <?php if($scheduling_type =='One Time') { echo "checked"; } ?> > One Time </label>
								<label><input type="radio" name="scheduling_type" value="Weekly" <?php if($scheduling_type =='Weekly') { echo "checked"; } ?>> Weekly </label>
								<label><input type="radio" name="scheduling_type" value="Daily" <?php if($scheduling_type =='Daily') { echo "checked"; } ?>> Daily </label>
							</div>
							<div class="addedDestinationRows col-lg-6 "></div>
							<div class="form-group col-lg-6 loadingdate">
								<label for="loadingdate">Loading Date<span class="text-danger">*</span></label>
								<input type="date" class="form-control"  name="loadingdate" value="<?= set_value('loadingdate', $loadingdate);?>">
							</div>
							<div class="form-group col-lg-6 loadingtime">
								<label for="loadingtime">Loading Time<span class="text-danger">*</span></label>
								<input type="time" class="form-control"  name="loadingtime" value="<?= set_value('loadingtime', $loadingtime);?>">
							</div>
						<?php
						}
						if($category_id == '26')
						{
						?>
						<div class="form-group col-lg-6 days" style="display: none;">
							<label for="days">Day<span class="text-danger">*</span></label><br>
							<label><input type="checkbox" name="days[]" value="Monday"  <?php if($days =='Monday') { echo "checked"; } ?> > Monday </label>
							<label><input type="checkbox" name="days[]" value="Tuesday" <?php if($days =='Tuesday') { echo "checked"; } ?>> Tuesday </label>
							<label><input type="checkbox" name="days[]" value="Wednesday" <?php if($days =='Wednesday') { echo "checked"; } ?>> Wednesday </label>
							<label><input type="checkbox" name="days[]" value="Thursday" <?php if($days =='Thursday') { echo "checked"; } ?>> Thursday </label>
							<label><input type="checkbox" name="days[]" value="Thursday" <?php if($days =='Thursday') { echo "checked"; } ?>> Thursday </label>
							<label><input type="checkbox" name="days[]" value="Friday" <?php if($days =='Friday') { echo "checked"; } ?>> Friday </label>
							<label><input type="checkbox" name="days[]" value="Saturday" <?php if($days =='Saturday') { echo "checked"; } ?>> Saturday </label>
							<label><input type="checkbox" name="days[]" value="Sunday" <?php if($days =='Sunday') { echo "checked"; } ?>> Sunday </label>

						</div>
						<?php
						}
						if($category_id == '26')
						{
						?>
						<div class="form-group col-lg-6">
							<label for="product">Product<span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="product" value="<?= set_value('product', $product);?>">
						</div>
						<?php
						}
						if($category_id == '26')
						{
						?>
						<div class="form-group col-lg-6">
							<label for="weight">Weight (MT)<span class="text-danger">*</span></label>
							<input type="number" class="form-control" name="weight" value="<?= set_value('weight', $weight);?>">
						</div>
						<?php
						}
						if($category_id == '26')
						{
						?>
						<div class="form-group col-lg-6">
							<label for="no_of_vehicles">No of vehicles<span class="text-danger">*</span></label>
							<input type="number" class="form-control" name="no_of_vehicles" value="<?= set_value('no_of_vehicles', $no_of_vehicles);?>">
						</div>
						<?php
						}
						if($category_id == '26')
						{
						?>
						<div class="form-group col-lg-6">
							<label for="freight">Freight<span class="text-danger">*</span></label><br>
							<label><input type="radio" checked name="freight" value="Fixed"  <?php if($freight =='Fixed') { echo "checked"; } ?> > Fixed </label>
							<label><input type="radio" name="freight" value="Go For Bidding" <?php if($freight =='Go For Bidding') { echo "checked"; } ?>> Go For Bidding </label>
						</div>
						<?php
						}
						if($category_id == '26')
						{
						?>
						<div class="form-group col-lg-6">
							<label for="paymentterms">Payment Term<span class="text-danger">*</span></label><br>
							<label>Advance &nbsp;</label><input type="number" name="advance_per" min="1" max="100" class="advance_per" value="<?= set_value('advance_per', $advance_per);?>" > % &nbsp;
							<label> Balance  &nbsp;</label><input type="number" class="balance_per" name="balance_per" disabled="disabled" value="<?= set_value('balance_per', $balance_per);?>" > %
						</div>
						<?php
						}
						if($category_id == '26')
						{
						?>
						<div class="form-group col-lg-6">
							<label for="drop_address">Any specific requirement (if any)<span class="text-danger">*</span></label>
							<textarea class="form-control" maxlength="250"  name="specific_requirement"><?= set_value('specific_requirement', $specific_requirement);?></textarea>
						</div>
						<?php
						}
						?>
					</div>
					<?php
					if($category_id  == '27')
					{
						?>
						<input type="hidden" name="category_id" value="<?= $category_id; ?>">
					<div class="row">
						<div class="form-group col-lg-6">
							<label for="origin_city">Origin City<span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="origin_city[]" value="" required="required" >
						</div>	
						<div class="form-group col-lg-6">
							<label for="destination_city">Destination City<span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="destination_city[]" value="" required="required">	
						</div>
						<div class="form-group col-lg-6">
							<label for="origin_city">Origin Pincode<span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="origin_pincode[]" value="" required="required">
						</div>	
						<div class="form-group col-lg-6">
							<label for="destination_city">Destination Pincode<span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="destination_pincode[]" value="" required="required">	
						</div>
						<div class="form-group col-lg-6">
							<label for="origin_city">Type Your National<span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="your_national[]" value="" required="required">
						</div>	
						<div class="form-group col-lg-6">
							<label for="destination_city">National Value<span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="national_value[]" value="" required="required">	
						</div>
						<div class="form-group col-lg-6">
							<label for="destination_city">National Weight<span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="national_weight[]" value="" required="required">	
						</div>
						<div class="form-group col-lg-12">
							<label>Dimension<span class="text-danger">*</span></label>
							<div class="row">
								<div class="form-group col-lg-2">	
									<label for="length">length</label>
									<input type="number" class="form-control" required="required" name="length[]" required="required">
								</div>
								<div class="form-group col-lg-2">	
									<label for="breadth">Breadth</label>
									<input type="number" class="form-control" required="required"  name="breadth[]" required="required">
								</div>
								<div class="form-group col-lg-2">	
									<label for="height">Height</label>
									<input type="number" class="form-control" required="required" name="height[]" required="required" >
								</div>
								<div class="form-group col-lg-3">
									<label>Choose Unit Of Dimension</label>	
									<select name="unit_of_dimension[]" class="form-control" required="required">
										<option value="LN">LN</option>
										<option value="MM">MM</option>
										<option value="CM">CM</option>
										<option value="FT">FT</option>
									</select>
								</div>
							</div>	
						</div>
						<div class="form-group col-lg-6">
							<label for="pickup_date">Pickup Date<span class="text-danger">*</span></label>
							<input type="date" class="form-control" name="pickup_date[]" value="" required="required">	
						</div>
					</div>
					<div class="addedcategory27Rows"></div>
					<div class="form-group col-lg-12">
						<input type="button" class="addcategory27MoreRows btn btn-primary btn-sm" value="Add More">	
					</div>	
					<?php
					}
					if($category_id == '20')
					{
						?>
						<input type="hidden" name="category_id" value="<?= $category_id; ?>">
						<div class="row">
							<div class="form-group col-lg-6">
								<label for="vehicle_placement_location">Vehicle Placement Location<span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="vehicle_placement_location" value="" required="required" >
							</div>	
							<div class="form-group col-lg-6">
								<label for="company_name">Company Name<span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="company_name" value="" required="required">	
							</div>
						</div>	
						<div class="row">	
							<div class="form-group col-lg-3">
								<label for="type_of_vehicle">Type of Vehicle<span class="text-danger">*</span></label><br>
									<select name="type_of_vehicle[]" class="form-control">
										<option value=""> Select... </option>
										<option value="Eco Van"   > Eco Van </option>
										<option value="Champion" > Champion </option>
										<option value="Tata Ace" > Tata Ace </option>
										<option value="TATA 407" > TATA 407 </option>
										<option value="Canters" > Canters </option>
										<option value="32ft Truck" > 32ft Truck </option>
										<option value="LPT 20ft Truck" > LPT 20ft Truck </option>
									</select>
							</div>
							<div class="form-group col-lg-3">
								<label for="no_of_vehicles">No of vehicles<span class="text-danger">*</span></label>
								<input type="number" class="form-control"  name="no_of_vehicles[]" value="">
							</div>
							<div class="form-group col-lg-3">
								<label for="reporting_time">Reporting Time<span class="text-danger">*</span></label>
								<input type="time" class="form-control"  name="reporting_time[]" value="">
							</div>
							<div class="form-group col-lg-3">
								<label for="money_km">Monthly KM<span class="text-danger">*</span></label>
								<input type="number" class="form-control"  name="money_km[]" value="">
							</div>
						</div>
						<div class="addedcategory20Rows"></div>
						<div class="form-group col-lg-12">
							<input type="button" class="addcategory20MoreRows btn btn-primary btn-sm" value="Add More">	
						</div>
						<?php
					}
					if($category_id == '28')
					{
						?>
						<input type="hidden" name="category_id" value="<?= $category_id; ?>">
						<div class="row">
							<div class="form-group col-lg-6">
								<label for="vehicle_placement_location">Vehicle Origin Placement Location<span class="text-danger">*</span></label>
								<input type="text" class="form-control" name="vehicle_placement_location" value="" required="required" >
							</div>	
						</div>	
						<div class="row">	
							<div class="form-group col-lg-3">
								<label for="type_of_vehicle">Type of Vehicle<span class="text-danger">*</span></label><br>
								<select name="type_of_vehicle[]" class="form-control">
									<option value=""> Select... </option>
									<option value="Eco Van"   > Eco Van </option>
									<option value="Champion" > Champion </option>
									<option value="Tata Ace" > Tata Ace </option>
									<option value="TATA 407" > TATA 407 </option>
									<option value="Canters" > Canters </option>
									<option value="32ft Truck" > 32ft Truck </option>
									<option value="LPT 20ft Truck" > LPT 20ft Truck </option>
								</select>
							</div>
							<div class="form-group col-lg-2">
								<label for="daily_hour">Daily Hour<span class="text-danger">*</span></label>
								<input type="number" class="form-control"  name="daily_hour[]" value="">
							</div>
							<div class="form-group col-lg-2">
								<label for="monthly_km">Monthly KM<span class="text-danger">*</span></label>
								<input type="number" class="form-control"  name="monthly_km[]" value="">
							</div>
							<div class="form-group col-lg-2">
								<label for="no_of_vehicles">No of vehicles<span class="text-danger">*</span></label>
								<input type="number" class="form-control"  name="no_of_vehicles[]" value="">
							</div>
							<div class="form-group col-lg-2">
								<label for="with_without">Helper <span class="text-danger">*</span></label>
								<select class="form-control"  name="with_without[]">
									<option value="With Helper">With Helper</option>
									<option value="Without Helper">Without Helper</option>
								</select>
							</div>
							
						</div>
						<div class="addedcategory28Rows"></div>
						<div class="form-group col-lg-12">
							<input type="button" class="addcategory28MoreRows btn btn-primary btn-sm float-right" value="Add More">	
						</div>
						<?php
					}
					?>
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
	var rowDestinationCount = 1;
	$('.addDestinationMoreRows').click(function() 
	{
		rowDestinationCount ++;
		var recDestinationRow = '<div class="form-group rowDestinationCount'+rowDestinationCount+'"><input type="text" class="form-control"  name="destination_city[]" value=""><br><button type="button" value="'+rowDestinationCount+'" class="removeDestinationRow btn btn-danger btn-sm waves-effect waves-light"><i class="fa fa-minus"></i> </button></div>';
		$('.addedDestinationRows').append(recDestinationRow);
	}); 
	$(document).on("click", ".removeDestinationRow", function()
	{
		var removeDestinationNum = $(this).val();
		$('.rowDestinationCount'+removeDestinationNum).remove();
	});
	var rowcategory27Count = 1;
	$('.addcategory27MoreRows').click(function() 
	{
		rowcategory27Count ++;
		var reccategory27Row = '<div class="row rowcategory27Count'+rowcategory27Count+'"><div class="form-group col-lg-6">	<label for="origin_city">Origin City<span class="text-danger">*</span></label>	<input type="text" class="form-control" name="origin_city[]" value="" required="required" ></div>	<div class="form-group col-lg-6">	<label for="destination_city">Destination City<span class="text-danger">*</span></label>	<input type="text" class="form-control" name="destination_city[]" value="" required="required">	</div><div class="form-group col-lg-6">	<label for="origin_city">Origin Pincode<span class="text-danger">*</span></label>	<input type="text" class="form-control" name="origin_pincode[]" value="" required="required"></div>	<div class="form-group col-lg-6">	<label for="destination_city">Destination Pincode<span class="text-danger">*</span></label>	<input type="text" class="form-control" name="destination_pincode[]" value="" required="required">	</div><div class="form-group col-lg-6">	<label for="origin_city">Type Your National<span class="text-danger">*</span></label>	<input type="text" class="form-control" name="your_national[]" value="" required="required"></div>	<div class="form-group col-lg-6">	<label for="destination_city">National Value<span class="text-danger">*</span></label>	<input type="text" class="form-control" name="national_value[]" value="" required="required">	</div><div class="form-group col-lg-6">	<label for="destination_city">National Weight<span class="text-danger">*</span></label>	<input type="text" class="form-control" name="national_weight[]" value="" required="required">	</div><div class="form-group col-lg-12">	<label>Dimension<span class="text-danger">*</span></label>	<div class="row">		<div class="form-group col-lg-2">				<label for="length">length</label>			<input type="number" class="form-control" required="required" name="length[]" required="required">		</div>		<div class="form-group col-lg-2">				<label for="breadth">Breadth</label>			<input type="number" class="form-control" required="required"  name="breadth[]" required="required">		</div>		<div class="form-group col-lg-2">				<label for="height">Height</label>			<input type="number" class="form-control" required="required" name="height[]" required="required" >		</div>		<div class="form-group col-lg-3">			<label>Choose Unit Of Dimension</label>				<select name="unit_of_dimension[]" class="form-control" required="required">				<option value="LN">LN</option>				<option value="MM">MM</option>				<option value="CM">CM</option>				<option value="FT">FT</option>			</select>		</div>	</div>	</div><div class="form-group col-lg-6">	<label for="pickup_date">Pickup Date<span class="text-danger">*</span></label>	<input type="date" class="form-control" name="pickup_date[]" value="" required="required"></div><div class="form-group col-lg-12"><button type="button" value="'+rowcategory27Count+'" class="removecategory27Row btn btn-danger btn-sm waves-effect waves-light float-right"><i class="fa fa-minus"></i> </button></div></div>';
		$('.addedcategory27Rows').append(reccategory27Row);
	}); 
	$(document).on("click", ".removecategory27Row", function()
	{
		var removecategory27Num = $(this).val();
		$('.rowcategory27Count'+removecategory27Num).remove();
	});
	var rowcategory20Count = 1;
	$('.addcategory20MoreRows').click(function() 
	{
		rowcategory20Count ++;
		var reccategory20Row = '<div class="row rowcategory20Count'+rowcategory20Count+'"><div class="form-group col-lg-3"><label for="type_of_vehicle">Type of Vehicle<span class="text-danger">*</span></label><br><select name="type_of_vehicle[]" class="form-control"><option value=""> Select... </option><option value="Eco Van"   > Eco Van </option><option value="Champion" > Champion </option><option value="Tata Ace" > Tata Ace </option><option value="TATA 407" > TATA 407 </option><option value="Canters" > Canters </option><option value="32ft Truck" > 32ft Truck </option><option value="LPT 20ft Truck" > LPT 20ft Truck </option></select></div><div class="form-group col-lg-3"><label for="no_of_vehicles">No of vehicles<span class="text-danger">*</span></label><input type="number" class="form-control"  name="no_of_vehicles[]" value=""></div><div class="form-group col-lg-3"><label for="reporting_time">Reporting Time<span class="text-danger">*</span></label><input type="time" class="form-control"  name="reporting_time[]" value=""></div><div class="form-group col-lg-3"><label for="money_km">Monthly KM<span class="text-danger">*</span></label><input type="number" class="form-control"  name="money_km[]" value=""></div><div class="form-group col-lg-12"><button type="button" value="'+rowcategory20Count+'" class="removecategory20Row btn btn-danger btn-sm waves-effect waves-light float-right"><i class="fa fa-minus"></i> </button></div></div>';
		$('.addedcategory20Rows').append(reccategory20Row);
	}); 
	$(document).on("click", ".removecategory20Row", function()
	{
		var removecategory20Num = $(this).val();
		$('.rowcategory20Count'+removecategory20Num).remove();
	});
	var rowcategory28Count = 1;
	$('.addcategory28MoreRows').click(function() 
	{
		rowcategory28Count ++;
		var reccategory28Row = '<div class="row rowcategory28Count'+rowcategory28Count+'"><div class="form-group col-lg-3"><label for="type_of_vehicle">Type of Vehicle<span class="text-danger">*</span></label><br><select name="type_of_vehicle[]" class="form-control"><option value=""> Select... </option><option value="Eco Van"   > Eco Van </option><option value="Champion" > Champion </option><option value="Tata Ace" > Tata Ace </option><option value="TATA 407" > TATA 407 </option><option value="Canters" > Canters </option><option value="32ft Truck" > 32ft Truck </option><option value="LPT 20ft Truck" > LPT 20ft Truck </option></select></div><div class="form-group col-lg-2"><label for="daily_hour">Daily Hour<span class="text-danger">*</span></label><input type="number" class="form-control"  name="daily_hour[]" value=""></div><div class="form-group col-lg-2"><label for="money_km">Monthly KM<span class="text-danger">*</span></label><input type="number" class="form-control"  name="money_km[]" value=""></div><div class="form-group col-lg-2"><label for="no_of_vehicles">No of vehicles<span class="text-danger">*</span></label><input type="number" class="form-control"  name="no_of_vehicles[]" value=""></div><div class="form-group col-lg-2"><label for="with_without">Helper <span class="text-danger">*</span></label><select class="form-control"  name="with_without[]"><option value="With Helper">With Helper</option><option value="Without Helper">Without Helper</option></select></div><div class="form-group col-lg-12"><button type="button" value="'+rowcategory28Count+'" class="removecategory28Row btn btn-danger btn-sm waves-effect waves-light float-right"><i class="fa fa-minus"></i> </button></div></div>';
		$('.addedcategory28Rows').append(reccategory28Row);
	}); 
	$(document).on("click", ".removecategory28Row", function()
	{
		var removecategory28Num = $(this).val();
		$('.rowcategory28Count'+removecategory28Num).remove();
	});
	
	$(document).on("change","input[name = 'scheduling_type']",function()
	{
		var scheduling_type_val = $(this).val();
		if(scheduling_type_val == 'One Time')
		{
			$(".loadingdate").show();
			$(".loadingtime").show();
			$(".days").hide();
		}
		else if(scheduling_type_val == 'Weekly' )
		{
			$(".loadingdate").hide();
			$(".loadingtime").hide();
			$(".days").show();
		}
		else if(scheduling_type_val == 'Daily' )
		{
			$(".loadingdate").hide();
			$(".loadingtime").hide();
			$(".days").hide();
		}
	});
	$("input[name = 'advance_per']").keyup(function()
	{
	 	var advance_per = $(this).val();
		var checkbalance = 100-advance_per;
       	$("input[name = 'balance_per']").val(checkbalance);
    });
});	
</script>