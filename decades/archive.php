<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package decades
 */

get_header(); ?>

    <?php if(decades_get_option('page_header')) { ?>
    <?php $img = decades_get_option( 'page_header_bg' ) ? decades_get_option( 'page_header_bg' ) : ''; ?>
    <!-- subheader -->
        <section class="rich-header" style="background-image: url(<?php echo esc_url($img); ?>);">
            <h1 class="page-title"><?php the_archive_title(); ?></h1>
        </section>
        <!-- subheader close -->
    <?php } ?>
    <!-- Main Content -->
    <div id="content" class="<?php echo esc_attr( decades_get_option('blog_layout') ); ?>">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <ul class="blog-list">
                    <?php if( have_posts() ) : ?>
                        <?php 
                            while (have_posts()) : the_post();
                                get_template_part( 'content', get_post_format() ) ;
                            endwhile;
                        ?>
                    <?php endif; ?>
                    </ul>
                    <div class="pagination text-center">
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