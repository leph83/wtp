<?php
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }



    if ( !function_exists('wtp_gutenberg_styles') ) {
        function wtp_gutenberg_styles() {
            //Gutenberg
            wp_enqueue_style( 'wtp-gutenberg-style', get_stylesheet_directory_uri() . '/assets/css/theme/06-components/component.gutenberg.css' );
        }
        add_action('admin_enqueue_scripts', 'wtp_gutenberg_styles', 100);
    }