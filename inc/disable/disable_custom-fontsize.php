<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}



if (!function_exists('wtp_disable_custom_font_sizes')) {
    function wtp_disable_custom_font_sizes()
    {
        add_theme_support('disable-custom-font-sizes');
    }
    add_action('after_setup_theme', 'wtp_disable_custom_font_sizes');
}