<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// TODO: Use GET Option to store all css in that and just output one <style> tag

/**
 *
 */
$wtp_layout_width = array(
    "alignfull " => '100%',
    "alignwide" => '100rem',
    "aligncontent" => '60rem',
);



/**
 * ADD WIDTH TO CUSTOMIZER
 * 
 */
function wtp_customizer_layout_width($wp_customize)
{
    global $wtp_layout_width;

    if (!empty($wtp_layout_width)) {
        foreach ($wtp_layout_width as $key => $value) {
            $wp_customize->add_setting('wtp_layout_width_' . $key, array(
                'default'   => $value,
                'sanitize_callback' => 'wp_filter_nohtml_kses'
            ));
            $wp_customize->add_control(
                'wtp_layout_width_' . $key,
                array(
                    'type'    => 'text',
                    'section' => 'wtp_layoutwidth_section',
                    'label'   => 'Layout width ' . $key . ' with unit',
                )
            );
        }
    }


    // GUTTER
    $wp_customize->add_setting('wtp_layout_gutter', array(
        'default'   => '',
        'sanitize_callback' => 'wp_filter_nohtml_kses'
    ));
    $wp_customize->add_control(
        'wtp_layout_gutter',
        array(
            'type'    => 'text',
            'section' => 'wtp_layoutwidth_section',
            'label'   => __('Layout Gutter', 'wtp-theme'),
        )
    );
}
add_action('customize_register', 'wtp_customizer_layout_width');



/**
 * ADD LAYOUT WIDTH AS INLINE CSS TO HEADER
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
                $value = get_theme_mod('wtp_layout_width_' . $key);
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

    if (get_theme_mod('wtp_layout_gutter')) {
        $style_variables .= '
        --gutter: '. get_theme_mod('wtp_layout_gutter') .';';
    }

    $style .= '<style>
    :root {' . $style_variables . '
	}
	' . $style_width . '
	</style>';

    echo $style;
}
add_action('wp_head', 'hook_wtp_layout_width_css');
