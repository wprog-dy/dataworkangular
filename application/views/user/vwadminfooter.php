
		<!-- /.row -->		
		<?php
			if($page_title != 'Dashboard')
			{
		?>
		<footer class="footer">
			<ul class="list-inline">
				<li>2019 © Eweblabs.</li>
				<li><a href="#">Privacy</a></li>
				<li><a href="#">Terms</a></li>
				<li class="d-none"><a href="#">Help</a></li>
			</ul>
		</footer>
		<?php
			}
		?>
	</div>
	<!-- /.main-content -->
</div><!--/#wrapper -->	
</div>
</div>

<script>
	const base_url 		= window.location.origin;
	const host 			= window.location.host;
	let website_url 	= base_url+'/logisticwala_new/';
	
	if(host == 'localhost'){
		
		website_url = base_url+'/logisticwala_new/'
	}
</script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="assets/script/html5shiv.min.js"></script>
		<script src="assets/script/respond.min.js"></script>
	<![endif]-->
	<!-- 
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="<?php echo HTTP_JS_PATH_ADMIN; ?>jquery.min.js"></script>
	<script src="<?php echo HTTP_JS_PATH; ?>popper.min.js"></script>
	<script src="<?php echo HTTP_JS_PATH_ADMIN; ?>modernizr.min.js"></script>
	<script src="<?php echo HTTP_PLUGINS_PATH_ADMIN; ?>bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo HTTP_PLUGINS_PATH_ADMIN; ?>mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="<?php echo HTTP_PLUGINS_PATH_ADMIN; ?>nprogress/nprogress.js"></script>
	<script src="<?php echo HTTP_PLUGINS_PATH_ADMIN; ?>sweet-alert/sweetalert.min.js"></script>
	<script src="<?php echo HTTP_PLUGINS_PATH_ADMIN; ?>waves/waves.min.js"></script>
	<!-- Full Screen Plugin -->
	<script src="<?php echo HTTP_PLUGINS_PATH_ADMIN; ?>fullscreen/jquery.fullscreen-min.js"></script>

	<!-- Google Chart -->
	<!--<script type="text/javascript" src="../../../../www.gstatic.com/charts/loader.js"></script>-->

	<!-- chart.js Chart -->
	<script src="<?php echo HTTP_PLUGINS_PATH_ADMIN; ?>chart/chartjs/Chart.bundle.min.js"></script>
	<script src="<?php echo HTTP_JS_PATH_ADMIN; ?>chart.chartjs.init.min.js"></script>

	<!-- FullCalendar -->
	<script src="<?php echo HTTP_PLUGINS_PATH_ADMIN; ?>moment/moment.js"></script>
	<script src="<?php echo HTTP_PLUGINS_PATH_ADMIN; ?>fullcalendar/fullcalendar.min.js"></script>
	<script src="<?php echo HTTP_JS_PATH_ADMIN; ?>fullcalendar.init.js"></script>

	<!-- Sparkline Chart -->
	<script src="<?php echo HTTP_PLUGINS_PATH_ADMIN; ?>chart/sparkline/jquery.sparkline.min.js"></script>
	<script src="<?php echo HTTP_JS_PATH_ADMIN; ?>chart.sparkline.init.min.js"></script>

	<script src="<?php echo HTTP_JS_PATH_ADMIN; ?>main.min.js"></script>
<script src="<?php echo HTTP_JS_PATH_ADMIN; ?>mycommon.js"></script>
	<script src="<?php echo HTTP_PLUGINS_PATH_ADMIN; ?>color-switcher/color-switcher.min.js"></script>
	
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD84ST3FIRNNVS1CEm_IE9KoR-lAIw8OPo" type="text/javascript"></script>
	<script src="<?php echo HTTP_JS_PATH_ADMIN; ?>map.demo.js"></script>

	<script src="<?php echo HTTP_PLUGINS_PATH_ADMIN; ?>datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo HTTP_PLUGINS_PATH_ADMIN; ?>datatables/media/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?php echo HTTP_PLUGINS_PATH_ADMIN; ?>datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
	<script src="<?php echo HTTP_PLUGINS_PATH_ADMIN; ?>datatables/extensions/Responsive/js/responsive.bootstrap.min.js"></script>
	<script src="<?php echo HTTP_JS_PATH_ADMIN; ?>datatables.demo.min.js"></script>
	<script src="<?php echo HTTP_PLUGINS_PATH_ADMIN; ?>jquery-validation/jquery.validate.min.js"></script>
	<script src="<?php echo HTTP_JS_PATH_ADMIN; ?>additional-methods.js"></script>	
	<script src="<?php echo HTTP_JS_PATH_ADMIN; ?>custom.js"></script>	
</body>
</html>