<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>

<?php

/**
 * Displays header site branding
 */

$blog_info    = get_bloginfo('name');
$blog_description  = get_bloginfo('description', 'display');
$show_title   = (true === get_theme_mod('display_title_and_tagline', true));

$header_class = 'site-title';
if (has_custom_logo() && ($show_title == false) ) {
    $header_class = 'screen-reader-text';
}

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
    $logo = '';

    if ($image) {
        $logo = '
        <a class="custom-logo-link" href="' . esc_url(home_url('/')) . '" rel="home">
            <img class="custom-logo" src="' . $image[0] . '" alt="' . esc_html($blog_info) . '" width="' . $image[1] . '" height="' . $image[2] . '">
        </a>';
    }
}



?>

<div class="site-branding">

    <?php if (has_custom_logo()) : ?>
        <div class="site-logo">
            <?php echo $logo; ?>
        </div>
    <?php endif; ?>


    <?php if ($blog_info) : ?>
        <?php if (is_front_page() || is_home()) : ?>
            <h1 class="<?php echo esc_attr($header_class); ?>"><a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html($blog_info); ?></a></h1>
        <?php else : ?>
            <p class="<?php echo esc_attr($header_class); ?>"><a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html($blog_info); ?></a></p>
        <?php endif; ?>
    <?php endif; ?>

    <?php if ($blog_description && $show_title) : ?>
        <p class="site-description">
            <?php echo $blog_description; ?>
        </p>
    <?php endif; ?>


</div>