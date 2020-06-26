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
					swal("Setting changed!", "", "success");
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
