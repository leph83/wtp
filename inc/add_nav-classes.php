<?php
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }
    
    /**
     * Add Class to LI in Nav
     */
    if ( !function_exists('add_additional_class_on_li') ) {
        function add_additional_class_on_li($classes, $item, $args) {
            // add class to li
            if(isset($args->add_li_class)) {
                $classes[] = $args->add_li_class;
            }

            // add active class to li
            if (in_array('current-menu-item', $classes) ){
                if(isset($args->add_li_class)) {
                    $classes[] = $args->add_li_active_class;
                }
            }

            if (in_array('menu-item-has-children', $classes) ){
                if(isset($args->add_li_parent_class)) {
                    $classes[] = $args->add_li_parent_class;
                }
            }
            

            return $classes;
        }
        add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);
    }

    /**
     * Add Class to Anchor in Nav
     */
    if ( !function_exists('add_additional_class_on_a') ) {
        function add_additional_class_on_a($classes, $item, $args) {
            // add class to anchor
            if(isset($args->add_a_class)) {
                $classes['class'] = $args->add_a_class;
            }
            
            // add class to active anchor
            if ( in_array('current_page_item', $item->classes) ) {
                $classes['class'] .= ' ' . $args->add_a_active_class;
            }

            return $classes;
        }
        add_filter('nav_menu_link_attributes', 'add_additional_class_on_a', 1, 3);
    }

    /**
     * Add Class Submenu ul
     */
    if ( !function_exists('my_nav_menu_submenu_css_class') ) {
        function my_nav_menu_submenu_css_class($classes, $args) {
            if(isset($args->add_submenu_class)) {
                $classes['class'] = $args->add_submenu_class;
            }

            return $classes;
        }
        add_filter( 'nav_menu_submenu_css_class', 'my_nav_menu_submenu_css_class', 1, 3 );
    }