<?php
	$this->load->view('user/vwadminheader.php');
?>
<style type="text/css">
	
.bgimg {
  background-image: url('https://www.w3schools.com/w3images/forestbridge.jpg');
  height: 100%;
  background-position: center;
  background-size: cover;
  position: relative;
  color: white;
  font-family: "Courier New", Courier, monospace;
  font-size: 25px;
}

.topleft {
  position: absolute;
  top: 0;
  left: 16px;
}

.bottomleft {
  position: absolute;
  bottom: 0;
  left: 16px;
}

.middle {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

hr {
  margin: auto;
  width: 40%;
}
</style>
<div id="wrapper">
	<div class="main-content">
	<div class="row small-spacing">
			<div class="col-12">
				<div class="box-content">
					<h4 class="box-title"><?= $page_title; ?></h4><hr>
					<section class="content" style="height: 500px;" >
						<div class="bgimg">
						  <div class="topleft">
						    <p></p>
						  </div>
						  <div class="middle">
						    <h1>COMING SOON</h1>
						    <hr>
						  </div>
						  <div class="bottomleft">
						    <p></p>
						  </div>
						</div>
					</section>
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-12 -->


			</div>
<?php
	$this->load->view('user/vwadminfooter.php');
?>
