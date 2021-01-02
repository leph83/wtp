<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

if (get_theme_mod('disable_custom_color_picker')) {
	function disable_custom_color_picker()
	{
		add_theme_support('disable-custom-colors');
	}

	add_action('after_setup_theme', 'disable_custom_color_picker');
}



// ADD SETTING TO CUSTOMIZER
function wtp_customizer_disable_custom_color_picker($wp_customize)
{
	// SETTING
	$wp_customize->add_setting(
		'disable_custom_color_picker',
		array(
			'capability'	=> 'edit_theme_options',
			'default'    	=> false
		)
	);

	// CONTROL
	$wp_customize->add_control(
		'disable_custom_color_picker',
		array(
			'type'      => 'checkbox',
			'section'   => 'wtp_disable_section',
			'label'     => __('Disable Custom Color Picker', 'wtp'),
		)
	);
}
add_action('customize_register', 'wtp_customizer_disable_custom_color_picker');
