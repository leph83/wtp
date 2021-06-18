<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * LIST OF CORE BLOCKS
 * core/archives
 * core/audio
 * core/button
 * core/buttons
 * core/calendar
 * core/categories
 * core/classic
 * core/code
 * core/column
 * core/columns
 * core/cover
 * core/file
 * core/latest-comments
 * core/latest-posts
 * core/legacy-widget
 * core/gallery
 * core/group
 * core/heading
 * core/html
 * core/image
 * core/list
 * core/media-text
 * core/more
 * core/navigation
 * core/navigation-link
 * core/nextpage
 * core/paragraph
 * core/preformatted
 * core/pullquote
 * core/quote
 * core/rss
 * core/search
 * core/separator
 * core/shortcode
 * core/social-link
 * core/social-links
 * core/spacer
 * core/subhead
 * core/table
 * core/tag-cloud
 * core/text-columns
 * core/verse
 * core/video
 * core/widget-area
 */


if (!function_exists('wtp_register_block_styles')) {
	/**
	 * Register block styles.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function wtp_register_block_styles()
	{
		// Spacer Default
		register_block_style(
			'core/spacer',
			array(
				'name'  => 'single',
				'label' => esc_html__('single', 'wtp-theme'),
			)
		);

		register_block_style(
			'core/spacer',
			array(
				'name'  => 'double',
				'label' => esc_html__('double', 'wtp-theme'),
			)
		);

		register_block_style(
			'core/spacer',
			array(
				'name'  => 'tripple',
				'label' => esc_html__('tripple', 'wtp-theme'),
			)
		);
	}

	add_action('init', 'wtp_register_block_styles');
}
