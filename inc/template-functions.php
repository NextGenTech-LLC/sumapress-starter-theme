<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package SumaPressTheme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
add_filter( 'body_class', function( $classes ) {

	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;

} );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
add_action( 'wp_head', function() {

	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
	
} );
