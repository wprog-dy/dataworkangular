<?php
	$this->load->view('user/vwadminheader.php');
?>
<style type="text/css">
	/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */

  padding-top: 100px; /* Location of the box */
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
</style>
<div id="wrapper">
	<div class="main-content">
		<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div><span class="close">&times;</span></div>
    <div class="message"></div>
    <h5>Assign a driver</h5>
    	<?php
    	foreach ($driverValue as $key => $value) 
    	{
    		?>
    			<label><input type="radio" name="assign_driver_id" class="driverclass"  value="<?= $value->id; ?>" > <?= ucwords($value->driver_name); ?></label>
    		<?php
    	}
    	?>
  </div>

</div>
	<div class="row small-spacing">
			<div class="col-12">
				<?php $this->load->view('user/vwError'); ?>
				<div class="box-content">
					<h4 class="box-title"><?php echo $page_title; ?></h4>
					
					<table id="example" class="table table-striped table-bordered display dataTable" style="width: 100%;" role="grid" aria-describedby="example_info">
						<?php
						foreach ($vendorreplaydetail as $value) 
						{
							?>
							<tr><td>Reference Id </td><td><?= $value->reference_id; ?></td></tr>
							<tr><td>Customer Email </td><td><?= $this->session->userdata('email'); ?></td></tr>
							<tr><td>Vendor Company Name	</td><td><?= $value->company_name; ?></td></tr>
							<tr><td>Vendor Email	</td><td><?= $value->email; ?></td></tr>
							<tr><td>Phone	</td><td><?= $value->phone; ?></td></tr>
							<tr><td>Origin	</td><td><?= $value->origin_city; ?></td></tr>
							<tr><td>Destination	</td><td><?= $value->destination_city; ?></td></tr>
							<tr><td>When Required	</td><td><?= $value->when_required_date; ?></td></tr>
							<tr><td>Transaction	</td><td><?= $value->type_of_transaction; ?></td></tr>
							<tr><td>Type of load </td><td><?= $value->type_of_load; ?></td></tr>
							<tr><td>Product	</td><td><?= $value->product; ?></td></tr>
							<tr><td>Approx Weight </td><td><?= $value->approx_weight_kg; ?></td></tr>
							<tr><td>No. of packets	</td><td><?= $value->no_of_packets; ?></td></tr>
							<tr><td>Specific Requirements	</td><td><?= $value->specific_requirement; ?></td></tr>
							<tr><td>Rate offered	</td><td><?= $value->rate_per_unit; ?></td></tr>
							<tr><td>Validity	</td><td><?= $value->validity; ?></td></tr>
							<tr><td>Remark Credit Term	</td><td><?= $value->credit_term; ?></td></tr>
							<tr><td>Messages	</td><td><?= $value->message; ?></td></tr>
							<tr><td>When Replied	</td><td><?= $value->when_required_date; ?></td></tr>
						<?php	
						}
						if($this->session->userdata('user_type')=='customer')
						{
						?>
						<tr>
							<div class="float-right">
								<a class="btn btn-sm btn-primary" href="<?= base_url('user/enquiries/enquiryvendorstatus/'.$value->enquiry_id.'/'.$value->reference_id.'/'.$value->equiry_status) ?>"><?= $value->equiry_status; ?></a>
							</div>
						</tr>
						<?php
						}if($this->session->userdata('user_type')=='vendor')
						{
						?>
						<tr>
							<div class="float-right">
								<button type="button" class="btn btn-info btn-xs waves-effect waves-light" data-toggle="tooltip" title="Assign Driver" value="<?php echo $value->reference_id; ?>"  id="myBtn">Assign Driver </button>
							</div>
						</tr>
						<?php
						}
					?>
					</table>
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