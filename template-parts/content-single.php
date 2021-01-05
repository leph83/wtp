<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
    <h1>
        <?php echo get_the_title(); ?>
    </h1>

    <div class="">
        <?php echo get_the_post_thumbnail(); ?>
    </div>

    <div class="entry-content" id="page-content">
        <?php the_content(); ?>
    </div>

    <?php comments_template(); ?>

    <div class="entry-links">
        <?php wp_link_pages(); ?>
    </div>

</article>

<?php get_template_part('template-parts/nav-pagination', 'single');
?>