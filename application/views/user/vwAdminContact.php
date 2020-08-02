<?php
	$this->load->view('user/vwadminheader.php');
?>
<style>
	hr{
		margin-left: -20px;
    	margin-right: -20px;
	}
</style>
<div id="wrapper">
	<div class="main-content">
	<div class="row small-spacing">
			<div class="col-12">
				<div class="box-content">
					<h4 class="box-title"><?php echo $page_title; ?></h4>
					<hr>
					<table id="example" class="table table-striped table-bordered display dataTable" style="width: 100%;" role="grid" aria-describedby="example_info">
						<thead>
							<tr role="row">
								<th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">S.No.</th>
								<th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending"><?=ucfirst($user_type)?>  Name</th>
								
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Subject</th>
								
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Message</th>
								
								<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Attachment</th>
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
								<td class="sorting_1"><?php echo $i; ?></td>
								<td><?php echo ucwords($db_value->first_name.' '.$db_value->last_name); ?></td>
								<td><?php echo $db_value->subject; ?></td>
								<td><?php echo $db_value->message; ?></td>
								<td><img style="height: 104px;width: 20%;" src="<?=base_url('uploads/contact/'.$db_value->attachment)?>"></td>
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
		
		location.href='<?php echo base_url('user/common/delete_user/');?>' + id + '/customer'; 

	}
}
</script>
