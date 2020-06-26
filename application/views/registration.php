<?php include 'vwheader.php'; ?>
<div class="page-content-wrap sticky-status-true">
<header class="rich-header page-header page-title-text-align-left mob-page-title-text-align-left breadcrumbs-true" data-opacity="false" data-parallax="true" data-overlay="true" data-fixed="true">
   <div class="parallax-container">&nbsp;</div>
   <div class="container">
      <div class="rh-content et-clearfix">
         <div class="rh-title">
            <p>GLOBAX LOGISTICS</p>
            <div class="separator"></div>
            <h1>Registration</h1>
         </div>
      </div>
   </div>
</header>
<div class="et-breadcrumbs">
   <div class="container"><a href="<?= base_url(); ?>">Home</a><a href="../shop/index.html">Shop</a><span>Registration</span></div>
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
                  <h2>Create Account</h2>
         
            <?php $attributes = array('method' => 'post' , 'class' => '"woocommerce-form woocommerce-form-login login'); ?>

            <?php echo form_open('auth/register',$attributes);?>
                     <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <label for="username">Customer &nbsp;<span class="required">*</span></label>
                        <select name="user_type" class="woocommerce-Input woocommerce-Input--text input-text" >
                        <option value="">Select...</option>	
                        <option value="customer">Customer</option>	
                        <option value="vendor">Vendor</option>
                        </select>		
                     </p> 
                     <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <label for="username">Customer &nbsp;<span class="required">*</span></label>
                        <select name="industry_type" class="woocommerce-Input woocommerce-Input--text input-text" >
                        <option value="">Select...</option>	
                        <option value="Load Provider">Load Provider</option>	
                        <option value="Transporter (Vehicle Owner)">Transporter (Vehicle Owner)</option>	
                        <option value="Vehicle Broker">Vehicle Broker</option>	
                        </select>		
                     </p>
                     <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <label for="password">Mobile No.&nbsp;<span class="required">*</span></label>
                        <input class="woocommerce-Input woocommerce-Input--text input-text" type="text" name="phone" />
                     </p>
                     <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <label for="password">Email.&nbsp;<span class="required">*</span></label>
                        <input class="woocommerce-Input woocommerce-Input--text input-text" type="email" name="email" />
                     </p>
                     <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <label for="password">Password&nbsp;<span class="required">*</span></label>
                        <input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" />
                     </p>
                     <p class="form-row">
                     	<button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="submit" value="Create Account">Create Account</button>
                     </p>
                     <p class="woocommerce-LostPassword lost_password">
                        <a href="<?= base_url('auth/login'); ?>">A Have already Account</a>
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