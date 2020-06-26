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
					
					<form action="<?php echo base_url('user/subadmin/form/').$id;?>" id="role_form" method="POST" enctype="multipart/form-data" autocomplete="off">
						
					<div class="row">
						<input type="hidden" id="user_id" value="<?php echo $id?>"/>
						<div class="form-group col-lg-6">
							<label for="role">Select Role<span class="text-danger">*</span></label>
							<select class="form-control select2_1" id="role" name="role">
								<option value="">--Select Role--</option>
								<?php foreach($roles as $role){ ?>
								<option value="<?php echo $role->id; ?>" <?php echo $role == $role->id ? 'selected' : ''; ?>><?php echo $role->role_name; ?></option>
								<?php } ?>
							</select>
						</div>

						<div class="form-group col-lg-6">
							<label for="name">Name</label>
							<input type="text" class="form-control" id="name" name="name" value="<?php echo set_value('name', $name);?>">
						</div>
						
						<div class="form-group col-lg-6">
							<label for="email">Email<span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="email" name="email" value="<?php echo set_value('email', $email);?>">
						</div>

						<div class="form-group col-lg-6">
							<label for="phone">Phone</label>
							<input type="text" class="form-control" id="phone" name="phone" value="<?php echo set_value('phone', $phone);?>">
						</div>

						<div class="form-group col-lg-6">
							<label for="dob">DOB</label>
							<input type="text" class="form-control" id="dob" name="dob" value="<?php echo set_value('dob', $dob);?>">
						</div>

						<div class="form-group col-lg-6">
							<label for="joining_date">Joining Date</label>
							<input type="text" class="form-control" id="joining_date" name="joining_date" value="<?php echo set_value('joining_date', $joining_date);?>">
						</div>

						<div class="form-group col-lg-6">
							<label for="leaving_date">Leaving Date<span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="leaving_date" name="leaving_date" value="<?php echo set_value('leaving_date', $leaving_date);?>">
						</div>

						<div class="form-group col-lg-6">
							<label for="password">Password<span class="text-danger">*</span></label>
							<input type="text" class="form-control" id="password" name="password" value="<?php echo set_value('password', $password);?>">
						</div>

						<div class="form-group pt-3 col-lg-6">
							<label for="profile_pic">Profile Picture</label><br>
							<input type="file" id="profile_pic" name="profile_pic">
						</div>
						<?php if(!empty($profile_pic)){ ?>
						<div class="form-group pt-3 col-lg-6">
							<label for="previous_pic">Previous Pic</label><br>
							<img src="<?php echo base_url("uploads/subadmin/$profile_pic"); ?>" style="height: 100px; width: 100px;"></img>
						</div>
						<?php } ?>
					</div>
								
					<button type="submit" class="btn btn-primary btn-sm waves-effect waves-light">Save</button>
					</form>
				</div>
			</div>

<?php
	$this->load->view('user/vwadminfooter.php');
?>