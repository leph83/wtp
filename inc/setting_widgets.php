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

    }
    add_action( 'widgets_init', 'wtp_widgets_init' );
}