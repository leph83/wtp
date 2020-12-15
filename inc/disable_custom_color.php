<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function disable_custom_color_picker() {
    add_theme_support('disable-custom-colors');
}

add_action('after_setup_theme', 'disable_custom_color_picker');