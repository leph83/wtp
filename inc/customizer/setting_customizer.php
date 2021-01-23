<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}



function wtp_customizer_settings($wp_customize)
{
	// PANEL WTP THEME OPTIONS
	$wp_customize->add_panel(
		'wtp_panel',
		array(
			'title'      => __('WTP Theme Options', 'wtp'),
			'priority'   => 200,
			'capability' => 'edit_theme_options',
		)
	);

	// SECTION - FONT SETTING
	$wp_customize->add_section('wtp_font_section', array(
		'title' => __('Font Sizes - Modularscale', 'wtp'),
		'capability' => 'edit_theme_options',
		'panel'      => 'wtp_panel'
	));

	// SECTION - LAYOUT WIDTHS
	$wp_customize->add_section('wtp_layoutwidth_section', array(
		'title' => __('Layout', 'wtp'),
		'capability' => 'edit_theme_options',
		'panel'      => 'wtp_panel'
	));

	// SECTION - ENABLE
	$wp_customize->add_section('wtp_enable_section', array(
		'title'      => __('Enable', 'wtp'),
		'capability' => 'edit_theme_options',
		'panel'      => 'wtp_panel'
	));

	// SECTION - DISABLES
	$wp_customize->add_section('wtp_disable_section', array(
		'title'      => __('Disables', 'wtp'),
		'capability' => 'edit_theme_options',
		'panel'      => 'wtp_panel'
	));


	// Add "display_title_and_tagline" setting for displaying the site-title & tagline.
	$wp_customize->add_setting(
		'wtp_display_title_and_tagline',
		array(
			'capability'        => 'edit_theme_options',
			'default'           => false,
			// 'sanitize_callback' => 'theme_slug_sanitize_checkbox',
		)
	);
	$wp_customize->add_control(
		'wtp_display_title_and_tagline',
		array(
			'type'    => 'checkbox',
			'section' => 'title_tagline',
			'label'   => __('Display Site Title & Tagline', 'wtp'),
		)
	);


	// ADD LOGO SIZE
	$wp_customize->add_setting(
		'logo_size',
		array(
			'capability'        => 'edit_theme_options',
			'default'           => 100,
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'logo_size',
		array(
			'type'    => 'number',
			'section' => 'title_tagline',
			'label'   => __('Logo Size', 'wtp'),
			// 'input_attrs' => array(
			// 	'min' => 10,
			// 	'max' => 200,
			// 	'step' => 1,
			//   ),
		)
	);

	// LOGO WIDTH OR HEIGHT
	$wp_customize->add_setting(
		'logo_width_height',
		array(
			'capability'        => 'edit_theme_options',
			'default'           => 'width',
			'sanitize_callback' => 'theme_slug_sanitize_radio',
		)
	);
	$wp_customize->add_control(
		'logo_width_height',
		array(
			'type'    => 'radio',
			'section' => 'title_tagline',
			'label'   => __('Logo Size', 'wtp'),
			'choices' => array(
				'width' => __('Width', 'wtp'),
				'height' => __('Height', 'wtp'),
			),
		)
	);
}
add_action('customize_register', 'wtp_customizer_settings');
