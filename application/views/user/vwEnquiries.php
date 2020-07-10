<?php
	$this->load->view('user/vwadminheader.php');
?>
<div id="wrapper">
	<div class="main-content">
		<!-- The Modal -->
	<div class="row small-spacing">
			<div class="col-12">
				<div class="box-content">
					<h4 class="box-title"><?= $page_title; ?>
					<div class="float-right">
						<a style="display: none;" class="btn btn-sm btn-default" href="<?= base_url('user/common/import_excel/driver');?>"><i class="fa fa-upload"></i> Import Customers</a>
						<a class="btn btn-sm btn-primary" href='<?= base_url("user/enquiries/form/$category_id");?>'><i class="ico fa fa-plus"></i>Add <?= $page_title; ?> Enquiry</a>
					</div>
					</h4>
					<hr>
					<?php $this->load->view('user/vwError'); ?>
					<table id="example" class="table table-striped table-bordered display dataTable" style="width: 100%;" role="grid" aria-describedby="example_info">
						<thead>
							<tr role="row">
								<th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">S.No.</th>
								
								<?php
								if(($category_id == '2')||($category_id == '3')||($category_id == '13')||($category_id == '14')||($category_id == '15')||($category_id == '17')||($category_id == '18')||($category_id == '19'))
								{
									?>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Origin City</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Destination City</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">When Required</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">When Required Time</th>
								<?php
								if(($category_id != '13')&&($category_id != '15'))
								{
									?>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Type of Transaction</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Type of Load</th>
								<?php
								}
								?>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Industry Type</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Product/Commodities</th>
								<?php
								}
								if($category_id == '5')
								{
									?>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Area</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Area Dimension</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Location</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Whatsapp No</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Type Of Warehouse</th>
									<?php
								}
								if(($category_id == '8')||($category_id == '11'))
								{
									?>
									<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Area</th>
								
									<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">City</th>
									<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">State</th>
									<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Country</th>
									<?php
								}
								if(($category_id == '9')||($category_id == '10'))
								{
									?>
									<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Street 1</th>
									<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Street 2</th>
									<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Town</th>
									<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">District</th>
									<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Pincode</th>
									<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Name</th>
									<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Whatsapp No.</th>
									<?php
								}
								?>
								<th class="d-none sorting text-center" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Status</th>
								
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
								<td class="sorting_1"><?= $i; ?></td>
								
								<?php
								if(($category_id == '2')||($category_id == '3')||($category_id == '13')||($category_id == '14')||($category_id == '15')||($category_id == '17')||($category_id == '18')||($category_id == '19'))
								{
									?>
								<td><?= $db_value->origin_city; ?></td>
								<td><?= $db_value->destination_city; ?></td>
								<td><?= $db_value->when_required_date; ?></td>
								<td><?= $db_value->when_required_time; ?></td>
								<?php
								if(($category_id != '13')&&($category_id != '15'))
								{
									?>
								<td><?= $db_value->type_of_transaction; ?></td>
								<td><?= $db_value->type_of_load; ?></td>
								<?php
								}
								?>
								<td><?= $db_value->industry_type; ?></td>
								<td><?= $db_value->product_commodities; ?></td>
								<?php
								}
								if($category_id == '5')
								{
									?>
									<td><?= $db_value->area; ?></td>
									<td><?= $db_value->area_dimension; ?></td>
									<td><?= $db_value->location; ?></td>
									<td><?= $db_value->whatsapp_no; ?></td>
									<td><?= $db_value->type_of_warehouse; ?></td>
									<?php
								}
								if(($category_id == '8')||($category_id == '11'))
								{
									?>
									<td><?= $db_value->area; ?></td>
									<td><?= $db_value->city; ?></td>
									<td><?= $db_value->state; ?></td>
									<td><?= $db_value->country; ?></td>
									<?php
								}
								if(($category_id == '9')||($category_id == '10'))
								{
									?>
									<td><?= $db_value->street_1; ?></td>
									<td><?= $db_value->street_2; ?></td>
									<td><?= $db_value->town; ?></td>
									<td><?= $db_value->district; ?></td>
									<td><?= $db_value->pincode; ?></td>
									<td><?= $db_value->name; ?></td>
									<td><?= $db_value->whatsapp_no; ?></td>
									<?php
								}
								?>
								<td class="d-none text-center">
									<div class="switch danger">
									<?php 
										$checkbox = "";
										if($db_value->status == 0){
											$checkbox = "checked";
										}
									?>
										<input type="checkbox" value="<?= $db_value->status; ?>" id="enquirystatus<?= $db_value->id; ?>" class="enquirystatus" name="enquirystatus" data-id="<?= $db_value->id; ?>" <?=$checkbox?>>
										
										<label for="enquirystatus<?= $db_value->id; ?>">&nbsp;</label>
									</div>
								</td>
								
								<td class="text-center">
									<div class="btn-group" role="group" aria-label="Basic example">
										<button type="button" class="d-none btn btn-info btn-xs waves-effect waves-light" data-toggle="tooltip" title="Edit"  onclick="location.href='<?= base_url("user/enquiries/form/$category_id/").$db_value->id;?>'"><i class="ico fa fa-edit"></i></button>
										
										<button type="button" class="btn btn-danger btn-xs waves-effect waves-light" data-toggle="tooltip" title="Delete" onclick="return areYouSureVehicle(<?= $db_value->id; ?>);"><i class="ico fa fa-trash"></i></button>
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
<?php	$this->load->view('user/vwadminfooter.php'); ?>
<script>
function areYouSureVehicle(id)
{
	if(confirm('Are you sure you want to delete this entry?'))
	{
		location.href='<?= base_url("user/enquiries/delete_enquiries/$category_id/");?>'+id; 
	}
}
$('.enquirystatus').on('click', function(e){
		
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
			url: website_url + 'user/enquiries/changeStatus',
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
</script>
