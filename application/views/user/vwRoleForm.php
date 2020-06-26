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
	
	<!--<nav class="nav_breadcrumb mb-3" aria-label="breadcrumb">
		<ol class="breadcrumb secondary-color">
		  <li class="breadcrumb-item"><a class="white-text" href="#">Home</a></li>
		  <li class="breadcrumb-item"><a class="white-text" href="#">Library</a></li>
		  <li class="breadcrumb-item active">Data</li>
		</ol>
	</nav>-->
		<!-- .row -->
		<div class="row small-spacing ">
			
			<div class="col-lg-12">
				<div class="box-content">
					<h4 class="box-title"><?php echo $page_title; ?>

					<hr>
					</h4>
					<?php $this->load->view('user/vwError'); ?>
					<!-- /.box-title -->
					<form method="POST" id="role_form" action="<?PHP echo base_url("user/role/form/$id"); ?>">
					<div class="row">
						
						<div class="form-group col-lg-6">
							<label for="role_name">Role <span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="role_name" name="role_name" value="<?PHP echo set_value('role_name', $role_name);?>">
						</div>
						<?PHP 
							/* echo '<pre>'; print_r($permission); echo '</pre>'; 
						
							foreach($permission as $p){
								echo $p->view;
							} */
						?>
						<div class="form-group col-offset-lg-6 col-lg-12">
							
							<table id="" class="table table-striped table-bordered display dataTable text-center" style="width: 100%;" role="grid" aria-describedby="example_info">
								<thead>
									<tr role="row">
										
										<th class="sorting text-left" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Permission</th>
										
										<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">View</th>
										
										<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending">Create</th>
										
										<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Edit</th>
										
										<th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Delete</th>
										
									</tr>
								</thead>
								<!--<tfoot>
									<tr><th rowspan="1" colspan="1">Name</th><th rowspan="1" colspan="1">Position</th><th rowspan="1" colspan="1">Office</th><th rowspan="1" colspan="1">Age</th><th rowspan="1" colspan="1">Start date</th><th rowspan="1" colspan="1">Salary</th></tr>
								</tfoot>-->
								
								<tbody>
								<?php 
									$i = 0;
									foreach($menus as $menu){
										++$i;
										$tr_class = "odd";
										if($i%2 == 0){
											$tr_class = "even";
										}
										
										$menuId = $menu->id;
								?>
									<tr role="row" >
										
										<td class="sorting_1 text-left"><?php echo $menu->menu_name; ?></td>
										
										<td class="">
											<div class="checkbox primary">
												<?php 
													$checked = false;
													
													if(!empty($permission) && $permission->$menuId->view == '1'){
														$checked = true;
													} 
												?>
												
												<input type="hidden" name="<?php echo 'permission['.$menu->id.'][view]';?>" value="0">
												
												<input type="checkbox" id="view<?php echo $i; ?>" name="<?php echo 'permission['.$menu->id.'][view]';?>" value="1" <?php echo set_checkbox('permission['.$menu->id.'][view]', '1', $checked); ?> >
												<label for="view<?php echo $i; ?>"></label>
											</div>
										</td>
										
										<td>
											<div class="checkbox primary">
												<?php 
													$checked = false;
													if(!empty($permission) && $permission->$menuId->create == '1'){
														$checked = true;
													} 
												?>
												
												<input type="hidden" name="<?php echo 'permission['.$menu->id.'][create]';?>" value="0">
												
												<input type="checkbox" id="create<?php echo $i; ?>" name="<?php echo 'permission['.$menu->id.'][create]';?>" value="1" <?php echo set_checkbox('permission['.$menu->id.'][create]', '1', $checked); ?>>
												<label for="create<?php echo $i; ?>"></label>
											</div>
										</td>
										
										<td>
											<div class="checkbox primary">
												<?php 
													$checked = false;
													if(!empty($permission) && $permission->$menuId->edit == '1'){
														$checked = true;
													} 
												?>
												
												<input type="hidden" name="<?php echo 'permission['.$menu->id.'][edit]';?>" value="0" />
												
												<input type="checkbox" id="edit<?php echo $i; ?>" name="<?php echo 'permission['.$menu->id.'][edit]';?>" value="1" <?php echo set_checkbox('permission['.$menu->id.'][edit]', '1', $checked); ?>>
												<label for="edit<?php echo $i; ?>"></label>
											</div>
										</td>
										
										<td>
											<div class="checkbox primary">
												<?php 
													$checked = false;
													if(!empty($permission) && $permission->$menuId->delete == '1'){
														$checked = true;
													} 
												?>
												<input type="hidden" name="<?php echo 'permission['.$menu->id.'][delete]';?>" value="0">
												
												<input type="checkbox" id="delete<?php echo $i; ?>" name="<?php echo 'permission['.$menu->id.'][delete]';?>" value="1" <?php echo set_checkbox('permission['.$menu->id.'][delete]', '1', $checked); ?>>
												<label for="delete<?php echo $i; ?>"></label>
											</div>
										</td>
										
									</tr>
								<?php } ?>
								</tbody>
							</table>
						</div>
						
					</div>
					
					<button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">Save</button>
					
					</form>
			
				</div>
			</div>

<?php
	$this->load->view('user/vwadminfooter.php');
?>