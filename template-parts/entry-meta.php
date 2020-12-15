<?php 
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }
?>

<div class="entry-meta">
    <span class="author vcard">

    </span>

    <span class="meta-sep"> | </span>

    <span class="entry-date">
        <?php the_time( get_option( 'date_format' ) ); ?>
    </span>
</div>