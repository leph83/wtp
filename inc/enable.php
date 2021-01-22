<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// ADD ENABLES - check filename
$enables = array(
    'increased-security' => 'increase security',
    'css-defer' => 'CSS defer',
    'gutenberg-theme' => 'Gutenberg default theme',
);


// ADD SETTING TO CUSTOMIZER
function wtp_customizer_enables($wp_customize)
{
    global $enables;

    foreach ($enables as $key => $value) {
        // SETTING
        $wp_customize->add_setting(
            'wtp_enable_' . $key,
            array(
                'capability'    => 'edit_theme_options',
                'default'       => '',
                'sanitize_callback' => 'theme_slug_sanitize_checkbox'
            )
        );

        // CONTROL
        $wp_customize->add_control(
            'wtp_enable_' . $key,
            array(
                'type'      => 'checkbox',
                'section'   => 'wtp_enable_section',
                'label'     => __('enable ' . $value, 'wtp-theme'),
            )
        );
    }
}
add_action('customize_register', 'wtp_customizer_enables');


// LOAD FILE IF ENABLES
foreach ($enables as $key => $value) {
    if (get_theme_mod('wtp_enable_' . $key)) {
        require_once('enable/enable_' . $key . '.php');
    }
}
