<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class('body  flex  flex-direction--column'); ?>>
    <header id="header" class=" bg-color--black  color--white  ">

        <div class="lc  lc--2  padding flex flex-wrap--wrap flex-justify--space-between  flex-align-items--center">

            <div class="">
                <?php get_template_part('template-parts/header/site-branding'); ?>
            </div>

            <section class="">
                <h2 class="screen-reader-text">Header</h2>
                <?php get_template_part('template-parts/header/site-navigation'); ?>
            </section>

        </div>
    </header>

    <main id="content" class="main  lc  lc--2  padding  flex-grow--1  min-height--100vh">