<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// TODO: Use GET Option to store all css in that and just output one <style> tag

/**
 * DEFINE AVAILABLE FONT SIZES, RATIO and NAME TO CHOOSE
 */
$wtp_fontsize = array(
    'initial' => 'initial',
    14 => '14px',
    15 => '15px',
    16 => '16px',
    17 => '17px',
    18 => '18px',
    19 => '19px',
    20 => '20px',
    21 => '21px',
    22 => '22px',
    23 => '23px',
    24 => '24px',
    25 => '25px',
    26 => '26px',
    27 => '27px',
    28 => '28px',
    29 => '29px',
    30 => '30px',
    31 => '31px',
    32 => '32px',
    33 => '33px',
    34 => '34px',
    35 => '35px',
    36 => '36px',
    37 => '37px',
    38 => '38px',
    39 => '39px',
    40 => '40px',
);

$wtp_fontsize_ratio = array(
    'initial' => false,
    '1067' => '1.067 - minor second - 15:16',
    '1125' => '1.125 - major second - 8:9',
    '1200'  => '1.2 - minor third - 5:6',
    '1250'  => '1.25 - major third - 4:5',
    '1333'  => '1.333 - perfect fourth - 3:4',
);

$wtp_fontsize_names = [
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
 * 
 * TODO: add the css to the backend, so changes are visible
 */
function set_editor_font_sizes()
{
    global $wtp_fontsize_names;

    $editor_font_sizes = array();
    $count = 0;
    foreach ($wtp_fontsize_names as $key => $value) {
        array_push(
            $editor_font_sizes,
            array(
                'name' => $key,
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
    global $wtp_fontsize;
    global $wtp_fontsize_names;

    $wp_customize->add_setting(
        'wtp_fontsize_min',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => '',
            'sanitize_callback' => 'theme_slug_sanitize_select',
        )
    );

    // CONTROL - BASE FONT SIZE
    $wp_customize->add_control(
        'wtp_fontsize_min',
        array(
            'type'    => 'select',
            'section' => 'wtp_font_section',
            'label'   => __('Font Size Min', 'wtp'),
            'choices' => $wtp_fontsize,
        )
    );

    // SETTING - BASE FONT SIZE MAX
    global $wtp_fontsize;

    $wp_customize->add_setting(
        'wtp_fontsize_max',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => '',
            'sanitize_callback' => 'theme_slug_sanitize_select',
        )
    );

    // CONTROL - BASE FONT SIZE MAX
    $wp_customize->add_control(
        'wtp_fontsize_max',
        array(
            'type'    => 'select',
            'section' => 'wtp_font_section',
            'label'   => __('Font Size Max', 'wtp'),
            'choices' => $wtp_fontsize,
        )
    );


    // SETTING - FONT RATIO
    global $wtp_fontsize_ratio;

    $wp_customize->add_setting(
        'wtp_fontsize_ratio',
        array(
            'capability'        => 'edit_theme_options',
            'default'           => '',
            'sanitize_callback' => 'theme_slug_sanitize_select',
        )
    );

    // CONTROLL - FONT RATIO
    $wp_customize->add_control(
        'wtp_fontsize_ratio',
        array(
            'type'    => 'select',
            'section' => 'wtp_font_section',

            'label'   => __('Font Size Ratio', 'wtp'),
            'choices' => $wtp_fontsize_ratio,
        )
    );

    // MIN WIDTH
    $wp_customize->add_setting('wtp_fontsize_minwidth', array(
        'default'   => false,
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control(
        'wtp_fontsize_minwidth',
        array(
            'type'    => 'number',
            'section' => 'wtp_font_section',
            'label'   => __('Font Size Min Width in px', 'wtp'),
        )
    );

    // MAX WIDTH
    $wp_customize->add_setting('wtp_fontsize_maxwidth', array(
        'default'   => false,
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control(
        'wtp_fontsize_maxwidth',
        array(
            'type'    => 'number',
            'section' => 'wtp_font_section',
            'label'   => __('Font Size Max Width in px', 'wtp'),
        )
    );



    // LINE HEIGHT
    foreach ($wtp_fontsize_names as $key => $value) {
        // LINE HEIGHT FOR EACH FONT SIZE
        $wp_customize->add_setting('wtp_lineheight_' . $value, array(
            'default'   => '',
            'sanitize_callback' => 'wp_filter_nohtml_kses'
        ));
        $wp_customize->add_control(
            'wtp_lineheight_' . $value,
            array(
                'type'    => 'text',
                'section' => 'wtp_font_section',
                'label'   => $key,
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
    global $wtp_fontsize_names;

    $style = '';
    $style_variables = '';
    $style_fontsizes = '';

    $base_font_size = 16;
    if (get_theme_mod('wtp_fontsize_min') && (get_theme_mod('wtp_fontsize_min') != 'initial')) {
        $base_font_size = get_theme_mod('wtp_fontsize_min');
    }

    $base_font_size_max = 16;
    if (get_theme_mod('wtp_fontsize_max') && (get_theme_mod('wtp_fontsize_max') != 'initial')) {
        $base_font_size_max = get_theme_mod('wtp_fontsize_max');
    }

    $fontsize_ratio = 1125;
    if (get_theme_mod('wtp_fontsize_ratio') && (get_theme_mod('wtp_fontsize_ratio') != 'initial')) {
        $fontsize_ratio = get_theme_mod('wtp_fontsize_ratio');
    }

    $fontsize_minwidth = 100;
    if (get_theme_mod('wtp_fontsize_minwidth') && (get_theme_mod('wtp_fontsize_minwidth') != 'initial')) {
        $fontsize_minwidth = get_theme_mod('wtp_fontsize_minwidth');
    }

    $fontsize_maxwidth = 200;
    if (get_theme_mod('wtp_fontsize_maxwidth') && (get_theme_mod('wtp_fontsize_maxwidth') != 'initial')) {
        $fontsize_maxwidth = get_theme_mod('wtp_fontsize_maxwidth');
    }

    $style_variables .= '
        --fontsize-min: ' . $base_font_size / 10 . ';
        --fontsize-max: ' . $base_font_size_max / 10 . ';
        --fontsize-minwidth: ' . $fontsize_minwidth / 10  . ';
        --fontsize-maxwidth: ' . $fontsize_maxwidth / 10  . ';
        --fontsize-ratio: ' . $fontsize_ratio / 1000 . ';
    ';

    if (!empty($wtp_fontsize_names)) {
        foreach ($wtp_fontsize_names as $key => $value) {
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
	:root {' . wp_strip_all_tags($style_variables) . '
	}
	' . wp_strip_all_tags($style_fontsizes) . '
	</style>';

    echo $style;
}
add_action('wp_head', 'hook_wtp_fontsizes_css');
