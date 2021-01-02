<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Disable the emoji's
 */
if (get_theme_mod('wtp_disable_emojis')) {
    if (!function_exists('disable_emojis')) {
        function disable_emojis()
        {
            remove_action('wp_head', 'print_emoji_detection_script', 7);
            remove_action('admin_print_scripts', 'print_emoji_detection_script');
            remove_action('wp_print_styles', 'print_emoji_styles');
            remove_action('admin_print_styles', 'print_emoji_styles');
            remove_filter('the_content_feed', 'wp_staticize_emoji');
            remove_filter('comment_text_rss', 'wp_staticize_emoji');
            remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
            add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
            add_filter('wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2);
        }
        add_action('init', 'disable_emojis');
    }

    /**
     * Filter function used to remove the tinymce emoji plugin.
     * 
     * @param array $plugins 
     * @return array Difference betwen the two arrays
     */
    if (!function_exists('disable_emojis_tinymce')) {
        function disable_emojis_tinymce($plugins)
        {
            if (is_array($plugins)) {
                return array_diff($plugins, array('wpemoji'));
            } else {
                return array();
            }
        }
    }

    /**
     * Remove emoji CDN hostname from DNS prefetching hints.
     *
     * @param array $urls URLs to print for resource hints.
     * @param string $relation_type The relation type the URLs are printed for.
     * @return array Difference betwen the two arrays.
     */
    if (!function_exists('disable_emojis_remove_dns_prefetch')) {
        function disable_emojis_remove_dns_prefetch($urls, $relation_type)
        {
            if ('dns-prefetch' == $relation_type) {
                /** This filter is documented in wp-includes/formatting.php */
                $emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');

                $urls = array_diff($urls, array($emoji_svg_url));
            }
            return $urls;
        }
    }
}





// ADD SETTING TO CUSTOMIZER
function wtp_customizer_disable_emoji($wp_customize)
{
    // SETTING
    $wp_customize->add_setting(
        'wtp_disable_emojis',
        array(
            'capability'    => 'edit_theme_options',
            'default'       => true
        )
    );

    // CONTROL
    $wp_customize->add_control(
        'wtp_disable_emojis',
        array(
            'type'      => 'checkbox',
            'section'   => 'wtp_disable_section',
            'label'     => __('Disable Emojis', 'wtp'),
        )
    );
}
add_action('customize_register', 'wtp_customizer_disable_emoji');
