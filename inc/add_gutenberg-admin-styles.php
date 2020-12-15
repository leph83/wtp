<?php
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }



    if ( !function_exists('wtp_gutenberg_styles') ) {
        function wtp_gutenberg_styles() {
            wp_enqueue_style( 'wtp-style-settings-variables', get_stylesheet_directory_uri() . '/assets/css/theme/00-settings/setting.variables.css' );
            wp_enqueue_style( 'wtp-style-settings-fonts', get_stylesheet_directory_uri() . '/assets/css/theme/00-settings/setting.fonts.css' );

            //Phucstrap
            wp_enqueue_style( 'wtp-heading-style', get_stylesheet_directory_uri() . '/assets/css/phucstrap/03-elements/element.headings.css' );
            // wp_enqueue_style( 'wtp-custom-style', get_stylesheet_directory_uri() . '/assets/css/phucstrap/02-generic/generic.custom.css' );

            //Gutenberg
            wp_enqueue_style( 'wtp-gutenberg-style', get_stylesheet_directory_uri() . '/assets/css/theme/05-components/component.gutenberg.css' );
            wp_enqueue_style( 'wtp-grid', get_stylesheet_directory_uri() . '/assets/css/phucstrap/04-objects/object.grid.css' );
        }
        add_action('admin_enqueue_scripts', 'wtp_gutenberg_styles', 100);
    }