<?php
	$this->load->view('user/vwadminheader.php');
?>
<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">
			<div class="col-12">
				<div class="box-content">
					<?php
					if($menuname == 'domestic')
					{
						?>
						<h4 class="box-title">Domestic(Road Permits)</h4><hr>
						<section class="content">
						    <iframe src="<?= base_url('uploads/state_wise-Permit-required.pdf'); ?>" width="100%" height="500px">
						    </iframe>
						</section>
					<?php
					}
					if($menuname == 'custom')
					{
						?>
						<h4 class="box-title">Custom Authorities</h4><hr>
						<section class="content">
						  	<ul class="nav nav-tabs al ">
						    	<li class="active"><a data-toggle="tab" href="#home" class="btn btn-sm btn-info mr-3">Valuation Bond Requirement</a></li>
						    	<li><a data-toggle="tab" href="#svb" class="btn btn-sm btn-info mr-3">SPECIAL VALUATION BRANCH (SVB)</a></li>
						    	<li><a data-toggle="tab" href="#hscode" class="btn btn-sm btn-info mr-3">HS Code</a></li>
						  	</ul>
						  	<hr>
						  	<div class="tab-content">
						    	<div id="home" class="tab-pane fade in active show">
						     		<iframe src="<?= base_url('uploads/SVB.pdf'); ?>" width="100%" height="500px"></iframe>
						    	</div>
						    	<div id="svb" class="tab-pane fade">
						      		<iframe src="<?= base_url('uploads/SVB.pdfv1.pdf'); ?>" width="100%" height="500px"></iframe>
						    	</div>
						    	<div id="hscode" class="tab-pane fade">
						      		<iframe src="<?= base_url('uploads/ITC_HS_codes.pdf'); ?>" width="100%" height="500px"></iframe>
						    	</div>
							</div>
						</section>
					<?php
					}
					?>
				</div>
				<!-- /.box-content -->
			</div>
		</div>
<?php
	$this->load->view('user/vwadminfooter.php');
?>
