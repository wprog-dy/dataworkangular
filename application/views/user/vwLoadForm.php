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
						
						<!-- /.box-title -->
						<div class="row">
							
							<div class="form-group col-lg-6">
								<label for="exampleInputFirstName">Origin City<span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="exampleInputFirstName">
							</div>

							<div class="form-group col-lg-6">
								<label for="exampleInputLastName">Destination City<span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="exampleInputLastName">
							</div>
							
							<div class="form-group col-lg-6">
								<label for="exampleInputEmailUsername">When Required<span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="exampleInputEmailUsername">
							</div>
							<div class="form-group col-lg-6">
								<label for="exampleInputPhone">When Required Time<span class="text-danger">*</span></label>
								<input type="time" class="form-control" id="exampleInputPhone">
							</div>
							<div class="form-group col-lg-12">
								<div  class="border p-2" style="border-color: #ced4da;">
									
									<ul class="list-inline mb-0 pt-2">
										<label for="exampleInputTypeofcompany">Type of Transaction</label>
										<li>
											<div class="radio info"><input type="radio" checked="" name="radio-2" id="radio-10"><label for="radio-10">One Time</label></div>
											<!-- /.radio -->
										</li>
										<li>
											<div class="radio pink"><input type="radio" name="radio-2" id="radio-11"><label for="radio-11">Repeat</label></div>
											<!-- /.radio -->
										</li>
										
									</ul>

								<!-- <label for="exampleInputTypeofcompany">Type of Transaction</label>
									<input type="radio" class="" placeholder="Number Only" id="exampleInputIndustryType">
									<input type="radio" class="" placeholder="Number Only" id="exampleInputIndustryType"> -->

								<!-- <ul class="list-inline">
									<li>
										<div class="radio info"><input type="radio" checked="" name="radio-2" id="radio-10"><label for="radio-10">One</label></div>
									
									</li>
									<li>
										<div class="radio pink"><input type="radio" name="radio-2" id="radio-11"><label for="radio-11">Two</label></div>
										
									</li>
									<li>
										<div class="radio inverse"><input type="radio" name="radio-2" id="radio-12"><label for="radio-12">Three</label></div>
										
									</li>
								</ul> -->
							</div>
							</div>
							

							<div class="form-group col-lg-6">
								<label for="exampleInputTypeofcompany">Type of Load</label>
								<select class="form-control select2_1">
										<option value="">Select Type of Load...</option>
										<option value="Biker">Biker</option>
										<option value="FTL">FTL</option>
										<option value="Express">Express</option>
										<option value="LTL">LTL</option>
										
								</select>
							</div>
							<div class="form-group col-lg-6">
								<label for="exampleInputTypeofcompany">Industry Type<span class="text-danger">*</span></label>
								<select class="form-control select2_1">
										<option value="">Select Industry Type</option>
										<option value="General">General</option>
										<option value="Hi tech">Hi tech</option>
										<option value="Automotive">Automotive</option>
										<option value="Pharmaceutical">Pharmaceutical</option>
										<option value="FMCG">FMCG</option>
										<option value="Aviation">Aviation</option>
										
								</select>
							</div>

							<div class="form-group col-lg-6">
								<label for="exampleInputPANCardNo">Product/Commodities<span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="exampleInputPANCardNo">
							</div>

							<div class="form-group col-lg-6">
								<label for="exampleInputIndustryType">Approx Weight (Kg)<span class="text-danger">*</span></label>
								<input type="number" class="form-control" placeholder="Number Only" id="exampleInputIndustryType">
							</div>

							<div class="form-group col-lg-6">
								<label for="exampleInputCity">No of Packets<span class="text-danger">*</span></label>
								<input type="number" class="form-control" id="exampleInputCity" placeholder="Number Only">
							</div>

							<div class="form-group col-lg-6">
								<label for="exampleInputContactPerson">Pickup Address<span class="text-danger">*</span></label>
								<input type="text" class="form-control" placeholder="Enter a Location" id="exampleInputContactPerson">
							</div>

							<div class="form-group col-lg-6">
								<label for="exampleInputTypeofcompany">Drop Address<span class="text-danger">*</span></label>
								<input type="text" class="form-control" placeholder="Enter a Location" id="exampleInputContactPerson">
							</div>

								<div class="form-group col-lg-12">
								<label for="exampleInputMainServices" >Any specific requirement (if any)</label>
								<div>
									<textarea class="form-control" id="inp-type-5" placeholder="Max 250 Chars"></textarea>
								</div>
							</div>

							<div class="checkbox form-group p-3">
								<input type="checkbox" id="chk-1"><label for="chk-1">Should this query goes to more vendors?</label> 
							</div>
								</div>
							<button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">Save</button>
								
							<!-- /.col-lg-6 -->
					
					
						<!-- /.row -->
					</div>
					<!-- /.box-content -->
				</div>
		

<?php
	$this->load->view('user/vwadminfooter.php');
?>
