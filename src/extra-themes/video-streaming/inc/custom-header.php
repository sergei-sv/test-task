<?php
/**
 * @package Video Streaming
 * @subpackage video-streaming
 * @since video-streaming 1.0
 * Setup the WordPress core custom header feature.
 * @uses video_streaming_header_style()
*/

function video_streaming_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'video_streaming_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1400,
		'height'                 => 70,
		'flex-width'         	=> true,
        'flex-height'        	=> true,
		'wp-head-callback'       => 'video_streaming_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'video_streaming_custom_header_setup' );

if ( ! function_exists( 'video_streaming_header_style' ) ) :

add_action( 'wp_enqueue_scripts', 'video_streaming_header_style' );
function video_streaming_header_style() {
	if ( get_header_image() ) :
	$video_streaming_custom_css = "
        .bottom-header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
			background-size: 100% 100%;
		}";
	   	wp_add_inline_style( 'video-streaming-basic-style', $video_streaming_custom_css );
	endif;
}
endif;