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
		    	<h5>Assign Vendors</h5>
		    	<?php
		    	foreach ($dbValueVendor as $key => $value) 
		    	{
		    		?>
		    			<label><input type="checkbox" name="assign_vendor_id[]"  value="<?= $value->id; ?>" > <?= ucwords($value->first_name.' '.$value->last_name); ?></label>
		    		<?php
		    	}
		    	?>
		    		<button type="button" class="btn btn-info btn-xs waves-effect waves-light vendorclass">Submit</button>
		  	</div>
		</div>
		<div class="row small-spacing">
			<div class="col-12">
				<div class="box-content">
					<h4 class="box-title"><?php echo $page_title; ?>
					<div class="float-right">
						<a style="display: none;" class="btn btn-sm btn-default" href="<?php echo base_url('user/common/import_excel/driver');?>"><i class="fa fa-upload"></i> Import Customers</a>
						<a style="display: none;"class="btn btn-sm btn-primary" href="<?php echo base_url('user/vehicle/form');?>"><i class="ico fa fa-plus"></i>Add Vehicle</a>
					</div>
					</h4>
					<hr>
					
					<?php $this->load->view('user/vwError'); ?>
					
					<table class="" style="width: 100%;" role="grid" aria-describedby="example_info">
						<thead>
							<tr role="row">
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Enquiry to automatic or manual  </th>
							</tr>
						</thead>
						<tbody>	
						<?php 
							$i = 0; 
							foreach($dbValue as $db_value){
								++$i;
								$tr_class = "odd";
								if($i%2 == 0){
									$tr_class = "even";
								}
						?>
							<tr role="row" class="<?=$tr_class?>">
								<td class="">
									<div class="switch danger">
									<?php 
										$checkbox = "";
										if($db_value->status == 0){
											$checkbox = "checked";
										}
									?>
										<input type="checkbox" value="<?php echo $db_value->status; ?>" id="settingstatus<?php echo $db_value->id; ?>" class="settingstatus" name="settingstatus" data-id="<?php echo $db_value->id; ?>" <?=$checkbox?>>
										
										<label for="settingstatus<?php echo $db_value->id; ?>">&nbsp;</label>
										<?php
										if ($db_value->status == '0') 
										{
											echo "Automatic";
										}
										else
										{
											echo "Manual";
										}
										?>
									</div>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
					<?php
					if ($db_value->status == '1') 
					{
						?>
					<table id="example" class="table table-striped table-bordered display dataTable" style="width: 100%;" role="grid" aria-describedby="example_info">
						<thead>
							<tr role="row">
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Services</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Industry Type</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Product</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Origin City</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Destination City</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">When Required</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Posted Date</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Assign Vendors</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Action</th>
							</tr>
						</thead>
						<tbody>	
						<?php 
						$userid;
							$i = 0; 
							foreach($dbValueEnquiry as $db_value){
								++$i;
								$tr_class = "odd";
								if($i%2 == 0){
									$tr_class = "even";
								}
								if($db_value->admin_setting_status == '1')
								{

						?>
							<tr role="row" class="<?=$tr_class?>">
								<td>
									<a href="<?= base_url('user/enquiries/enquirydetail/'.$db_value->category_id.'/'.$db_value->enquiryid); ?>"><?= $db_value->category_name; ?></a>
								</td>
								<td><?= $db_value->industry_type; ?></td>
								<?php if($db_value->type_of_warehouse) { ?>
								<td><?= $db_value->type_of_warehouse; ?></td>
								<?php } else { ?>
								<td><?= $db_value->product; ?></td>
								<?php } ?>
								<td><?= $db_value->origin_city; ?></td>
								<td><?= $db_value->destination_city; ?></td>
								<td><?= $db_value->when_required_date; ?></td>
								<td><?= $db_value->created_date; ?></td>
								<td>
									<?php
										$CI =& get_instance();
										$CI->load->model('User_model');

										$explode = explode(',',$db_value->assign_vendor_ids);
										foreach ($explode as $value) 
										{
											if($value)
											{
												$result = $CI->User_model->get_user($value);
												echo ucwords($result->first_name.' '.$result->last_name)."<br>";
											}
											
										}
									?>
								</td>
								<td>
									<button type="button" class="btn btn-info btn-xs waves-effect waves-light myBtn" data-toggle="tooltip" title="Assign Vendor" assign-vendor-ids="<?= $db_value->assign_vendor_ids; ?>" value="<?php echo $db_value->enquiryid; ?>">Assign Vendor </button>
								</td>
							</tr>
							<?php 
								}
							}
							?>
						</tbody>
					</table>
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
<script>

$('.settingstatus').on('click', function(e){
		
	let $this 		= $(this);
	let id 			= $(this).attr('data-id');
	let prevStatus 	= $(this).val();
	let status, confirmMsg;
	
	if(prevStatus == 0){
		status = 1;
		confirmMsg = 'Are your sure you want to Setting  Automatic?';
	}else{
		status = 0;
		confirmMsg = 'Are your sure you want to Setting Manual?';
	}
	
	if(confirm(confirmMsg))
	{
		$.ajax({
			url: website_url + 'user/setting/changeStatus',
			type: 'POST',
			data: {'id': id, 'status': status},
			dataType: 'JSON',
			success: function(msg) { 
				if(msg == 1){
					// alert('Status changed!');
					/*swal("Setting changed!", "", "success");
					$this.val(status);*/
					window.location.reload();
				}else{
					// alert('Something went wrong, please try again!');
					swal("Something went wrong.", "Please try again!", "error");
					if(prevStatus == 0){
						$this.prop('checked', false);
					}else{
						$this.prop('checked', true);
					}
				}
			}
		});
	}
	else
	{
		e.preventDefault();
	}
});	


	// Get the modal
var modal = document.getElementById("myModal");
// Get the button that opens the modal
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
// When the user clicks the button, open the modal 
$('.myBtn').click(function()
{
  	modal.style.display = "block";
  	$('.vendorclass').attr('enquiry-id', $(this).val());
});

// When the user clicks on <span> (x), close the modal
span.onclick = function() 
{
 	modal.style.display = "none";
  	$('.vendorclass').attr('enquiry-id', '');
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) 
{
  	if (event.target == modal) 
  	{
    	modal.style.display = "none";
  	}
}
var i = 0;
$('.vendorclass').on('click', function()
{	
	var vendoridarr = [];
   	$('input[type=checkbox]:checked').each(function () {
       vendoridarr[i++] = $(this).val();
   	});
	var enquiryid = $(this).attr('enquiry-id');

	$.ajax({
		url: website_url + 'user/enquiries/assignVendor',
		type: 'POST',
		data: {'vendorids': vendoridarr, 'enquiryid': enquiryid},
		dataType: 'JSON',
		success: function(msg) 
		{ 
			if(msg == 1)
			{
				$('.message').html('<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>Assign Vendor Successfully</div>');
	            	setTimeout(function() { $(".alert-success").hide(); }, 4000);
	            	window.setTimeout(function () 
	            	{
				        location.reload(true);
				    }, 5000);
			}
			else
			{
				$('.message').html('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>Vendor Not Assign</div>');	
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
