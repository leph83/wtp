<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


/*
** REMOVE GUTENBERG STYLE FRONTEND
*/
if (get_theme_mod('wtp_disable_gutenberg_styles')) {

    if (!function_exists('wtp_remove_wp_block_library_css')) {
        function wtp_remove_wp_block_library_css()
        {
            wp_dequeue_style('wp-block-library');
            wp_dequeue_style('wp-block-library-theme');
            wp_dequeue_style('wc-block-style'); // Remove WooCommerce block CSS
        }
        add_action('wp_enqueue_scripts', 'wtp_remove_wp_block_library_css', 100);
    }
}




// ADD SETTING TO CUSTOMIZER
function wtp_customizer_disable_gutenberg_styles($wp_customize)
{
    // SETTING
    $wp_customize->add_setting(
        'wtp_disable_gutenberg_styles',
        array(
            'capability'    => 'edit_theme_options',
            'default'       => false
        )
    );

    // CONTROL
    $wp_customize->add_control(
        'wtp_disable_gutenberg_styles',
        array(
            'type'      => 'checkbox',
            'section'   => 'wtp_disable_section',
            'label'     => __('Disable Gutenberg Styles', 'wtp'),
        )
    );
}
add_action('customize_register', 'wtp_customizer_disable_gutenberg_styles');
