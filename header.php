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
    <link rel="preload" href="<?php echo get_stylesheet_directory_uri() ?>/assets/fonts/hind/hind-v10-latin-regular.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="<?php echo get_stylesheet_directory_uri() ?>/assets/fonts/hind/hind-v10-latin-regular.woff" as="font" type="font/woff" crossorigin="anonymous">

    <meta name="referrer" content="no-referrer">
    <!-- <meta 
        http-equiv="Content-Security-Policy" 
        content="
            script-src 'self';             
            base-uri 'self'; 
            form-action 'self'; 
    "> -->

    <?php wp_head(); ?>
</head>

<body <?php body_class('body'); ?>>
    <header id="header" class="header">

        <div class="header__content">

            <div class="header__item  header__item--branding">
                <div class="branding">
                    <?php get_template_part( 'template-parts/header/site-branding' ); ?>
                </div>
            </div>

            <div class="header__item  header__item--nav">

                <?php
                $args = array(
                    'theme_location' => 'primary',
                    'container'     => 'nav',
                    'menu_class'    => 'nav  nav--dropdown  nav--header',
                    'fallback_cb'   => false,
                    'add_submenu_class'  => 'nav__submenu',
                    'add_li_class'  => 'nav__item',
                    'add_li_active_class' => 'nav__item--active',
                    'add_li_parent_class' => 'nav__item--parent',
                    'add_a_class'   => 'nav__link',
                    'add_a_active_class'   => 'nav__link--active',
                );
                wp_nav_menu($args);
                ?>

            </div>

        </div>
    </header>


    <div class="main--container  <?php echo $has_sidebar; ?>">
        <main id="content" class="main">