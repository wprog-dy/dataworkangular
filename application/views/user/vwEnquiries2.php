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
						<a class="btn btn-sm btn-primary" href='<?= base_url("user/enquiries2/form/$category_id");?>'><i class="ico fa fa-plus"></i>Add <?= $page_title; ?> Enquiry</a>
					</div>
					</h4>
					<hr>
					<?php $this->load->view('user/vwError'); ?>
					<table id="example" class="table table-striped table-bordered display dataTable" style="width: 100%;" role="grid" aria-describedby="example_info">
						<thead>
							<tr role="row">
								<th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">S.No.</th>
								
								<?php
								if($category_id == '28')
								{
									?>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Vehicle Placement Location</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Type Of Vehicle</th>
								<?php
								}
								if($category_id == '26')
								{
									?>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Origin City</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Destination City</th>
								<?php
								}
								if($category_id == '27')
								{
									?>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Origin City</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Destination City</th>
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
								if($category_id == '28')
								{
									?>
								<td><?= $db_value->vehicle_placement_location; ?></td>
								<td>
									<?php  
										$vehicles = json_decode($db_value->type_of_vehicle);
										foreach ($vehicles as  $value) {
											echo $value.", ";
										}
									?>	
								</td>
								<?php
								}
								if($category_id == '26')
								{
									?>
								<td><?= $db_value->origin_city; ?></td>
								<td><?=$db_value->destination_city; ?>
								</td>
								<?php
								}
								if($category_id == '27')
								{
									?>
								<td><?= $db_value->origin_city; ?></td>
								<td><?= $db_value->destination_city; ?></td>
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
										<button type="button" class="d-none btn btn-info btn-xs waves-effect waves-light" data-toggle="tooltip" title="Edit"  onclick="location.href='<?= base_url("user/enquiries2/form/$category_id/").$db_value->id;?>'"><i class="ico fa fa-edit"></i></button>
										
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
		location.href='<?= base_url("user/enquiries2/delete_enquiries/$category_id/");?>'+id; 
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
