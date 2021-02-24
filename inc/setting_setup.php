<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * SETUP
 */
if (!function_exists('wtp_setup')) {
    function wtp_setup()
    {
        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
        * Let WordPress manage the document title.
        */
        add_theme_support('title-tag');

        /**
         * Add post-formats support.
         */
        // add_theme_support(
        //     'post-formats',
        //     array(
        //         'link',
        //         'aside',
        //         'gallery',
        //         'image',
        //         'quote',
        //         'status',
        //         'video',
        //         'audio',
        //         'chat',
        //     )
        // );

        /*
        * Enable support for Post Thumbnails on posts and pages.
        *
        * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
        */
        add_theme_support('post-thumbnails');

        // NAVIGATION
        register_nav_menus(array(
            'primary' => __('Primary menu', 'wtp'),
            'footer' => __('Secondary Menu', 'wtp'),
        ));

        /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */
        add_theme_support(
            'html5',
            array(
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
                'navigation-widgets',
            )
        );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        $logo_width  = 300;
        $logo_height = 300;

        if (get_theme_mod('logo_size')) {
            $logo_width  = get_theme_mod('logo_size');
            $logo_height = 0;
        }

        add_theme_support(
            'custom-logo',
            array(
                'height'               => $logo_height,
                'width'                => $logo_width,
                'flex-width'           => true,
                'flex-height'          => true,
                'unlink-homepage-logo' => false,
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        // Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

        // Add support for full and wide align images.
        add_theme_support('align-wide');

        // Add support for responsive embedded content.
        add_theme_support('responsive-embeds');

		// Add support for experimental cover block spacing.
		add_theme_support( 'custom-spacing' );

		// Add support for custom units.
		// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
        add_theme_support( 'custom-units' );



        // to pass theme checker for now
        if (!isset($content_width)) {
            $content_width = 640;
        }

        add_editor_style();
        add_theme_support('custom-header');
        add_theme_support('custom-background');
        
    }
    add_action('after_setup_theme', 'wtp_setup');
}
