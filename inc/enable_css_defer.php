<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


if (get_theme_mod('enable_css_defer')) {
function add_rel_preload($html, $handle, $href, $media) {
    
    if (is_admin())
        return $html;

     $html = <<<EOT
<link rel='preload' as="style" onload="this.onload=null;this.rel='stylesheet'" id='$handle' href='$href'><noscript><link rel='stylesheet' href='$href'></noscript>
EOT;
    return $html;
}
add_filter( 'style_loader_tag', 'add_rel_preload', 10, 4 );
}