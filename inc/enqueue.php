<?php
/**
 * Wp Boostrap Sass Gulp enqueue scripts
 *
 * @package Wordpress_Boostrap4_Sass_Gulp
 */

if ( ! function_exists( 'wordpress_scripts' ) ) {
	/**
	 * Load theme's JavaScript sources.
	 */
	function wordpress_scripts() {
		// Get the theme data.
		$the_theme = wp_get_theme();
		wp_enqueue_style( 'style', get_stylesheet_uri() );
		wp_enqueue_style( 'wordpress-styles', get_stylesheet_directory_uri() . '/assets/css/theme.min.css', array(), $the_theme->get( 'Version' ) );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'wordpress-scripts', get_template_directory_uri() . '/assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js', array(), $the_theme->get( 'Version' ), true );
		wp_enqueue_script( 'wordpress-scripts', get_template_directory_uri() . '/assets/js/theme.min.js', array(), $the_theme->get( 'Version' ), true );
	}
} // endif function_exists( 'wordpress_scripts' ).

add_action( 'wp_enqueue_scripts', 'wordpress_scripts' );



