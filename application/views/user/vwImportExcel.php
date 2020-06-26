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
					
					<?php if(!$processedData && (!isset($uploaded_file_name) || (isset($uploaded_file_name) && isset($csvdata['error'])))){ ?>
					
					<form action="<?php echo base_url('user/common/import_excel/').$user_type;?>" id="excel_form" method="POST" enctype="multipart/form-data" autocomplete="off">
					<!-- /.box-title -->
						<div class="row">
							
							<div class="form-group pt-3 padding-20 col-lg-6">
								<label for="excel_file">Upload excel file</label><br>
								<input type="file" id="excel_file" name="excel_file">
							</div>
						</div>
						
						<?php 
						// if(!isset($uploaded_file_name) || (isset($uploaded_file_name) && isset($csvdata['error']))){
							
							if($user_type == 'vendor'){
								$excelFile = 'assets/backend/excel/vendor_excel_format.csv';
							}else{
								$excelFile = 'assets/backend/excel/customer_excel_format.csv';
							}
						?>
						<button type="button" class="btn btn-danger btn-sm waves-effect waves-light" onclick="window.location.href='<?php echo base_url($excelFile);?>'" download><i class="fa fa-download" aria-hidden="true"></i> Download Format(<?php echo ucfirst($user_type); ?>) </button>
					
						<button type="submit" class="btn btn-primary btn-sm waves-effect waves-light"><i class="fa fa-upload" aria-hidden="true"></i> Upload</button>
						
						<!--<button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Preview</button>-->
						<!-- /.col-lg-6 -->
						<?php //} ?>
					</form>
					
					<?php } ?>
					<!-- /.row -->
					
					<?php if((isset($csvdata) && !isset($csvdata['error'])) || (isset($processedData) && !empty($processedData))){?>
					
					<a class="btn btn-small btn-primary float-right" href="<?php echo base_url('user/common/import_excel/'.$user_type);?>">← Go Back</a>
					
					<?php } ?>
					
					<?php 
						if(isset($csvdata)){
							$this->load->view('user/vwImportExcelTable');
						} 
					?>
					
					<?php if(isset($processedData) && !empty($processedData)){ ?>
						
						<h4>No. of rows inserted: <?php echo $processedData['insert']; ?></h4>
						<h4>No. of rows not inserted: <?php echo $processedData['error']['count']; ?></h4>
						<?php if($processedData['error']['count'] != 0){ ?>
							<h5>Following rows could not be imported: </h5>
							<?php $this->load->view('user/vwImportExcelTable'); ?>
						<?php } ?>
					<?php } ?>
				</div>
				<!-- /.box-content -->
			</div>

<?php
	$this->load->view('user/vwadminfooter.php');
?>