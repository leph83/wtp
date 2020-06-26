<?php 
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }
?>

<div class="entry-meta">
    <span class="author vcard">
        <?php  _e('by'); ?> <?php the_author_posts_link(); ?>
    </span>

    <span class="meta-sep"> | </span>

    <span class="entry-date">
        <?php the_time( get_option( 'date_format' ) ); ?>
    </span>

    <?php the_tags('', ' | ', ''); ?>

    <?php the_category( ); ?>
</div>