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
    <header class="header" id="header">
        <div class="header__content" id="branding">
            <div class="header__item" id="site-title">
                <?php if ( function_exists('wtp_blog_info') ) {
                    echo wtp_blog_info();
                } ?>
            </div>

            
            <div class="header__item">
                <nav id="menu">
                    <?php
                        $args = array(
                            'theme_location'=> 'primary',
                            'container'     => '',
                            'menu_class'    => 'nav  nav--dropdown  nav--primary',
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
        </div>
    </header>

    <div class="<?php echo $has_sidebar; ?>">
<<<<<<< HEAD

=======
>>>>>>> 6c79705faa91dfba707faea0ca13ee37a00671d2
        <main id="content" class="main">