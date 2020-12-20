<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function set_editor_font_sizes() {
    add_theme_support('editor-font-sizes', array(
        array(
            'name' => __('biggest', 'wtp'),
            'size' => 52,
            'slug' => 'h-c'
        ),
        array(
            'name' => __('bigger', 'wtp'),
            'size' => 46,
            'slug' => 'h-b'
        ),
        array(
            'name' => __('big', 'wtp'),
            'size' => 41,
            'slug' => 'h-a'
        ),
        array(
            'name' => __('h0', 'wtp'),
            'size' => 36,
            'slug' => 'h0'
        ),
        array(
            'name' => __('h1', 'wtp'),
            'size' => 32,
            'slug' => 'h1'
        ),
        array(
            'name' => __('h2', 'wtp'),
            'size' => 29,
            'slug' => 'h2'
        ),
        array(
            'name' => __('h3', 'wtp'),
            'size' => 26,
            'slug' => 'h3'
        ),
        array(
            'name' => __('h4', 'wtp'),
            'size' => 23,
            'slug' => 'h4'
        ),
        array(
            'name' => __('h5', 'wtp'),
            'size' => 20,
            'slug' => 'h5'
        ),
        array(
            'name' => __('h6', 'wtp'),
            'size' => 18,
            'slug' => 'h6'
        ),
        array(
            'name' => __('paragraph', 'wtp'),
            'size' => 16,
            'slug' => 'h7'
        ),
        array(
            'name' => __('small', 'wtp'),
            'size' => 14,
            'slug' => 'h8'
        ),
        array(
            'name' => __('smaller', 'wtp'),
            'size' => 13,
            'slug' => 'h9'
        )
    ));
}

add_action('after_setup_theme', 'set_editor_font_sizes');




// ADD SETTING TO CUSTOMIZER
function wtp_customizer_modularscale($wp_customize)
{
	$wp_customize->add_setting(
		'font_ratio',
		array(
			'capability'        => 'edit_theme_options',
			'default'           => true,
		)
	);

	$wp_customize->add_control(
		'font_ratio',
		array(
			'type'    => 'select',
			'section' => 'wtp_theme_customizer',
			'label'   => esc_html__('Font Ratio', 'wtp'),
			'choices' => array(
				'1.067' => '15:16 minor second - 1.067',
                '1.125' => '8:9 major second - 1.125',
                '1.2'  => '5:6 minor third - 1.2',
                '1.25'  => '4:5 major third - 1.25',
                '1.333'  => '3:4 perfect fourth - 1.333',
			),
		)
    );
}
add_action('customize_register', 'wtp_customizer_modularscale');
