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
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Query Name</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Vendor Name</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Website</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Phone</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Company Turnover</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Rate/price</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Reply</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Status</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Action</th>
							</tr>
						</thead>
						<tbody>	
						<?php 
							$i = 0; 
							foreach($dbValue as $db_value)
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
								<td><?= $db_value->origin_city; ?><br><?= $db_value->destination_city; ?><br><?= $db_value->category_name; ?></td>
								<td><?= ucwords($db_value->company_name); ?></td>
								<td><?= $db_value->company_website; ?></td>
								<td><?= $db_value->phone; ?></td>
								<td></td>
								<td><?= $db_value->rate_per_unit; ?></td>
								<td><a href="">Reply</a></td>
								<td><a class="page-link text-center"><?= $db_value->equiry_status; ?></a></td>
								<td><a title="Vendor Reply Details" class="btn btn-sm btn-info" href="<?= base_url('user/enquiries/ordersummarydetails/'.$db_value->enquiry_id.'/'.$db_value->bitid) ?>"><i class="fa fa-eye"></i></a>
									<?php
									if($db_value->equiry_status != 'Accepted')
									{
										?>
									<div class="float-right">
										<a class="btn btn-sm btn-primary" href="<?= base_url('user/enquiries/enquiryvendorstatus/'.$db_value->enquiry_id.'/'.$db_value->reference_id.'/'.$db_value->equiry_status.'/'.$db_value->bitid) ?>">Accept</a>
									</div>
									<?php
								}
								?>
								</td>
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
