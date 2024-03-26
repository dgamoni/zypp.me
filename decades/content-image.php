<li <?php post_class(); ?>>
    <div class="post-content">
        <div class="post-image">
            <a href="<?php the_permalink(); ?>">
            <?php if( function_exists( 'rwmb_meta' ) ) { ?>
                <?php $images = rwmb_meta( '_cmb_image', "type=image" ); ?>
                <?php if($images){ ?>              
                    <?php  foreach ( $images as $image ) {  ?>
                        <?php $img = $image['full_url']; ?>
                        <img src="<?php echo esc_url($img); ?>" class="img-responsive" alt="">
                    <?php } ?>                
                <?php } ?>
            <?php } ?>
            </a>
        </div>
        <div class="post-text">
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <div class="post-meta">
                <span class="post-date"><i class="fa fa-calendar-o"></i><?php the_time( get_option( 'date_format' ) ) ?></span>
                <span class="post-author"><i class="fa fa-pencil-square-o"></i><?php the_author_posts_link(); ?></span>
                <span class="post-comm"><i class="fa fa-comment-o"></i><?php comments_number( '0 '.esc_html__("comment","decades"), '1 '.esc_html__("comment","decades"), '% '.esc_html__("comments","decades") ); ?></span>
            </div>
            <p><?php echo decades_excerpt_length(); ?></p>
        </div>
        <?php $rm   = decades_get_option('read_more') ? decades_get_option('read_more') : esc_html__('Read More', 'decades'); ?>
        <a href="<?php the_permalink(); ?>" class="btn btn-ellipse"><?php echo esc_html($rm); ?></a>
    </div>
</li>