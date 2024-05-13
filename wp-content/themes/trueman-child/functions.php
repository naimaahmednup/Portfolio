<?php
/**
 * trueman-child functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package trueman-child
 */

/**
 * Load the parent style.css and child styles.css file
 */
function trueman_child_stylesheets() {
  // Dynamically get version number of the parent stylesheet
  $parent_style = 'trueman-style';
  $parent_dep = array( 'bootstrap', 'trueman-fontawesome', 'swiper', 'magnific-popup' );
  $child_style = 'trueman-child-style';
  $rtl_style = 'trueman-rtl';
  $version = wp_get_theme()->get('Version');

  // Load the main stylesheet
  wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css', $parent_dep );

  if ( is_rtl() ) {
	// Load the rtl stylesheet
	wp_enqueue_style( $rtl_style, get_template_directory_uri() . '/rtl.css', array( $parent_style ), $version );

	// Load the child stylesheet
	wp_enqueue_style( $child_style, get_stylesheet_directory_uri() . '/style.css', array( $parent_style, $rtl_style ), $version );
  } else {
	// Load the child stylesheet
	wp_enqueue_style( $child_style, get_stylesheet_directory_uri() . '/style.css', array( $parent_style ), $version );
  }
}
add_action( 'wp_enqueue_scripts', 'trueman_child_stylesheets' );
