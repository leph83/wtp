<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}


/**
 * DEFINE HOW MANY COLORS ARE AVAILABLE WITH FALLBACK
 * Don't use colors twice, editor will mark both as selected
 */
$wtp_colors = array(
	"black" => "#000000",
	"white" => "#ffffff",
	"1" => "#111111",
	"2" => "#222222",
	"3" => "#333333",
	"4" => "#444444",
	"5" => "#555555",
);


/**
 * ADD COLORS TO EDITOR
 * 	
 * add_theme_support('editor-color-palette', array(
 *	 	array(
 *	 		'name' => __('Black', 'wtp'),
 *	 		'slug' => 'black',
 *	 		'color' => $color_black,
 *	 	),
 *	 ));
 */
function change_gutenberg_color_palette()
{
	global $wtp_colors;
	$colors = [];

	if (!empty($wtp_colors)) {
		foreach ($wtp_colors as $key => $value) {
			if (get_theme_mod('wtp_color_' . $key)) {
				$value = get_theme_mod('wtp_color_' . $key);
			}

			array_push(
				$colors,
				array(
					'name' => __('color ' . $key, 'wtp'),
					'slug' => 'color--' . $key,
					'color' => $value,
				)
			);
		}
	}

	add_theme_support('editor-color-palette', $colors);
}

add_action('after_setup_theme', 'change_gutenberg_color_palette');




/**
 * ADD COLORS TO CUSTOMIZER
 */
function wtp_customizer_colors($wp_customize)
{
	// SECTION
	$wp_customize->add_section('wtp_theme_customizer', array(
		'title'      => __('WTP Theme Settings', 'wtp'),
		'priority' => 120,
	));

	// Color Black
	$wp_customize->add_setting('wtp_color_black', array(
		'default'   => '#000000',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control(
		$wp_customize,
		'wtp_color_black',
		array(
			'label' => __('Color Black', 'wtp'),
			'section' => 'colors',
			'settings' => 'wtp_color_black',
		)
	));

	// Color White
	$wp_customize->add_setting('wtp_color_white', array(
		'default'   => '#FFFFFF',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control(
		$wp_customize,
		'wtp_color_white',
		array(
			'label' => __('Color White', 'wtp'),
			'section' => 'colors',
			'settings' => 'wtp_color_white',
		)
	));

	// Color 1
	$wp_customize->add_setting('wtp_color_1', array(
		'default'   => '#111111',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control(
		$wp_customize,
		'wtp_color_1',
		array(
			'label' => __('Color 1', 'wtp'),
			'section' => 'colors',
			'settings' => 'wtp_color_1',
		)
	));

	// Color 2
	$wp_customize->add_setting('wtp_color_2', array(
		'default'   => '#222222',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control(
		$wp_customize,
		'wtp_color_2',
		array(
			'label' => __('Color 2', 'wtp'),
			'section' => 'colors',
			'settings' => 'wtp_color_2',
		)
	));

	// Color 3
	$wp_customize->add_setting('wtp_color_3', array(
		'default'   => '#333333',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control(
		$wp_customize,
		'wtp_color_3',
		array(
			'label' => __('Color 3', 'wtp'),
			'section' => 'colors',
			'settings' => 'wtp_color_3',
		)
	));

	// Color 4
	$wp_customize->add_setting('wtp_color_4', array(
		'default'   => '#444444',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control(
		$wp_customize,
		'wtp_color_4',
		array(
			'label' => __('Color 4', 'wtp'),
			'section' => 'colors',
			'settings' => 'wtp_color_4',
		)
	));

	// Color 5
	$wp_customize->add_setting('wtp_color_5', array(
		'default'   => '#555555',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control(
		$wp_customize,
		'wtp_color_5',
		array(
			'label' => __('Color 5', 'wtp'),
			'section' => 'colors',
			'settings' => 'wtp_color_5',
		)
	));
}
add_action('customize_register', 'wtp_customizer_colors');






/**
 * ADD COLOR VARIABLES AS INLINE CSS TO HEADER
 */
function hook_css()
{
	global $wtp_colors;
	$style = '<style>:root {';

	if (!empty($wtp_colors)) {
		foreach ($wtp_colors as $key => $value) {
			if (get_theme_mod('wtp_color_' . $key)) {
				$value = get_theme_mod('wtp_color_' . $key);
			}
			$style .= '--color-' . $key . ': ' . $value . ';';
		}
	}

	$style .= '}</style>';

	echo $style;
}
add_action('wp_head', 'hook_css');
