<?php
	$this->load->view('user/vwadminheader.php');
?>
<style>
@media(min-width:1200px) {
    .less_space {
        flex: 0 0 30%;
    }
	.extra_space {
        flex: 0 0 70%;
		max-width: 70% !important;
    }
}

.custom_scroll::-webkit-scrollbar {
  width: 4px;
  touch-action: pinch-zoom;
}
 
.custom_scroll::-webkit-scrollbar-track {
  background: #f1f1f1;
}
 
.custom_scroll::-webkit-scrollbar-thumb {
    position: absolute;
    height: auto;
    left: auto;
    top: 0;
    right: 0;
    bottom: 0;
    opacity: .75;
	background:#bbb;
	border-radius: 5px; 
}

.box-content{
	margin-bottom: 5px;
	border: 1px solid navy;
	border-radius: 0;
}

.top-project-section{
	height: 170px !important;
}

.prj-item .top-project-section{
	padding-top: 20px;
}

.prj-item .top-project-section h3{
	margin-top: 10px;
}

.prj-item .bottom-project-section{
	padding-top: 10px;
	padding-bottom: 10px;
}
</style>
<div id="wrapper">
	<div class="main-content">
		
		<!-- .row -->
		<div class="row small-spacing ">
			<div class="col-xl-4 col-12 less_space">
				<div class="row custom_scroll" style="max-height:540px; overflow:auto;" >
					<div class="col-xl-12 col-lg-12 col-12 margin-bottom-10">
						<a href="#" class="prj-item">
							<div class="top-project-section">
								<div class="project-icon">
									<img src="<?php echo HTTP_IMAGES_PATH_ADMIN; ?>logo/logo-1.png" alt="">
								</div>
								<h3>Bold Meida</h3>
								<div class="meta">
									<p class="author">
										by <span>Bold Meida</span>
									</p>
								</div>
							</div>
							<div class="bottom-project-section">
								<div class="meta">
									<div class="points">
										<i class="far fa-heart"></i> 407
									</div>
									<div class="views">
										<i class="fa fa-eye"></i> 40.6k
									</div>
									<span class="feedable-time timeago">2 years ago</span>
								</div>
							</div>
						</a>
					</div>
					<div class="col-xl-12 col-lg-12 col-12 margin-bottom-10">
						<a href="#" class="prj-item">
							<div class="top-project-section">
								<div class="project-icon">
									<img src="<?php echo HTTP_IMAGES_PATH_ADMIN; ?>logo/logo-2.png" alt="">
								</div>
								<h3>Bold Meida</h3>
								<div class="meta">
									<p class="author">
										by <span>Bold Meida</span>
									</p>
								</div>
							</div>
							<div class="bottom-project-section">
								<div class="meta">
									<div class="points">
										<i class="far fa-heart"></i> 407
									</div>
									<div class="views">
										<i class="fa fa-eye"></i> 40.6k
									</div>
									<span class="feedable-time timeago">2 years ago</span>
								</div>
							</div>
						</a>
					</div>
					<div class="col-xl-12 col-lg-12 col-12 margin-bottom-10">
						<a href="#" class="prj-item">
							<div class="top-project-section">
								<div class="project-icon">
									<img src="<?php echo HTTP_IMAGES_PATH_ADMIN; ?>logo/logo-1.png" alt="">
								</div>
								<h3>Bold Meida</h3>
								<div class="meta">
									<p class="author">
										by <span>Bold Meida</span>
									</p>
								</div>
							</div>
							<div class="bottom-project-section">
								<div class="meta">
									<div class="points">
										<i class="far fa-heart"></i> 407
									</div>
									<div class="views">
										<i class="fa fa-eye"></i> 40.6k
									</div>
									<span class="feedable-time timeago">2 years ago</span>
								</div>
							</div>
						</a>
					</div>
					<div class="col-xl-12 col-lg-12 col-12 margin-bottom-10">
						<a href="#" class="prj-item">
							<div class="top-project-section">
								<div class="project-icon">
									<img src="<?php echo HTTP_IMAGES_PATH_ADMIN; ?>logo/logo-2.png" alt="">
								</div>
								<h3>Bold Meida</h3>
								<div class="meta">
									<p class="author">
										by <span>Bold Meida</span>
									</p>
								</div>
							</div>
							<div class="bottom-project-section">
								<div class="meta">
									<div class="points">
										<i class="far fa-heart"></i> 407
									</div>
									<div class="views">
										<i class="fa fa-eye"></i> 40.6k
									</div>
									<span class="feedable-time timeago">2 years ago</span>
								</div>
							</div>
						</a>
					</div>
				</div>
			
			</div>
			<!-- /.col-12 -->
			<div class="col-xl-8 col-12 extra_space">
				<div class="box-content" style="padding:0;height: 540px;">
					<!-- /.box-title -->
					<div class="dropdown js__drop_down">
						<a href="#" class="dropdown-icon glyphicon glyphicon-option-vertical js__drop_down_button"></a>
						<ul class="sub-menu">
							<li><a href="#">Action</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else there</a></li>
							<li class="split"></li>
							<li><a href="#">Separated link</a></li>
						</ul>
						<!-- /.sub-menu -->
					</div>
					<!-- /.dropdown js__dropdown -->
					<!--<div id="map-info" style="width: 100%; height: 550px"></div>-->
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3507.1356331442744!2d77.0582723144033!3d28.475461697924736!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d19ad4b932597%3A0x63da5f183450a87e!2sEweblabs%20Pvt.%20Ltd.!5e0!3m2!1sen!2sin!4v1581659981250!5m2!1sen!2sin" width="100%" height="538" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-12 -->
		</div>
<?php
	$this->load->view('user/vwadminfooter.php');
?>