<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}



// SETTINGS
require_once('inc/setting_setup.php');

require_once('inc/setting_load-css.php');
require_once('inc/setting_load-js.php');

// CUSTOMIZER
require_once('inc/customizer/setting_customizer.php');
require_once('inc/customizer/setting_color.php');
require_once('inc/customizer/setting_fontsize.php');
require_once('inc/customizer/setting_layout.php');

// ADD
get_template_part('inc/add_nav-classes.php');

// ENABLE
get_template_part('inc/enable.php');

// DISABLES
get_template_part('inc/disables.php');
