<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


/**
 * INCREASE PERFORMANCE
 * LOOP THROUGH CSS FILES AND ADD REL PRELOAD FOR EACH FILE
 */
if (get_theme_mod('wtp_enable_css_preload')) {
    function add_rel_preload($html, $handle, $href, $media)
    {
        if (is_admin())
            return $html;

        $html .= <<<EOT
    <link rel='preload' as='style' href='$href'>
    EOT;

        return $html;
    }

    add_filter('style_loader_tag', 'add_rel_preload', 10, 4);
}





// ADD SETTING TO CUSTOMIZER
function wtp_customizer_enable_css_preload($wp_customize)
{
    // SETTING
    $wp_customize->add_setting(
        'wtp_enable_css_preload',
        array(
            'capability'    => 'edit_theme_options',
            'default'       => false
        )
    );

    // CONTROL
    $wp_customize->add_control(
        'wtp_enable_css_preload',
        array(
            'type'      => 'checkbox',
            'section'   => 'wtp_enable_section',
            'label'     => __('Enable CSS preload', 'wtp'),
        )
    );
}
add_action('customize_register', 'wtp_customizer_enable_css_preload');
