<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function set_editor_font_sizes() {
    $base_font_size = '1.6';
    if ( get_theme_mod('wtp_font_size') ) {
        $base_font_size = floatval(get_theme_mod('wtp_font_size'));
    }

    // I guess this calculation doesn't have to be that complicated, but it's late
    $font_ratio = floatval(get_theme_mod('wtp_font_ratio'));

    $font_size_h7_calc = $base_font_size / 10;
    $font_size_h6_calc = $font_size_h7_calc * $font_ratio;
    $font_size_h5_calc = $font_size_h6_calc * $font_ratio;
    $font_size_h4_calc = $font_size_h5_calc * $font_ratio;
    $font_size_h3_calc = $font_size_h4_calc * $font_ratio;
    $font_size_h2_calc = $font_size_h3_calc * $font_ratio;
    $font_size_h1_calc = $font_size_h2_calc * $font_ratio;

    $font_size_h0_calc = $font_size_h1_calc * $font_ratio;
    $font_size_ha_calc = $font_size_h0_calc * $font_ratio;
    $font_size_hb_calc = $font_size_ha_calc * $font_ratio;
    $font_size_hc_calc = $font_size_hb_calc * $font_ratio;

    $font_size_h8_calc = $font_size_h7_calc / $font_ratio;
    $font_size_h9_calc = $font_size_h8_calc / $font_ratio;

    // OUTPUT
    $font_size_h7 = intval($font_size_h7_calc * 10);
    $font_size_h6 = intval($font_size_h6_calc * 10);
    $font_size_h5 = intval($font_size_h5_calc * 10);
    $font_size_h4 = intval($font_size_h4_calc * 10);
    $font_size_h3 = intval($font_size_h3_calc * 10);
    $font_size_h2 = intval($font_size_h2_calc * 10);
    $font_size_h1 = intval($font_size_h1_calc * 10);

    $font_size_h0 = intval($font_size_h0_calc * 10);
    $font_size_ha = intval($font_size_ha_calc * 10);
    $font_size_hb = intval($font_size_hb_calc * 10);
    $font_size_hc = intval($font_size_hc_calc * 10);

    $font_size_h8 = intval($font_size_h8_calc * 10);
    $font_size_h9 = intval($font_size_h9_calc * 10);

    add_theme_support('editor-font-sizes', array(
        array(
            'name' => __('biggest', 'wtp'),
            'size' => $font_size_hc,
            'slug' => 'h-c'
        ),
        array(
            'name' => __('bigger', 'wtp'),
            'size' => $font_size_hb,
            'slug' => 'h-b'
        ),
        array(
            'name' => __('big', 'wtp'),
            'size' => $font_size_ha,
            'slug' => 'h-a'
        ),
        array(
            'name' => __('h0', 'wtp'),
            'size' => $font_size_h0,
            'slug' => 'h0'
        ),
        array(
            'name' => __('h1', 'wtp'),
            'size' => $font_size_h1,
            'slug' => 'h1'
        ),
        array(
            'name' => __('h2', 'wtp'),
            'size' => $font_size_h2,
            'slug' => 'h2'
        ),
        array(
            'name' => __('h3', 'wtp'),
            'size' => $font_size_h3,
            'slug' => 'h3'
        ),
        array(
            'name' => __('h4', 'wtp'),
            'size' => $font_size_h4,
            'slug' => 'h4'
        ),
        array(
            'name' => __('h5', 'wtp'),
            'size' => $font_size_h5,
            'slug' => 'h5'
        ),
        array(
            'name' => __('h6', 'wtp'),
            'size' => $font_size_h6,
            'slug' => 'h6'
        ),
        array(
            'name' => __('paragraph', 'wtp'),
            'size' => $font_size_h7,
            'slug' => 'h7'
        ),
        array(
            'name' => __('small', 'wtp'),
            'size' => $font_size_h8,
            'slug' => 'h8'
        ),
        array(
            'name' => __('smaller', 'wtp'),
            'size' => $font_size_h9,
            'slug' => 'h9'
        )
    ));
}

add_action('after_setup_theme', 'set_editor_font_sizes');




// ADD SETTING TO CUSTOMIZER
function wtp_customizer_modularscale($wp_customize)
{

    // FONT SIZE
	$wp_customize->add_setting(
		'wtp_font_size',
		array(
			'capability'        => 'edit_theme_options',
			'default'           => false,
		)
	);

	$wp_customize->add_control(
		'wtp_font_size',
		array(
			'type'    => 'select',
			'section' => 'wtp_theme_customizer',
			'label'   => __('Font Size', 'wtp'),
			'choices' => array(
				'16' => '16px',
                '17' => '17px',
                '18'  => '18px',
                '19'  => '19px',
                '20'  => '20px',
			),
		)
    );


    // FONT RATIO
	$wp_customize->add_setting(
		'wtp_font_ratio',
		array(
			'capability'        => 'edit_theme_options',
			'default'           => false,
		)
	);

	$wp_customize->add_control(
		'wtp_font_ratio',
		array(
			'type'    => 'select',
			'section' => 'wtp_theme_customizer',
			'label'   => __('Font Ratio', 'wtp'),
			'choices' => array(
				'1.067' => '1.067 - minor second - 15:16',
                '1.125' => '1.125 - major second - 8:9',
                '1.2'  => '1.2 - minor third - 5:6',
                '1.25'  => '1.25 - major third - 4:5',
                '1.333'  => '1.333 - perfect fourth - 3:4',
			),
		)
    );

}
add_action('customize_register', 'wtp_customizer_modularscale');
