<?php 
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
    <div class="">
        <?php echo get_the_post_thumbnail(); ?>
    </div>

    <div class="" id="page-content">
        <?php the_content(); ?>

        <div class="entry-links">
            <?php wp_link_pages(); ?>
        </div>
    </div>

</article>