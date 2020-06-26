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
							<a class="btn btn-sm btn-primary" href="<?php echo base_url('user/load/form');?>"><i class="ico fa fa-plus"></i> Add Trip</a>
						</div>
					</h4>
					<hr>
					
					<!-- /.box-title -->
					<div class="dropdown js__drop_down">
						<a href="#" class="dropdown-icon glyphicon glyphicon-option-vertical js__drop_down_button"></a>
						<ul class="sub-menu">
							<li><a href="#">Action</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else there</a></li>
							<li class="split"></li>
							<li><a href="#">Separated link</a></li>
						</ul>
						<!-- /.sub-menu -->
					</div>
					<!-- /.dropdown js__dropdown -->
					<table id="example" class="table table-striped table-bordered display dataTable" style="width: 100%;" role="grid" aria-describedby="example_info">
						<thead>
							<tr role="row">
								<th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">S.No.</th>
								
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">Origin City</th>
								
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Destination City</th>
								
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Required Date & Time</th>
								
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Transaction Type</th>
								
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" >Load Type</th>
								
								<th class="sorting text-center" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Action</th>
							</tr>
						</thead>
						<!--<tfoot>
							<tr><th rowspan="1" colspan="1">Name</th><th rowspan="1" colspan="1">Position</th><th rowspan="1" colspan="1">Office</th><th rowspan="1" colspan="1">Age</th><th rowspan="1" colspan="1">Start date</th><th rowspan="1" colspan="1">Salary</th></tr>
						</tfoot>-->
						<tbody>	
							
							<tr role="row" class="odd">
								<td class="sorting_1">1</td>
								<td>Mumbai</td>
								<td>Delhi</td>
								<td>12 Mar 2020 4:50 pm</td>
								<td>One Time</td>
								<td>Biker</td>
								<td class="text-center">
									<div class="btn-group" role="group" aria-label="Basic example">
										<button type="button" class="btn btn-info btn-xs waves-effect waves-light"><i class="ico fa fa-edit"></i> Edit</button>
										
										<button type="button" class="btn btn-danger btn-xs waves-effect waves-light"><i class="ico fa fa-trash"></i> Delete</button>
									</div>
								</td>
							</tr>
							
							<tr role="row" class="even">
								<td class="sorting_1">2</td>
								<td>New York</td>
								<td>San Francisco</td>
								<td>11 Apr 2020 2:50 am</td>
								<td>Repeat</td>
								<td>Express</td>
								<td class="text-center">
									<div class="btn-group" role="group" aria-label="Basic example">
										<button type="button" class="btn btn-info btn-xs waves-effect waves-light"><i class="ico fa fa-edit"></i> Edit</button>
										
										<button type="button" class="btn btn-danger btn-xs waves-effect waves-light"><i class="ico fa fa-trash"></i> Delete</button>
									</div>
								</td>
							</tr>
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
	$(document).ready(function() {
 $('#example').DataTable();
});
</script>
