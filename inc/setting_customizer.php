<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}


function wtp_customizer_settings($wp_customize)
{
	// PANEL WTP THEME OPTIONS
	$wp_customize->add_panel( 'wtp_panel',
		array(
			'title'      => __( 'WTP Theme Options', 'wtp' ),
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

	// SECTION - DISABLES
	$wp_customize->add_section('wtp_disable_section', array(
		'title'      => __('Disables', 'wtp'),
		'capability' => 'edit_theme_options',
		'panel'      => 'wtp_panel'
	));
	



	// Add "display_title_and_tagline" setting for displaying the site-title & tagline.
	$wp_customize->add_setting(
		'display_title_and_tagline',
		array(
			'capability'        => 'edit_theme_options',
			'default'           => true,
		)
	);

	$wp_customize->add_control(
		'display_title_and_tagline',
		array(
			'type'    => 'checkbox',
			'section' => 'title_tagline',
			'label'   => __('Display Site Title & Tagline', 'wtp'),
		)
	);

}
add_action('customize_register', 'wtp_customizer_settings');