<?php
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }

    $path = 'template-parts/blocks/';
    

    add_action('acf/init', 'my_acf_blocks_init');
    function my_acf_blocks_init() {
    
        // Check function exists.
        if( function_exists('acf_register_block_type') ) {
            acf_register_block_type(array(
                'name'              => 'intro_big',
                'title'             => __('Big Intro'),
                'description'       => __('A big title with description and links'),
                'render_template'   => 'template-parts/blocks/intro_big.php',
                'category'          => 'general',
            ));

            acf_register_block_type(array(
                'name'              => 'block_title_link',
                'title'             => __('Block Title Link'),
                'description'       => __('A Box with a linked underline title'),
                'render_template'   => 'template-parts/blocks/block_title_link.php',
                'category'          => 'general',
                'supports'			=> array(
                    'jsx' => true
                ),
            ));

            acf_register_block_type(array(
                'name'              => 'container',
                'title'             => __('Container'),
                'description'       => __('To overlap content'),
                'render_template'   => 'template-parts/blocks/container.php',
                'category'          => 'layout',
                'supports'			=> array(
                    'jsx' => true
                ),
            ));

            acf_register_block_type(array(
                'name'              => 'relations',
                'title'             => __('Grid Links'),
                'description'       => __('Select links and show in a grid view'),
                'render_template'   => 'template-parts/blocks/relations.php',
                'category'          => 'general',
            ));

            acf_register_block_type(array(
                'name'              => 'gallery',
                'title'             => __('GIF Gallery'),
                'description'       => __('Select changing images'),
                'render_template'   => 'template-parts/blocks/gallery.php',
                'category'          => 'general',
            ));
        }
    }