<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Humanly Possible Productions
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function humanly_possible_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'humanly_possible_jetpack_setup' );
