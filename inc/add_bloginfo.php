<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


/**
 * Blog Info
 */
if ( !function_exists('wtp_blog_info') ) {
    function wtp_blog_info() {
        $brand = '';

        if ( has_custom_logo() ) {
            $custom_logo_id = get_theme_mod( 'custom_logo' );

            $logo_width  = 100;
            $logo_height = 100;

            if (get_theme_mod('logo_size')) {
                $logo_width  = get_theme_mod('logo_size');
                $logo_height = 0;

                if (get_theme_mod('logo_width_height') == 'height') {
                    $logo_width  = 0;
                    $logo_height = get_theme_mod('logo_size');
                }
            }

            $image = wp_get_attachment_image_src( $custom_logo_id, [$logo_width, $logo_height] );

            $brand .= '
                <a class="custom-logo-link" href="'. esc_url(home_url('/')) .'" rel="home" aria-current="page">
                    <img src="' . $image[0] . '" alt="'.esc_html(get_bloginfo('name')).'" width="'.$image[1].'" height="'.$image[2].'">
                </a>'
            ;
        }



        if ( !(has_custom_logo()) || (get_theme_mod('display_title_and_tagline') && has_custom_logo() ) ) {
            $brand .= '
                <a href="'. esc_url(home_url('/')) .'" title="'. esc_html(get_bloginfo('name')) .'" rel="home">
                    <span id="site-title">'. esc_html(get_bloginfo('name')) .'</span>
                    <span id="site-description">
                        '. get_bloginfo('description').'
                    </span>
                </a>
            ';
        }

        return $brand;
    }
}