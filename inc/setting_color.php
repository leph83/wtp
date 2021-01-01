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
	"1" => "#dd3333",
	"2" => "#dd9933",
	"3" => "#eeee22",
	"4" => "#81d742",
	"5" => "#1e73be",
	"6" => "#8224e3",
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
 * 
 * 	$wp_customize->add_setting('wtp_color_white', array(
 *		'default'   => '#FFFFFF',
 *	));
 *	$wp_customize->add_control(new WP_Customize_Color_Control(
 *		$wp_customize,
 *		'wtp_color_white',
 *		array(
 *			'label' => __('Color White', 'wtp'),
 *			'section' => 'colors',
 *			'settings' => 'wtp_color_white',
 *		)
 *	));
 * 
 */
function wtp_customizer_colors($wp_customize)
{
	// SECTION
	$wp_customize->add_section('wtp_theme_customizer', array(
		'title'      => __('WTP Theme Settings', 'wtp'),
		'priority' => 120,
	));

	global $wtp_colors;

	if (!empty($wtp_colors)) {
		foreach ($wtp_colors as $key => $value) {
			$wp_customize->add_setting('wtp_color_' . $key, array(
				'default'   => $value,
			));
			$wp_customize->add_control(new WP_Customize_Color_Control(
				$wp_customize,
				'wtp_color_' . $key,
				array(
					'label' => __('Color ' . $key, 'wtp'),
					'section' => 'colors',
					'settings' => 'wtp_color_' . $key,
				)
			));
		}
	}

}
add_action('customize_register', 'wtp_customizer_colors');






/**
 * ADD COLOR VARIABLES AS INLINE CSS TO HEADER
 */
function hook_css()
{
	global $wtp_colors;

	$style = '';
	$style_variables = '';
	$style_colors = '';

	if (!empty($wtp_colors)) {
		foreach ($wtp_colors as $key => $value) {
			if (get_theme_mod('wtp_color_' . $key)) {
				$value = get_theme_mod('wtp_color_' . $key);
			}
			$style_variables .= '
			--color-' . $key . ': ' . $value . ';';

			$style_colors .= '
			.has-color-'.$key.'-color {
				color: var(--color-'.$key.');
			}

			.has-color-'.$key.'-background-color {
				background-color: var(--color-'.$key.');
			}';
		}
	}

	$style .= '<style>
	:root {'. $style_variables .'
	}
	'. $style_colors .'
	</style>';

	echo $style;
}
add_action('wp_head', 'hook_css');
