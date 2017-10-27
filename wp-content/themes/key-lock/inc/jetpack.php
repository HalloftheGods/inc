<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package Key Lock
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function key_lock_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'key_lock_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function key_lock_jetpack_setup
add_action( 'after_setup_theme', 'key_lock_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function key_lock_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function key_lock_infinite_scroll_render
