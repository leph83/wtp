<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$meta_description = get_the_excerpt();
if (empty($meta_description)) {
    $meta_description = get_bloginfo('name');
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
    <a class="screen-reader-text  skip-link" href="#content">skip to content</a>
    <?php wp_body_open(); ?>
    <header id="header" class="header">
        <div class="header__content">

            <div class="header__item">
                <?php get_template_part('template-parts/header/site-branding'); ?>
            </div>

            <div class="header__item">
                <?php get_template_part('template-parts/header/site-navigation'); ?>
            </div>

        </div>
    </header>

    <main id="content" class="main">