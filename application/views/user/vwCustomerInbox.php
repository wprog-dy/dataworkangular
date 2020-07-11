<?php
	$this->load->view('user/vwadminheader.php');
?>
<div id="wrapper">
	<div class="main-content">
	<div class="row small-spacing">
			<div class="col-12">
				<div class="box-content">
					<h4 class="box-title"><?php echo $page_title; ?></h4><hr>
					<?php $this->load->view('user/vwError'); ?>
					<table id="example" class="table table-striped table-bordered display dataTable" style="width: 100%;" role="grid" aria-describedby="example_info">
						<thead>
							<tr role="row">
								<th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">S.No.</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Services</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Industry Type</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Product</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Origin City</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Destination City</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">When Required</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Posted Date</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Action</th>
							</tr>
						</thead>
						<tbody>	
						<?php 
						$userid;
							$i = 0; 
							foreach($dbValue as $db_value){
								++$i;
								$tr_class = "odd";
								if($i%2 == 0){
									$tr_class = "even";
								}
								if(($db_value->customerid == $this->session->userdata('id'))&&($this->session->userdata('user_type')=='customer'))
								{
						?>
							<tr role="row" class="<?=$tr_class?>">
								<td class="sorting_1"><?= $i; ?></td>
								<td><?= $db_value->category_name; ?></td>
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
									<a title="Enquiry Detail" class="btn btn-sm btn-info" href="<?= base_url('user/enquiries/enquirydetail/'.$db_value->category_id.'/'.$db_value->enquiryid) ?>"><i class="fa fa-eye"></i></a>
								</td>
							</tr>
							<?php 
								} 
							}
							?>
						</tbody>
					</table>
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-12 -->

<?php
	$this->load->view('user/vwadminfooter.php');
?>
