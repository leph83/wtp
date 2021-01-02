<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


if (get_theme_mod('wtp_disable_restapi')) {
    // Disable REST API link tag
    remove_action('wp_head', 'rest_output_link_wp_head', 10);

    // Disable oEmbed Discovery Links
    remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);

    // Disable REST API link in HTTP headers
    remove_action('template_redirect', 'rest_output_link_header', 11, 0);

    remove_action('wp_head', 'rsd_link');

    remove_action('wp_head', 'wlwmanifest_link');

    remove_action('wp_head', 'wp_shortlink_wp_head');

    // https://crunchify.com/how-to-clean-up-wordpress-header-section-without-any-plugin/


    /**
     * DISABLE XMLRPC for enhanced security
     */
    add_filter('xmlrpc_enabled', '__return_false');
}




// ADD SETTING TO CUSTOMIZER
function wtp_customizer_disable_restapi($wp_customize)
{
    // SETTING
    $wp_customize->add_setting(
        'wtp_disable_restapi',
        array(
            'capability'    => 'edit_theme_options',
            'default'       => false
        )
    );

    // CONTROL
    $wp_customize->add_control(
        'wtp_disable_restapi',
        array(
            'type'      => 'checkbox',
            'section'   => 'wtp_disable_section',
            'label'     => __('Disable Rest API', 'wtp'),
        )
    );
}
add_action('customize_register', 'wtp_customizer_disable_restapi');
