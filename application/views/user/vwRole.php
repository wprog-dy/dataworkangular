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
						<a class="btn btn-sm btn-primary"  href=" <?php echo base_url('user/role/form');?>"><i class="ico fa fa-plus"></i> Add Role</a>
					</div>
					</h4>
					<hr>
					
					<?php $this->load->view('user/vwError'); ?>
					
					<table id="example" class="table table-striped table-bordered display dataTable" style="width: 100%;" role="grid" aria-describedby="example_info">
						<thead>
							<tr role="row">
								<th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">S.No.</th>
								
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">Role</th>
								
								<!--<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Permission</th>-->
								
								<th class="sorting text-center" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Action</th>
							</tr>
						</thead>
						<!--<tfoot>
							<tr><th rowspan="1" colspan="1">Name</th><th rowspan="1" colspan="1">Position</th><th rowspan="1" colspan="1">Office</th><th rowspan="1" colspan="1">Age</th><th rowspan="1" colspan="1">Start date</th><th rowspan="1" colspan="1">Salary</th></tr>
						</tfoot>-->
						<tbody>	
							<?php 
								$i = 0; 
								foreach($dbValue as $db_value){
							?>
							<tr role="row" class="odd">
								<td class="sorting_1"><?php echo ++$i; ?></td>
								<td><?PHP echo ucwords($db_value->role_name); ?></td>
								<!--<td><?PHP /* echo $db_value->permission; */ ?></td>-->
								<td class="text-center">
									<div class="btn-group" role="group" aria-label="Basic example">
										<button type="button" class="btn btn-info btn-xs waves-effect waves-light" data-toggle="tooltip" title="Edit" onclick="location.href='<?php echo base_url('user/role/form/').$db_value->id;?>'"><i class="ico fa fa-edit"></i></button>
										
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
		
		location.href='<?php echo base_url('user/role/delete_role/');?>' + id; 
	}
}
</script>