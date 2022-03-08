<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * SEO META DESCRIPTION
 */
$meta_description = get_the_excerpt() ?? false;
if (empty($meta_description)) {
    $meta_description = get_bloginfo('name');
    if (get_bloginfo('description')) {
        $meta_description .= ' - ' . get_bloginfo('description');
    }
}

$sidebar = '';
if (is_active_sidebar('sidebar-1')) {
    $sidebar = 'main--has-sidebar';
}

/**
 * HEADER BACKGROUND FROM CUSTOMIZER
 */
$image = get_header_image() ?? false;

if ($image) {
    $image = ' style="background-image: url('. $image .');" ';
}

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <meta name="description" content="<?php echo $meta_description; ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class('body'); ?>>

    <?php wp_body_open(); ?>

    <input id="burger" type="checkbox" class="burger__input  hidden">
    
    <header id="header" class="header  burger__content" <?php echo $image; ?>>

        <div class="header__content">

            <div class="header__item  header__item--branding">
                <?php get_template_part('template-parts/header/site-branding'); ?>
            </div>

            <div class="header__item  header__item--nav">
                <?php get_template_part('template-parts/header/site-navigation'); ?>
            </div>

        </div>
    </header>

    <main id="content" class="main <?php echo $sidebar; ?>">