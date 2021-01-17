<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// TODO: Use GET Option to store all css in that and just output one <style> tag

/**
 * DEFINE AVAILABLE FONT SIZES, RATIO and NAME TO CHOOSE
 */
$wtp_base_font_size = array(
    'initial' => 'initial',
    '1.4' => '14px',
    '1.5' => '15px',
    '1.6' => '16px',
    '1.7' => '17px',
    '1.8' => '18px',
    '1.9' => '19px',
    '2.0' => '20px',
    '2.1' => '21px',
    '2.2' => '22px',
    '2.3' => '23px',
    '2.4' => '24px',
    '2.5' => '25px',
    '2.6' => '26px',
    '2.7' => '27px',
    '2.8' => '28px',
);

$wtp_font_ratio = array(
    'initial' => false,
    '1.067' => '1.067 - minor second - 15:16',
    '1.125' => '1.125 - major second - 8:9',
    '1.2'  => '1.2 - minor third - 5:6',
    '1.25'  => '1.25 - major third - 4:5',
    '1.333'  => '1.333 - perfect fourth - 3:4',
);

$wtp_font_sizes = [
    'biggest' => 'c',
    'bigger' => 'b',
    'big' => 'a',
    'h0' => 0,
    'h1' => 1,
    'h2' => 2,
    'h3' => 3,
    'h4' => 4,
    'h5' => 5,
    'h6' => 6,
    'h7' => 7,
    'h8' => 8,
    'h9' => 9,
];



/** 
 * Make fontsizes selectable in the editor
 * to keep font settings, after changing values in customizer the size is fixed to 16
 * also prevents font to be to big in the selector
 * TODO: add the css to the backend, so changes are visible
 */
function set_editor_font_sizes()
{
    global $wtp_font_sizes;

    $editor_font_sizes = array();
    $count = 0;
    foreach ($wtp_font_sizes as $key => $value) {
        array_push(
            $editor_font_sizes,
            array(
                'name' => __($key, 'wtp'),
                'size' => 16 + 10 - $count,
                'slug' => $key,
            )
        );

        $count++;
    }

    add_theme_support('editor-font-sizes', $editor_font_sizes);
}
add_action('after_setup_theme', 'set_editor_font_sizes');



/** 
 * ADD SETTING TO CUSTOMIZER
 */
function wtp_customizer_modularscale($wp_customize)
{
    // SETTING - BASE FONT SIZE
    global $wtp_base_font_size;
    global $wtp_font_sizes;

    $wp_customize->add_setting(
        'wtp_font_size',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => false,
        )
    );

    // CONTROL - BASE FONT SIZE
    $wp_customize->add_control(
        'wtp_font_size',
        array(
            'type'    => 'select',
            'section' => 'wtp_font_section',
            'label'   => __('Font Size', 'wtp'),
            'choices' => $wtp_base_font_size,
        )
    );

    // SETTING - BASE FONT SIZE MAX
    global $wtp_base_font_size;

    $wp_customize->add_setting(
        'wtp_font_size_max',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => false,
        )
    );

    // CONTROL - BASE FONT SIZE MAX
    $wp_customize->add_control(
        'wtp_font_size_max',
        array(
            'type'    => 'select',
            'section' => 'wtp_font_section',
            'label'   => __('Font Size Max', 'wtp'),
            'choices' => $wtp_base_font_size,
        )
    );


    // SETTING - FONT RATIO
    global $wtp_font_ratio;

    $wp_customize->add_setting(
        'wtp_font_ratio',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => false,
        )
    );

    // CONTROLL - FONT RATIO
    $wp_customize->add_control(
        'wtp_font_ratio',
        array(
            'type'    => 'select',
            'section' => 'wtp_font_section',

            'label'   => __('Font Ratio', 'wtp'),
            'choices' => $wtp_font_ratio,
        )
    );

    // FONT SIZE BREAK POINT
    $wp_customize->add_setting('wtp_font_size_breakpoint', array(
        'default'   => 1280,
    ));
    $wp_customize->add_control(
        'wtp_font_size_breakpoint',
        array(
            'type'    => 'number',
            'section' => 'wtp_font_section',
            'label'   => __('Font Size Break Point', 'wtp'),
        )
    );

    // LINE HEIGHT
    foreach ($wtp_font_sizes as $key => $value) {
        // LINE HEIGHT FOR EACH FONT SIZE
        $wp_customize->add_setting('wtp_lineheight_' . $value, array(
            'default'   => '',
        ));
        $wp_customize->add_control(
            'wtp_lineheight_' . $value,
            array(
                'type'    => 'text',
                'section' => 'wtp_font_section',
                'label'   => __('Line Height ' . $key, 'wtp'),
            )
        );
    }
}
add_action('customize_register', 'wtp_customizer_modularscale');



/**
 * ADD FONT VARIABLES AS INLINE CSS TO HEADER
 */
function hook_wtp_fontsizes_css()
{
    global $wtp_font_sizes;

    $style = '';
    $style_variables = '';
    $style_fontsizes = '';

    $base_font_size = '1.6';
    if (get_theme_mod('wtp_font_size') && (get_theme_mod('wtp_font_size') != 'initial')) {
        $base_font_size = get_theme_mod('wtp_font_size');
    }

    $base_font_size_max = '1.6';
    if (get_theme_mod('wtp_font_size_max') && (get_theme_mod('wtp_font_size_max') != 'initial')) {
        $base_font_size_max = get_theme_mod('wtp_font_size_max');
    }

    $font_ratio = 1.125;
    if (get_theme_mod('wtp_font_ratio') && (get_theme_mod('wtp_font_ratio') != 'initial')) {
        $font_ratio = get_theme_mod('wtp_font_ratio');
    }

    $font_size_breakpoint = 1280;
    if (get_theme_mod('wtp_font_size_breakpoint') && (get_theme_mod('wtp_font_size_breakpoint') != 'initial')) {
        $font_size_breakpoint = get_theme_mod('wtp_font_size_breakpoint');
    }

    // CALC VW from breakpoint and font size
    $font_size_breakpoint = 1 / (intval($font_size_breakpoint) / floatval($base_font_size) / 1000);

    $style_variables .= '
        --font-size: ' . $base_font_size . 'rem;
        --font-size-ratio: ' . $font_ratio . ';
        --font-size-max: ' . $base_font_size_max . 'rem;
        --font-size-breakpoint: ' . $font_size_breakpoint  . 'vw;
    ';

    if (!empty($wtp_font_sizes)) {
        foreach ($wtp_font_sizes as $key => $value) {
            if (is_int($value)) {
                $style_fontsizes .= '
        .has-h-' . $value . '-font-size {
            font-size: var(--font-size-' . $value . ');
            line-height: var(--line-height-' . $value . ');
        }';
            } else {
                $style_fontsizes .= '
        .has-' . $key . '-font-size {
            font-size: var(--font-size-' . $value . ');
            line-height: var(--line-height-' . $value . ');
        }';
            }

            if (get_theme_mod('wtp_lineheight_' . $value)) {
                $style_variables .= '
        --line-height-' . $value . ': ' . get_theme_mod('wtp_lineheight_' . $value) . ';';
            }
        }
    }

    $style .= '<style>
	:root {' . $style_variables . '
	}
	' . wp_strip_all_tags($style_fontsizes) . '
	</style>';

    echo $style;
}
add_action('wp_head', 'hook_wtp_fontsizes_css');
