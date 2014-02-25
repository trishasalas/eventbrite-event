<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Eventbrite_Event
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function eb_setup_infinite_scroll() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'content',
		'render'    => 'eb_infinite_scroll_render',
	) );
}
add_action( 'after_setup_theme', 'eb_setup_infinite_scroll' );

/**
 * Callback for rendering posts during infinite scroll.
 */
function eb_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'tmpl/post-loop' );
	}
}
