<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package Satori
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function satori_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'satori_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function satori_jetpack_setup
add_action( 'after_setup_theme', 'satori_jetpack_setup' );

function satori_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'templates/contents/content' );
	}
} // end function satori_infinite_scroll_render