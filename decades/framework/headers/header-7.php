<header class="header-8">
	<?php $socials = decades_get_option( 'socials', array() ); ?>
	<?php if($socials) { ?>
    <ul class="widget-social-list">
        <?php foreach ( $socials as $social ) { ?>
        <li><a href="<?php echo esc_url($social['link']); ?>"><i class="fa <?php echo esc_attr($social['icon']); ?>" aria-hidden="true"></i></a></li>
        <?php } ?>
    </ul>
    <?php } ?>
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

	<nav  class="main-nav">
		<?php
            $primary = array(
                'theme_location'  => 'primary',
                'menu'            => '',
                'container'       => '',
                'container_class' => '',
                'container_id'    => '',
                'menu_class'      => '',
                'menu_id'         => '',
                'echo'            => true,
                'fallback_cb'     => 'decades_bootstrap_navwalker::fallback',
                'walker'          => new decades_bootstrap_navwalker(),
                'before'          => '',
                'after'           => '',
                'link_before'     => '',
                'link_after'      => '',
                'items_wrap'      => '<ul class="navi-level-1">%3$s</ul>',
                'depth'           => 0,
            );
            if ( has_nav_menu( 'primary' ) ) {
                wp_nav_menu( $primary );
            }
        ?>
	</nav>

</header>