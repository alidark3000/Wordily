<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package simple content
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function simple_content_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'simple_content_jetpack_setup' );
