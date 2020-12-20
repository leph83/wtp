<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( get_theme_mod('disable_custom_color_picker') ) {
    function disable_custom_color_picker() {
        add_theme_support('disable-custom-colors');
    }

    add_action('after_setup_theme', 'disable_custom_color_picker');
}



// ADD SETTING TO CUSTOMIZER
function wtp_customizer_disable_custom_color_picker($wp_customize) {

	// SECTION
	$wp_customize->add_section('wtp_theme_customizer', array(
		'title'      => __( 'WTP Theme Settings', 'wtp' ),
		'priority' => 120,
	));

	$wp_customize->add_setting('disable_custom_color_picker', array(
		'default'    => true
	));
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'disable_custom_color_picker',
			array(
				'label'     => __('Disable Custom Color Picker', 'wtp'),
				'section'   => 'wtp_theme_customizer',
				'settings'  => 'disable_custom_color_picker',
				'type'      => 'checkbox',

				'capability' => 'edit_theme_options',
			)
		)
	);
}
add_action('customize_register', 'wtp_customizer_disable_custom_color_picker');
