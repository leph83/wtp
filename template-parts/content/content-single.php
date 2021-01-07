<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('alignwide'); ?>>
    <h1 class="page__title">
        <?php echo get_the_title(); ?>
    </h1>

    <div class="">
        <?php echo get_the_post_thumbnail(); ?>
    </div>


    <?php the_tags('', ' | ', ''); ?>

    <?php the_category( ); ?>

    <div class="entry-content" id="page-content">
        <?php the_content(); ?>
    </div>

    <?php comments_template(); ?>

    <div class="entry-links">
        <?php wp_link_pages(); ?>
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


<?php get_template_part('template-parts/nav-pagination', 'single');
?>