<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// SETTINGS
require_once('inc/setting_setup.php');
require_once('inc/setting_fontsize.php');
require_once('inc/setting_color.php');
require_once('inc/setting_widgets.php');
require_once('inc/setting_block-styles.php');

require_once('inc/setting_load-css.php');
require_once('inc/setting_load-js.php');

// ADD
require_once('inc/add_security.php');
// require_once('inc/add_css_defer.php');
require_once('inc/add_nav_classes.php');
require_once('inc/add_gutenberg-admin-styles.php');
require_once('inc/add_pagination-markup.php');
require_once('inc/bloginfo.php');

// DISABLES
require_once('inc/disable_custom_fontsize.php');
require_once('inc/disable_custom_color.php');
require_once('inc/disable_rest_api.php');
require_once('inc/disable_empty_p.php');
// require_once('inc/disable_gutenberg_style.php');
require_once('inc/disable_emoji.php');
require_once('inc/disable_embed.php');

/**
 * TODO
 * add Logo Size Width Slider
 * Checkbox to show title, description and logo
 * add Sidebar Setting (left, right)
 */

