<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


/*
** REMOVE GUTENBERG STYLE FRONTEND
*/

if (!function_exists('wtp_remove_wp_block_library_css')) {
    function wtp_remove_wp_block_library_css()
    {
        wp_dequeue_style('wp-block-library');
        wp_dequeue_style('wp-block-library-theme');
        wp_dequeue_style('wc-block-style'); // Remove WooCommerce block CSS
    }
    add_action('wp_enqueue_scripts', 'wtp_remove_wp_block_library_css', 100);
}
