<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package decades
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
    <link rel="stylesheet" id="fullcolor" href="" type="text/css" media="all">
    
</head>

<body <?php body_class( 'onepage' ); ?> >
    
    <!--=== start page-wrapper ===-->
    <div class="page-wrapper">
        <?php if(decades_get_option('preload')){ ?>
        <div class="preloader">
            <div class="loader">
                <?php $preload = decades_get_option( 'img_load' ) ? decades_get_option( 'img_load' ) : get_template_directory_uri().'/images/preloader.gif';  ?>
                <img src="<?php echo esc_url($preload); ?>" alt="">
            </div>
        </div>
        <?php } ?>
        <!--=====================
            start page-header
        =====================-->
        <div class="page-header">
        
        <!--=====================
            start header
        =====================-->
            <header class="header">
                <div class="container">
                
                    <!--=== start logo ===-->
                    <h1 class="logo">
                        <?php 
                            $logo = decades_get_option( 'logo' ) ? decades_get_option( 'logo' ) : get_template_directory_uri().'/images/logo-light.png'; 
                            $logo2 = decades_get_option( 'logo_2' ) ? decades_get_option( 'logo_2' ) : get_template_directory_uri().'/images/logo-dark.png'; 
                        ?>
                        <a href="<?php echo esc_url( home_url('/') ); ?>">
                            <img class="logo-img" src="<?php echo esc_url($logo); ?>" class="img-responsive" alt="">
                            <img class="logo-img2" src="<?php echo esc_url($logo2); ?>" class="img-responsive" alt="">
                        </a> 
                    </h1>
                    <!--=== end logo ===-->
                    
                    <!--=== start mobile-menu ===-->
                    <div class="mobile-menu">
                        <a href=""><i class="ion-android-menu"></i></a>
                    </div>
                    <!--=== end mobile-menu ===-->
                    
                    <!--=== start main-nav ===-->
                    <div class="main-nav">
                        <?php
                            $onepage = array(
                                'theme_location'  => 'onepage',
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
                                'items_wrap'      => '<ul id="mainmenu" class="main-nav-inner">%3$s</ul>',
                                'depth'           => 0,
                            );
                            if ( has_nav_menu( 'onepage' ) ) {
                                wp_nav_menu( $onepage );
                            }
                        ?>
                    </div>
                    <!--=== end main-nav ===-->
                    
                </div>
                <!--=== end container ===-->
                
            </header>
        <!--=====================
            end header
        =====================-->