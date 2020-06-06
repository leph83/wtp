<?php
/**
 * The template for displaying the header.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
             
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class('body'); ?>>

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
                            'menu_class'    => 'nav',
                            'fallback_cb'   => false,
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

    <main id="content" class="main">