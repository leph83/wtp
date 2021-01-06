<?php
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }

    if ( !function_exists('wtp_navigation_template') ) {
        function wtp_navigation_template( $template ) {
            $template = '
            <nav class="navigation %1$s">
                <h2 class="screen-reader-text">%2$s</h2>
                <div class="nav  nav--pagination">%3$s</div>
            </nav>';

            return $template;
        }
        add_filter( 'navigation_markup_template', 'wtp_navigation_template' );
    }