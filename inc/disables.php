<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// ADD Disables - check filename
$wtp_theme_disables = array(
    'custom-fontsize' => 'Custom Font Size',
    'custom-color' => 'Custom Color',
    'fullscreen' => 'Disable Fullscreen Editor',
);


// ADD SETTING TO CUSTOMIZER
if (!function_exists('wtp_theme_customizer_disables')) {
    function wtp_theme_customizer_disables($wp_customize)
    {
        global $wtp_theme_disables;

        foreach ($wtp_theme_disables as $key => $value) {
            // SETTING
            $wp_customize->add_setting(
                'wtp_disable_' . $key,
                array(
                    // 'capability'    => 'edit_theme_options',
                    'default' => '',
                    'sanitize_callback' => 'wtp_sanitize_checkbox'

                )
            );

            // CONTROL
            $wp_customize->add_control(
                'wtp_disable_' . $key,
                array(
                    'type'      => 'checkbox',
                    'section'   => 'wtp_disable_section',
                    'label'     => $value,
                )
            );
        }
    }
    add_action('customize_register', 'wtp_theme_customizer_disables');
}

// LOAD FILE IF DISABLED
foreach ($wtp_theme_disables as $key => $value) {
    if (get_theme_mod('wtp_disable_' . $key)) {
        get_template_part('inc/disable/disable_' . $key . '.php');
    }
}
