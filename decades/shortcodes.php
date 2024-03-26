<?php 

// Background Video
add_shortcode('bgvideo', 'bgvideo_func');
function bgvideo_func($atts, $content = null){
	extract(shortcode_atts(array(
		'video'		=>	'',	
	), $atts));
	ob_start(); ?>

	<a id="bgndVideo" class="player" data-property="{videoURL:'<?php echo esc_url($video); ?>'}"></a>
    	
<?php
    return ob_get_clean();
}

// Button
add_shortcode('otbutton','otbutton_func');
function otbutton_func($atts, $content = null){
	extract(shortcode_atts(array(
		'btn'		=>	'',
		'style'		=>	'dl-btn',
	), $atts));
		$url 	= vc_build_link( $btn );
		$flo    = '';
		if($float){ $flo = 'pull-right'; }
	ob_start(); 
?>

    <?php if ( strlen( $btn ) > 0 && strlen( $url['url'] ) > 0 ) {
		echo '<a class="ot-btn'. esc_attr(' '.$style) . '" href="' . esc_attr( $url['url'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '">' . htmlspecialchars_decode( $url['title'] ) .'</a>';
	} ?>
  	
<?php
    return ob_get_clean();
}

// Icon box
add_shortcode('servicesbox', 'servicesbox_func');
function servicesbox_func($atts, $content = null){
	extract(shortcode_atts(array(
		'icon'		=>	'',
		'title'		=>	'',
		'style'		=>	'right',
	), $atts));

	ob_start(); ?>

    <div class="icon-box <?php echo esc_attr($style); ?> mb-sm-25 mb-xs-25">
								
		<div class="icon-<?php echo esc_attr($style); ?>">
			<i class="<?php echo esc_attr($icon); ?>"></i>
		</div>
		
		<div class="icon-box-content">
			<h5><?php echo htmlspecialchars_decode($title); ?></h5>
			<?php echo htmlspecialchars_decode($content); ?>
		</div>
		
	</div>

<?php
    return ob_get_clean();
}


// Member Team
add_shortcode('member','member_func');
function member_func($atts, $content = null){
	extract(shortcode_atts(array(
		'photo'		=>	'',
		'name'		=>	'',
		'job'		=>	'',
		'social'	=>	'',
	), $atts));
		$img 	 = wp_get_attachment_image_src($photo,'full');
		$img 	 = $img[0];
		$url 	 = vc_build_link( $btn );
		$socials = (array) vc_param_group_parse_atts( $social );
	ob_start(); 
?>

	<div class="team-member mb-sm-30 mb-xs-30">
		<div class="team-img">
			<img src="<?php echo esc_url($img); ?>" alt="" />
			<div class="team-social">
				<ul>
					<?php foreach ( $socials as $soc ) : if($soc) : ?>
						<li>
							<a href="<?php echo esc_url($soc['link']); ?>"><i class="<?php echo esc_attr($soc['icon']); ?>"></i></a>
						</li>
					<?php endif; endforeach; ?>
				</ul>
			</div>
		</div>
		<div class="team-member-info">
			<h5><?php echo htmlspecialchars_decode($name); ?></h5>
			<p><?php echo htmlspecialchars_decode($job); ?></p>
		</div>
	</div>

<?php
    return ob_get_clean();
}


// Testimonial Silder
add_shortcode('testslide','testslide_func');
function testslide_func($atts, $content = null){
	extract(shortcode_atts(array(
		'testi'		=>	'',
		'light'		=>	'',
	), $atts));
	$test = (array) vc_param_group_parse_atts( $testi );
	ob_start(); 
?>

	<div class="testimonial-slider">
		<?php foreach ( $test as $tes ) { 
			$img  = wp_get_attachment_image_src($tes['photo'],'full');
			$img  = $img[0];
		?>
		<div class="slider-item">
			<blockquote>
				<?php if($img) { ?>
				<div class="author-img">
					<img src="<?php echo esc_url($img); ?>" alt="" />
				</div>
				<?php } ?>
				<p><?php echo htmlspecialchars_decode($tes['text']); ?></p>
				<footer>
					<cite><?php echo esc_html($tes['name']); ?></cite>
					<h6><?php echo esc_html($tes['job']); ?></h6>
				</footer>
			</blockquote>
		</div>
        <?php } ?>
    </div>

<?php
    return ob_get_clean();
}


// Pricing Table
add_shortcode('table', 'table_func');
function table_func($atts, $content = null){
	extract(shortcode_atts(array(
		'cur'		=>	'',
		'title'		=>	'',
		'feature'	=>	'',
		'linkbox'	=>	'',
		'price'		=>	'',
		'per'		=>	'',
	), $atts)); 
		$url 	= vc_build_link( $linkbox );
	ob_start(); ?>

	<div class="pricing <?php if($feature) echo 'active'; ?>">
								
		<!--=== start pricing-title ===-->
		<h3 class="pricing-title"><?php echo htmlspecialchars_decode($title); ?></h3>
		<!--=== end pricing-title ===-->
		
		<!--=== start pricing-price ===-->
		<div class="pricing-price">
			<span class="currency"><?php echo htmlspecialchars_decode($cur); ?></span>
			<span class="price"><?php echo htmlspecialchars_decode($price); ?></span>
			<span class="period"><?php echo htmlspecialchars_decode($per); ?></span>
		</div>
		<!--=== end pricing-price ===-->
		
		<!--=== start pricing-features ===-->
		<div class="pricing-features">
			<?php echo htmlspecialchars_decode($content); ?>
		</div>
		<!--=== end pricing-features ===-->
		
		<!--=== start pricing-btn ===-->
		<div class="price-btn">
			<?php if ( strlen( $linkbox ) > 0 && strlen( $url['url'] ) > 0 ) {
				echo '<p><a class="btn btn-ellipse" href="' . esc_attr( $url['url'] ) . '" target="' . ( strlen( $url['target'] ) > 0 ? esc_attr( $url['target'] ) : '_self' ) . '">' . esc_attr( $url['title'] ).'</a></p>';
			} ?>
		</div>
		<!--=== ejd pricing-btn ===-->
		
	</div>

<?php
    return ob_get_clean();
}

//FAQs
add_shortcode('otfaqs','otfaqs_func');
function otfaqs_func($atts, $content = null){
	extract(shortcode_atts(array(
		'faqs'		=>	'',
	), $atts));
		$faqs = (array) vc_param_group_parse_atts( $faqs );
	ob_start(); 
?>
    <?php foreach ( $faqs as $faq ) { ?>
    <div class="accordion wow fadeInUp" data-wow-delay="0.2s">
									
		<!--=== start accordion-title ===-->
		<div class="accordion-title">
			<a href=""><?php echo htmlspecialchars_decode($faq['title']); ?></a>
		</div>
		<!--=== end accordion-title ===-->
		
		<!--=== start accordion-content ===-->
		<div class="accordion-content"><?php echo htmlspecialchars_decode($faq['des']); ?></div>
		<!--=== end accordion-content ===-->
		
	</div>
	<?php } ?>

<?php
    return ob_get_clean();
}

// Popup Video
add_shortcode('popupvideo', 'popupvideo_func');
function popupvideo_func($atts, $content = null){
	extract(shortcode_atts(array(
		'title'		=>	'',
		'link'		=>	'',
	), $atts));

	ob_start(); ?>

	<div class="video wow slideInUp" data-wow-delay="0.2s">
								
		<a href="<?php echo esc_url($link); ?>" class="play-btn video-popup"><img src="<?php echo get_template_directory_uri(); ?>/images/assets/play-btn.png" alt="" /></a>
	
		<?php if($title) { ?><h1 class="mtb-25 text-white text-uppercase"><?php echo htmlspecialchars_decode($title); ?></h1><?php } ?>
		
		<?php if($content) { ?><p class="text-white text-bold"><?php echo htmlspecialchars_decode($content); ?></p><?php } ?>
		
	</div>

<?php
    return ob_get_clean();
}


// Lastest Blog
add_shortcode('lastest_blog','lastest_blog_func');
function lastest_blog_func($atts, $content = null){
	extract(shortcode_atts(array(
		'number'	=>	'6',
		'cols'		=>	'3',
	), $atts));

	ob_start(); 
?>
	<div id="blog-carousel" class="blog-list blog-carousel">
	<?php		
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => $number,
		);
		$blogpost = new WP_Query($args);
		if($blogpost->have_posts()) : while($blogpost->have_posts()) : $blogpost->the_post();
		$format = get_post_format();
	?>

	<div class="news">
		<?php if ( has_post_thumbnail() ) { ?>							
		<!--=== start news-thumb ===-->
		<a href="<?php the_permalink(); ?>">
            <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id()); ?>" alt="">
        </a> 
		<!--=== end news-thumb ===-->
		<?php } ?>
		
		<!--=== start news-preview ===-->
		<div class="news-preview">
			
			<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
			
			<p><?php echo decades_excerpt(22); ?></p>
			
			<div class="news-meta">
				<div class="date"><?php the_time( get_option( 'date_format' ) ) ?></div>
				<?php $rm   = decades_get_option('read_more') ? decades_get_option('read_more') : esc_html__('Read More', 'decades'); ?>
				<div class="read-more"><a href="<?php the_permalink(); ?>"><?php echo esc_html($rm); ?></a></div>
			</div>
			
		</div>
		<!--=== end news-preview ===-->
		
	</div>

	<?php endwhile; wp_reset_postdata(); endif; ?>
	</div>

	<script>
		(function($) { "use strict";

			$("#blog-carousel").owlCarousel({
				items: <?php echo esc_js($cols); ?>,
				itemsDesktop      : [1199,<?php echo esc_js($cols); ?>],
			    itemsDesktopSmall     : [979,<?php echo esc_js($cols); ?> - 1],
			    itemsTablet       : [768,1],
			    itemsMobile       : [479,1],
				navigation: false,
				pagination: false
			}); 

		})(jQuery); 
	</script>

<?php
    return ob_get_clean();
}


// Showcase
add_shortcode('clients','clients_func');
function clients_func($atts, $content = null){
	extract(shortcode_atts(array(
		'gallery'		=> 	'',
		'num'		  	=>	'5',	
	), $atts));
		$img = wp_get_attachment_image_src($gallery,'full');
		$img = $img[0];
	ob_start(); ?>
        	
		<div class="showcase-slider">
			<?php 
				$img_ids = explode(",",$gallery);
				foreach( $img_ids AS $img_id ){
				$image_src = wp_get_attachment_image_src($img_id,''); 
			?>				
			<div class="slider-item">
			
				<img src="<?php echo esc_url($image_src[0]); ?>" alt="" />
				
				<div class="overlay"><a href="<?php echo esc_url($image_src[0]); ?>" class="popup-btn"></a></div>
				
			</div>
			<?php } ?>
		</div>

		<script>
			(function($) { "use strict";	

				var showcaseSlider = $(".showcase-slider");
			    showcaseSlider.owlCarousel({
					items: <?php echo esc_js($num); ?>,
			        itemsDesktop      : [1199,<?php echo esc_js($num); ?>],
			        itemsDesktopSmall     : [979,<?php echo esc_js($num); ?> - 1],
			        itemsTablet       : [768,3],
			        itemsMobile       : [479,2],
			        navigation: false,
			        pagination: true

			    });

			})(jQuery); 
		</script>

<?php
    return ob_get_clean();	
}

//Google Map

add_shortcode('maps','maps_func');
function maps_func($atts, $content = null){
	extract(shortcode_atts(array(
		'height'	 	 => '450px',
		'imgmap'	 	 => '',
		'tooltip'	 	 => '',
		'latitude'		 => '',
		'longitude'	 	 => '',
		'zoom'		 	 => '',
	), $atts));
	$id = 'map-canvas-'.(rand(10,10000));
	ob_start(); ?>
	<?php 
		$img = wp_get_attachment_image_src($imgmap,'full');
		$img = $img[0];
		if(!$zoom){
			$zoom = 13;
		}
	 ?>

	<div id="<?php echo esc_attr($id); ?>" class="map-warp" style="<?php if($height) echo 'height: '.esc_attr($height).';';?>"></div>

	<script>
	(function($) { "use strict";
		var mapOptions = {
        zoom: <?php echo esc_js($zoom); ?>,
        scrollwheel: false,
        center: new google.maps.LatLng(<?php echo esc_js($latitude); ?>, <?php echo esc_js($longitude); ?>, 20.75),
        styles: [{
            "featureType": "water",
            "elementType": "geometry.fill",
            "stylers": [{
                "color": "#d3d3d3"
            }]
        },
            {
                "featureType": "transit",
                "stylers": [{
                    "color": "#808080"
                },
                    {
                        "visibility": "off"
                    }
						   ]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry.stroke",
                "stylers": [{
                    "visibility": "on"
				},
                    {
                        "color": "#b3b3b3"
                    }
						   ]
            },
            {
                "featureType": "road.highway",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#ffffff"
                }]
            },
            {
                "featureType": "road.local",
                "elementType": "geometry.fill",
                "stylers": [{
					"visibility": "on"
				},
                    {
                        "color": "#ffffff"
                    },
                    {
                        "weight": 1.8
                    }
						   ]
            },
            {
                "featureType": "road.local",
                "elementType": "geometry.stroke",
                "stylers": [{
                    "color": "#d7d7d7"
                }]
            },
            {
                "featureType": "poi",
                "elementType": "geometry.fill",
                "stylers": [{
					"visibility": "on"
				},
                    {
                        "color": "#ebebeb"
                    }
						   ]
            },
            {
                "featureType": "administrative",
                "elementType": "geometry",
                "stylers": [{
                    "color": "#a7a7a7"
                }]
            },
            {
                "featureType": "road.arterial",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#ffffff"
                }]
            },
            {
                "featureType": "road.arterial",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#ffffff"
                }]
            },
            {
                "featureType": "landscape",
                "elementType": "geometry.fill",
                "stylers": [{
					"visibility": "on"
				},
                    {
                        "color": "#efefef"
                    }
						   ]
            },
            {
                "featureType": "road",
                "elementType": "labels.text.fill",
                "stylers": [{
                    "color": "#696969"
                }]
            },
            {
                "featureType": "administrative",
                "elementType": "labels.text.fill",
                "stylers": [{
					"visibility": "on"
				},
                    {
                        "color": "#737373"
                    }
						   ]
            },
            {
                "featureType": "poi",
                "elementType": "labels.icon",
                "stylers": [{
                    "visibility": "off"
                }]
            },
            {
                "featureType": "poi",
                "elementType": "labels",
                "stylers": [{
                    "visibility": "off"
                }]
            },
            {
                "featureType": "road.arterial",
                "elementType": "geometry.stroke",
                "stylers": [{
                    "color": "#d6d6d6"
                }]
            },
            {
                "featureType": "road",
                "elementType": "labels.icon",
                "stylers": [{
                    "visibility": "off"
                }]
            },
            {},
            {
                "featureType": "poi",
                "elementType": "geometry.fill",
                "stylers": [{
                    "color": "#dadada"
                }]
            }
				]
    };
	
    var mapElement = document.getElementById('<?php echo esc_attr($id); ?>'),
		map = new google.maps.Map(mapElement, mapOptions),
		marker = new google.maps.Marker({
			position: new google.maps.LatLng(<?php echo esc_js($latitude); ?>, <?php echo esc_js($longitude); ?>, 20.75),
			map: map,
			title: '',
			icon: '<?php echo esc_url($img); ?>'
		});
	})(jQuery); 

	</script>

	<?php

    return ob_get_clean();

}