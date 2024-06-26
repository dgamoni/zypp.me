<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package decades
 */


if ( ! function_exists( 'decades_excerpt_length' ) ) :
/**** Change length of the excerpt ****/
function decades_excerpt_length() {
      
      if(decades_get_option('excerpt_length')){
        $limit = decades_get_option('excerpt_length');
      }else{
        $limit = 30;
      }  
      $excerpt = explode(' ', get_the_excerpt(), $limit);

      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
      return $excerpt;
}
endif;

if ( ! function_exists( 'decades_excerpt' ) ) :
/** Excerpt Section Blog Post **/
function decades_excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}
endif;


if ( ! function_exists( 'decades_tag_cloud_widget' ) ) :
/**custom function tag widgets**/
function decades_tag_cloud_widget($args) {
    $args['number'] = 0; //adding a 0 will display all tags
    $args['largest'] = 18; //largest tag
    $args['smallest'] = 14; //smallest tag
    $args['unit'] = 'px'; //tag font unit
    $args['format'] = 'list'; //ul with a class of wp-tag-cloud
    $args['exclude'] = array(20, 80, 92); //exclude tags by ID
    return $args;
}
add_filter( 'widget_tag_cloud_args', 'decades_tag_cloud_widget' );
endif;

/** Excerpt Section Blog Post **/
function decades_blog_excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

if ( ! function_exists( 'decades_pagination' ) ) :
//pagination
function decades_pagination($prev = '<i class="fa fa-angle-double-left"></i>', $next = '<i class="fa fa-angle-double-right"></i>', $pages='') {
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    if($pages==''){
        global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
    }
    $pagination = array(
        'base'          => str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
        'format'        => '',
        'current'       => max( 1, get_query_var('paged') ),
        'total'         => $pages,
        'prev_text'     => $prev,
        'next_text'     => $next,       
        'type'          => 'list',
        'end_size'      => 3,
        'mid_size'      => 3
);
    $return =  paginate_links( $pagination );
    echo str_replace( "<ul class='page-numbers'>", '<ul class="pagination">', $return );
}
endif;

if ( ! function_exists( 'decades_custom_wp_admin_style' ) ) :
function decades_custom_wp_admin_style() {

        wp_register_style( 'decades_custom_wp_admin_css', get_template_directory_uri() . '/framework/admin/admin-style.css', false, '1.0.0' );
        wp_enqueue_style( 'decades_custom_wp_admin_css' );

        wp_enqueue_script( 'decades-backend-js', get_template_directory_uri()."/framework/admin/admin-script.js", array( 'jquery' ), '1.0.0', true );
        wp_enqueue_script( 'decades-backend-js' );
}
add_action( 'admin_enqueue_scripts', 'decades_custom_wp_admin_style' );
endif;

if ( ! function_exists( 'decades_search_form' ) ) :
/* Custom form search */
function decades_search_form( $form ) {
    $form = '<form role="search" method="get" action="' . esc_url(home_url( '/' )) . '" class="form-inline" >  
        <input type="search" id="s" class="search-field contact-input" value="' . get_search_query() . '" name="s" placeholder="'.__('Search...', 'decades').'" />
        <button type="submit" class="reset-btn hover-text-theme"><span class="fa fa-search"></span></button>
    </form>';
    return $form;
}
add_filter( 'get_search_form', 'decades_search_form' );
endif;

/* Custom comment List: */
function decades_theme_comment($comment, $args, $depth) { 
   
  $GLOBALS['comment'] = $comment; ?>

  <li id="comment-<?php comment_ID(); ?>" class="post-content-comment grey-section">
      <div class="img">
    <?php echo get_avatar($comment,$size='70',$default='http://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=70' ); ?>
    </div>
    <div class="comment-content">
      <h6><?php printf(__('%s','decades'), get_comment_author()) ?></h6>
    </div>    
    <div class="date">
      <span class="c_date"><?php the_time(get_option( 'date_format' )); ?></span>
            <span class="c_reply"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span>
    </div>
    <div class="comment-content">
    <?php if ($comment->comment_approved == '0'){ ?>
       <p><em><?php _e('Your comment is awaiting moderation.','decades') ?></em></p>
    <?php }else{ ?>
            <?php comment_text() ?>
         <?php } ?>
    </div>    
     <div class="clearfix"></div> 
  </li>
  
<?php
}

//Remove Customizer
add_action( "customize_register", "decades_customize_register" );
function decades_customize_register( $wp_customize ) {
  $wp_customize->remove_section('header_image');
  $wp_customize->remove_section('background_image');
  $wp_customize->remove_section('colors');
}

/*Support Woocommerce*/
add_action( 'after_setup_theme', 'decades_woocommerce_support' );
function decades_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

// Add specific CSS class by filter
add_filter( 'body_class', 'decades_body_class_names' );
function decades_body_class_names( $classes ) {
  $theme = wp_get_theme();
  
  $classes[] = 'decades-theme-ver-'.$theme->version;

  $classes[] = 'wordpress-version-'.get_bloginfo( 'version' );

  // return the $classes array
  return $classes;
}