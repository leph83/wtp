<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$wtp_titles = array(
    "page" => '',
    "post" => '',
    "archive" => '',
    "index" => '',
);

if (!function_exists('wtp_customizer_hide_titles')) {
    function wtp_customizer_hide_titles($wp_customize) {
        global $wtp_titles;

        if (!empty($wtp_titles)) {
            foreach ($wtp_titles as $key => $value) {
                $wp_customize->add_setting('wtp_hide_title_' . $key, array(
                    'default'   => '',
                    'sanitize_callback' => 'wtp_sanitize_checkbox'
                ));
                $wp_customize->add_control(
                    'wtp_hide_title_' . $key,
                    array(
                        'type'    => 'checkbox',
                        'section' => 'wtp_hide_titles',
                        'label'   => 'hide title in ' . $key,
                    )
                );
            }
        }
    }

    add_action('customize_register', 'wtp_customizer_hide_titles');
}
