<?php 
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }
?>

<?php
    $args = array(
        'prev_text'             => __('Older posts'),
        'next_text'             => __('Newer posts'),
        'screen_reader_text'    => __('Posts navigation'),
        'aria_label'            => __('Posts'),
    );

    the_posts_navigation( $args ); 
?>


    <?php
            wp_link_pages( array(
                'before'           => '',
                'after'            => '',
                'link_before'      => '',
                'link_after'       => '',
                'next_or_number'   => 'next',
                'separator'        => ' ',
                'nextpagelink'     => 'Next page',
                'previouspagelink' => 'Previous page',
                'pagelink'         => '%',
                'echo'             => 1
                )
            );
        ?>