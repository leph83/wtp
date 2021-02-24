<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * LOAD CSS
 */
if (!function_exists('wtp_load_styles')) {
    function wtp_load_styles()
    {
        $css_version = filemtime(get_stylesheet_directory() . '/style.css');

        $css_path = '/assets/css/';
        $css_files = array(
            'phucstrap/01-settings/setting.variables.css',
    
            'phucstrap/02-tools/tool.fluidfont.css',
            'phucstrap/02-tools/tool.modularscale.css',
            
            'phucstrap/03-generic/generic.normalize.css',
            'phucstrap/03-generic/generic.preset.css',

            'phucstrap/04-elements/element.headings.css',
            
            'phucstrap/05-objects/object.boxmodel.css',
            'phucstrap/05-objects/object.flexbox.css',
            'phucstrap/05-objects/object.grid.css',
            
            'phucstrap/05-objects/object.typography.css',
            'phucstrap/05-objects/object.colors.css',
            'phucstrap/05-objects/object.layout.css',
            
            'phucstrap/07-utilities/utility.a11y.css',
            'phucstrap/07-utilities/utility.wordpress.css',
        );

        // STYLES
        $css_id = 0;
        foreach ($css_files as $css_file) {
            wp_enqueue_style('wtp' . $css_id, get_template_directory_uri() . $css_path . $css_file, false, $css_version);
            $css_id++;
        }
    }
    add_action('wp_enqueue_scripts', 'wtp_load_styles');
}
