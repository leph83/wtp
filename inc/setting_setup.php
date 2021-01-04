<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


/**
 * SETUP
 */
add_action('after_setup_theme', 'wtp_setup');
function wtp_setup()
{
    /*
    * Make theme available for translation.
    * Translations can be filed in the /languages/ directory.
    * If you're building a theme based on Twenty Twenty-One, use a find and replace
    * to change 'twentytwentyone' to the name of your theme in all the template files.
    */
    load_theme_textdomain('wtp', get_template_directory() . '/languages');

    /*
        * Let WordPress manage the document title.
        * This theme does not use a hard-coded <title> tag in the document head,
        * WordPress will provide it for us.
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
        'primary' => __('Primary Menu', 'wtp'),
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
    $logo_height = 100;

    if (get_theme_mod('logo_size')) {
        $logo_width  = get_theme_mod('logo_size');
        $logo_height = 0;

        if (get_theme_mod('logo_width_height') == 'height') {
            $logo_width  = 0;
            $logo_height = get_theme_mod('logo_size');
        }
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
    add_theme_support('wp-block-styles');

    // Add support for full and wide align images.
    add_theme_support('align-wide');

    // Add support for responsive embedded content.
    add_theme_support('responsive-embeds');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');




    /**
     * Blog Info
     */
    if (!function_exists('wtp_blog_info')) {
        function wtp_blog_info()
        {
            $brand = '';

            $blog_info    = get_bloginfo('name');
            $description  = get_bloginfo('description', 'display');
            $show_title   = (true === get_theme_mod('display_title_and_tagline', true));

            $tag = 'p';
            if (is_front_page() || is_home()) {
                $tag = 'h1';
            }

            if (has_custom_logo()) {
                $custom_logo_id = get_theme_mod('custom_logo');

                $logo_width  = 300;
                $logo_height = 100;

                if (get_theme_mod('logo_size')) {
                    $logo_width  = get_theme_mod('logo_size');
                    $logo_height = 0;

                    if (get_theme_mod('logo_width_height') == 'height') {
                        $logo_width  = 0;
                        $logo_height = get_theme_mod('logo_size');
                    }
                }

                $image = wp_get_attachment_image_src($custom_logo_id, [$logo_width, $logo_height]);

                $brand .= '
                <a class="custom-logo-link" href="' . esc_url(home_url('/')) . '" rel="home">
                    <img class="custom-logo" src="' . $image[0] . '" alt="' . esc_html($blog_info) . '" width="' . $image[1] . '" height="' . $image[2] . '">
                </a>';
            }

            if (!(has_custom_logo()) || ($show_title && has_custom_logo())) {
                $brand .= '
                <div class="custom-title-tagline">
                    <' . $tag . ' id="site-title" class="site-title">
                        <a href="' . esc_url(home_url('/')) . '" title="' . esc_html($blog_info) . '" rel="home">
                            ' . esc_html($blog_info) . '
                        </a>
                    </' . $tag . '>

                    <p id="site-description" class="site-description">
                        ' . $description . '
                    </p>
                </div>
                ';
            }

            return $brand;
        }
    }
}
