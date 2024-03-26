<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package decades
 */

get_header(); ?>
    
    <?php if(decades_get_option('page_header')) { ?>
    <?php $img = decades_get_option( 'page_header_bg' ) ? decades_get_option( 'page_header_bg' ) : ''; ?>
    <!-- subheader -->
        <section class="rich-header" style="background-image: url(<?php echo esc_url($img); ?>);">
            <h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'decades' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
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
                    <?php // If no content, include the "No posts found" template.
                        else : ?>
                                                       
                            <h2 class="page-title"><?php esc_html_e( 'Nothing Found', 'buildpro' ); ?></h2>
                            
                            <div class="page-content">
                                <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'buildpro' ); ?></p>
                                <div class="widget_search">
                                    <?php get_search_form(); ?>
                                </div>
                            </div><!-- .page-content -->
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