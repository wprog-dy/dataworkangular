<?php
	$this->load->view('user/vwadminheader.php');
?>
	
<div id="wrapper">
	<div class="main-content">
	<div class="row small-spacing">
			<div class="col-12">
				<div class="box-content">
					<h4 class="box-title"><?php echo $page_title; ?>
					<div class="float-right">
						<a style="display: none;" class="btn btn-sm btn-default" href="<?php echo base_url('user/common/import_excel/driver');?>"><i class="fa fa-upload"></i> Import Customers</a>
						<a class="btn btn-sm btn-primary" href="<?php echo base_url('user/driver/form');?>"><i class="ico fa fa-plus"></i>Add Driver</a>
					</div>
					</h4>
					<hr>
					
					<?php $this->load->view('user/vwError'); ?>
					
					<table id="example" class="table table-striped table-bordered display dataTable" style="width: 100%;" role="grid" aria-describedby="example_info">
						<thead>
							<tr role="row">
								<th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">S.No.</th>
								
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Driver Name</th>
								
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Driver Type</th>
								
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Phone</th>
								
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Date Of Birth</th>
								
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Aadhar No.</th>
								
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Address</th>
								
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
								<?php echo ucwords($db_value->driver_name); ?>
								</td>
								<td><?php echo $db_value->driver_type; ?></td>
								<td><?php echo $db_value->phone_no; ?></td>
								<td><?php echo $db_value->dob; ?></td>
								<td><?php echo $db_value->aadhar_number; ?></td>
								<td><?php echo $db_value->address; ?></td>
								
								<td class="text-center">
									<div class="switch danger">
									<?php 
										$checkbox = "";
										if($db_value->status == 0){
											$checkbox = "checked";
										}
									?>
										<input type="checkbox" value="<?php echo $db_value->status; ?>" id="driverstatus<?php echo $db_value->id; ?>" class="driverstatus" name="driverstatus" data-id="<?php echo $db_value->id; ?>" <?=$checkbox?>>
										
										<label for="driverstatus<?php echo $db_value->id; ?>">&nbsp;</label>
									</div>
								</td>
								
								<td class="text-center">
									<div class="btn-group" role="group" aria-label="Basic example">
										<button type="button" class="btn btn-info btn-xs waves-effect waves-light" data-toggle="tooltip" title="Edit"  onclick="location.href='<?php echo base_url('user/driver/form/').$db_value->id;?>'"><i class="ico fa fa-edit"></i></button>
										
										<button type="button" class="btn btn-danger btn-xs waves-effect waves-light" data-toggle="tooltip" title="Delete" onclick="return areYouSure(<?php echo $db_value->id; ?>);"><i class="ico fa fa-trash"></i></button>
										
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
function areYouSure(id){
	if(confirm('Are you sure you want to delete this entry?'))
	{
		
		location.href='<?php echo base_url('user/driver/delete_driver/');?>'+id; 

	}
}
$('.driverstatus').on('click', function(e){
		
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
			url: website_url + 'user/driver/changeStatus',
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
