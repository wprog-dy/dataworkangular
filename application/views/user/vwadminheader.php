<!DOCTYPE html>
<html lang="en" class="js menu-active">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>User - Logisticwala</title>

	<!-- Main Styles -->
	<link rel="stylesheet" href="<?php echo HTTP_CSS_PATH_ADMIN; ?>style.min.css">
	<link rel="stylesheet" href="<?php echo HTTP_CSS_PATH_ADMIN; ?>custom.css">
	<link rel="stylesheet" href="<?php echo HTTP_CSS_PATH_ADMIN; ?>custom_back.css">
	
	<!-- Material Design Icon -->
	<link rel="stylesheet" href="<?php echo HTTP_FONT_PATH_ADMIN; ?>material-design/css/materialdesignicons.css">

	<!-- mCustomScrollbar -->
	<link rel="stylesheet" href="<?php echo HTTP_PLUGINS_PATH_ADMIN; ?>mCustomScrollbar/jquery.mCustomScrollbar.min.css">

	<!-- Waves Effect -->
	<link rel="stylesheet" href="<?php echo HTTP_PLUGINS_PATH_ADMIN; ?>waves/waves.min.css">

	<!-- Sweet Alert -->
	<link rel="stylesheet" href="<?php echo HTTP_PLUGINS_PATH_ADMIN; ?>sweet-alert/sweetalert.css">
	
	<!-- Percent Circle -->
	<link rel="stylesheet" href="<?php echo HTTP_PLUGINS_PATH_ADMIN; ?>percircle/css/percircle.css">

	<!-- Chartist Chart -->
	<link rel="stylesheet" href="<?php echo HTTP_PLUGINS_PATH_ADMIN; ?>chart/chartist/chartist.min.css">

	<!-- FullCalendar -->
	<link rel="stylesheet" href="<?php echo HTTP_PLUGINS_PATH_ADMIN; ?>fullcalendar/fullcalendar.min.css">
	<link rel="stylesheet" href="<?php echo HTTP_PLUGINS_PATH_ADMIN; ?>fullcalendar/fullcalendar.print.css" media='print'>

	<!-- Color Picker -->
	<link rel="stylesheet" href="<?php echo HTTP_PLUGINS_PATH_ADMIN; ?>color-switcher/color-switcher.min.css">

	<link rel="stylesheet" href="<?php echo HTTP_PLUGINS_PATH_ADMIN; ?>datatables/media/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?php echo HTTP_PLUGINS_PATH_ADMIN; ?>datatables/extensions/Responsive/css/responsive.bootstrap.min.css">
	
</head>

<body>
<?php $this->load->view('user/vwAdminLeftSidebar.php');?>

<div class="fixed-navbar">
	<div class="float-left">
		<button type="button" class="menu-mobile-button fas fa-bars js__menu_mobile"></button>
		<h1 class="page-title"><?php echo $page_title; ?></h1>
		<!-- /.page-title -->
	</div>
	<!-- /.float-left -->
	<div class="float-right">
		
		<div class="ico-item">
			<img src="<?php echo HTTP_IMAGES_PATH_ADMIN; ?>avatar-sm-1.jpg" alt="" class="ico-img">
			<ul class="sub-ico-item">
				<li><a href="<?= base_url('user/'.$this->session->userdata('user_type').'/form/'.$this->session->userdata('id')); ?>">Settings</a></li>
				<li><a href="#">Blog</a></li>
				<li><a class="js__logout" href="<?php echo base_url('user/home/logout');?>">Log Out</a></li>
			</ul>
			<!-- /.sub-ico-item -->
		</div>
		<!-- /.ico-item -->
	</div>
	<!-- /.float-right -->
</div>

<!-- /.fixed-navbar -->

<!--<div id="notification-popup" class="notice-popup js__toggle" data-space="50">
	<h2 class="popup-title">Your Notifications</h2>
	
	<div class="content">
		<ul class="notice-list">
			<li>
				<a href="#">
					<span class="avatar"><img src="<?php echo HTTP_IMAGES_PATH_ADMIN; ?>avatar-sm-1.jpg" alt=""></span>
					<span class="name">John Doe</span>
					<span class="desc">Like your post: “Contact Form 7 Multi-Step”</span>
					<span class="time">10 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="<?php echo HTTP_IMAGES_PATH_ADMIN; ?>avatar-sm-2.jpg" alt=""></span>
					<span class="name">Anna William</span>
					<span class="desc">Like your post: “Facebook Messenger”</span>
					<span class="time">15 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar bg-warning"><i class="fa fa-warning"></i></span>
					<span class="name">Update Status</span>
					<span class="desc">Failed to get available update data. To ensure the please contact us.</span>
					<span class="time">30 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="<?php echo HTTP_IMAGES_PATH_ADMIN; ?>avatar-1.jpg" alt=""></span>
					<span class="name">Jennifer</span>
					<span class="desc">Like your post: “Contact Form 7 Multi-Step”</span>
					<span class="time">45 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="<?php echo HTTP_IMAGES_PATH_ADMIN; ?>avatar-sm-6.jpg" alt=""></span>
					<span class="name">Michael Zenaty</span>
					<span class="desc">Like your post: “Contact Form 7 Multi-Step”</span>
					<span class="time">50 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="<?php echo HTTP_IMAGES_PATH_ADMIN; ?>avatar-sm-4.jpg" alt=""></span>
					<span class="name">Simon</span>
					<span class="desc">Like your post: “Facebook Messenger”</span>
					<span class="time">1 hour</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar bg-violet"><i class="fa fa-flag"></i></span>
					<span class="name">Account Contact Change</span>
					<span class="desc">A contact detail associated with your account has been changed.</span>
					<span class="time">2 hours</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="<?php echo HTTP_IMAGES_PATH_ADMIN; ?>avatar-sm-7.jpg" alt=""></span>
					<span class="name">Helen 987</span>
					<span class="desc">Like your post: “Facebook Messenger”</span>
					<span class="time">Yesterday</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="<?php echo HTTP_IMAGES_PATH_ADMIN; ?>avatar-2.jpg" alt=""></span>
					<span class="name">Denise Jenny</span>
					<span class="desc">Like your post: “Contact Form 7 Multi-Step”</span>
					<span class="time">Oct, 28</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="<?php echo HTTP_IMAGES_PATH_ADMIN; ?>avatar-sm-8.jpg" alt=""></span>
					<span class="name">Thomas William</span>
					<span class="desc">Like your post: “Facebook Messenger”</span>
					<span class="time">Oct, 27</span>
				</a>
			</li>
		</ul>
		
		<a href="#" class="notice-read-more">See more messages <i class="fa fa-angle-down"></i></a>
	</div>
	
</div>-->

<!-- /#notification-popup -->

<!--<div id="message-popup" class="notice-popup js__toggle" data-space="50">
	<h2 class="popup-title">Recent Messages<a href="#" class="float-right text-danger">New message</a></h2>
	
	<div class="content">
		<ul class="notice-list">
			<li>
				<a href="#">
					<span class="avatar"><img src="<?php echo HTTP_IMAGES_PATH_ADMIN; ?>avatar-sm-1.jpg" alt=""></span>
					<span class="name">John Doe</span>
					<span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere repellat voluptates.</span>
					<span class="time">10 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="<?php echo HTTP_IMAGES_PATH_ADMIN; ?>avatar-sm-3.jpg" alt=""></span>
					<span class="name">Harry Halen</span>
					<span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere repellat voluptates.</span>
					<span class="time">15 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="<?php echo HTTP_IMAGES_PATH_ADMIN; ?>avatar-sm-4.jpg" alt=""></span>
					<span class="name">Thomas Taylor</span>
					<span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere repellat voluptates.</span>
					<span class="time">30 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="<?php echo HTTP_IMAGES_PATH_ADMIN; ?>avatar-1.jpg" alt=""></span>
					<span class="name">Jennifer</span>
					<span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere repellat voluptates.</span>
					<span class="time">45 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="<?php echo HTTP_IMAGES_PATH_ADMIN; ?>avatar-sm-5.jpg" alt=""></span>
					<span class="name">Helen Candy</span>
					<span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere repellat voluptates.</span>
					<span class="time">45 min</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="<?php echo HTTP_IMAGES_PATH_ADMIN; ?>avatar-2.jpg" alt=""></span>
					<span class="name">Anna Cavan</span>
					<span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere repellat voluptates.</span>
					<span class="time">1 hour ago</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar bg-success"><i class="fa fa-user"></i></span>
					<span class="name">Jenny Betty</span>
					<span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere repellat voluptates.</span>
					<span class="time">1 day ago</span>
				</a>
			</li>
			<li>
				<a href="#">
					<span class="avatar"><img src="<?php echo HTTP_IMAGES_PATH_ADMIN; ?>avatar-5.jpg" alt=""></span>
					<span class="name">Denise Peterson</span>
					<span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere repellat voluptates.</span>
					<span class="time">1 year ago</span>
				</a>
			</li>
		</ul>
		
		<a href="#" class="notice-read-more">See more messages <i class="fa fa-angle-down"></i></a>
	</div>
	
</div>-->
<!-- /#message-popup -->