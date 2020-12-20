<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}


function wtp_customizer_settings($wp_customize)
{
	// ADD NEW SECTION FOR CUSTOMIZER
	$wp_customize->add_section('wtp_theme_customizer', array(
		'title'      => __('WTP Theme Settings', 'wtp'),
		'priority' => 120,
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
			'label'   => esc_html__('Display Site Title & Tagline', 'wtp'),
		)
	);
}
add_action('customize_register', 'wtp_customizer_settings');
