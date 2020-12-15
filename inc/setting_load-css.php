<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * LOAD CSS
 */
if ( !function_exists('wtp_load_styles') ) {
    function wtp_load_styles() {
        // Version dependend on change date of file
        $file_name = 'style.min.css';
        $css_version = filemtime( get_stylesheet_directory() . '/' . $file_name );
        wp_enqueue_style( 'theme-style', get_stylesheet_directory_uri() . '/' . $file_name, array(), $css_version );
    }
    add_action('wp_enqueue_scripts', 'wtp_load_styles');
}