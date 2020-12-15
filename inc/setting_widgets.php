<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Widgets
 */
if ( !function_exists('wtp_widgets_init') ) {
    function wtp_widgets_init() {

        register_sidebar(array(
            'name'          => 'Sidebar',
            'id'            => 'primary-widget-area',
            'description'   => 'Sidebar Widgets',
        ) );

        register_sidebar(array(
            'name'          => 'Footer 1',
            'id'            => 'footer-1-widget-area',
            'description'   => 'Footer 1 Widget',
        ) );

        register_sidebar(array(
            'name'          => 'Footer 2',
            'id'            => 'footer-2-widget-area',
            'description'   => 'Footer 2 Widget',
        ) );

        register_sidebar(array(
            'name'          => 'Footer 3',
            'id'            => 'footer-3-widget-area',
            'description'   => 'Footer 3 Widget',
        ) );

    }
    add_action( 'widgets_init', 'wtp_widgets_init' );
}