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
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Type of RFQ</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Reference Id</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Posted Date</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Status</th>
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Action</th>
							</tr>
						</thead>
						<tbody>	
						<?php 
							$i = 0; 
							foreach($vendorreplay as $db_value)
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
								<td><?= $db_value->category_name; ?></td>
								<td><?= $db_value->reference_id; ?></td>
								<td><?= $db_value->replaied_date; ?></td>
								<td><a class="page-link text-center"><?= $db_value->equiry_status; ?></a></td>
								<td><a title="Order Detail" class="btn btn-sm btn-info" href="<?= base_url('user/enquiries/orderSummarylist/'.$db_value->enquiry_id); ?>"><i class="fa fa-eye"></i></a></td>
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
