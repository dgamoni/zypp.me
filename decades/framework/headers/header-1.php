<header  id="<?php if(decades_get_option('header_trans')) echo 'header-home-2';else echo 'stick'; ?>" class="header-home <?php if(decades_get_option('header_trans')) echo 'bg-transparent fixed'; ?>">
    <h1 class="logo">
        <?php $logo = decades_get_option( 'logo' ) ? decades_get_option( 'logo' ) : get_template_directory_uri().'/images/logo.png'; ?>
        <a href="<?php echo esc_url( home_url('/') ); ?>">
            <img src="<?php echo esc_url($logo); ?>" class="img-responsive" alt="">
        </a>
    </h1>
    <?php if(decades_get_option( 'search' )) { ?>
    <div class="btn-search-header">
        <span class="lnr lnr-magnifier"></span>
        <div class="search-popup">
            <form class="form-search-navi" action="<?php echo esc_url(home_url( '/' )); ?>">
                <div class="input-group">
                    <input class="form-control" name="s" placeholder="<?php echo esc_html__('Type & Search', 'decades'); ?>" type="text">
                    <button><span class="lnr lnr-magnifier"></span></button>
                </div>
                <!-- /input-group -->
            </form>
        </div>
    </div>
    <?php } ?>
    
    <nav id="main-nav" class="main-nav">
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
    <a href="#menu" class="btn-menu-mobile"><span class="lnr lnr-menu"></span></a>
</header>