<div class="main-menu">
	<header class="header">
		<a href="<?= base_url('user'); ?>" class="logo">Logisticwala</a>
		<button type="button" class="button-close fa fa-times js__menu_close"></button>
	</header>
	<!-- /.header -->
	<div class="content mCustomScrollbar _mCS_1">
		<?php 
			$current = 'current'; //class to show active menu
			$active = 'active'; //class to show submenu of active menu
		?>
		<div class="navigation">
			<ul class="menu js__accordion">
				<?php 
				if(($this->session->userdata('user_type') == 'admin')||($this->session->userdata('user_type') == 'vendor')||($this->session->userdata('user_type') == 'customer'))
					{
						?>
					<li class="<?php echo $page_title == 'Home' ? $current : ''; ?>">
						<a class="waves-effect" href="<?php echo base_url('user/'); ?>"><i class="menu-icon fa fa-home"></i><span>Home</span></a>
					</li>
					<?php
					}
				if(($this->session->userdata('user_type') == 'admin')||($this->session->userdata('user_type') == 'vendor')||($this->session->userdata('user_type') == 'customer'))
					{
						?>
				<li class="<?php echo $page_title == 'Dashboard' ? $current : ''; ?>">
					<a class="waves-effect" href="<?php echo base_url('user/dashboard'); ?>"><i class="menu-icon mdi mdi-view-dashboard"></i><span>Dashboard</span></a>
				</li>
				<?php
				}
				if($this->session->userdata('user_type') == 'admin')
					{
				?>
				<li class="<?php echo $page_title == 'Vendor List' || $page_title == 'Add Vendor' || $page_title == 'Edit Vendor' || $page_title == 'Upload Excel(Vendor)' ? $current : ''; ?>">
					<a class="waves-effect" href="<?php echo base_url('user/vendor');?>"><i class="menu-icon fas fa-users"></i><span>Vendors</span></a>
				</li>
				<?php
				}
				if($this->session->userdata('user_type') == 'admin')
					{
				?>
				<li class="<?php echo $page_title == 'Customer List' || $page_title == 'Add Customer' || $page_title == 'Edit Customer' || $page_title == 'Upload Excel(Customer)' ? $current : ''; ?>">
					<a class="waves-effect" href="<?php echo base_url('user/customer');?>"><i class="menu-icon fa fa-user" aria-hidden="true"></i><span>Customers</span></a>
				</li>
				<?php
				}
				if($this->session->userdata('user_type') == 'vendor')
				{
				?>
				<li>
					<a class="waves-effect" href="<?= base_url('user/vendor/vendorinbox') ?>"><i class="menu-icon fa fa-comments"></i><span>Inbox </span><span class="notice notice-blue"  id="countinbox"></span> </a>
				</li>
				<?php
				}
				if($this->session->userdata('user_type') == 'vendor')
				{
				?>
				<li>
					<a class="waves-effect" href="<?= base_url('user/vendor/vendorreplies') ?>"><i class="menu-icon fa fa-reply-all"></i><span>Reply </span><span class="notice notice-blue"  id="replyinbox"></span> </a>
				</li>
				<?php
				}
				if(($this->session->userdata('user_type') == 'admin')||($this->session->userdata('user_type') == 'vendor'))
					{
				?>
				<li class="<?php echo $page_title == 'Driver List' || $page_title == 'Add Driver' || $page_title == 'Edit Driver' || $page_title == 'Upload Excel(Customer)' ? $current : ''; ?>">
					<a class="waves-effect" href="<?php echo base_url('user/driver');?>"><i class="menu-icon fa fa-user" aria-hidden="true"></i><span>Drivers</span></a>
				</li>
				<?php
				}
				if(($this->session->userdata('user_type') == 'admin')||($this->session->userdata('user_type') == 'vendor'))
					{
				?>
				<li class="<?php echo $page_title == 'Vehicle List' || $page_title == 'Add Vehicle' || $page_title == 'Edit Vehicle' || $page_title == 'Upload Excel(Customer)' ? $current : ''; ?>">
					<a class="waves-effect" href="<?php echo base_url('user/vehicle');?>"><i class="menu-icon fa fa-car" aria-hidden="true"></i><span>Vehicles</span></a>
				</li>
				<?php
				}
				if($this->session->userdata('user_type') == 'admin')
					{
				?>
				<li class="<?php echo  $page_title == 'Edit Setting'; ?>">
					<a class="waves-effect" href="<?php echo base_url('user/setting');?>"><i class="menu-icon fa fa-cog" aria-hidden="true"></i><span>Setting</span></a>
				</li>
				<?php
				}
				if($this->session->userdata('user_type') == 'admin')
					{
				?>
				
				
				<li class="<?php echo $page_title == 'Trip List' || $page_title == 'Add Trip' || $page_title == 'Edit Trip' ? $current : ''; ?>">
					<a class="waves-effect" href="<?php echo base_url('user/load');?>"><i class="menu-icon fa fa-plus-circle" aria-hidden="true"></i></i><span>Create Trip</span></a>
				</li>
				<?php
				}
				if($this->session->userdata('user_type') == 'admin')
					{
				?>
				<li class="<?php echo $page_title == 'Subadmin List' || $page_title == 'Add Subadmin' || $page_title == 'Edit Subadmin' || $page_title == 'Role List' || $page_title == 'Add Role'|| $page_title == 'Edit Role' ? $current.' '.$active : ''; ?>">
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-user-secret"></i><span>Subadmin</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="<?php echo base_url('user/role');?>">Role Management</a></li>
						<li><a href="<?php echo base_url('user/subadmin');?>">Subadmin Management</a></li>
					</ul>
				</li>
				<?php
				}
				if($this->session->userdata('user_type') == 'admin')
					{
				?>
				<li>
					<a class="waves-effect" href="calendar.html"><i class="menu-icon fa fa-comment" aria-hidden="true"></i><span>Enquiries</span><span class="notice notice-blue">7</span></a>
				</li>
				<?php
				}
				if($this->session->userdata('user_type') == 'admin')
					{
				?>
				<li>
					<a class="waves-effect" href="calendar.html"><i class="menu-icon mdi mdi-calendar-multiple"></i><span>Distance Report</span></a>
				</li>
				<?php
				}
				if($this->session->userdata('user_type') == 'admin')
					{
				?>
				<li>
					<a class="waves-effect" href="calendar.html"><i class="menu-icon fa fa-user-plus" aria-hidden="true"></i><span>Subscribers</span></a>
				</li>
				<?php
				}
				if($this->session->userdata('user_type') == 'admin')
					{
				?>
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fas fa-question"></i><span>FAQ</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="chart-3d.html">Add FAQ</a></li>
						<li><a href="chart-chartist.html">View FAQ</a></li>
					</ul>
				</li>
				<?php
				}
				if($this->session->userdata('user_type') == 'admin')
					{
				?>
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fas fa-newspaper"></i><span>Newsletter</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="chart-3d.html">Add Newsletter</a></li>
						<li><a href="chart-chartist.html">View Newsletter</a></li>
					</ul>
				</li>
				<?php
				}
				if($this->session->userdata('user_type') == 'admin')
					{
				?>
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-list-alt" aria-hidden="true"></i><span>Suggestion</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="chart-3d.html">View Suggestion</a></li>
					</ul>
				</li>
				<?php
				}
				if($this->session->userdata('user_type') == 'customer')
				{
				?>
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-plus-circle"></i><span>My Trips</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li><a href="#">All trips</a></li>
						<li><a href="#">Running trips</a></li>
						<li><a href="#">On time trips</a></li>
						<li><a href="#">Delayed trips</a></li>
					</ul>
				</li>
				<?php
				}
				if($this->session->userdata('user_type') == 'customer')
				{
				?>
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-plus-circle"></i><span>Other Partner trips</span></a>
				</li>
				<?php
				}
				if($this->session->userdata('user_type') == 'customer')
				{
				?>
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-plus-circle"></i><span>Post Load/Enquiries</span><span class="menu-arrow fa fa-angle-down"></span></a>
					<ul class="sub-menu js__content">
						<li class="nav-item">
		                    <a class="nav-link collapsed text-truncate" href="#submenu1" data-toggle="collapse" data-target="#submenu1"><span class="d-none d-sm-inline">Road </span><span class="menu-arrow fa fa-angle-down"></span></a>
		                    <div class="collapse" id="submenu1" aria-expanded="false">
		                        <ul class="flex-column pl-2 nav">
		                        	<li class="nav-item js__content"><a href="<?= base_url('user/enquiries2/form/28') ?>">Dedicated</a></li>
		                            <li class="nav-item js__content">
		                                <a class="nav-link collapsed py-1" href="#submenu1sub1" data-toggle="collapse" data-target="#submenu1sub1"><span>Adhoc </span><span class="menu-arrow fa fa-angle-down"></a>
		                                <div class="collapse" id="submenu1sub1" aria-expanded="false">
		                                    <ul class="flex-column nav pl-4">
		                                        <li class="nav-item">
		                                            <a  href="<?= base_url('user/enquiries2/form/26') ?>"> FTL </a>
		                                        </li>
		                                        <li class="nav-item">
		                                            <a  href="<?= base_url('user/enquiries2/form/27') ?>">PTL </a>
		                                        </li>
		                                    </ul>
		                                </div>
		                            </li>
		                        </ul>
		                    </div>
		                </li>
		                <li class="nav-item">
		                    <a class="nav-link collapsed text-truncate" href="#submenu1" data-toggle="collapse" data-target="#submenu2"><span class="d-none d-sm-inline">Other Business Load/Enquiries </span><span class="menu-arrow fa fa-angle-down"></span></a>
		                    <div class="collapse" id="submenu2" aria-expanded="false">
		                        <ul class="flex-column pl-2 nav">
		                            <li class="nav-item js__content">
		                                <a class="nav-link collapsed text-truncate" href="#submenu2sub2" data-toggle="collapse" data-target="#submenu2sub2"><span>Transportation </span><span class="menu-arrow fa fa-angle-down"></a>
		                                <div class="collapse" id="submenu2sub2" aria-expanded="false">
		                                    <ul class="flex-column nav pl-4">
		                                        <li class="nav-item">
		                                            <a  href="<?= base_url('user/enquiries/form/2') ?>">Train</a>
		                                        </li>
		                                        <li class="nav-item">
		                                            <a  href="<?= base_url('user/enquiries/form/3') ?>">Air</a>
		                                        </li>
		                                    </ul>
		                                </div>
		                            </li>
		                            <li class="nav-item js__content">
		                                <a class="nav-link collapsed text-truncate" href="#submenu4sub4" data-toggle="collapse" data-target="#submenu4sub4"><span>Warehousing </span><span class="menu-arrow fa fa-angle-down"></a>
		                                <div class="collapse" id="submenu4sub4" aria-expanded="false">
		                                    <ul class="flex-column nav pl-4">
		                                        <li class="nav-item">
		                                            <a  href="<?= base_url('user/enquiries/form/5') ?>">3PL/4PL</a>
		                                        </li>
		                                        <li class="nav-item">
		                                            <a class="nav-link collapsed text-truncate" href="#submenu6sub6" data-toggle="collapse" data-target="#submenu6sub6"><span>Purchase </span><span class="menu-arrow fa fa-angle-down"></a>
					                                <div class="collapse" id="submenu6sub6" aria-expanded="false">
					                                    <ul class="flex-column nav pl-4">
					                                        <li class="nav-item">
					                                            <a  href="<?= base_url('user/enquiries/form/8') ?>">Buyer</a>
					                                        </li>
					                                        <li class="nav-item">
					                                            <a  href="<?= base_url('user/enquiries/form/9') ?>">Seller</a>
					                                        </li>
					                                    </ul>
					                                </div>
		                                        </li>
		                                        <li class="nav-item">
		                                            <a class="nav-link collapsed text-truncate" href="#submenu9sub9" data-toggle="collapse" data-target="#submenu9sub9"><span>Rental </span><span class="menu-arrow fa fa-angle-down"></a>
					                                <div class="collapse" id="submenu9sub9" aria-expanded="false">
					                                    <ul class="flex-column nav pl-4">
					                                        <li class="nav-item">
					                                            <a  href="<?= base_url('user/enquiries/form/10') ?>">Available</a>
					                                        </li>
					                                        <li class="nav-item">
					                                            <a  href="<?= base_url('user/enquiries/form/11') ?>">Required</a>
					                                        </li>
					                                    </ul>
					                                </div>
		                                        </li>
		                                    </ul>
		                                </div>
		                            </li>
		                            <li class="nav-item js__content">
		                                <a class="nav-link collapsed text-truncate" href="#submenu12sub12" data-toggle="collapse" data-target="#submenu12sub12"><span>Global Logistics </span><span class="menu-arrow fa fa-angle-down"></a>
		                                <div class="collapse" id="submenu12sub12" aria-expanded="false">
		                                    <ul class="flex-column nav pl-4">
		                                        <li class="nav-item">
		                                            <a  href="<?= base_url('user/enquiries/form/13') ?>">Air Cargo</a>
		                                        </li>
		                                        <li class="nav-item">
		                                            <a  href="<?= base_url('user/enquiries/form/14') ?>">Sea Shipping</a>
		                                        </li>
		                                        <li class="nav-item">
		                                            <a  href="<?= base_url('user/enquiries/form/15') ?>">International Courier</a>
		                                        </li>
		                                    </ul>
		                                </div>
		                            </li>
		                            <li class="nav-item js__content">
		                                <a class="nav-link collapsed text-truncate" href="#submenu16sub16" data-toggle="collapse" data-target="#submenu16sub16"><span> Elite Services </span><span class="menu-arrow fa fa-angle-down"></a>
		                                <div class="collapse" id="submenu16sub16" aria-expanded="false">
		                                    <ul class="flex-column nav pl-4">
		                                        <li class="nav-item">
		                                            <a  href="<?= base_url('user/enquiries/form/17') ?>">Movers & Packers</a>
		                                        </li>
		                                        <li class="nav-item">
		                                            <a  href="<?= base_url('user/enquiries/form/18') ?>">Critical Management Services</a>
		                                        </li>
		                                        <li class="nav-item">
		                                            <a  href="<?= base_url('user/enquiries/form/19') ?>">Project Management Services</a>
		                                        </li>
		                                        <li class="nav-item">
		                                            <a  href="<?= base_url('user/enquiries2/form/20') ?>">People Transport Solution</a>
		                                        </li>
		                                    </ul>
		                                </div>
		                            </li>
		                            <li class="nav-item js__content">
		                                <a class="nav-link collapsed text-truncate" href="#submenu21sub21" data-toggle="collapse" data-target="#submenu21sub21"><span>Freight Trading</span><span class="menu-arrow fa fa-angle-down"></a>
		                                <div class="collapse" id="submenu21sub21" aria-expanded="false">
		                                    <ul class="flex-column nav pl-4">
		                                        <li class="nav-item">
		                                            <a  href="<?= base_url('user/enquiries/form/22') ?>">Trucker</a>
		                                        </li>
		                                        <li class="nav-item">
		                                            <a  href="<?= base_url('user/enquiries/form/23') ?>">Forwarder</a>
		                                        </li>
		                                        <li class="nav-item">
		                                            <a  href="<?= base_url('user/enquiries/form/24') ?>">CHA</a>
		                                        </li>
		                                    </ul>
		                                </div>
		                            </li>
		                        </ul>
		                    </div>
		                </li>
					</ul>
				</li>
				<?php
				}
				if($this->session->userdata('user_type') == 'customer')
				{
				?>
				<li>
					<a class="waves-effect" href="<?= base_url('user/enquiries/customerinbox') ?>"><i class="menu-icon fa fa-comments"></i><span>Inbox </span></a>
				</li>
				<?php
				}
				if($this->session->userdata('user_type') == 'customer')
				{
				?>
				<li>
					<a class="waves-effect" href="<?= base_url('user/enquiries/vendorreplay') ?>"><i class="menu-icon fa fa-reply-all"></i><span>Vendor Reply </span><span  class="notice notice-blue"  id="vendorreplaycount"></span> </a>
				</li>
				<?php
				}
				if($this->session->userdata('user_type') == 'customer')
				{
				?>
				<li>
					<a class="waves-effect" href="<?= base_url('user/enquiries/ordersummary') ?>"><i class="menu-icon fa fa-reply-all"></i><span>Order Summary </span><span class="notice notice-blue" id="ordersummarycount"></span> </a>
				</li>
				<?php
				}
				if($this->session->userdata('user_type') == 'customer')
				{
				?>
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-gavel"></i><span>Compliance & Regularities</span></a>
				</li>
				<?php
				}
				if(($this->session->userdata('user_type') == 'customer')||($this->session->userdata('user_type') == 'vendor'))
				{
				?>
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-history"></i><span>Transaction History</span></a>
				</li>
				<?php
				}
				if(($this->session->userdata('user_type') == 'customer')||($this->session->userdata('user_type') == 'vendor'))
				{
				?>
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-comments"></i><span>KYC Documents</span></a>
				</li>
				<?php
				}
				if($this->session->userdata('user_type') == 'customer')
				{
				?>
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-percent"></i><span>Top Ten Rates/Lanes</span></a>
				</li>
				<?php
				}
				if($this->session->userdata('user_type') == 'vendor')
				{
				?>
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-percent"></i><span>Contact Us</span></a>
				</li>
				<?php
				}
				
				if($this->session->userdata('user_type') == 'vendor')
				{
				?>
				<li>
					<a class="waves-effect" href="#"><i class="menu-icon fa fa-percent"></i><span>Accept Load/ Enquiries</span></a>
				</li>
				<?php
				}
				if($this->session->userdata('user_type') == 'vendor')
				{
				?>
				<li>
					<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-percent"></i><span>Frieght Traiding</span></a>
				</li>
				<?php
				}
				
				
				
				?>

			</ul>
			<!-- /.menu js__accordion -->
		</div>
		<!-- /.navigation -->
	</div>
	<!-- /.content -->
</div>
<!-- /.main-menu -->