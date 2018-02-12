<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package CSS_library
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function css_library_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'css_library_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function css_library_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'css_library_pingback_header' );

/**
 * Change the length and style of excerpt. 
 */

function css_library_excerpt_length($length) {
	return 120;
}
add_filter('excerpt_mblength', 'css_library_excerpt_length');

function css_library_excerpt_more($more) {
	return '<p><a href="'. get_permalink($post->ID) . '">' . 'READ MORE' . '</a><p>';
}
add_filter('excerpt_more', 'css_library_excerpt_more');