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
        

        $css_path = '/assets/css/phucstrap/';
        $css_files = array(
            '01-settings/setting.variables.css',
    
            '02-tools/tool.fluidfont.css',
            '02-tools/tool.modularscale.css',
            
            '03-generic/generic.normalize.css',
            '03-generic/generic.preset.css',

            '04-elements/element.headings.css',
            
            '05-objects/object.boxmodel.css',
            '05-objects/object.flexbox.css',
            '05-objects/object.grid.css',
            
            '05-objects/object.typography.css',
            '05-objects/object.colors.css',
            '05-objects/object.layout.css',
            
            '07-utilities/utility.a11y.css',
            '07-utilities/utility.wordpress.css',
        );

        // STYLES
        $css_id = 0;
        foreach ($css_files as $css_file) {

            $css_version = filemtime(get_template_directory() . $css_path . $css_file);

            wp_enqueue_style('wtp-' . $css_id, get_template_directory_uri() . $css_path . $css_file, false, $css_version);
            $css_id++;
        }
    }
    add_action('wp_enqueue_scripts', 'wtp_load_styles');
}
