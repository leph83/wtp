<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (get_theme_mod('disable_custom_fontsize')) {
    function disable_custom_font_sizes()
    {
        add_theme_support('disable-custom-font-sizes');
    }

    add_action('after_setup_theme', 'disable_custom_font_sizes');
}



// ADD SETTING TO CUSTOMIZER
function wtp_customizer_disable_custom_fontsize($wp_customize)
{
    // SETTING
    $wp_customize->add_setting(
        'disable_custom_fontsize',
        array(
            'capability'    => 'edit_theme_options',
            'default'       => false
        )
    );

    // CONTROL
    $wp_customize->add_control(
        'disable_custom_fontsize',
        array(
            'type'      => 'checkbox',
            'section'   => 'wtp_disable_section',
            'label'     => __('Disable Custom Fontsize', 'wtp'),
        )
    );
}
add_action('customize_register', 'wtp_customizer_disable_custom_fontsize');
