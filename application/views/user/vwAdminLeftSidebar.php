<div class="main-menu">
	<header class="header">
		<a href="index.html" class="logo">Logisticwala</a>
		<button type="button" class="button-close fa fa-times js__menu_close"></button>
	</header>
	<!-- /.header -->
	<div class="content">
		<?php 
			$current = 'current'; //class to show active menu
			$active = 'active'; //class to show submenu of active menu
		?>
		<div class="navigation">
			<ul class="menu js__accordion">
				<li class="<?php echo $page_title == 'Home' ? $current : ''; ?>">
					<a class="waves-effect" href="<?php echo base_url('user/'); ?>"><i class="menu-icon fa fa-home"></i><span>Home</span></a>
				</li>
				
				<li class="<?php echo $page_title == 'Dashboard' ? $current : ''; ?>">
					<a class="waves-effect" href="<?php echo base_url('user/dashboard'); ?>"><i class="menu-icon mdi mdi-view-dashboard"></i><span>Dashboard</span></a>
				</li>
				
				<li class="<?php echo $page_title == 'Vendor List' || $page_title == 'Add Vendor' || $page_title == 'Edit Vendor' || $page_title == 'Upload Excel(Vendor)' ? $current : ''; ?>">
					<a class="waves-effect" href="<?php echo base_url('user/vendor');?>"><i class="menu-icon fas fa-users"></i><span>Vendors</span></a>
				</li>
				
				<li class="<?php echo $page_title == 'Customer List' || $page_title == 'Add Customer' || $page_title == 'Edit Customer' || $page_title == 'Upload Excel(Customer)' ? $current : ''; ?>">
					<a class="waves-effect" href="<?php echo base_url('user/customer');?>"><i class="menu-icon fa fa-user" aria-hidden="true"></i><span>Customers</span></a>
				</li>
				<li class="<?php echo $page_title == 'Driver List' || $page_title == 'Add Driver' || $page_title == 'Edit Driver' || $page_title == 'Upload Excel(Customer)' ? $current : ''; ?>">
					<a class="waves-effect" href="<?php echo base_url('user/driver');?>"><i class="menu-icon fa fa-user" aria-hidden="true"></i><span>Drivers</span></a>
				</li>
				<li class="<?php echo $page_title == 'Vehicle List' || $page_title == 'Add Vehicle' || $page_title == 'Edit Vehicle' || $page_title == 'Upload Excel(Customer)' ? $current : ''; ?>">
					<a class="waves-effect" href="<?php echo base_url('user/vehicle');?>"><i class="menu-icon fa fa-car" aria-hidden="true"></i><span>Vehicles</span></a>
				</li>
				
				<li class="<?php echo  $page_title == 'Edit Setting'; ?>">
					<a class="waves-effect" href="<?php echo base_url('user/setting');?>"><i class="menu-icon fa fa-cog" aria-hidden="true"></i><span>Setting</span></a>
				</li>
				
				<!--<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fas fa-users"></i><span>Vendors</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="<?php echo base_url('user/vendor');?>">Vendor List</a></li>
						<li><a href="icons-fontello.html">Silver</a></li>
						<li><a href="icons-material-icons.html">Gold</a></li>
						<li><a href="icons-material-design-iconic.html">Diamond</a></li>
						<li><a href="icons-themify-icons.html">Platinum</a></li>
						<li><a href="icons-themify-icons.html">Free/Trial</a></li>
						<li><a href="icons-themify-icons.html">Non Registered</a></li>
					</ul>
				</li>-->
				
				<li class="<?php echo $page_title == 'Trip List' || $page_title == 'Add Trip' || $page_title == 'Edit Trip' ? $current : ''; ?>">
					<a class="waves-effect" href="<?php echo base_url('user/load');?>"><i class="menu-icon fa fa-plus-circle" aria-hidden="true"></i></i><span>Create Trip</span></a>
				</li>

				<li class="<?php echo $page_title == 'Subadmin List' || $page_title == 'Add Subadmin' || $page_title == 'Edit Subadmin' || $page_title == 'Role List' || $page_title == 'Add Role'|| $page_title == 'Edit Role' ? $current.' '.$active : ''; ?>">
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-user-secret"></i><span>Subadmin</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="<?php echo base_url('user/role');?>">Role Management</a></li>
						<li><a href="<?php echo base_url('user/subadmin');?>">Subadmin Management</a></li>
					</ul>
				</li>
				
				<li>
					<a class="waves-effect" href="calendar.html"><i class="menu-icon fa fa-comment" aria-hidden="true"></i><span>Enquiries</span><span class="notice notice-blue">7</span></a>
				</li>
				
				<li>
					<a class="waves-effect" href="calendar.html"><i class="menu-icon mdi mdi-calendar-multiple"></i><span>Distance Report</span></a>
				</li>
				
				<li>
					<a class="waves-effect" href="calendar.html"><i class="menu-icon fa fa-user-plus" aria-hidden="true"></i><span>Subscribers</span></a>
				</li>
				
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fas fa-question"></i><span>FAQ</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="chart-3d.html">Add FAQ</a></li>
						<li><a href="chart-chartist.html">View FAQ</a></li>
					</ul>
				</li>
				
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fas fa-newspaper"></i><span>Newsletter</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="chart-3d.html">Add Newsletter</a></li>
						<li><a href="chart-chartist.html">View Newsletter</a></li>
					</ul>
				</li>
				
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-list-alt" aria-hidden="true"></i><span>Suggestion</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="chart-3d.html">View Suggestion</a></li>
					</ul>
				</li>
			</ul>
			<!-- /.menu js__accordion -->
		</div>
		<!-- /.navigation -->
	</div>
	<!-- /.content -->
</div>
<!-- /.main-menu -->
