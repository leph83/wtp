<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (get_theme_mod('wtp_disable_embed')) {
    if (!function_exists('disable_embeds_code_init')) {
        function disable_embeds_code_init()
        {

            // Remove the REST API endpoint.
            remove_action('rest_api_init', 'wp_oembed_register_route');

            // Turn off oEmbed auto discovery.
            add_filter('embed_oembed_discover', '__return_false');

            // Don't filter oEmbed results.
            remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);

            // Remove oEmbed discovery links.
            remove_action('wp_head', 'wp_oembed_add_discovery_links');

            // Remove oEmbed-specific JavaScript from the front-end and back-end.
            remove_action('wp_head', 'wp_oembed_add_host_js');
            add_filter('tiny_mce_plugins', 'disable_embeds_tiny_mce_plugin');

            // Remove all embeds rewrite rules.
            add_filter('rewrite_rules_array', 'disable_embeds_rewrites');

            // Remove filter of the oEmbed result before any HTTP requests are made.
            remove_filter('pre_oembed_result', 'wp_filter_pre_oembed_result', 10);
        }
        add_action('init', 'disable_embeds_code_init', 9999);
    }

    if (!function_exists('disable_embeds_tiny_mce_plugin')) {
        function disable_embeds_tiny_mce_plugin($plugins)
        {
            return array_diff($plugins, array('wpembed'));
        }
    }

    if (!function_exists('disable_embeds_rewrites')) {
        function disable_embeds_rewrites($rules)
        {
            foreach ($rules as $rule => $rewrite) {
                if (false !== strpos($rewrite, 'embed=true')) {
                    unset($rules[$rule]);
                }
            }
            return $rules;
        }
    }
}



// ADD SETTING TO CUSTOMIZER
function wtp_customizer_disable_embed($wp_customize)
{
    // SETTING
    $wp_customize->add_setting(
        'wtp_disable_embed',
        array(
            'capability'    => 'edit_theme_options',
            'default'       => false
        )
    );

    // CONTROL
    $wp_customize->add_control(
        'wtp_disable_embed',
        array(
            'type'      => 'checkbox',
            'section'   => 'wtp_disable_section',
            'label'     => __('Disable Embed', 'wtp'),
        )
    );
}
add_action('customize_register', 'wtp_customizer_disable_embed');
