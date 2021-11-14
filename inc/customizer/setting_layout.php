<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// TODO: Use GET Option to store all css in that and just output one <style> tag

/**
 *
 */
$wtp_layout_width = array(
    "alignfull" => '',
    "alignwide" => '',
    "aligncontent" => '',
);

$wtp_layout_unit = array(
    'px' => 'px',
    'percent' => '%',
);

/**
 * ADD WIDTH TO CUSTOMIZER
 * 
 */
if (!function_exists('wtp_customizer_layout_width')) {
    function wtp_customizer_layout_width($wp_customize)
    {
        global $wtp_layout_width;
        global $wtp_layout_unit;

        if (!empty($wtp_layout_width)) {
            foreach ($wtp_layout_width as $key => $value) {
                $wp_customize->add_setting('wtp_layout_width_' . $key, array(
                    'default'   => '',
                    'sanitize_callback' => 'absint'
                ));
                $wp_customize->add_control(
                    'wtp_layout_width_' . $key,
                    array(
                        'type'    => 'text',
                        'section' => 'wtp_layoutwidth_section',
                        'label'   => 'Layout width "' . $key . '"',
                    )
                );

                // UNIT
                $wp_customize->add_setting('wtp_layout_unit_' . $key, array(
                    'default'   => '',
                    'sanitize_callback' => 'wtp_sanitize_select'
                ));
                $wp_customize->add_control(
                    'wtp_layout_unit_' . $key,
                    array(
                        'type'    => 'select',
                        'section' => 'wtp_layoutwidth_section',
                        'label'   => '"' . $key . '" unit',
                        'choices' => $wtp_layout_unit,
                    ),

                );
            }
        }


        // GUTTER
        $wp_customize->add_setting('wtp_layout_gutter', array(
            'default'   => '',
            'sanitize_callback' => 'wp_filter_nohtml_kses'
        ));
        $wp_customize->add_control(
            'wtp_layout_gutter',
            array(
                'type'    => 'text',
                'section' => 'wtp_layoutwidth_section',
                'label'   => __('Layout Gutter', 'wtp-theme'),
            )
        );
    }
    add_action('customize_register', 'wtp_customizer_layout_width');
}

/**
 * ADD FLUID LAYOUT CHECKBOX
 */
if (!function_exists('wtp_customizer_fluidlayout')) {
    function wtp_customizer_fluidlayout($wp_customize)
    {
        $wp_customize->add_setting('wtp_fluidlayout', array(
            'default'   => '',
            'sanitize_callback' => 'wtp_sanitize_checkbox'
        ));
        $wp_customize->add_control(
            'wtp_fluidlayout',
            array(
                'type'    => 'checkbox',
                'section' => 'wtp_layoutwidth_section',
                'label'   => 'fluid layout',
            )
        );
    }
    add_action('customize_register', 'wtp_customizer_fluidlayout');
}



/**
 * ADD LAYOUT WIDTH AS INLINE CSS TO HEADER
 */
if (!function_exists('wtp_hook_layout_width_css')) {
    function wtp_hook_layout_width_css()
    {
        global $wtp_layout_width;

        $style = '';
        $style_variables = '';

        if (!empty($wtp_layout_width)) {
            $count = 1;
            
            foreach ($wtp_layout_width as $key => $value) {
                if (get_theme_mod('wtp_layout_width_' . $key) && get_theme_mod('wtp_layout_width_' . $key) != 0) {
                    $value = get_theme_mod('wtp_layout_width_' . $key);
                }

                if (get_theme_mod('wtp_layout_unit_' . $key) && get_theme_mod('wtp_layout_unit_' . $key) != '') {
                    $unit = get_theme_mod('wtp_layout_unit_' . $key) ?? false;
                }

                
                if ($value) {    
                    if ($unit == 'percent' || !(get_theme_mod('wtp_fluidlayout')) ) {
                        if ($unit == 'percent') {
                            $unit = '%';
                        }
                        
                        $style_variables .= '
                            --max-width-' . $count . ': ' . $value .  $unit . ';';
                    } else {
                        $style_variables .= '
                        --max-width-' . $count . '-setting: ' . $value . ';';
                    }
                }

                $count++;
            }
        }

        if (get_theme_mod('wtp_layout_gutter')) {
            $style_variables .= '
                --gutter: ' . get_theme_mod('wtp_layout_gutter') . ';
            ';
        }

        $style .= '
        <style>';

        if ($style_variables) {
            $style .= '
                :root {
                    ' . $style_variables . '
	            }
            ';
        }

        $style .= '</style>';

        echo $style;
    }
    add_action('wp_head', 'wtp_hook_layout_width_css');
}
