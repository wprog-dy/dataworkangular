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
						<a class="btn btn-sm btn-primary"  href=" <?php echo base_url('user/subadmin/form');?>"><i class="ico fa fa-plus"></i>Add Subadmin</a>
					</div>
					</h4>
					<hr>
					
					<?php $this->load->view('user/vwError'); ?>
					
					<table id="example" class="table table-striped table-bordered display dataTable table-responsive" style="width: 100%;" role="grid" aria-describedby="example_info">
						<thead>
							<tr role="row">
								<th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">S.No.</th>
								
								<th class="sorting text-center" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Name</th>
								
								<th class="sorting text-center" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Email</th>
								
								<th class="sorting text-center" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Phone</th>
								
								<th class="sorting text-center" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Password</th>
								
								<th class="sorting text-center" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Role</th>
								
								<th class="sorting text-center" tabindex="0" aria-controls="example" rowspan="1" colspan="1">DOB</th>
								
								<th class="sorting text-center" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Joining Date</th>
								
								<th class="sorting text-center" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Leaving Date</th>
								
								<th class="sorting text-center" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Salary</th>
								
								<th class="sorting text-center" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Block/Unblock</th>
								
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
								<td><?php echo ucwords($db_value->name); ?></td>
								<td><?php echo $db_value->email; ?></td>
								<td><?php echo $db_value->phone; ?></td>
								<td><?php echo $db_value->password; ?></td>
								<td><?php echo $db_value->role; ?></td>
								<td><?php echo $db_value->dob; ?></td>
								<td><?php echo $db_value->joining_date; ?></td>
								<td><?php echo $db_value->leaving_date; ?></td>
								<td><?php echo $db_value->salary; ?></td>
								<td class="text-center">
									<div class="switch danger">
									<?php 
										$checkbox = "";
										if($db_value->status == 0){
											$checkbox = "checked";
										}
									?>
										<input type="checkbox" value="<?php echo $db_value->status; ?>" id="status<?php echo $db_value->id; ?>" data-id="<?php echo $db_value->id; ?>"<?=$checkbox?>>
										<label for="status<?php echo $db_value->id; ?>">&nbsp;</label>
									</div>
								</td>
								<td class="text-center">
									<div class="btn-group" role="group" aria-label="Basic example">
										<button type="button" class="btn btn-info btn-xs waves-effect waves-light"data-toggle="tooltip" title="Edit"  onclick="location.href='<?php echo base_url('user/subadmin/form/').$db_value->id;?>'"><i class="ico fa fa-edit"></i></button>
										
										<button type="button" class="btn btn-danger btn-xs waves-effect waves-light" data-toggle="tooltip" title="Delete" onclick="return areYouSure(<?php echo $db_value->id; ?>);"><i class="ico fa fa-trash"></i></button>
									</div>
								</td>
							</tr>
							<?Php } ?>
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
		
		location.href='<?php echo base_url('user/subadmin/delete_subadmin/');?>' + id; 

	}
}
</script>
