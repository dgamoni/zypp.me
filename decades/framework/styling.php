<?php 

//Custom Style Frontend
if(!function_exists('decades_custom_frontend_style')){
    function decades_custom_frontend_style(){
    	$style_css 	= '';
        $sti 	    = '';
        $bg_h       = '';
        $bg_sm      = '';
        $color_sm   = '';
        $color_m    = '';

        $bg_pheader = '';
        $h_pheader  = '';

        $logo_mar 	= '';
        $logo_w 	= '';
        $logo_h 	= '';
        $logo2_mar  = '';
        $logo2_w    = '';
        $logo2_h    = '';

        $bg_bt		= '';
        $color_bt	= '';

        $bgi_error  = '';
        $bgc_error  = '';
        $c_error    = '';
        $h_error 	= '';


        //Header
        if(!decades_get_option('sticky')){
            $sti = '.header{ position: absolute!important; }';
        }

        if(decades_get_option('bg_menu')){
        	$bg_h = '.header{ background: '.decades_get_option('bg_menu').'; }';
        }
        if(decades_get_option('color_menu')){
        	$color_m = '.main-nav-inner li a{ color: '.decades_get_option('color_menu').'; }';
        }
        if(decades_get_option('bg_smenu')){
            $bg_sm = '.header.stuck{ background: '.decades_get_option('bg_smenu').'; border-color: '.decades_get_option('bg_smenu').'; }';
        }
        if(decades_get_option('color_smenu')){
            $color_sm = '.header.stuck .main-nav-inner li a{ color: '.decades_get_option('color_smenu').'; }';
        }

        //Logo
        if(decades_get_option('logo_width')){
            $logo_w = '.header .logo img { width: '.decades_get_option('logo_width').'px; }';
        }
        if(decades_get_option('logo_height')){
            $logo_h = '.header .logo img { height: '.decades_get_option('logo_height').'px; }';
        }
        if(decades_get_option('logo_position')){
            $space = decades_get_option('logo_position');
            $logo_mar = 'h1.logo { margin: '.$space["top"].' '.$space["right"].' '.$space["bottom"].' '.$space["left"].'; }';
        }
        //Logo Smaller
        if(decades_get_option('logo_2_width')){
            $logo2_w = '.header.stuck .logo img { width: '.decades_get_option('logo_2_width').'px; }';
        }
        if(decades_get_option('logo_2_height')){
            $logo2_h = '.header.stuck .logo img { height: '.decades_get_option('logo_2_height').'px; }';
        }
        if(decades_get_option('logo_2_position')){
            $space2 = decades_get_option('logo_2_position');
            $logo2_mar = '.header.stuck h1.logo { margin: '.$space2["top"].' '.$space2["right"].' '.$space2["bottom"].' '.$space2["left"].'; }';
        }

        //Page Header
        if(decades_get_option('page_header_bg')){
            $bg_pheader = '#subheader{ background-image: url('.decades_get_option('page_header_bg').'); }';
        }
        if(decades_get_option('ph_height')){
            $h_pheader = '.rich-header{ height:'.decades_get_option('ph_height').'px; }';
        }

        //404
        if(decades_get_option('h_error')){
            $h_error = 'section.bg-error{ height: '.decades_get_option('h_error').'px; }';
        }
        if(decades_get_option('bgi_error')){
            $bgi_error = 'section.bg-error{ background-image: url('.decades_get_option('bgi_error').'); }';
        }
        if(decades_get_option('bgc_error')){
            $bgc_error = 'section.bg-error{ background-color: '.decades_get_option('bgc_error').'; }';
        }
        if(decades_get_option('c_error')){
            $c_error = 'section.bg-error *{ color: '.decades_get_option('c_error').'; }';
        }

        //Footer
        if(decades_get_option('bg_bottom')){
        	$bg_bt = 'footer, .top-footer{ background: '.decades_get_option('bg_bottom').'; }';
        }
        if(decades_get_option('color_bottom')){
        	$color_bt = '.copyright, .top-footer, .top-footer a, .top-footer h2{ color: '.decades_get_option('color_bottom').'; }';
        }


        $style_css .= decades_get_option('custom_css');
        $style_css .= $sti;
        $style_css .= $bg_h;
        $style_css .= $color_m;
        $style_css .= $bg_sm;
        $style_css .= $color_sm;

        $style_css .= $logo_w;
        $style_css .= $logo_h;
        $style_css .= $logo_mar;
        $style_css .= $logo2_w;
        $style_css .= $logo2_h;
        $style_css .= $logo2_mar;

        $style_css .= $bgi_error;
        $style_css .= $bgc_error;
        $style_css .= $c_error;
        $style_css .= $h_error;

        $style_css .= $bg_bt;
        $style_css .= $color_bt;

        $style_css .= $bg_pheader;
        $style_css .= $h_pheader;

        if(! empty($style_css)){
			echo '<style type="text/css">'.$style_css.'</style>';
		}
    }
}
add_action('wp_head', 'decades_custom_frontend_style');