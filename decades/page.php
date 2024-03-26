<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package decades
 */
get_header(); 

?>

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
<?php $img_src = $bg ? $bg : $img; ?>
    <section class="rich-header" style="background-image: url(<?php echo esc_url($img_src); ?>);">
        <h1 class="page-title"><?php the_title(); ?></h1>
    </section>
    <!-- subheader close -->
<?php } ?>
    
<div id="content" class="<?php echo esc_attr( decades_get_option('blog_layout') ); ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="page-default">
                <?php while (have_posts()) : the_post(); ?>
                    <?php the_post_thumbnail() ?>
                    <?php the_content(); ?>
                    <?php
                        wp_link_pages( array(
                            'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'decades' ) . '</span>',
                            'after'       => '</div>',
                            'link_before' => '<span>',
                            'link_after'  => '</span>',
                            'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'decades' ) . ' </span>%',
                            'separator'   => '<span class="screen-reader-text">, </span>',
                        ) );
                    ?>
                    
                    <?php
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;
                    ?>      
                <?php endwhile; ?>
                </div>

                <div class="text-center">
                    <?php echo decades_pagination(); ?>    
                </div>
                
            </div>

            <div class="col-md-3">
                <div class="sidebar">
                    <?php get_sidebar();?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
