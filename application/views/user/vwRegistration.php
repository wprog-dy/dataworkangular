<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>LogisticWala:Create Account</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/backend/styles/style.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/backend/styles/custom.css">
	<!-- Waves Effect -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/backend/plugin/waves/waves.min.css">
</head>
<body>
<div id="single-wrapper">
	 
	<form action="<?php echo base_url(); ?>user/home/registration" class="frm-single" method="POST">

		<div class="inside">
			<?php if ($this->session->flashdata('fail')) {
              echo '<div class="alert alert-dismissible alert-danger fade show" style="margin-left:0px; font-weight: 500">
					<button type="button" class="close" data-dismiss="alert">×</button>
					Oh snap!'.$this->session->flashdata('fail').'</div>';
            } ?>

            <?php if ($this->session->flashdata('success')) {
              echo '<div class="alert alert-dismissible alert-success fade show" style="margin-left:0px; font-weight: 500">
					<button type="button" class="close" data-dismiss="alert">×</button>
					Oh snap!'.$this->session->flashdata('success').'</div>';
            } ?>
			<div class="title"><strong>LogisticWala</strong></div>
			<!-- /.title -->
			<div class="frm-title">Create Account</div>
			<?php
			if(isset($error)){    
			?>
			<div class="alert alert-dismissible alert-danger fade show" style="margin-left:0px; font-weight: 500">
				<button type="button" class="close" data-dismiss="alert">×</button>
				Oh snap! <?=$error?>
			</div>
			<?php } ?>
			<div class="frm-input"><label>Select User Type *</label> &nbsp;<input type="radio" name="user_type" checked="checked" value="customer" >&nbsp;Customer&nbsp;<input type="radio" name="user_type"  value="vendor" >&nbsp;Vendor</div>
			<!-- /.frm-input -->
			<div class="frm-input">
				<label>Customer *</label>
				<select name="industry_type" class="form-control">
					<option value="">Select...</option>	
                    <option value="Load Provider">Load Provider</option>	
                    <option value="Transporter (Vehicle Owner)">Transporter (Vehicle Owner)</option>	
                    <option value="Vehicle Broker">Vehicle Broker</option>
				</select>
			</div>
			<div class="frm-input"><label>Mobile No. *</label> <input type="text" placeholder="Mobile Number" name="phone" class="frm-inp"></div>
			<div class="frm-input"><label>Email *</label> <input type="email" placeholder="Email Address" name="email" class="frm-inp"></div>
			<div class="frm-input"><label>Password *</label> <input type="password" placeholder="Password" name="password" class="frm-inp"></div>

			<button type="submit" class="frm-submit"  name="submit" value="Create Account" >Create Account<i class="fa fa-arrow-circle-right"></i></button>
			<a href="<?= base_url('user'); ?>" class="a-link"><i class="fa fa-key"></i>New to LogisticWala? Login.</a>
			<div class="frm-footer">LogisticWala © 2020.</div>
			<!-- /.footer -->
		</div>
		<!-- .inside -->
	</form>
	<!-- /.frm-single -->
</div>
<!--/#single-wrapper -->
	<script src="<?php echo base_url();?>assets/backend/scripts/jquery.min.js"></script>
	<script src="<?php echo base_url();?>assets/backend/scripts/modernizr.min.js"></script>
	<script src="<?php echo base_url();?>assets/backend/plugin/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>assets/backend/plugin/nprogress/nprogress.js"></script>
	<script src="<?php echo base_url();?>assets/backend/plugin/waves/waves.min.js"></script>
	<script src="<?php echo base_url();?>assets/backend/scripts/main.min.js"></script>
	<script src="<?php echo base_url();?>assets/backend/scripts/mycommon.js"></script>
</body>
</html>