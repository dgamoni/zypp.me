<header  id="<?php if(decades_get_option('header_trans')) echo 'header-home-2';else echo 'stick'; ?>" class="header-2 <?php if(decades_get_option('header_trans')) echo 'bg-transparent fixed'; ?>">
    <h1  class="logo">
        <?php $logo = decades_get_option( 'logo' ) ? decades_get_option( 'logo' ) : get_template_directory_uri().'/images/logo.png'; ?>
        <a href="<?php echo esc_url( home_url('/') ); ?>">
            <img src="<?php echo esc_url($logo); ?>" class="img-responsive" alt="">
        </a>
    </h1>

    <a href="#menu" class="btn-menu-mobile"><span class="lnr lnr-menu"></span></a>
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
</header>