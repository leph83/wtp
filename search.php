<?php 
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }

    get_header(); 
?>

    <?php if (have_posts()) : ?>
        <header class="block__header">
            <h1 class="block__title">
                <?php printf(esc_html__('Search Results for: %s', 'wtp'), get_search_query()); ?>
            </h1>
        </header>

        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('template-parts/content', 'overview'); ?>
        <?php endwhile; ?>

        <?php get_template_part('nav', 'below'); ?>

    <?php else : ?>
        <article id="post-0" class="post no-results not-found">
            <header class="">
                <h1 class="entry-title"><?php esc_html_e('Nothing Found', 'wtp'); ?></h1>
            </header>
            <div class="entry-content">
                <p><?php esc_html_e('Sorry, nothing matched your search. Please try again.', 'wtp'); ?></p>
                <?php get_search_form(); ?>
            </div>
        </article>
    <?php endif; ?>


<?php get_footer();