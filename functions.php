<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

// SETTINGS
require_once('inc/setting_setup.php');
require_once('inc/setting_widgets.php');
require_once('inc/setting_customizer.php');

require_once('inc/setting_block-styles.php');
require_once('inc/setting_load-css.php');
require_once('inc/setting_load-js.php');

require_once('inc/setting_color.php');
require_once('inc/setting_fontsize.php');


// ADD
require_once('inc/add_nav-classes.php');
// require_once('inc/add_gutenberg-admin-styles.php');
require_once('inc/add_pagination-markup.php');
require_once('inc/add_bloginfo.php');

// ENABLE

require_once('inc/enable_increase-security.php');






// DISABLES
require_once('inc/disable_custom-fontsize.php');
require_once('inc/disable_custom-color.php');
require_once('inc/disable_rest_api.php');
require_once('inc/disable_emoji.php');
require_once('inc/disable_embed.php');
// require_once('inc/disable_gutenberg-styles.php');

require_once('inc/disable_embed.php');


if (is_admin()) { 
    function jba_disable_editor_fullscreen_by_default() {
    $script = "jQuery( window ).load(function() { const isFullscreenMode = wp.data.select( 'core/edit-post' ).isFeatureActive( 'fullscreenMode' ); if ( isFullscreenMode ) { wp.data.dispatch( 'core/edit-post' ).toggleFeature( 'fullscreenMode' ); } });";
    wp_add_inline_script( 'wp-blocks', $script );
}
add_action( 'enqueue_block_editor_assets', 'jba_disable_editor_fullscreen_by_default' );
}