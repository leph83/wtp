<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function disable_custom_font_sizes() {
    add_theme_support('disable-custom-font-sizes');
}
 
add_action('after_setup_theme', 'disable_custom_font_sizes');