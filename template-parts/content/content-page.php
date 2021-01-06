<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
    <div class="">
        <?php echo get_the_post_thumbnail(); ?>
    </div>

    <div class="entry-content" id="page-content">
        <?php wpautop(the_content()); ?>

        <div class="entry-links">
            <?php wp_link_pages(); ?>
        </div>
    </div>

</article>


<?php 

wp_link_pages(
    array(
        'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'twentytwentyone' ) . '">',
        'after'    => '</nav>',
        /* translators: %: page number. */
        'pagelink' => esc_html__( 'Page %', 'twentytwentyone' ),
    )
);

?>