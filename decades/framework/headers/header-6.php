<header  id="<?php if(decades_get_option('header_trans')) echo 'header-home-2';else echo 'stick'; ?>" class="header-7 <?php if(decades_get_option('header_trans')) echo 'bg-transparent fixed'; ?>">
	<a href="#menu" class="btn-menu-mobile"><span class="lnr lnr-menu"></span></a>
	<h1 class="logo">
		<?php $logo = decades_get_option( 'logo' ) ? decades_get_option( 'logo' ) : get_template_directory_uri().'/images/logo.png'; ?>
        <a href="<?php echo esc_url( home_url('/') ); ?>">
            <img src="<?php echo esc_url($logo); ?>" class="img-responsive" alt="">
        </a>
	</h1>
	<?php if(decades_get_option( 'cart' )) { ?>
	<div class="cart-button">
		<a  href="shop.html" class="icon-cart">
			<span class="lnr lnr-cart"></span>
			<span class="mini-cart-counter"></span>
		</a>
	</div>
	<?php } ?>
	<?php if(decades_get_option( 'buttons' )) { ?>
	<div class="acc-box">
		<a href="#">LOG IN</a>
		<a href="#" class="ot-btn border-dark">
			SIGN UP
		</a>
	</div>
	<?php } ?>
	
</header>