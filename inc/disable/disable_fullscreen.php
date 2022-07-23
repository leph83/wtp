<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// https://gutenberghub.com/how-to-disable-full-screen-editor-mode-in-wordpress
if (!function_exists('ghub_disable_editor_fullscreen_mode')) {
	function ghub_disable_editor_fullscreen_mode()
	{
		$script = "window.onload = function() { const isFullscreenMode = wp.data.select( 'core/edit-post' ).isFeatureActive( 'fullscreenMode' ); if ( isFullscreenMode ) { wp.data.dispatch( 'core/edit-post' ).toggleFeature( 'fullscreenMode' ); } }";
		wp_add_inline_script('wp-blocks', $script);
	}
	add_action('enqueue_block_editor_assets', 'ghub_disable_editor_fullscreen_mode');
}
