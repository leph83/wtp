<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}



if (get_theme_mod('increase_security')) {
    /**
     * Disable php edit
     */
    define('GENERATE_HOOKS_DISALLOW_PHP', true);

    /**
     * Disable CSS edit
     */
    define('DISALLOW_FILE_EDIT', true);

    /**
     * Don't Show Version of Wordpress
     */
    remove_action('wp_head', 'wp_generator');
}



// ADD SETTING TO CUSTOMIZER
function wtp_customizer_increase_security($wp_customize)
{

    // SECTION
    $wp_customize->add_section('wtp_increase_security', array(
        'title'      => __('Security', 'wtp'),
        'capability' => 'edit_theme_options',
        'panel'      => 'wtp_panel'
    ));


    // SETTING
    $wp_customize->add_setting(
        'increase_security',
        array(
            'default'    => true
        )
    );

    // CONTROL
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'increase_security',
            array(
                'label'     => __('Increase Security', 'wtp'),
                'section'   => 'wtp_increase_security',
                'settings'  => 'increase_security',
                'type'      => 'checkbox',

                'capability' => 'edit_theme_options',
            )
        )
    );
}
add_action('customize_register', 'wtp_customizer_increase_security');
