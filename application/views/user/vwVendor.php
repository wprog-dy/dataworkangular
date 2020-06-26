<?php
	$this->load->view('user/vwadminheader.php');
?>

<div id="wrapper">

	<div class="main-content">
	
	<!--<nav class="nav_breadcrumb mb-3" aria-label="breadcrumb">
		<ol class="breadcrumb secondary-color">
		  <li class="breadcrumb-item"><a class="white-text" href="#">Home</a></li>
		  <li class="breadcrumb-item"><a class="white-text" href="#">Library</a></li>
		  <li class="breadcrumb-item active">Data</li>
		</ol>
	</nav>-->
  
	<div class="row small-spacing">
			<div class="col-12">
				<div class="box-content">
					<h4 class="box-title"><?php echo $page_title; ?>
					<div class="float-right">
						<a class="btn btn-sm btn-default" href="<?php echo base_url('user/common/import_excel/vendor');?>"><i class="fa fa-upload"></i> Import Vendors</a>
						<a class="btn btn-sm btn-primary" href="<?php echo base_url('user/vendor/form');?>"><i class="ico fa fa-plus"></i> Add Vendor</a>
					</div>
					</h4>
					<hr>
					
					<?php $this->load->view('user/vwError'); ?>
					
					<table id="example" class="table table-striped table-bordered display dataTable" style="width: 100%;" role="grid" aria-describedby="example_info">
						<thead>
							<tr role="row">
								<th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">S.No.</th>
								
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Name</th>
								
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Email</th>
								
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Unique Id</th>
								
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Phone</th>
								
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Password</th>
								
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Company</th>
								
								<th class="sorting text-center" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Block/Unblock</th>
								
								<th class="sorting text-center" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Featured</th>
								
								<th class="sorting text-center" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Action</th>
							</tr>
						</thead>
						<!--<tfoot>
							<tr><th rowspan="1" colspan="1">Name</th><th rowspan="1" colspan="1">Position</th><th rowspan="1" colspan="1">Office</th><th rowspan="1" colspan="1">Age</th><th rowspan="1" colspan="1">Start date</th><th rowspan="1" colspan="1">Salary</th></tr>
						</tfoot>-->
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
								<?php 
									$name = $db_value->first_name;
									if($db_value->last_name != ""){
										$name = $db_value->first_name." ".$db_value->last_name;
									}
									echo ucwords($name); 
								?>
								</td>
								<td><?php echo $db_value->email; ?></td>
								<td><?php echo $db_value->login_code; ?></td>
								<td><?php echo $db_value->phone; ?></td>
								<td><?php echo base64_decode($db_value->password); ?></td>
								<td><?php echo ucwords($db_value->company_name); ?></td>
								
								<td class="text-center">
									<div class="switch danger">
									<?php 
										$checkbox = "";
										if($db_value->status == 0){
											$checkbox = "checked";
										}
									?>
										<input type="checkbox" value="<?php echo $db_value->status; ?>" id="status<?php echo $db_value->id; ?>" class="status" name="status" data-id="<?php echo $db_value->id; ?>" <?=$checkbox?>>
										
										<label for="status<?php echo $db_value->id; ?>">&nbsp;</label>
									</div>
								</td>
								
								<td class="text-center">
									<div class="switch danger">
									<?php 
										$checkbox = "";
										if($db_value->featured == 1){
											$checkbox = "checked";
										}
									?>
										<input type="checkbox" value="<?php echo $db_value->featured; ?>" id="featured<?php echo $db_value->id; ?>" class="featured" name="featured" data-id="<?php echo $db_value->id; ?>" <?=$checkbox?>>
										
										<label id="label_featured" for="featured<?php echo $db_value->id; ?>">&nbsp;</label>
									</div>
								</td>
								<td class="text-center">
									<div class="btn-group" role="group" aria-label="Basic example">
										<button type="button"  class="btn btn-info btn-xs waves-effect waves-light"  data-toggle="tooltip" title="Add Driver" onclick="location.href='<?php echo base_url('user/driver/form?vendor_id=').$db_value->id;?>'">Add Driver</button>&nbsp;
										<button type="button"  class="btn btn-info btn-xs waves-effect waves-light"  data-toggle="tooltip" title="Add Vehicle" onclick="location.href='<?php echo base_url('user/vehicle/form?vendor_id=').$db_value->id;?>'">Add Vehicle</button>&nbsp;
									</div>
									<hr></hr>
									<div class="btn-group" role="group" aria-label="Basic example">
										
										<button type="button" class="btn btn-info btn-xs waves-effect waves-light" data-toggle="tooltip" title="View" onclick="location.href='<?php echo base_url('user/vendor/vendorprofile/').$db_value->id;?>'"><i class="ico fa fa-eye"></i></button><button type="button" class="btn btn-info btn-xs waves-effect waves-light" data-toggle="tooltip" title="Edit" onclick="location.href='<?php echo base_url('user/vendor/form/').$db_value->id;?>'"><i class="ico fa fa-edit"></i></button>
										
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
	if(confirm('Are you sure you want to delete this entry?')){
		
		location.href='<?php echo base_url('user/common/delete_user/');?>' + id + '/vendor'; 
	}
}
</script>