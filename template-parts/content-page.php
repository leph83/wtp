<?php 
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>

    <div class="padding-left  padding-top--tripple  padding-bottom--double">
        test
    </div>


    <div class="" id="page-content">
        <?php the_content(); ?>

        <div class="entry-links">
            <?php wp_link_pages(); ?>
        </div>
    </div>

</article>