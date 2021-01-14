<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


$disables = array(
    'custom-fontsize' => 'Custom Font Size',
    'custom-color' => 'Custom Color',
    'restapi' => 'rest API',
    'emoji' => 'emojis',
    'embed' => 'embed',
    'gutenberg-styles' => 'Gutenberg Styles',
    'xmlrpc' => 'xmlrpc',
);


// ADD SETTING TO CUSTOMIZER
function wtp_customizer_disables($wp_customize)
{
    global $disables;

    foreach ($disables as $key => $value) {
        // SETTING
        $wp_customize->add_setting(
            'wtp_disable_' . $key,
            array(
                'capability'    => 'edit_theme_options',
                'default'       => false
            )
        );

        // CONTROL
        $wp_customize->add_control(
            'wtp_disable_' . $key,
            array(
                'type'      => 'checkbox',
                'section'   => 'wtp_disable_section',
                'label'     => __('Disable ' . $value, 'wtp'),
            )
        );
    }
}
add_action('customize_register', 'wtp_customizer_disables');


// LOAD FILE IF DISABLED
foreach ($disables as $key => $value) {
    if (get_theme_mod('wtp_disable_' . $key)) {
        require_once('disable/disable_' . $key . '.php');
    }
}
