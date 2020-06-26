<?php include 'vwheader.php'; ?>
<div class="page-content-wrap sticky-status-true">
<header class="rich-header page-header page-title-text-align-left mob-page-title-text-align-left breadcrumbs-true" data-opacity="false" data-parallax="true" data-overlay="true" data-fixed="true">
   <div class="parallax-container">&nbsp;</div>
   <div class="container">
      <div class="rh-content et-clearfix">
         <div class="rh-title">
            <p>GLOBAX LOGISTICS</p>
            <div class="separator"></div>
            <h1>My Account</h1>
         </div>
      </div>
   </div>
</header>
<div class="et-breadcrumbs">
   <div class="container"><a href="<?= base_url(); ?>">Home</a><a href="../shop/index.html">Shop</a><span>My Account</span></div>
</div>
<!-- content start -->
<div id="et-content" class='content et-clearfix padding-true'>
   <div class="product-layout product-container-boxed">
      <div class='container'>
         <!-- post start -->
         <div id="post-8079" class="post-8079 page type-page status-publish hentry">
            <section class="page-content et-clearfix">
               <div class="woocommerce">
                  <div class="woocommerce-notices-wrapper"></div>
                  <?php if ($this->session->flashdata('fail')) {
              echo '<div class="alert alert-danger">' . $this->session->flashdata('fail') . '</div>';
            } ?>

            <?php if ($this->session->flashdata('success')) {
              echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
            } ?>
                  <h2>My account</h2>
            <?php $attributes = array('method' => 'post' , 'class' => '"woocommerce-form woocommerce-form-login login'); ?>

            <?php echo form_open_multipart('auth/myaccount',$attributes);?>
                     <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <label for="password">Your Name&nbsp;<span class="required">*</span></label>
                        <input class="woocommerce-Input woocommerce-Input--text input-text" type="text" name="fullname" value="<?= $profile->fullname; ?>" />
                     </p>
                     <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <label for="password">Company’s Name&nbsp;<span class="required">*</span></label>
                        <input class="woocommerce-Input woocommerce-Input--text input-text" type="text" name="company_name" value="<?= $profile->company_name; ?>" />
                     </p>
                     <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <label for="password">Upload Company GST Certificate (Remarks- If not applicable, then submit Declaration Form)&nbsp;<span class="required">*</span></label>
                        <input type="file" id="gst_certificate"  class="woocommerce-Input woocommerce-Input--text input-text" name="gst_certificate[]" multiple="multiple" >
                     
                     <?php 
                        $imageIcon  = 'fa-file-image';
                        $pdfIcon    = 'fa-file-pdf';
                        $docIcon    = 'fa-file';
                        $excelIcon  = 'fa-file-excel';
                        
                        if(($id) && !empty($profile->gst_certificate))
                        {
                     ?>
                        <div class="mt-1" style="display: flex; flex-wrap: wrap;">
                     <?php 
                           foreach(json_decode($profile->gst_certificate) as $dbFile)
                           {
                              $dbFileArr = explode('.', $dbFile);
                              $dbFileExtension = strtolower($dbFileArr[1]);
                              
                              switch ($dbFileExtension) {
                                 case 'jpg': 
                                 case 'jpeg':
                                 case 'png':
                                 case 'gif':
                                 case 'webp':
                                    $classIcon = $imageIcon;
                                    break;
                                 case 'pdf': 
                                    $classIcon = $pdfIcon;
                                    break;
                                 case 'xls':
                                 case 'xlsx':
                                    $classIcon = $excelIcon;
                                    break;
                                 default:
                                    $classIcon = $docIcon;
                              }
                              if($profile->user_type == 'vendor')
                              {
                                 ?>
                              <div class="mt-1" style="width: 15%;">
                           <a href="<?php echo base_url("uploads/vendor/$dbFile");?>" download><i class="fa <?php echo $classIcon; ?>" aria-hidden="true" style="font-size: xx-large;"></i></a>
                        </div>
                                 <?php
                              }
                              else {
                              
                     ?>
                        <div class="mt-1" style="width: 15%;">
                           <a href="<?php echo base_url("uploads/customer/$dbFile");?>" download><i class="fa <?php echo $classIcon; ?>" aria-hidden="true" style="font-size: xx-large;"></i></a>
                        </div>
                     <?php 
                  }
                           }
                     ?>
                     </div>
                     <?php 
                        } 
                     ?>
                     </p>
                     <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <label for="password">-Upload PAN Card&nbsp;<span class="required">*</span></label>
                        <input type="file" id="pan_cart_image"  class="woocommerce-Input woocommerce-Input--text input-text" name="pan_cart_image[]" multiple="multiple" >
                     
                     <?php 
                        $imageIcon  = 'fa-file-image';
                        $pdfIcon    = 'fa-file-pdf';
                        $docIcon    = 'fa-file';
                        $excelIcon  = 'fa-file-excel';
                        
                        if(($id) && !empty($profile->pan_cart_image))
                        {
                     ?>
                        <div class="mt-1" style="display: flex; flex-wrap: wrap;">
                     <?php 
                           foreach(json_decode($profile->pan_cart_image) as $dbFile)
                           {
                              $dbFileArr = explode('.', $dbFile);
                              $dbFileExtension = strtolower($dbFileArr[1]);
                              
                              switch ($dbFileExtension) {
                                 case 'jpg': 
                                 case 'jpeg':
                                 case 'png':
                                 case 'gif':
                                 case 'webp':
                                    $classIcon = $imageIcon;
                                    break;
                                 case 'pdf': 
                                    $classIcon = $pdfIcon;
                                    break;
                                 case 'xls':
                                 case 'xlsx':
                                    $classIcon = $excelIcon;
                                    break;
                                 default:
                                    $classIcon = $docIcon;
                              }
                              if($profile->user_type == 'vendor')
                              {
                                 ?>
                              <div class="mt-1" style="width: 15%;">
                           <a href="<?php echo base_url("uploads/vendor/$dbFile");?>" download><i class="fa <?php echo $classIcon; ?>" aria-hidden="true" style="font-size: xx-large;"></i></a>
                        </div>
                                 <?php
                              }
                              else {
                              
                     ?>
                        <div class="mt-1" style="width: 15%;">
                           <a href="<?php echo base_url("uploads/customer/$dbFile");?>" download><i class="fa <?php echo $classIcon; ?>" aria-hidden="true" style="font-size: xx-large;"></i></a>
                        </div>
                     <?php 
                  }
                           }
                     ?>
                     </div>
                     <?php 
                        } 
                     ?>
                     </p>
                     <?php if($profile->user_type=='vendor') 
                     { ?>
                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <label for="password">Upload Cancelled Cheque&nbsp;<span class="required">*</span></label>
                        <input type="file" id="cancelled_cheque"  class="woocommerce-Input woocommerce-Input--text input-text" name="cancelled_cheque[]" multiple="multiple" >
                     
                     <?php 
                        $imageIcon  = 'fa-file-image';
                        $pdfIcon    = 'fa-file-pdf';
                        $docIcon    = 'fa-file';
                        $excelIcon  = 'fa-file-excel';
                        
                        if(($id) && !empty($profile->cancelled_cheque))
                        {
                     ?>
                        <div class="mt-1" style="display: flex; flex-wrap: wrap;">
                     <?php 
                           foreach(json_decode($profile->cancelled_cheque) as $dbFile)
                           {
                              $dbFileArr = explode('.', $dbFile);
                              $dbFileExtension = strtolower($dbFileArr[1]);
                              
                              switch ($dbFileExtension) {
                                 case 'jpg': 
                                 case 'jpeg':
                                 case 'png':
                                 case 'gif':
                                 case 'webp':
                                    $classIcon = $imageIcon;
                                    break;
                                 case 'pdf': 
                                    $classIcon = $pdfIcon;
                                    break;
                                 case 'xls':
                                 case 'xlsx':
                                    $classIcon = $excelIcon;
                                    break;
                                 default:
                                    $classIcon = $docIcon;
                              }
                             
                                 ?>
                              <div class="mt-1" style="width: 15%;">
                           <a href="<?php echo base_url("uploads/vendor/$dbFile");?>" download><i class="fa <?php echo $classIcon; ?>" aria-hidden="true" style="font-size: xx-large;"></i></a>
                        </div>
                     <?php 
                  
                           }
                     ?>
                     </div>
                     <?php 
                        } 
                     ?>
                     </p>
                     <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <label for="password">Upload Director ID Proof&nbsp;<span class="required">*</span></label>
                        <input type="file" id="director_id_roof"  class="woocommerce-Input woocommerce-Input--text input-text" name="director_id_roof[]" multiple="multiple" >
                     
                     <?php 
                        $imageIcon  = 'fa-file-image';
                        $pdfIcon    = 'fa-file-pdf';
                        $docIcon    = 'fa-file';
                        $excelIcon  = 'fa-file-excel';
                        
                        if(($id) && !empty($profile->director_id_roof))
                        {
                     ?>
                        <div class="mt-1" style="display: flex; flex-wrap: wrap;">
                     <?php 
                           foreach(json_decode($profile->director_id_roof) as $dbFile)
                           {
                              $dbFileArr = explode('.', $dbFile);
                              $dbFileExtension = strtolower($dbFileArr[1]);
                              
                              switch ($dbFileExtension) {
                                 case 'jpg': 
                                 case 'jpeg':
                                 case 'png':
                                 case 'gif':
                                 case 'webp':
                                    $classIcon = $imageIcon;
                                    break;
                                 case 'pdf': 
                                    $classIcon = $pdfIcon;
                                    break;
                                 case 'xls':
                                 case 'xlsx':
                                    $classIcon = $excelIcon;
                                    break;
                                 default:
                                    $classIcon = $docIcon;
                              }
                              
                                 ?>
                              <div class="mt-1" style="width: 15%;">
                           <a href="<?php echo base_url("uploads/vendor/$dbFile");?>" download><i class="fa <?php echo $classIcon; ?>" aria-hidden="true" style="font-size: xx-large;"></i></a>
                        </div>
                                 
                     <?php 
                  
                           }
                     ?>
                     </div>
                     <?php 
                        } 
                     ?>
                     </p>
                     <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <label for="password">Upload MSME Certificate, if applicable.&nbsp;<span class="required">*</span></label>
                        <input type="file" id="msme_certificate"  class="woocommerce-Input woocommerce-Input--text input-text" name="msme_certificate[]" multiple="multiple" >
                     
                     <?php 
                        $imageIcon  = 'fa-file-image';
                        $pdfIcon    = 'fa-file-pdf';
                        $docIcon    = 'fa-file';
                        $excelIcon  = 'fa-file-excel';
                        
                        if(($id) && !empty($profile->msme_certificate))
                        {
                     ?>
                        <div class="mt-1" style="display: flex; flex-wrap: wrap;">
                     <?php 
                           foreach(json_decode($profile->msme_certificate) as $dbFile)
                           {
                              $dbFileArr = explode('.', $dbFile);
                              $dbFileExtension = strtolower($dbFileArr[1]);
                              
                              switch ($dbFileExtension) {
                                 case 'jpg': 
                                 case 'jpeg':
                                 case 'png':
                                 case 'gif':
                                 case 'webp':
                                    $classIcon = $imageIcon;
                                    break;
                                 case 'pdf': 
                                    $classIcon = $pdfIcon;
                                    break;
                                 case 'xls':
                                 case 'xlsx':
                                    $classIcon = $excelIcon;
                                    break;
                                 default:
                                    $classIcon = $docIcon;
                              }
                              ?>
                              <div class="mt-1" style="width: 15%;">
                           <a href="<?php echo base_url("uploads/vendor/$dbFile");?>" download><i class="fa <?php echo $classIcon; ?>" aria-hidden="true" style="font-size: xx-large;"></i></a>
                        </div>
                                
                     <?php 
                  
                           }
                     ?>
                     </div>
                     <?php 
                        } 
                     ?>
                     </p>
                  <?php } ?>

                     <p class="form-row">
                        <button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="profileupdate" value="Update">Update</button>
                     </p>
                     <?php echo form_close();?>
                  
               </div>
            </section>
         </div>
         <!-- post end -->
      </div>
   </div>
</div>
<!-- content end -->
<?php include 'vwfooter.php'; ?>