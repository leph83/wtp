<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function change_gutenberg_color_palette() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => __('Black', 'wtp'),
            'slug' => 'black',
            'color' => get_theme_mod('wtp_color_black'),
        ),
        array(
            'name' => __('White', 'wtp'),
            'slug' => 'white',
            'color' => get_theme_mod('wtp_color_white'),
        ),
        array(
            'name' => __('Color 1', 'wtp'),
            'slug' => 'color--1',
            'color' => get_theme_mod('wtp_color_1'),
        ),
        array(
            'name' => __('Color 2', 'wtp'),
            'slug' => 'color--2',
            'color' => get_theme_mod('wtp_color_2'),
        ),
        array(
            'name' => __('Color 3', 'wtp'),
            'slug' => 'color--3',
            'color' => get_theme_mod('wtp_color_3'),
        ),
        array(
            'name' => __('Color 4', 'wtp'),
            'slug' => 'color--4',
            'color' => get_theme_mod('wtp_color_4'),
        ),
        array(
            'name' => __('Color 5', 'wtp'),
            'slug' => 'color--5',
            'color' => get_theme_mod('wtp_color_5'),
        ),
    ));
}

add_action( 'after_setup_theme' , 'change_gutenberg_color_palette' );




function wtp_customizer_colors($wp_customize) {
	// SECTION
	$wp_customize->add_section('wtp_theme_customizer', array(
		'title'      => __( 'WTP Theme Settings', 'wtp' ),
		'priority' => 120,
	));

	// Color Black
	$wp_customize->add_setting( 'wtp_color_black' , array(
		'default'   => '#000000',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control(
		$wp_customize,
		'wtp_color_black',
		array(
			'label' => __( 'Color Black', 'wtp' ),
			'section' => 'colors',
			'settings' => 'wtp_color_black',
		)
    ));

    // Color White
	$wp_customize->add_setting( 'wtp_color_white' , array(
		'default'   => '#FFFFFF',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control(
		$wp_customize,
		'wtp_color_white',
		array(
			'label' => __( 'Color White', 'wtp' ),
			'section' => 'colors',
			'settings' => 'wtp_color_white',
		)
    ));
    
	// Color 1
	$wp_customize->add_setting( 'wtp_color_1' , array(
		'default'   => '#000000',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control(
		$wp_customize,
		'wtp_color_1',
		array(
			'label' => __( 'Color 1', 'wtp' ),
			'section' => 'colors',
			'settings' => 'wtp_color_1',
		)
    ));
    
    // Color 2
	$wp_customize->add_setting( 'wtp_color_2' , array(
		'default'   => '#000000',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control(
		$wp_customize,
		'wtp_color_2',
		array(
			'label' => __( 'Color 2', 'wtp' ),
			'section' => 'colors',
			'settings' => 'wtp_color_2',
		)
    ));
    
    // Color 3
	$wp_customize->add_setting( 'wtp_color_3' , array(
		'default'   => '#000000',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control(
		$wp_customize,
		'wtp_color_3',
		array(
			'label' => __( 'Color 3', 'wtp' ),
			'section' => 'colors',
			'settings' => 'wtp_color_3',
		)
    ));
    
    // Color 4
	$wp_customize->add_setting( 'wtp_color_4' , array(
		'default'   => '#000000',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control(
		$wp_customize,
		'wtp_color_4',
		array(
			'label' => __( 'Color 4', 'wtp' ),
			'section' => 'colors',
			'settings' => 'wtp_color_4',
		)
	));
    
    // Color 5
	$wp_customize->add_setting( 'wtp_color_5' , array(
		'default'   => '#000000',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control(
		$wp_customize,
		'wtp_color_5',
		array(
			'label' => __( 'Color 5', 'wtp' ),
			'section' => 'colors',
			'settings' => 'wtp_color_5',
		)
	));

}
add_action('customize_register', 'wtp_customizer_colors');
