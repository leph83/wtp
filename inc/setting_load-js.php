<?php
if (!defined('ABSPATH')) {
   exit; // Exit if accessed directly.
}

/**
 * LOAD JavaScript
 */
if (!function_exists('wtp_load_scripts')) {
   function wtp_load_scripts()
   {
      //wp_enqueue_script( 'custom-script', get_stylesheet_directory_uri() . '/assets/js/script.js', ['jquery'], false, true);
   }
   add_action('wp_enqueue_scripts', 'wtp_load_scripts');
}
