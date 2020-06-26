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
	<div class="product-layout product-container-boxed">	<div class='container'>
					<!-- post start -->
			<div id="post-8079" class="post-8079 page type-page status-publish hentry">
				<section class="page-content et-clearfix">
					<div class="woocommerce"><div class="woocommerce-notices-wrapper"></div>
 			<?php if ($this->session->flashdata('fail')) {
              echo '<div class="alert alert-danger">' . $this->session->flashdata('fail') . '</div>';
            } ?>

            <?php if ($this->session->flashdata('success')) {
              echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
            } ?>
                  <h2>Login</h2>
            

            <?php $attributes = array('method' => 'post' , 'class' => '"woocommerce-form woocommerce-form-login login'); ?>

            <?php echo form_open('auth/login',$attributes);?>
		
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="username">Username or email address&nbsp;<span class="required">*</span></label>
				<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="username" autocomplete="username" value="" />			</p>
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="password">Password&nbsp;<span class="required">*</span></label>
				<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />
			</p>

			
			<p class="form-row">
				<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
					<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span>Remember me</span>
				</label>
				<button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="Log in">Log in</button>
			</p>
			<p class="woocommerce-LostPassword lost_password">
				<a href="<?= base_url('auth/register'); ?>">Create My Account</a>
			</p>

			
     <?php echo form_close();?>


</div>
									</section>
			</div>
			<!-- post end -->
					</div>
	</div></div>
<!-- content end -->
<?php include 'vwfooter.php'; ?>