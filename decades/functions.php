<?php
/**
 * Redux Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package decades
 */


if ( ! function_exists( 'decades_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function decades_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Redux Theme, use a find and replace
	 * to change 'decades' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'decades', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'custom-background' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'decades' ),
		'onepage' => esc_html__( 'Onepage Menu', 'decades' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-list',
		'comment-form',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'audio',
		'image',
		'video',
		'gallery',
	) );
	
}
endif; // decades_setup
add_action( 'after_setup_theme', 'decades_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function decades_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'decades_content_width', 640 );
}
add_action( 'after_setup_theme', 'decades_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function decades_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'decades' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Appears in the sidebar section of the site.', 'decades' ),  
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4><div class="small-border"></div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Shop Sidebar', 'decades' ),
		'id'            => 'shop-sidebar',
		'description'   => esc_html__( 'Appears in the sidebar section of the site.', 'decades' ),  
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer One Widget Area', 'decades' ),
		'id'            => 'footer-area-1',
		'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'decades' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Two Widget Area', 'decades' ),
		'id'            => 'footer-area-2',
		'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'decades' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Three Widget Area', 'decades' ),
		'id'            => 'footer-area-3',
		'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'decades' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Fourth Widget Area', 'decades' ),
		'id'            => 'footer-area-4',
		'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'decades' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) ); 

	
}
add_action( 'widgets_init', 'decades_widgets_init' );

/**
 * Enqueue Google fonts.
 */
function decades_fonts_url() {
    $fonts_url = '';

    /* Translators: If there are characters in your language that are not
    * supported by Lora, translate this to 'off'. Do not translate
    * into your own language.
    */
    $lato = _x( 'on', 'Lato font: on or off', 'decades' );
    $popp = _x( 'on', 'Poppins font: on or off', 'decades' );
    $rale = _x( 'on', 'Raleway font: on or off', 'decades' );
    $sofi = _x( 'on', 'Sofia font: on or off', 'decades' );
 
 
    if ( 'off' !== $popp || 'off' !== $lato || 'off' !== $rale ) {
        $font_families = array();

        if ( 'off' !== $lato ) {
            $font_families[] = 'Lato:400,300';
        }        
 
        if ( 'off' !== $popp ) {
            $font_families[] = 'Poppins:400,500,600,700';
        } 

        if ( 'off' !== $rale ) {
            $font_families[] = 'Raleway:300,400,500,600,700';
        } 

        if ( 'off' !== $sofi ) {
            $font_families[] = 'Sofia';
        } 
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }
 
    return esc_url_raw( $fonts_url );
}


/**
 * Enqueue scripts and styles.
 */
function decades_scripts() {

	$protocol = is_ssl() ? 'https' : 'http';
	$apikey   = decades_get_option('api_map') ? decades_get_option('api_map') : 'AIzaSyAvpnlHRidMIU374bKM5-sx8ruc01OvDjI';
	// Add custom fonts, used in the main stylesheet.
    wp_enqueue_style( 'decades-fonts', decades_fonts_url(), array(), null );

    /** All frontend css files **/ 
    wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.css');
    wp_enqueue_style( 'animate', get_template_directory_uri().'/css/animate.css');
    wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/fonts/font-awesome/css/font-awesome.css');
    wp_enqueue_style( 'elegant', get_template_directory_uri().'/css/ionicons/css/ionicons.css');
    wp_enqueue_style( 'etline', get_template_directory_uri().'/js/owlcarousel/owl.carousel.css');
    wp_enqueue_style( 'magnific', get_template_directory_uri().'/js/magnific-popup/magnific-popup.css');
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri().'/js/owlcarousel/owl.carousel.css');
	wp_enqueue_style( 'animation', get_template_directory_uri().'/css/animation.css');

	wp_enqueue_style( 'decades-style', get_stylesheet_uri() );
	

	/** All frontend js files **/
	wp_enqueue_script("mapapi", "$protocol://maps.google.com/maps/api/js?key=".$apikey."",array(),false,false); 
	wp_enqueue_script("bootstrap", get_template_directory_uri()."/js/bootstrap.js",array('jquery'),false,true);    
	wp_enqueue_script("YTPlayer", get_template_directory_uri()."/js/jquery.mb.YTPlayer.js",array('jquery'),false,true);
	wp_enqueue_script("parallax", get_template_directory_uri()."/js/parallax.js",array('jquery'),false,true);
    wp_enqueue_script("singlePageNav", get_template_directory_uri()."/js/jquery.singlePageNav.js",array('jquery'),false,true);
    wp_enqueue_script("owl-carousel", get_template_directory_uri()."/js/owlcarousel/owl.carousel.js",array('jquery'),false,false);
	wp_enqueue_script("particles", get_template_directory_uri()."/js/particles.js",array('jquery'),false,true);
	wp_enqueue_script("wow", get_template_directory_uri()."/js/wow.js",array('jquery'),false,true);
	wp_enqueue_script("magnific", get_template_directory_uri()."/js/magnific-popup/jquery.magnific-popup.js",array('jquery'),false,true);
    wp_enqueue_script("decades-js", get_template_directory_uri()."/js/script.js",array('jquery'),false,true);
}
add_action( 'wp_enqueue_scripts', 'decades_scripts' );


/**
 * Implement the Custom Meta Boxs.
 */
require get_template_directory() . '/framework/meta-boxes.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/framework/template-tags.php';
/**
 * Custom shortcode plugin visual composer.
 */
require_once get_template_directory() . '/shortcodes.php';
require_once get_template_directory() . '/vc_shortcode.php';
require_once get_template_directory() . '/framework/customizer.php';
/**
 * Customizer Menu.
 */
require get_template_directory() . '/framework/wp_bootstrap_navwalker.php';
/**
 * Enqueue Style
 */
require get_template_directory() . '/framework/color.php';
require get_template_directory() . '/framework/styling.php';


//Code Visual Composer.
// Add new Param in Row
if(function_exists('vc_add_param')){
	vc_add_param('vc_row', array(
								"type" => "dropdown",
								"heading" => esc_html__('Setup Full Width', 'decades'),
								"param_name" => "fullwidth",
								"value" => array(   
								                esc_html__('No', 'decades') => 'no',  
								                esc_html__('Yes', 'decades') => 'yes',                                                                                
								              ),
								"description" => esc_html__("Select Full width for row : yes or not, Default: No fullwidth", "decades"),      
					        )
    );
    vc_add_param('vc_row',array(
                              	"type" => "checkbox",
                              	"heading" => esc_html__('Setup Full Height', 'decades'),
                              	"param_name" => "fullheight",
                            ) 
    );
    vc_add_param('vc_row',array(
                              	"type" => "checkbox",
                              	"heading" => esc_html__('Background Parallax', 'decades'),
                              	"param_name" => "parallax_bg",     
                            ) 
    );
    vc_add_param('vc_row',array(
                              	"type" => "checkbox",
                              	"heading" => esc_html__('Particles', 'decades'),
                              	"param_name" => "particles",
                            ) 
    );

    // Add new Param in Column	
    vc_add_param('vc_column',array(
		  "type" => "dropdown",
		  "heading" => esc_html__('CSS Animation', 'decades'),
		  "param_name" => "animate",
		  "value" => array(   
							__('None', 'decades') => 'none', 
							__('Fade In Up', 'decades') => 'fadeinup', 
							__('Fade In Down', 'decades') => 'fadeindown', 
							__('Fade In', 'decades') => 'fadein', 
							__('Fade In Left', 'decades') => 'fadeinleft',  
							__('Fade In Right', 'decades') => 'fadinright',
						  ),
		  "description" => esc_html__("Select Animate , Default: None", 'decades'),      
		) 
    );
    vc_add_param('vc_column',array(
          "type" => "textfield",
          "heading" => esc_html__('Animation time delay number', 'decades'),
          "param_name" => "delay",
          "value" => "",
          "description" => esc_html__("Example : 0.2, 0.6, 1, etc", 'decades'), 
          "dependency"  => array( 'element' => 'animate', 'value' => array( 'fadeinup', 'fadeindown', 'fadein', 'fadeinleft', 'fadinright' ) ),     
        ) 
    );
    vc_add_param('vc_column',array(
          "type" => "textfield",
          "heading" => esc_html__('Animation time duration number', 'decades'),
          "param_name" => "duration",
          "value" => "",
          "description" => esc_html__("Example : 0.2, 0.6, 1, etc", 'decades'),   
          "dependency"  => array( 'element' => 'animate', 'value' => array( 'fadeinup', 'fadeindown', 'fadein', 'fadeinleft', 'fadinright' ) ),   
        ) 
    );

    // Add new Param in Column inner
    vc_add_param('vc_column_inner',array(
          "type" => "dropdown",
          "heading" => esc_html__('CSS Animation', 'decades'),
          "param_name" => "animate",
          "value" => array(   
                            esc_html__('None', 'decades') => 'none', 
                            esc_html__('Fade In Up', 'decades') => 'fadeinup', 
                            esc_html__('Fade In Down', 'decades') => 'fadeindown', 
                            esc_html__('Fade In', 'decades') => 'fadein', 
                            esc_html__('Fade In Left', 'decades') => 'fadeinleft',  
                            esc_html__('Fade In Right', 'decades') => 'fadeinright',
                          ),
          "description" => esc_html__("Select Animate , Default: None", 'decades'),      
        ) 
    );
    vc_add_param('vc_column_inner',array(
          "type" => "textfield",
          "heading" => esc_html__('Animation time delay number', 'decades'),
          "param_name" => "delay",
          "value" => "",
          "description" => esc_html__("Example : 0.2, 0.6, 1, etc", 'decades'), 
          "dependency"  => array( 'element' => 'animate', 'value' => array( 'fadeinup', 'fadeindown', 'fadein', 'fadeinleft', 'fadeinright' ) ),     
        ) 
    );
    vc_add_param('vc_column_inner',array(
          "type" => "textfield",
          "heading" => esc_html__('Animation time duration number', 'decades'),
          "param_name" => "duration",
          "value" => "",
          "description" => esc_html__("Example : 0.2, 0.6, 1, etc", 'decades'),   
          "dependency"  => array( 'element' => 'animate', 'value' => array( 'fadeinup', 'fadeindown', 'fadein', 'fadeinleft', 'fadeinright' ) ),   
        ) 
    );
}

if(function_exists('vc_remove_param')){
	vc_remove_param( "vc_row", "parallax" );
	vc_remove_param( "vc_row", "parallax_image" );
	vc_remove_param( "vc_row", "parallax_speed_bg" );
	vc_remove_param( "vc_row", "parallax_speed_video" );
	vc_remove_param( "vc_row", "full_width" );
	vc_remove_param( "vc_row", "full_height" );
	vc_remove_param( "vc_row", "video_bg" );
	vc_remove_param( "vc_row", "video_bg_parallax" );
	vc_remove_param( "vc_row", "video_bg_url" );
	vc_remove_param( "vc_row", "columns_placement" );
	vc_remove_param( "vc_row", "gap" );	
}	

/**
 * Require plugins install for this theme.
 *
 * @since Split Vcard 1.0
 */
require_once get_template_directory() . '/framework/plugin-requires.php';


add_action('wp_footer', 'add_custom_css');
function add_custom_css() { ?>
	<script>
		jQuery(document).ready(function($) {

			// $('.wp-video-shortcode').mediaelementplayer( {pauseOtherPlayers: false} );
			
			$(document).on('click', '.mejs-overlay-button', function(event) {
				//$('.mejs-overlay-play').trigger('click');
				$(this).hide();
				$(this).css('display', 'none !important');
				//console.log('click');
			});


		$(".vc_custom_1539741113090 a.ot-btn, .zypp-button a.ot-btn").click(function(e) {
			//console.log('cl');
		    e.preventDefault();
		    var aid = $(this).attr("href");
		    $('html,body').animate({scrollTop: $(aid).offset().top},'slow');
		});

		});
	</script>
	<style>
	#features .mockup-front {
		left: -110px; 
	}
	#features3 .mockup-front {
		left: -110px; 
	}
	.form-control {
    padding: 6px 12px;
}
.wp-video, video.wp-video-shortcode, .mejs-container, .mejs-overlay.load {
    width: 100% !important;
    height: 100% !important;
}
.mejs-container {
    padding-top: 56.25%;
}
.wp-video, video.wp-video-shortcode {
    max-width: 100% !important;
}
video.wp-video-shortcode {
    position: relative;
}
.mejs-mediaelement {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
}
.mejs-controls {
    display: none !important;
}
.mejs-overlay-play {
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    width: auto !important;
    height: auto !important;
}
.mejs-overlay-play {
	display: flex !important;
}

	#main_video .vc_column_container>.vc_column-inner {
	    padding-left: 0px;
	    padding-right: 0px;

	}
	.menu-footer-links-container {
		text-align: center;
	}
	.menu-footer-links-container ul {
		padding: 0;
    	margin-top: 50px;
	}
	.menu-footer-links-container ul li {
		list-style: none;
	}
	.top-footer .section-title .font-alt {
		display: none;
	}
	.zypp-button .dl-btn.btn-1
	,.zypp-button .dl-btn.btn-2
	/*,.zypp-button .dl-btn*/ 
	{
		display: none;
	}
	.vc_custom_1539741113090 .zypp-button .dl-btn {
		display: none;
	}

	.zypp-button .dl-btn {
		    border-top-left-radius: 100px;
    		border-bottom-left-radius: 100px;
    		border-top-right-radius: 100px;
    		border-bottom-right-radius: 100px;
		background-image: linear-gradient(to right, #99e1c6 0%, #8fd3f4 70%, #8bd3e9 100%);
	    border-width: 0px;
	    padding: 11px 22px;
	}
		#zypp_footer_address {
			color: #3a3939;
			display: flex;
		    align-items: center;
		    justify-content: center;
		}
		#zypp_footer_address h3 {
			color: #eee;
			text-transform: uppercase;
			font-size: 27px;
    		line-height: 37px;
		}
		#zypp_footer_address a {
			color: #3a3939;
		}
		.zypp_address {
			display: none;
		}
		.zypp_contact_form7 {
			display: none;
		}
		#zypp_map {
			display: none;
		}
		#news {
			display:none;
		}
		#zypp_video {
			display: none;
		}
		.top-footer {
		    background-color: initial;
		    background-image: url('https://zypp.me/wp-content/uploads/2018/09/Zypp_site_footer_green.png');
		}
		.intro-content {
		    padding-top: 300px;
		    padding-bottom: 0;
		}
		.pricing-features ul {
		    text-align: inherit;
		    padding: 16px 0 16px 15px;
		}
		.pricing-features li {
		    list-style: disc;
		    font-style: normal;
		}
		.price-btn {
		    text-align: inherit;
		}
		.vc_custom_1539847923361 {
		    padding-bottom: 0px !important;
		}
		@media only screen and (max-width: 993px) {
			.vc_custom_1539820091419,
			.vc_custom_1539820104501,
			.vc_custom_1539820116931 {
				margin-top: 0 !important;
			}
			.intro-mockup {
				margin-top: 100px;
			}
			.intro-content {
    			padding-top: 150px;
    		}
		}
		@media only screen and (max-width: 768px) {
			.vc_custom_1539820091419,
			.vc_custom_1539820104501,
			.vc_custom_1539820116931 {
				text-align: center;
			}
			#features2 .row {
				display: flex;
				flex-direction: column-reverse;
			}
			div.wpb_content_element.vc_custom_1539820104501 {
				margin-bottom: 50px;
			}
			.vc_custom_1539847923361 {
			    padding-bottom: 0px !important;
			}
			.vc_custom_1543554450814 {
			    margin-top: 0px !important;
			    text-align: center;
			}
			#features .mockup-front {
			    left: 0;
			}
			.vc_custom_1542695317176 {
			    margin-top: 0px !important;
			    margin-bottom: 40px !important;
			    text-align: center;
			}
			#features2 .mockup {
				left: 74px;
			}
			.vc_custom_1543525293941 {
			    margin-top: 0px !important;
			    margin-bottom: 40px !important;
			    text-align: center;
			}
			#features3 .mockup-front {
			    left: -50px;
			}
		}
	</style>
	<?php
}

add_filter( 'shortcode_atts_video', 'overwrite_video_atts_wpse', 10,3 );

function overwrite_video_atts_wpse( $out, $pairs, $atts )
{
    // force the autoplay video shortcode attribute to ON:
    $out['autoplay'] = 'on'; 

    // force the autoplay video shortcode attribute to OFF:
    //$out['autoplay'] = 0; 

    return $out;
}