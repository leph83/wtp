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

    <!-- TODO: Find an easy way to preload assets -->
    <link rel="preload" href="/wp-content/themes/wtp-theme/assets/fonts/hind/hind-v10-latin-regular.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="/wp-content/themes/wtp-theme/assets/fonts/hind/hind-v10-latin-regular.woff" as="font" type="font/woff2" crossorigin="anonymous">

    <?php wp_head(); ?>
</head>

<body <?php body_class('body  body--sticky-footer '); ?>>
    <header id="header" class="header  background-grid  background-grid--half">

        <div class="header__content  lc">

            <div class="header__item  header__item--branding">
                <div class="branding" href="<?php echo get_home_url(); ?>">
                    <?php if (function_exists('wtp_blog_info')) {
                        echo wtp_blog_info();
                    } ?>
                </div>
            </div>

            <div class="header__item  header__item--meta">
                <nav id="menu" class="">
                    <?php
                    $args = array(
                        'theme_location' => 'primary',
                        'container'     => '',
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

                </nav>

                <div class="">
                    <?php get_sidebar(); ?>
                </div>
            </div>

        </div>
    </header>


    <div class="main--container  <?php echo $has_sidebar; ?>">
        <main id="content" class="main">