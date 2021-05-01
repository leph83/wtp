<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * USE GOOGLE FONT
 */
$wtp_font_families = array(
    "font_family_1" => '',
    "font_family_2" => '',
    "font_family_3" => '',
);

if (!function_exists('wtp_customizer_font_family')) {
    function wtp_customizer_font_family($wp_customize)
    {
        global $wtp_font_families;


        if (!empty($wtp_font_families)) {
            foreach ($wtp_font_families as $key => $value) {
                $wp_customize->add_setting('wtp_font_families_' . $key, array(
                    'default'   => '',
                    'sanitize_callback' => 'wp_filter_nohtml_kses'
                ));
                $wp_customize->add_control(
                    'wtp_font_families_' . $key,
                    array(
                        'type'    => 'text',
                        'section' => 'wtp_font_family_section',
                        'label'   => 'Font Family CSS ' . $key,
                    )
                );

                $wp_customize->add_setting('wtp_font_families_link_' . $key, array(
                    'default'   => '',
                    'sanitize_callback' => 'wp_filter_nohtml_kses'
                ));
                $wp_customize->add_control(
                    'wtp_font_families_link_' . $key,
                    array(
                        'type'    => 'text',
                        'section' => 'wtp_font_family_section',
                        'label'   => 'Link Parameter ' . $key,
                    )
                );
            }
        }
    }
    add_action('customize_register', 'wtp_customizer_font_family');
}



/**
 * ADD FONT FAMILY DEFINITION AS INLINE CSS TO HEADER
 */
if (!function_exists('wtp_hook_font_family_css')) {
    function wtp_hook_font_family_css() {
        global $wtp_font_families;
        $style = '';
        $style_variables = '';
        $link_value = '';
        $value_parameter = '';

        if (!empty($wtp_font_families)) {
            $count = 1;
            foreach ($wtp_font_families as $key => $value) {

                if (get_theme_mod('wtp_font_families_' . $key) && get_theme_mod('wtp_font_families_' . $key) != '') {
                    $value = get_theme_mod('wtp_font_families_' . $key);
                    $value = str_replace( '\\', '', $value);
                }

                if ($value) {
                    $style_variables .= '
                        --font-family-' . $count . ': ' . $value . ';
                    ';
                }
                



                if (get_theme_mod('wtp_font_families_link_' . $key) && get_theme_mod('wtp_font_families_link_' . $key) != '') {
                    $value_parameter = get_theme_mod('wtp_font_families_link_' . $key);
                }
                    
                if ($value_parameter) {
                    if ($count != 1) {
                        $link_value .= '&family=';
                    }

                    $link_value .= $value_parameter;
                }

                
                
                $count++;
            }
        }




        if ($style_variables) {
            $style .= '<style>
                :root {
                    ' . $style_variables . '
	            } </style>
            ';

            $link = '<link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css2?family='. $link_value .
            '&display=swap" rel="stylesheet">';
        }


        echo $style;

        echo $link;
    }
    add_action('wp_head', 'wtp_hook_font_family_css');
}