<?php

if (!function_exists('FoundationPress_scripts')) :
  function FoundationPress_scripts() {

    // deregister the jquery version bundled with wordpress
    wp_deregister_script( 'jquery' );

    // register scripts
    wp_register_script( 'modernizr', get_template_directory_uri() . '/js/modernizr/modernizr.min.js', array(), '1.0.0', false );
    wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery/dist/jquery.min.js', array(), '1.0.0', false );
    wp_register_script( 'foundation', get_template_directory_uri() . '/js/app.js', array('jquery'), '1.0.0', true );

    // enqueue scripts
    wp_enqueue_script('modernizr');
    wp_enqueue_script('jquery');
    wp_enqueue_script('foundation');

  }

  add_action( 'wp_enqueue_scripts', 'FoundationPress_scripts' );
endif;

function FoundationPress_styles() {
    global $post;
	$custom_css = "";	
	wp_enqueue_style(
		'FoundationPress_styles',
		get_stylesheet_uri()
	);
	if ( has_post_thumbnail( $post->ID ) ) {
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
		$custom_css .= "	
				#header-banner {
					background: url($image[0]);
					background-size: cover;
				}";
	}

    if ( $custom_css ) 	wp_add_inline_style( 'FoundationPress_styles', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'FoundationPress_styles' );
?>
