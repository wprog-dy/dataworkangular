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
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Customer Name</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Origin City</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Destination City</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">When Required</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Transaction</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Type of Load</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Refrence Id</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Replied Date</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Status</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Action</th>
							</tr>
						</thead>
						<tbody>	
						<?php 
							$i = 0; 
							foreach($vendorreplies as $db_value)
							{
								++$i;
								$tr_class = "odd";
								if($i%2 == 0)
								{
									$tr_class = "even";
								}
						?>
							<tr role="row" class="<?=$tr_class?>">
								
								<td class="sorting_1"><?= $i; ?></td>
								<td><?= ucwords($db_value->first_name.' '.$db_value->last_name); ?></td>
								<td><?= ucwords($db_value->origin_city); ?></td>
								<td><?= $db_value->destination_city; ?></td>
								<td><?= $db_value->when_required_date; ?></td>
								<td><?= $db_value->type_of_transaction; ?></td>
								<td><?= $db_value->type_of_load; ?></td>
								<td><?= $db_value->reference_id; ?></td>
								<td><?= $db_value->replaied_date; ?></td>
								<td><a class="page-link"><?= $db_value->equiry_status; ?></a></td>
								<td><a class="btn btn-info btn-xs waves-effect waves-light"  href="<?= base_url('user/enquiries/vendorreplydetails/'.$db_value->enquiry_id.'/'.$db_value->bitid); ?>"><i class="fa fa-eye"></i></a></td>
								</a>
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
