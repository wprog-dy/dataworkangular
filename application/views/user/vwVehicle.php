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
		<!-- The Modal -->

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
				<div class="box-content">
					<h4 class="box-title"><?php echo $page_title; ?>
					<div class="float-right">
						<a style="display: none;" class="btn btn-sm btn-default" href="<?php echo base_url('user/common/import_excel/driver');?>"><i class="fa fa-upload"></i> Import Customers</a>
						<a class="btn btn-sm btn-primary" href="<?php echo base_url('user/vehicle/form');?>"><i class="ico fa fa-plus"></i>Add Vehicle</a>
					</div>
					</h4>
					<hr>
					
					<?php $this->load->view('user/vwError'); ?>
					
					<table id="example" class="table table-striped table-bordered display dataTable" style="width: 100%;" role="grid" aria-describedby="example_info">
						<thead>
							<tr role="row">
								<th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">S.No.</th>
								
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Vehicle Type</th>
								
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Vehicle No.</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Assigned Driver</th>
								
								<th class="sorting text-center" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Status</th>
								
								<th class="sorting text-center" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Action</th>
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
								<td class="sorting_1"><?php echo $i; ?></td>
								<td>
								<?php echo $db_value->vehicle_type; ?>
								</td>
								<td><?php echo $db_value->vehicle_no; ?></td>
								<td><?php echo ucwords($db_value->driver_name); ?></td>
								
								<td class="text-center">
									<div class="switch danger">
									<?php 
										$checkbox = "";
										if($db_value->status == 0){
											$checkbox = "checked";
										}
									?>
										<input type="checkbox" value="<?php echo $db_value->status; ?>" id="vehiclestatus<?php echo $db_value->vehiclesid; ?>" class="vehiclestatus" name="vehiclestatus" data-id="<?php echo $db_value->vehiclesid; ?>" <?=$checkbox?>>
										
										<label for="vehiclestatus<?php echo $db_value->vehiclesid; ?>">&nbsp;</label>
									</div>
								</td>
								
								<td class="text-center">
									<div class="btn-group" role="group" aria-label="Basic example">
										<button type="button" class="btn btn-info btn-xs waves-effect waves-light" data-toggle="tooltip" title="Edit"  onclick="location.href='<?php echo base_url('user/vehicle/form/').$db_value->vehiclesid;?>'"><i class="ico fa fa-edit"></i></button>
										
										<button type="button" class="btn btn-danger btn-xs waves-effect waves-light" data-toggle="tooltip" title="Delete" onclick="return areYouSureVehicle(<?php echo $db_value->vehiclesid; ?>);"><i class="ico fa fa-trash"></i></button>
									
										<button type="button" class="btn btn-info btn-xs waves-effect waves-light" data-toggle="tooltip" title="Assign Driver" value="<?php echo $db_value->vehiclesid; ?>"  id="myBtn">Assign Driver </button>
									</div>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-12 -->

<?php
	$this->load->view('user/vwadminfooter.php');
?>
<script>

	// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
  $('.driverclass').attr('vehicle-id', $(this).val());
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
  $('.driverclass').attr('vehicle-id', '');
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";

  }
}


function areYouSureVehicle(id){
	if(confirm('Are you sure you want to delete this entry?'))
	{
		
		location.href='<?php echo base_url('user/vehicle/delete_vehicle/');?>'+id; 

	}
}
$('.vehiclestatus').on('click', function(e){
		
	let $this 		= $(this);
	let id 			= $(this).attr('data-id');
	let prevStatus 	= $(this).val();
	let status, confirmMsg;
	
	if(prevStatus == 0){
		status = 1;
		confirmMsg = 'Are your sure you want to unblock?';
	}else{
		status = 0;
		confirmMsg = 'Are your sure you want to block?';
	}
	
	if(confirm(confirmMsg))
	{
		$.ajax({
			url: website_url + 'user/vehicle/changeStatus',
			type: 'POST',
			data: {'id': id, 'status': status},
			dataType: 'JSON',
			success: function(msg) { 
				if(msg == 1){
					// alert('Status changed!');
					swal("Status changed!", "", "success");
					$this.val(status);
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
$('.driverclass').on('change', function()
{	
	var driverid = $(this).val();
	var vehicleid = $(this).attr('vehicle-id');


	$.ajax({
		url: website_url + 'user/vehicle/assignDriver',
		type: 'POST',
		data: {'driverid': driverid, 'vehicleid': vehicleid},
		dataType: 'JSON',
		success: function(msg) { 
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
