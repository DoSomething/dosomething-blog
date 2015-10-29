<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package dosomething
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function dosomething_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'dosomething_infinite_scroll_render',
		'footer'    => 'page',
	) );

	add_post_type_support( 'product', 'wpcom-markdown' );
} // end function dosomething_jetpack_setup
add_action( 'after_setup_theme', 'dosomething_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function dosomething_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'partials/content', get_post_format() );
	}
} // end function dosomething_infinite_scroll_render
