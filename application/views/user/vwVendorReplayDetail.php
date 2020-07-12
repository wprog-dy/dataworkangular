<?php
	$this->load->view('user/vwadminheader.php');
?>
<style type="text/css">
	/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  padding-top: 250px; /* Location of the box */
  left: 0;
  top: 0px;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 35%;
  border-radius: 33px;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
.accepted
{
	background: #0080003b;
}
</style>
<div id="wrapper">
	<div class="main-content">
		<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div><span class="close">&times;</span></div>
    <div class="message"></div>
    <h5>Reassigned driver</h5>
    	<?php
    	foreach ($driverValue as $key => $value) 
    	{
    		?>
    			<label><input type="radio" name="assign_driver_id" class="driverclass"  value="<?= $value->id; ?>" > <?= ucwords($value->driver_name); ?> Vehicle Number : <?= $value->vehicle_no; ?> </label>
    		<?php
    	}
    	?>
    	<iframe src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d3694035.99804947!2d73.73989324553663!3d25.288844550170566!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d22.136288999999998!2d75.626672!4m5!1s0x390d19ad4b932597%3A0x63da5f183450a87e!2sEweblabs%20Pvt.%20Ltd.!3m2!1d28.475457!2d77.06046099999999!5e0!3m2!1sen!2sin!4v1594554747832!5m2!1sen!2sin" width="430" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
  </div>

</div>
	<div class="row small-spacing">
			<div class="col-12">
				<?php $this->load->view('user/vwError'); ?>
				<div class="box-content">
					<h4 class="box-title"><?php echo $page_title; ?></h4>
					<?php
						$CI =& get_instance();
						$CI->load->model('User_model');
						foreach ($vendorreplaydetail as $value) 
						{
							?>
						<div class="row">
						<table id="example" class="table table-striped table-bordered display dataTable" style="width: 100%;" role="grid" aria-describedby="example_info">
							<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Reference Id</th>
							<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Customer Name</th>
							<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Customer Email</th>
							<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Vendor Company Name</th>
							<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Vendor Email</th>
							<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Phone</th>
							<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Origin</th>
							<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Destination</th>
							<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">When Required</th>
							
							<tr>
								<td><?= $value->reference_id; ?></td>
								<td><?php
										$result = $CI->User_model->get_user($value->customerid);
										echo ucwords($result->first_name.' '.$result->last_name) ?></td>
								<td><?= $result->email; ?></td>
								<td><?= $value->company_name; ?></td>
								<td><?= $value->email; ?></td>
								<td><?= $value->phone; ?></td>
								<td><?= $value->origin_city; ?></td>
								<td><?= $value->destination_city; ?></td>
								<td><?= $value->when_required_date; ?></td>
						</table>
						<table id="example" class="table table-striped table-bordered display dataTable" style="width: 100%;" role="grid" aria-describedby="example_info">
							<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Transaction</th>
							<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Type of load</th>
							<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Product</th>
							<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Approx Weight</th>
							<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">No. of packets</th>
							<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Specific Requirements</th>
							<tr>
								<td><?= $value->type_of_transaction; ?></td>
								<td><?= $value->type_of_load; ?></td>
								<td><?= $value->product; ?></td>
								<td><?= $value->approx_weight_kg; ?></td>
								<td><?= $value->no_of_packets; ?></td>
								<td><?= $value->specific_requirement; ?></td>
						</table>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<table id="example" class="table table-striped table-bordered display dataTable" style="width: 100%;" role="grid" aria-describedby="example_info">
							<tr><td  class="accepted">Rate offered	</td><td  class="accepted"><?= $value->rate_per_unit; ?></td></tr>
								<tr><td class="accepted" >Validity	</td><td class="accepted" ><?= $value->validity; ?></td></tr>
								<tr><td class="accepted" >Remark Credit Term	</td><td class="accepted" ><?= $value->credit_term; ?></td></tr>
								<tr><td class="accepted">Messages	</td><td class="accepted"><?= $value->message; ?></td></tr>
								<tr><td class="accepted">When Replied	</td><td class="accepted"><?= $value->when_required_date; ?></td></tr>
								<?php
									if($value->enquiry_status =='Accepted')
									{
										if($this->session->userdata('user_type')=='vendor')
										{
								?>
								<tr>
									<td class="accepted">Offer is accepted</td>
									<td class="accepted">
											<button type="button" class="btn btn-info btn-xs waves-effect waves-light" data-toggle="tooltip" title="Assign Driver" value="<?php echo $value->reference_id; ?>"  id="myBtn">Reassigned driver </button>
									</td>	
								</tr>
								<?php
									}
									if($this->session->userdata('user_type')=='customer')
										{
									?>
									<tr>
									<td class="accepted"></td>
									<td class="accepted">
											<button type="button" class="btn btn-info btn-xs waves-effect waves-light">View Driver Location </button>
									</td>	
								</tr>
									<?php
									}
									?>
								<tr>
									<td class="accepted">Pickup Date</td>
									<td class="accepted">Pending</td>	
								</tr>
								<tr>
									<td class="accepted">Pickup Images</td>
									<td class="accepted"></td>	
								</tr>
								<tr>
									<td class="accepted">Drop Date</td>
									<td class="accepted">Pending</td>		
								</tr>
								<tr>
									<td class="accepted">Drop Images</td>
									<td class="accepted"></td>		
								</tr>
								<?php
								}
								?>
							</table>
						</div>
							<?php	
							if($this->session->userdata('user_type')=='customer')
							{
							?>
						<div class="box-content col-lg-6 col-12">
								<p><h5>Vendor Detail</h5></p><hr>  	
								<p><?= $value->company_name; ?></p>
								<p>Contact No. : <?= $value->phone; ?></p>
								<p>Email : <?= $value->email; ?></p>
								<p>Website : <?= $value->company_website; ?></p>
								<p>Industry Type : <?= $value->industry_type; ?></p>
								<p>Services Area : <?= $value->category_name; ?></p>
								<p>Type of company :  <?= $value->company_type; ?></p>
								<p>No of years in business : <?= $value->business_years; ?></p>
								<p>About : <?= $value->additional_info; ?></p>
						</div>
						<?php
					}
					?>
					</div>
					<?php
					}
					?>
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-12 -->

<?php
	$this->load->view('user/vwadminfooter.php');
?>
<script type="text/javascript">
	// Get the modal
var modal = document.getElementById("myModal");
// Get the button that opens the modal
var btn = document.getElementById("myBtn");
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
// When the user clicks the button, open the modal 
btn.onclick = function() 
{
  	modal.style.display = "block";
  	$('.driverclass').attr('reference-id', $(this).val());
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() 
{
 	modal.style.display = "none";
  	$('.driverclass').attr('reference-id', '');
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) 
{
  	if (event.target == modal) 
  	{
    	modal.style.display = "none";
  	}
}
$('.driverclass').on('change', function()
{	
	var driverid = $(this).val();
	var referenceid = $(this).attr('reference-id');

	$.ajax({
		url: website_url + 'user/enquiries/assignDriver',
		type: 'POST',
		data: {'driverid': driverid, 'referenceid': referenceid},
		dataType: 'JSON',
		success: function(msg) 
		{ 
			if(msg == 1)
			{
				$('.message').html('<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>Assign Driver Successfully</div>');
	            	setTimeout(function() { $(".alert-success").hide(); }, 4000);
	            	window.setTimeout(function () 
	            	{
				        location.reload(true);
				    }, 5000);
			}
			else
			{
				$('.message').html('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>Driver Not Assign</div>');	
            		setTimeout(function() { $(".alert-success").hide(); }, 4000);
            		window.setTimeout(function () 
	            	{
				        location.reload(true);
				    }, 5000);
			}
		}
	});	
});	
</script>