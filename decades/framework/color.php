<?php 

//Custom Style Frontend
if(!function_exists('decades_color_scheme')){
    function decades_color_scheme(){
        $main_color = '';

        //Main Color
        if(decades_get_option('main_color')){
            $main_color = 
            '
			.btn-ellipse:before, .btn-ellipse:after,
			.btn-ellipse:hover,
			button:focus,button:active:focus,button.active:focus,button.focus,button:active.focus,button.active.focus,button:active, .btn.active,
			.btn:focus, .btn:active:focus, .btn.active:focus, .btn.focus, .btn:active.focus, .btn.active.focus, .btn:active, .btn.active,
			.icon-top:before, .icon-left:before, .icon-right:before, .icon-top:after, .icon-left:after, .icon-right:after,
			.icon-box:hover .icon-top, .icon-box:hover .icon-left, .icon-box:hover .icon-right,
			.team-social ul li a
			{background-color: '.decades_get_option('main_color').';}

			.btn-ellipse:hover, 
			button:focus,button:active:focus,button.active:focus,button.focus,button:active.focus,button.active.focus,button:active, .btn.active, 
			.btn:focus, .btn:active:focus, .btn.active:focus, .btn.focus, .btn:active.focus, .btn.active.focus, .btn:active, .btn.active
			{border-color: '.decades_get_option('main_color').';}			

			a:hover, 
			a:focus, 
			.dl-btn:focus, .dl-btn:active, .dl-btn:hover, 
			.icon-box a:hover, 
			.read-more a:after, 
			.read-more a:hover, 
			.sidebar .widget li a:hover{color: '.decades_get_option('main_color').';}
			';
        }

        if(! empty($main_color)){
			echo '<style type="text/css">'.$main_color.'</style>';
		}
    }
}
add_action('wp_head', 'decades_color_scheme');