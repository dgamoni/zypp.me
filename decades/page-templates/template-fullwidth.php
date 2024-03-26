<?php
/**
 * Template Name: FullWidth
 */
get_header(); ?>

<?php
    $bg = '';
    if ( ! function_exists('rwmb_meta') ) { 
        $bg = '';
    }else{
        $images = rwmb_meta('_cmb_bg_header', "type=image" ); 
        if(!$images){
             $bg = '';
        } else {
             foreach ( $images as $image ) { 
                $bg = $image['full_url']; 
                break;
            }
        }
    }
   
?>

<?php if(decades_get_option('page_header')) { ?>
<?php $img = decades_get_option( 'page_header_bg' ) ? decades_get_option( 'page_header_bg' ) : ''; ?>
<?php 
    $img_src = $bg ? $bg : $img; 
?>
    <section class="rich-header" style="background-image: url(<?php echo esc_url($img_src); ?>);">
        <h1 class="page-title"><?php the_title(); ?></h1>
    </section>
    <!-- subheader close -->
<?php } ?>
    
<?php while (have_posts()) : the_post(); ?>

    <?php the_content(); ?>

<?php endwhile; ?>

<?php get_footer(); ?>