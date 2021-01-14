<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


/**
 * INCREASE PERFORMANCE
 * LOOP THROUGH CSS FILES AND ADD REL PRELOAD FOR EACH FILE
 */
if (! function_exists('wtp_add_rel_preload')) {
function wtp_add_rel_preload($html, $handle, $href, $media)
{
    if (is_admin())
        return $html;

    $html .= <<<EOT
    <link rel='preload' as='style' href='$href'>
    
    EOT;

    return $html;
}

add_filter('style_loader_tag', 'wtp_add_rel_preload', 10, 4);
}