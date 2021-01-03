<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// TODO: Use GET Option to store all css in that and just output one <style> tag


/**
 *
 */
$wtp_layout_width = array(
    "alignfull " => 0,
    "alignwide" => 100,
    "content-narrow" => 60,
);



/**
 * ADD WIDTH TO CUSTOMIZER
 * 
 *  $wp_customize->add_setting('wtp_layout_width_' . $key, array(
 *      'default'   => 0,
 *  ));
 * 
 *	$wp_customize->add_control(
 *		'logo_size',
 *		array(
 *			'type'    => 'number',
 *			'section' => 'wtp_layoutwidth_section',
 *			'label'   => __('Layout width', 'wtp'),
 *		)
 *	);
 * 
 */
function wtp_customizer_layout_width($wp_customize)
{
    global $wtp_layout_width;

    if (!empty($wtp_layout_width)) {
        foreach ($wtp_layout_width as $key => $value) {
            $wp_customize->add_setting('wtp_layout_width_' . $key, array(
                'default'   => $value,
            ));
            $wp_customize->add_control(
                'wtp_layout_width_' . $key,
                array(
                    'type'    => 'number',
                    'section' => 'wtp_layoutwidth_section',
                    'label'   => __('Layout width ' . $key . ' in rem', 'wtp'),
                )
            );
        }
    }
}
add_action('customize_register', 'wtp_customizer_layout_width');






/**
 * ADD COLOR VARIABLES AS INLINE CSS TO HEADER
 */
function hook_wtp_layout_width_css()
{
    global $wtp_layout_width;

    $style = '';
    $style_variables = '';
    $style_width = '';

    if (!empty($wtp_layout_width)) {
        $count = 1;
        foreach ($wtp_layout_width as $key => $value) {
            if (get_theme_mod('wtp_layout_width_' . $key) && get_theme_mod('wtp_layout_width_' . $key) != 0) {
                $value = get_theme_mod('wtp_layout_width_' . $key) . 'rem';
            }

            if ($value == 0) {
                $value = '100%';
            }

            $style_variables .= '
			--max-width-' . $count . ': ' . $value . ';';

            $style_width .= '
			.' . $key . ' {
				max-width: var(--max-width-' . $count . ');
            }';
            
            $count++;
        }
    }

    $style .= '<style>
	:root {' . $style_variables . '
	}
	' . $style_width . '
	</style>';

    echo $style;
}
add_action('wp_head', 'hook_wtp_layout_width_css');
