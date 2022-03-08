<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (!function_exists('wtp_widgets_init')) {
    function wtp_widgets_init()
    {
        register_sidebar(array(
            'name'          => 'Sidebar',
            'id'            => 'sidebar-1',
            'description'   => 'Sidebar Widgets',
        ));

        register_sidebar(array(
            'name'          => 'Footer',
            'id'            => 'footer',
            'description'   => 'Footer Widgets',
        ));
    }
    add_action('widgets_init', 'wtp_widgets_init', 0);
}
