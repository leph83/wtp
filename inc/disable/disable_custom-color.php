<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}


if (!function_exists('wtp_disable_custom_color_picker')) {
	function wtp_disable_custom_color_picker()
	{
		add_theme_support('disable-custom-colors');
	}
	add_action('after_setup_theme', 'wtp_disable_custom_color_picker');
}
