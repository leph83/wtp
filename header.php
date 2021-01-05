<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$has_sidebar = '';
if (is_active_sidebar('primary-widget-area')) {
    $has_sidebar = 'main--has-sidebar';
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <!-- TODO: Find an easy way to preload assets without wp rocket -->
    <?php if (false) : ?>
        <link rel="preload" href="<?php echo get_stylesheet_directory_uri() ?>/assets/fonts/hind/hind-v10-latin-regular.woff2" as="font" type="font/woff2" crossorigin="anonymous">
        <link rel="preload" href="<?php echo get_stylesheet_directory_uri() ?>/assets/fonts/hind/hind-v10-latin-regular.woff" as="font" type="font/woff" crossorigin="anonymous">

        <meta name="referrer" content="no-referrer">
    <?php endif; ?>

    <!-- 
        TODO: Add to Customizer and make it work
        <meta 
        http-equiv="Content-Security-Policy" 
        content="
            script-src 'self';             
            base-uri 'self'; 
            form-action 'self'; 
    "> -->

    <?php wp_head(); ?>
</head>

<body <?php body_class('body'); ?>>
    <input type="checkbox" id="burger" class="burger__input  hidden">

    <header id="header" class="header  burger__content">

        <div class="header__content">

            <div class="header__item  header__item--branding">
                <?php get_template_part('template-parts/header/site-branding'); ?>
            </div>

            <div class="header__item  header__item--nav">
                <?php get_template_part('template-parts/header/site-navigation'); ?>
            </div>

        </div>
    </header>


    <div class="main--container  <?php echo $has_sidebar; ?>">
        <main id="content" class="main">