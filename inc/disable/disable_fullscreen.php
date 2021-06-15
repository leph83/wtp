<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (!function_exists('wtp_disable_editor_fullscreen_by_default')) {
    if (is_admin()) {
        function wtp_disable_editor_fullscreen_by_default()
        {
            wp_add_inline_script( 'wp-blocks', "jQuery( window ).load(function() { const isFullscreenMode = wp.data.select( 'core/edit-post' ).isFeatureActive( 'fullscreenMode' ); if ( isFullscreenMode ) { wp.data.dispatch( 'core/edit-post' ).toggleFeature( 'fullscreenMode' ); } });" );

        }
        add_action('enqueue_block_editor_assets', 'wtp_disable_editor_fullscreen_by_default');

    }
}
