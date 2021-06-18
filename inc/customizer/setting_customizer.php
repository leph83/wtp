<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

if (!function_exists('wtp_customizer_settings')) {
	function wtp_customizer_settings($wp_customize)
	{
		// PANEL WTP THEME OPTIONS
		$wp_customize->add_panel(
			'wtp_theme_panel',
			array(
				'title'      => 'WTP Theme Options',
				'priority'   => 1000,
				'capability' => 'edit_theme_options',
			)
		);

		// SECTION - FONT SETTING
		$wp_customize->add_section('wtp_font_section', array(
			'title' => 'Font Sizes - Modularscale',
			'capability' => 'edit_theme_options',
			'panel'      => 'wtp_theme_panel'
		));

		$wp_customize->add_section('wtp_font_family_section', array(
			'title' => 'Font Families',
			'capability' => 'edit_theme_options',
			'panel'      => 'wtp_theme_panel'
		));

		// SECTION - LAYOUT WIDTHS
		$wp_customize->add_section('wtp_layoutwidth_section', array(
			'title' => 'Layout',
			'capability' => 'edit_theme_options',
			'panel'      => 'wtp_theme_panel'
		));

		// SECTION - ENABLE
		$wp_customize->add_section('wtp_enable_section', array(
			'title'      => 'Enable',
			'capability' => 'edit_theme_options',
			'panel'      => 'wtp_theme_panel'
		));

		// SECTION - DISABLES
		$wp_customize->add_section('wtp_disable_section', array(
			'title'      => 'Disable',
			'capability' => 'edit_theme_options',
			'panel'      => 'wtp_theme_panel'
		));

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
				'label'   => __('Logo Size', 'wtp-theme'),
				// 'input_attrs' => array(
				// 	'min' => 10,
				// 	'max' => 200,
				// 	'step' => 1,
				//   ),
			)
		);

		// HIDE TAGLINE
		$wp_customize->add_setting(
			'hide_tagline',
			array(
				'default' => '',
				'sanitize_callback' => 'wtp_sanitize_checkbox'
			)
		);
		$wp_customize->add_control(
			'hide_tagline',
			array(
				'type'      => 'checkbox',
				'section'   => 'title_tagline',
				'label'     => __('hide tagline', 'wtp-theme'),
			)
		);
	}
	add_action('customize_register', 'wtp_customizer_settings');
}
