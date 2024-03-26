<?php
/**
 * Decades theme customizer
 *
 * @package Decades
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Decades_Customize {
	/**
	 * Customize settings
	 *
	 * @var array
	 */
	protected $config = array();

	/**
	 * The class constructor
	 *
	 * @param array $config
	 */
	public function __construct( $config ) {
		$this->config = $config;

		if ( ! class_exists( 'Kirki' ) ) {
			return;
		}

		$this->register();
	}

	/**
	 * Register settings
	 */
	public function register() {
		/**
		 * Add the theme configuration
		 */
		if ( ! empty( $this->config['theme'] ) ) {
			Kirki::add_config(
				$this->config['theme'], array(
					'capability'  => 'edit_theme_options',
					'option_type' => 'theme_mod',
				)
			);
		}

		/**
		 * Add panels
		 */
		if ( ! empty( $this->config['panels'] ) ) {
			foreach ( $this->config['panels'] as $panel => $settings ) {
				Kirki::add_panel( $panel, $settings );
			}
		}

		/**
		 * Add sections
		 */
		if ( ! empty( $this->config['sections'] ) ) {
			foreach ( $this->config['sections'] as $section => $settings ) {
				Kirki::add_section( $section, $settings );
			}
		}

		/**
		 * Add fields
		 */
		if ( ! empty( $this->config['theme'] ) && ! empty( $this->config['fields'] ) ) {
			foreach ( $this->config['fields'] as $name => $settings ) {
				if ( ! isset( $settings['settings'] ) ) {
					$settings['settings'] = $name;
				}

				Kirki::add_field( $this->config['theme'], $settings );
			}
		}
	}

	/**
	 * Get config ID
	 *
	 * @return string
	 */
	public function get_theme() {
		return $this->config['theme'];
	}

	/**
	 * Get customize setting value
	 *
	 * @param string $name
	 *
	 * @return bool|string
	 */
	public function get_option( $name ) {
		if ( ! isset( $this->config['fields'][$name] ) ) {
			return false;
		}

		$default = isset( $this->config['fields'][$name]['default'] ) ? $this->config['fields'][$name]['default'] : false;

		return get_theme_mod( $name, $default );
	}
}

/**
 * This is a short hand function for getting setting value from customizer
 *
 * @param string $name
 *
 * @return bool|string
 */
function decades_get_option( $name ) {
	global $decades_customize;

	if ( empty( $decades_customize ) ) {
		return false;
	}

	if ( class_exists( 'Kirki' ) ) {
		$value = Kirki::get_option( $decades_customize->get_theme(), $name );
	} else {
		$value = $decades_customize->get_option( $name );
	}

	return apply_filters( 'decades_get_option', $value, $name );
}

/**
 * Move some default sections to `general` panel that registered by theme
 *
 * @param object $wp_customize
 */
function decades_customize_modify( $wp_customize ) {
	$wp_customize->get_section( 'title_tagline' )->panel     = 'general';
	$wp_customize->get_section( 'static_front_page' )->panel = 'general';
}

add_action( 'customize_register', 'decades_customize_modify' );

/**
 * Customizer configuration
 */
$decades_customize = new Decades_Customize(
	array(
		'theme'    => 'decades',

		'panels'   => array(
			'general' => array(
				'priority' => 10,
				'title'    => esc_html__( 'General', 'decades' ),
			),
			'header'  => array(
				'priority' => 11,
				'title'    => esc_html__( 'Header', 'decades' ),
			),
			'socials'  => array(
				'priority' => 210,
				'title'    => esc_html__( 'Socials', 'decades' ),
			),
		),

		'sections' => array(

			// Panel Header
			'top_header'      => array(
				'title'       => esc_html__( 'Top Header', 'decades' ),
				'description' => '',
				'priority'    => 10,
				'capability'  => 'edit_theme_options',
				'panel'       => 'header',
			),
			'header'      => array(
				'title'       => esc_html__( 'Navigation', 'decades' ),
				'description' => '',
				'priority'    => 10,
				'capability'  => 'edit_theme_options',
				'panel'       => 'header',
			),
			'logo'        => array(
				'title'       => esc_html__( 'Site Logo', 'decades' ),
				'description' => '',
				'priority'    => 50,
				'capability'  => 'edit_theme_options',
				'panel'       => 'header',
			),
			'page_header' => array(
				'title'       => esc_html__( 'Page Header', 'decades' ),
				'description' => '',
				'priority'    => 15,
				'capability'  => 'edit_theme_options',
			),

			// Panel Socials
			'socials'      => array(
				'title'       => esc_html__( 'Socials', 'decades' ),
				'description' => '',
				'priority'    => 220,
				'capability'  => 'edit_theme_options',
			),

			
			// Panel Content
			'content'     => array(
				'title'       => esc_html__( 'Blog', 'decades' ),
				'description' => '',
				'priority'    => 240,
				'capability'  => 'edit_theme_options',
			),

			// Panel Projects
			'project'     => array(
				'title'       => esc_html__( 'Portfolio', 'decades' ),
				'description' => '',
				'priority'    => 240,
				'capability'  => 'edit_theme_options',
			),

			// Panel Footer
			'footer'     => array(
				'title'       => esc_html__( 'Footer', 'decades' ),
				'description' => '',
				'priority'    => 240,
				'capability'  => 'edit_theme_options',
			),

			// 404
			'error'     => array(
				'title'       => esc_html__( '404 Error', 'decades' ),
				'description' => '',
				'priority'    => 245,
				'capability'  => 'edit_theme_options',
			),


			// Panel Styling
			'styling'     => array(
				'title'       => esc_html__( 'Miscellaneous', 'decades' ),
				'description' => '',
				'priority'    => 250,
				'capability'  => 'edit_theme_options',
			),
		),

		'fields'   => array(
			'sticky'     => array(
				'type'     => 'toggle',
				'label'    => esc_html__( 'Sticky Header', 'decades' ),
				'section'  => 'header',
				'default'  => '1',
				'priority' => 10,
			),
			'bg_menu'    => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Background Main Menu', 'decades' ),
				'section'  => 'header',
				'default'  => '',
				'priority' => 10,
			),
			'color_menu'    => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Color Text Menu', 'decades' ),
				'section'  => 'header',
				'default'  => '',
				'priority' => 10,
			),
			'bg_smenu'    => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Background Scroll Menu', 'decades' ),
				'section'  => 'header',
				'default'  => '',
				'priority' => 10,
				'active_callback' => array(
				 	array(
					  	'setting'  => 'sticky',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			'color_smenu'    => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Color Text Scroll Menu', 'decades' ),
				'section'  => 'header',
				'default'  => '',
				'priority' => 10,
				'active_callback' => array(
				 	array(
					  	'setting'  => 'sticky',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			

			// Logo
			'logo'           => array(
				'type'     => 'image',
				'label'    => esc_html__( 'Logo', 'decades' ),
				'section'  => 'logo',
				'default'  => '',
				'priority' => 10,
			),
			'logo_width'     => array(
				'type'     => 'number',
				'label'    => esc_html__( 'Logo Width', 'decades' ),
				'section'  => 'logo',
				'default'  => '',
				'priority' => 10,
			),
			'logo_height'    => array(
				'type'     => 'number',
				'label'    => esc_html__( 'Logo Height', 'decades' ),
				'section'  => 'logo',
				'default'  => '',
				'priority' => 10,
			),
			'logo_position'  => array(
				'type'     => 'spacing',
				'label'    => esc_html__( 'Logo Margin', 'decades' ),
				'section'  => 'logo',
				'priority' => 10,
				'default'  => array(
					'top'    => '0',
					'bottom' => '0',
					'left'   => '0',
					'right'  => '0',
				),
			),

			'logo_2'           => array(
				'type'     => 'image',
				'label'    => esc_html__( 'Logo Scroll', 'decades' ),
				'section'  => 'logo',
				'default'  => '',
				'priority' => 10,
			),
			'logo_2_width'     => array(
				'type'     => 'number',
				'label'    => esc_html__( 'Logo Scroll Width', 'decades' ),
				'section'  => 'logo',
				'default'  => '',
				'priority' => 10,
			),
			'logo_2_height'    => array(
				'type'     => 'number',
				'label'    => esc_html__( 'Logo Scroll Height', 'decades' ),
				'section'  => 'logo',
				'default'  => '',
				'priority' => 10,
			),
			'logo_2_position'  => array(
				'type'     => 'spacing',
				'label'    => esc_html__( 'Logo Scroll Margin', 'decades' ),
				'section'  => 'logo',
				'priority' => 10,
				'default'  => array(
					'top'    => '0',
					'bottom' => '0',
					'left'   => '0',
					'right'  => '0',
				),
			),
			

			// Page Header
			'page_header'    => array(
				'type'        => 'toggle',
				'label'       => esc_html__( 'Page Header', 'decades' ),
				'description' => esc_html__( 'Enable to show page header on whole site', 'decades' ),
				'section'     => 'page_header',
				'default'     => '1',
				'priority'    => 10,
			),
			'ph_height'    => array(
				'type'     => 'number',
				'label'    => esc_html__( 'Height (px)', 'decades' ),
				'section'  => 'page_header',
				'default'  => '300',
				'priority' => 10,
				'active_callback' => array(
				 	array(
					  	'setting'  => 'page_header',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			'page_header_bg' => array(
				'type'        => 'image',
				'label'       => esc_html__( 'Background Image', 'decades' ),
				'description' => esc_html__( 'Upload a page header background image', 'decades' ),
				'section'     => 'page_header',
				'default'     => '',
				'priority'    => 10,
				'active_callback' => array(
				 	array(
					  	'setting'  => 'page_header',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),

			// Content
			'blog_layout'  => array(
				'type'     => 'radio-image',
				'label'    => esc_html__( 'Blog List Layout', 'decades' ),
				'section'  => 'content',
				'default'  => 'default',
				'priority' => 10,
				'choices'  => array(
					'default' 	=> get_template_directory_uri() . '/framework/admin/images/right.png',
					'left-bar' 	=> get_template_directory_uri() . '/framework/admin/images/left.png',
					'no-bar' 	=> get_template_directory_uri() . '/framework/admin/images/full.png',
				),
			),
			'post_layout'  => array(
				'type'     => 'radio-image',
				'label'    => esc_html__( 'Single Blog Layout', 'decades' ),
				'section'  => 'content',
				'default'  => 'default',
				'priority' => 10,
				'choices'  => array(
					'default' 	=> get_template_directory_uri() . '/framework/admin/images/right.png',
					'left-bar' 	=> get_template_directory_uri() . '/framework/admin/images/left.png',
					'no-bar' 	=> get_template_directory_uri() . '/framework/admin/images/full.png',
				),
			),
			'title_single' => array(
				'type'    		=> 'text',
				'label'   		=> esc_html__( 'Title Header Single', 'decades' ),
				'section' 		=> 'content',
				'default' 		=> '',
				'priority'    	=> 12,
			),
			'read_more' => array(
				'type'    		=> 'text',
				'label'   		=> esc_html__( 'Read More Button', 'decades' ),
				'section' 		=> 'content',
				'default' 		=> '',
				'priority'    	=> 12,
			),
			'excerpt_length' => array(
				'type'    => 'number',
				'label'   => esc_html__( 'Excerpt Length', 'decades' ),
				'section' => 'content',
				'default' => 50,
				'choices' => array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				),
			),


			//Footer
			'w_footer'     => array(
				'type'        => 'toggle',
				'label'       => esc_html__( 'Footer Socials', 'decades' ),
				'section'     => 'footer',
				'default'     => '1',
				'priority'    => 10,
			),
			'f_title' => array(
				'type'    		=> 'text',
				'label'   		=> esc_html__( 'Title (Follow US)', 'decades' ),
				'section' 		=> 'footer',
				'default' 		=> '',
				'priority'    	=> 10,
				'active_callback' => array(
					array(
					  	'setting'  => 'w_footer',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			't_stitle' => array(
				'type'    		=> 'text',
				'label'   		=> esc_html__( 'Subtitle (get connect with us)', 'decades' ),
				'section' 		=> 'footer',
				'default' 		=> '',
				'priority'    	=> 10,
				'active_callback' => array(
					array(
					  	'setting'  => 'w_footer',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			'f_socials'     => array(
				'type'     => 'repeater',
				'label'    => esc_html__( 'Socials', 'decades' ),
				'section'  => 'footer',
				'priority' => 10,
				'default'  => array(),
				'fields'   => array(
					'icon' => array(
						'type'        => 'text',
						'label'       => esc_html__( 'Icon Class', 'decades' ),
						'description' => esc_html__( 'This will be the social icon: http://fontawesome.io/icons/', 'decades' ),
						'default'     => '',
					),
					'link' => array(
						'type'        => 'text',
						'label'       => esc_html__( 'Link URL', 'decades' ),
						'description' => esc_html__( 'This will be the social link', 'decades' ),
						'default'     => '',
					),
					'name' => array(
						'type'        => 'text',
						'label'       => esc_html__( 'Name', 'decades' ),
						'description' => esc_html__( 'This will be the social name', 'decades' ),
						'default'     => '',
					),
				),
				'active_callback' => array(
					array(
					  	'setting'  => 'w_footer',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			'bg_bottom'    => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Background Footer', 'decades' ),
				'section'  => 'footer',
				'default'  => '',
				'priority' => 10,
			),
			'color_bottom' => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Color Text Footer', 'decades' ),
				'section'  => 'footer',
				'default'  => '',
				'priority' => 10,
			),
			'copy_right'      => array(
				'type'        => 'code',
				'label'       => esc_html__( 'Copy Right Text', 'decades' ),
				'section'     => 'footer',
				'default'     => '',
				'priority'    => 10,
			),

			// 404
			'h_error'      => array(
				'type'     => 'number',
				'label'    => esc_html__( 'Height', 'decades' ),
				'section'  => 'error',
				'default'  => '600',
				'priority' => 10,
			),
			'bgi_error'    => array(
				'type'     => 'image',
				'label'    => esc_html__( 'Background Image', 'decades' ),
				'section'  => 'error',
				'default'  => '',
				'priority' => 10,
			),
			'bgc_error'    => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Background Color', 'decades' ),
				'section'  => 'error',
				'default'  => '',
				'priority' => 10,
			),
			'c_error'      => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Text Color', 'decades' ),
				'section'  => 'error',
				'default'  => '',
				'priority' => 10,
			),
			

			//Styling
			'preload'     => array(
				'type'        => 'toggle',
				'label'       => esc_html__( 'Preloader', 'decades' ),
				'section'     => 'styling',
				'default'     => '1',
				'priority'    => 10,
			),
			'api_map'      => array(
				'type'     => 'text',
				'label'    => esc_html__( 'API Google Map', 'decades' ),
				'section'  => 'styling',
				'default'  => 'AIzaSyAvpnlHRidMIU374bKM5-sx8ruc01OvDjI',
				'priority' => 10,
			),
			'img_load'     => array(
				'type'     => 'image',
				'label'    => esc_html__( 'Preloader Image', 'decades' ),
				'section'  => 'styling',
				'default'  => '',
				'priority' => 10,
				'active_callback' => array(
					array(
					  	'setting'  => 'preload',
					  	'operator' => '==',
					  	'value'    => 1,
				 	),
				),
			),
			'main_color'    => array(
				'type'     => 'color',
				'label'    => esc_html__( 'Primary Color', 'decades' ),
				'section'  => 'styling',
				'default'  => '#ffd200',
				'priority' => 10,
			),
			'custom_css'     => array(
				'type'        => 'code',
				'label'       => esc_html__( 'Custom Code', 'decades' ),
				'description' => esc_html__( 'Add more js, css, html... code here.', 'decades' ),
				'section'     => 'styling',
				'default'     => '',
				'priority'    => 10,
			),
		),
	)
);