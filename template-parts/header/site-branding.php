<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>

<?php

/**
 * Displays header site branding
 */

$blog_name = get_bloginfo('name');
$blog_description = get_bloginfo('description', 'display');
$show_title = display_header_text() ?? false;

// LOGO
$logo = '';
if (has_custom_logo()) {
    $custom_logo_id = get_theme_mod('custom_logo');

    $logo_width  = 300;
    $logo_height = 100;

    if (get_theme_mod('logo_size')) {
        $logo_width  = get_theme_mod('logo_size');
        $logo_height = 0;

        if (get_theme_mod('logo_width_height') == 'height') {
            $logo_width  = 0;
            $logo_height = get_theme_mod('logo_size');
        }
    }

    $image = wp_get_attachment_image_src($custom_logo_id, [$logo_width, $logo_height]);

    if ($image) {
        $logo = '
        <div class="site-branding__logo">
            <a class="site-branding__logo-link" href="' . get_home_url() . '" rel="home">
                <img class="site-branding__logo-img" src="' . $image[0] . '" alt="' . esc_html($blog_name) . '" width="' . $image[1] . '" height="' . $image[2] . '">
            </a>
        </div>';
    }
}

// TITLE & TAGLINE
$screenreader_class = '';
if (has_custom_logo() && !$show_title) {
    $screenreader_class = 'screen-reader-text';
}

if ($blog_description) {
    $blog_description = '<span class="site-branding__description">' . esc_html($blog_description) . '</span>';
}

$title_tagline = '
    <h2 class="site-branding__title-tagline  ' . $screenreader_class . '">
        <a class="site-branding__title-link" href="' . get_home_url() . '">
            <span class="site-branding__title">' . $blog_name . '</span>
            ' . $blog_description . '
        </a>
    </h2>
';

?>



<div class="site-branding">
    <?php echo $logo; ?>
    <?php echo $title_tagline; ?>
</div>