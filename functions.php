<?php
/**
 * Envision NEXT Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Envision NEXT
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_ENVISION_NEXT_VERSION', '1.0.0' );

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	wp_enqueue_style( 'envision-next-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_ENVISION_NEXT_VERSION, 'all' );

}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );

function fix_avada_mime_types($mime){
	$mime['svg']='image/svg+xml';
	return $mime;
}
add_filter('upload_mimes', 'fix_avada_mime_types', 99);

include_once('inc/My_Search_Widget.php');

function my_simple_search_widget_scripts() {
	wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css' );
  }
  add_action( 'wp_enqueue_scripts', 'my_simple_search_widget_scripts' );
  