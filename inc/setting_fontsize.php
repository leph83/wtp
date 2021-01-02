<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}




/**
 * DEFINE AVAILABLE FONT SIZES TO CHOOSE
 */
$wtp_font_sizes = array(
    '14' => '14px',
    '15' => '15px',
    '16' => '16px',
    '17' => '17px',
    '18'  => '18px',
    '19'  => '19px',
    '20'  => '20px',
);


$wtp_font_ratio = array(
    '1.067' => '1.067 - minor second - 15:16',
    '1.125' => '1.125 - major second - 8:9',
    '1.2'  => '1.2 - minor third - 5:6',
    '1.25'  => '1.25 - major third - 4:5',
    '1.333'  => '1.333 - perfect fourth - 3:4',
);




function set_editor_font_sizes()
{
    $base_font_size = '1.6';
    if (get_theme_mod('wtp_font_size')) {
        $base_font_size = floatval(get_theme_mod('wtp_font_size'));
    }

    $font_ratio = 1.2;
    if (get_theme_mod('wtp_font_ratio')) {
        $font_ratio = floatval(get_theme_mod('wtp_font_ratio'));
    }

    // I guess this calculation doesn't have to be that complicated, but it's late
    $h7_calc = $base_font_size / 10;
    $h6_calc = $h7_calc * $font_ratio;
    $h5_calc = $h6_calc * $font_ratio;
    $h4_calc = $h5_calc * $font_ratio;
    $h3_calc = $h4_calc * $font_ratio;
    $h2_calc = $h3_calc * $font_ratio;
    $h1_calc = $h2_calc * $font_ratio;

    $h0_calc = $h1_calc * $font_ratio;
    $ha_calc = $h0_calc * $font_ratio;
    $hb_calc = $ha_calc * $font_ratio;
    $hc_calc = $hb_calc * $font_ratio;

    $h8_calc = $h7_calc / $font_ratio;
    $h9_calc = $h8_calc / $font_ratio;

    // OUTPUT
    $h7 = intval($h7_calc * 10);
    $h6 = intval($h6_calc * 10);
    $h5 = intval($h5_calc * 10);
    $h4 = intval($h4_calc * 10);
    $h3 = intval($h3_calc * 10);
    $h2 = intval($h2_calc * 10);
    $h1 = intval($h1_calc * 10);

    $h0 = intval($h0_calc * 10);
    $ha = intval($ha_calc * 10);
    $hb = intval($hb_calc * 10);
    $hc = intval($hc_calc * 10);

    $h8 = intval($h8_calc * 10);
    $h9 = intval($h9_calc * 10);


    $fontsizes = [
        'biggest' => $hc,
        'bigger' => $hb,
        'big' => $ha,
        'h0' => $h0,
        'h1' => $h1,
        'h2' => $h2,
        'h3' => $h3,
        'h4' => $h4,
        'h5' => $h5,
        'h6' => $h6,
        'h7' => $h7,
        'h8' => $h8,
        'h9' => $h9,
    ];

    $editor_font_sizes = array();
    foreach ($fontsizes as $key => $value) {
        array_push(
            $editor_font_sizes,
            array(
                'name' => __($key, 'wtp'),
                'size' => $value,
                'slug' => $key
            )
        );
    }

    add_theme_support('editor-font-sizes', $editor_font_sizes);
}

add_action('after_setup_theme', 'set_editor_font_sizes');





/** 
 * ADD SETTING TO CUSTOMIZER
 */
function wtp_customizer_modularscale($wp_customize)
{
    // SETTING - BASE FONT SIZE
    global $wtp_font_sizes;

    $wp_customize->add_setting(
        'wtp_font_size',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => false,
        )
    );

    // CONTROL - BASE FONT SIZE
    $wp_customize->add_control(
        'wtp_font_size',
        array(
            'type'    => 'select',
            'section' => 'wtp_font_section',
            'label'   => __('Font Size', 'wtp'),
            'choices' => $wtp_font_sizes,
        )
    );



    // SETTING - FONT RATIO
    global $wtp_font_ratio;

    $wp_customize->add_setting(
        'wtp_font_ratio',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => false,
        )
    );

    // CONTROLL - FONT RATIO
    $wp_customize->add_control(
        'wtp_font_ratio',
        array(
            'type'    => 'select',
            'section' => 'wtp_font_section',

            'label'   => __('Font Ratio', 'wtp'),
            'choices' => $wtp_font_ratio,
        )
    );
}
add_action('customize_register', 'wtp_customizer_modularscale');
