<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function change_gutenberg_color_palette() {
    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => __('Black', 'wtp'),
            'slug' => 'black',
            'color' => '#000',
        ),
        array(
            'name' => __('White', 'wtp'),
            'slug' => 'white',
            'color' => '#eeeeee',
        ),
        array(
            'name' => __('Color 1', 'wtp'),
            'slug' => 'color--1',
            'color' => '#EC6849',
        ),
        array(
            'name' => __('Color 2', 'wtp'),
            'slug' => 'color--2',
            'color' => '#003E93',
        ),
        array(
            'name' => __('Color 3', 'wtp'),
            'slug' => 'color--3',
            'color' => '#E2BCB5',
        ),
        array(
            'name' => __('Color 4', 'wtp'),
            'slug' => 'color--4',
            'color' => '#E4C7C2',
        ),
        array(
            'name' => __('Color 5', 'wtp'),
            'slug' => 'color--5',
            'color' => '#faf4f3',
        ),
    ));
}

add_action( 'after_setup_theme' , 'change_gutenberg_color_palette' );