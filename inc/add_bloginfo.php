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
            $image = wp_get_attachment_image_src( $custom_logo_id, 'medium' );

            $brand .= '
                <a href="'. esc_url(home_url('/')) .'" title="'. esc_html(get_bloginfo('name')) .'" rel="home">
                    <img src="' . $image[0] . '" alt="'.esc_html(get_bloginfo('name')).'" width="'.$image[1].'" height="'.$image[2].'">
                </a>'
            ;
        }

        if ( get_theme_mod('display_title_and_tagline') ) {
            $brand .= '
                <a href="'. esc_url(home_url('/')) .'" title="'. esc_html(get_bloginfo('name')) .'" rel="home">
                    '. esc_html(get_bloginfo('name')) .'<span id="site-description">'. get_bloginfo('description').'</span>
                </a>
                
                
            ';
        }

        return $brand;
    }
}