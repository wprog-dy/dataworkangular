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
								if($db_value->admin_setting_status == '0')
								{
						?>
							<tr role="row" class="<?=$tr_class?>">
								<td class="sorting_1"><?= $i; ?></td>
								<td>
									<a href="<?= base_url('user/enquiries/enquirydetail/'.$db_value->category_id.'/'.$db_value->enquiryid); ?>"><?= $db_value->category_name; ?></a>
								</td>
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
							</tr>
							<?php
								}
								if($db_value->admin_setting_status == '1')
								{
									$explode_arr = explode(',', $db_value->assign_vendor_ids);
									if(in_array($this->session->userdata('id'),$explode_arr))
									{
						?>
							<tr role="row" class="<?=$tr_class?>">
								<td class="sorting_1"><?= $i; ?></td>
								<td>
									<a href="<?= base_url('user/enquiries/enquirydetail/'.$db_value->category_id.'/'.$db_value->enquiryid); ?>"><?= $db_value->category_name; ?></a>
								</td>
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
							</tr>
							<?php
									}
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
