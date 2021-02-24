<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

function wtp_widgets_init_child()
{

    register_sidebar(array(
        'name'          => 'Sidebar',
        'id'            => 'sidebar-1',
        'description'   => 'Sidebar Widgets',
    ));
}
add_action('widgets_init', 'wtp_widgets_init_child');
