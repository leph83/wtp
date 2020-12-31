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
    // SETTING
    $wp_customize->add_setting(
        'increase_security',
        array(
            'capability' => 'edit_theme_options',
            'default'    => true,
        )
    );
 
    // CONTROL
    $wp_customize->add_control(
        'increase_security',
        array(
            'type'      => 'checkbox',
            'section'   => 'wtp_increase_security',
            'label'     => __('Increase Security', 'wtp'),
        )
    );
}
add_action('customize_register', 'wtp_customizer_increase_security');