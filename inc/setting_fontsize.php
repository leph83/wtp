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
    '1.4rem' => '14px',
    '1.5rem' => '15px',
    '1.6rem' => '16px',
    '1.7rem' => '17px',
    '1.8rem'  => '18px',
    '1.9rem'  => '19px',
    '2.0rem'  => '20px',
    '2.1rem'  => '21px',
    '2.2rem'  => '22px',
    '2.3rem'  => '23px',
    '2.4rem'  => '24px',
    '2.5rem'  => '25px',
    '2.6rem'  => '26px',
    '2.7rem'  => '27px',
    '2.8rem'  => '28px',
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

    $base_font_size = '1.6rem';
    if (get_theme_mod('wtp_font_size') && (get_theme_mod('wtp_font_size') != 'initial')) {
        $base_font_size = get_theme_mod('wtp_font_size');
    }

    $base_font_size_max = '1.6rem';
    if (get_theme_mod('wtp_font_size_max') && (get_theme_mod('wtp_font_size_max') != 'initial')) {
        $base_font_size_max = get_theme_mod('wtp_font_size_max');
    }

    $font_ratio = 1.125;
    if (get_theme_mod('wtp_font_ratio') && (get_theme_mod('wtp_font_ratio') != 'initial')) {
        $font_ratio = get_theme_mod('wtp_font_ratio');
    }



    $style_variables .= '
        --font-size: ' . $base_font_size . ';
        --font-size-ratio: ' . $font_ratio . ';
        --font-size-max: ' . $base_font_size_max . ';
    ';


    if (!empty($wtp_font_sizes)) {
        foreach ($wtp_font_sizes as $key => $value) {
            if (is_int($value)) {
                $style_fontsizes .= '
                .has-h-' . $value . '-font-size {
                    font-size: var(--font-size-' . $value . ');
                }';
            } else {
                $style_fontsizes .= '
                .has-' . $key . '-font-size {
                    font-size: var(--font-size-' . $value . ');
                }';
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
