<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// SETTINGS
require_once('inc/setting_setup.php');
require_once('inc/setting_load-css.php');
require_once('inc/setting_load-js.php');
require_once('inc/widgets.php');

// CUSTOMIZER
require_once('inc/function_sanitize.php');
require_once('inc/customizer/setting_customizer.php');
require_once('inc/customizer/setting_color.php');
require_once('inc/customizer/setting_fontsize.php');
require_once('inc/customizer/setting_layout.php');

// ADD
require_once('inc/add_nav-classes.php');

// DISABLES
require_once('inc/disables.php');