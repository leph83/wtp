<?php
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }

    $has_sidebar = '';
    if ( is_active_sidebar( 'primary-widget-area' ) ) {
        $has_sidebar = 'main--has-sidebar';
    }    
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class('body  body--sticky-footer '); ?>>
    <!-- header placeholder -->
    <div class="background-grid  header--fake" style="opacity: 0;">
        <div class="header__content  lc">

        <div class="header__item  header__item--empty"></div>
        <div class="header__item  header__item--empty"></div>
        <div class="header__item  header__item--empty"></div>

            <div class="header__item  header__item--branding">
                <div class="branding">
                    <?php if ( function_exists('wtp_blog_info') ) {
                        echo wtp_blog_info();
                    } ?>
                </div>
            </div>

        <div class="header__item  header__item--empty"></div>
        <div class="header__item  header__item--empty"></div>
        <div class="header__item  header__item--empty"></div>

        </div>
    </div>
    <!-- end header placeholder -->

    <header id="header" class="header  background-grid  background-grid--half">
        <div class="header__content  lc">

            <div class="header__item  header__item--empty"></div>


            <div class="header__item  header__item--branding" id="site-title">
                <div id="branding" class="branding">
                    <?php if ( function_exists('wtp_blog_info') ) {
                        echo wtp_blog_info();
                    } ?>
                </div>
            </div>

            
            <div class="header__item  header__item--nav  header__item--nav-1">
                <nav id="menu">
                    <?php
                        $args = array(
                            'theme_location'=> 'primary',
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
            </div>

            <div class="header__item  header__item--nav  header__item--nav-2">
                <nav id="menu">
                    <?php
                        $args = array(
                            'theme_location'=> 'secondary',
                            'container'     => '',
                            'menu_class'    => 'nav  nav--dropdown  nav--secondary  nav--header',
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
            </div>

            <div class="header__item  header__item--empty"></div>
        </div>
    </header>

    <?php if ( is_active_sidebar( 'header-widget-area' ) ) : ?>
        <article class="header__widget">
            <div class="header__widgetcontent">
                <div class="widget-area  lc">

                    <ul>
                        <?php dynamic_sidebar( 'header-widget-area' ); ?>
                    </ul>

                </div>
            </div>
        </article>
    <?php endif; ?>
        
    <div class="<?php echo $has_sidebar; ?>  lc">
        
        <main id="content" class="main  lc  ">
            