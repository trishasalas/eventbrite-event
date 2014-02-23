<?php
/**
 * WordPress.com-specific functions and definitions
 * This file is centrally included from `wp-content/mu-plugins/wpcom-theme-compat.php`.
 *
 * @package eventbrite-parent
 */

require_once WP_CONTENT_DIR . '/mu-plugins/keyring/keyring.php';

/**
 * Set a default theme color array for WP.com.
 *
 * @global array $themecolors
 */
function eb_parent_theme_colors() {
	global $themecolors;

	if ( ! isset( $themecolors ) ) {
		$themecolors = array(
			'bg'     => 'ffffff',
			'border' => 'e2e2e2',
			'text'   => '666666',
			'link'   => 'e77e23',
			'url'    => 'e77e23',
		);
	}
}
add_action( 'after_setup_theme', 'eb_parent_theme_colors' );

/*
 * De-queue Google fonts if custom fonts are being used instead
 */

function eb_dequeue_fonts() {
	if ( class_exists( 'TypekitData' ) ) {
		if ( TypekitData::get( 'upgraded' ) ) {
			$customfonts = TypekitData::get( 'families' );
				if ( ! $customfonts )
					return;

				$site_title = $customfonts['site-title'];
				$headings = $customfonts['headings'];
				$body_text = $customfonts['body-text'];

				if ( $site_title['id'] && $headings['id'] && $body_text['id'] ) {
					wp_dequeue_style( 'eventbrite-raleway' );
			}
		}
	}
}

add_action( 'wp_enqueue_scripts', 'eb_dequeue_fonts' );

//WordPress.com specific styles
function eb_wpcom_styles() {
	wp_enqueue_style( 'eb-wpcom', get_template_directory_uri() . '/inc/style-wpcom.css', '091913' );
}
add_action( 'wp_enqueue_scripts', 'eb_wpcom_styles' );