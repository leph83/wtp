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
    '2.9' => '29px',
    '3.0' => '30px',
    '3.1' => '31px',
    '3.2' => '32px',
    '3.3' => '33px',
    '3.4' => '34px',
    '3.5' => '35px',
    '3.6' => '36px',
    '3.7' => '37px',
    '3.8' => '38px',
    '3.9' => '39px',
    '4.0' => '40px',
);

$wtp_fontsize_ratio = array(
    'initial' => false,
    '1.067' => '1.067 - minor second - 15:16',
    '1.125' => '1.125 - major second - 8:9',
    '1.2'  => '1.2 - minor third - 5:6',
    '1.25'  => '1.25 - major third - 4:5',
    '1.333'  => '1.333 - perfect fourth - 3:4',
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
                'name' => __($key, 'wtp-theme'),
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
            'label'   => __('Font Size Min', 'wtp-theme'),
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
            'label'   => __('Font Size Max', 'wtp-theme'),
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

            'label'   => __('Font Size Ratio', 'wtp-theme'),
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
            'label'   => __('Font Size Min Width in px', 'wtp-theme'),
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
            'label'   => __('Font Size Max Width in px', 'wtp-theme'),
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
                'label'   => __('Line Height ' . $key, 'wtp-theme'),
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

    $base_font_size = '1.6';
    if (get_theme_mod('wtp_fontsize_min') && (get_theme_mod('wtp_fontsize_min') != 'initial')) {
        $base_font_size = get_theme_mod('wtp_fontsize_min');
    }

    $base_font_size_max = '1.6';
    if (get_theme_mod('wtp_fontsize_max') && (get_theme_mod('wtp_fontsize_max') != 'initial')) {
        $base_font_size_max = get_theme_mod('wtp_fontsize_max');
    }

    $fontsize_ratio = 1.125;
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
        --fontsize-min: ' . $base_font_size . ';
        --fontsize-max: ' . $base_font_size_max . ';
        --fontsize-minwidth: ' . $fontsize_minwidth / 10  . ';
        --fontsize-maxwidth: ' . $fontsize_maxwidth / 10  . ';
        --fontsize-ratio: ' . $fontsize_ratio . ';
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
