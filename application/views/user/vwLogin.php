<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>LogisticWala:Login</title>
	<link rel="stylesheet" href="<?php echo base_url();?>assets/backend/styles/style.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>assets/backend/styles/custom.css">
	<!-- Waves Effect -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/backend/plugin/waves/waves.min.css">
</head>
<body>
<div id="single-wrapper">
	<?php
	if($user_type == 'admin')
	{
		?>
	<form action="<?php echo base_url(); ?>user/home/do_admin_login" class="frm-single" method="POST">
		<?php
	}
	else
	{
		?>
	<form action="<?php echo base_url(); ?>user/home/do_login" class="frm-single" method="POST">
		<?php
	}
	?>
		<div class="inside">
			<div class="title"><strong>LogisticWala</strong></div>
			<!-- /.title -->
			<div class="frm-title">Login</div>
			<!-- /.frm-title -->
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
		
				<input type="hidden" name="user_type" value="<?= $user_type; ?>" >
					<div class="frm-input"><input type="text" placeholder="Email" name="email" class="frm-inp"><i class="fa fa-user frm-ico"></i></div>
			<!-- /.frm-input -->
			<div class="frm-input"><input type="password" placeholder="Password" name="password" class="frm-inp"><i class="fa fa-lock frm-ico"></i></div>
			<button type="submit" class="frm-submit">Login<i class="fa fa-arrow-circle-right"></i></button>
			<?php if ($user_type !='admin') 
			{
				?>
				<a href="<?= base_url('user/home/registration'); ?>" class="a-link"><i class="fa fa-key"></i>New to LogisticWala? Register.</a>
				<?php
			}
			?>
			
			<div class="frm-footer">LogisticWala © 2020.</div>
			<!-- /.footer -->
		</div>
		<!-- .inside -->
	</form>
	<!-- /.frm-single -->
</div><!--/#single-wrapper -->
	<script src="<?php echo base_url();?>assets/backend/scripts/jquery.min.js"></script>
	<script src="<?php echo base_url();?>assets/backend/scripts/modernizr.min.js"></script>
	<script src="<?php echo base_url();?>assets/backend/plugin/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url();?>assets/backend/plugin/nprogress/nprogress.js"></script>
	<script src="<?php echo base_url();?>assets/backend/plugin/waves/waves.min.js"></script>                 
	<script src="<?php echo base_url();?>assets/backend/scripts/main.min.js"></script>
	<script src="<?php echo base_url();?>assets/backend/scripts/mycommon.js"></script>
</body>
</html>