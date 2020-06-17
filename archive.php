<?php 
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }
?>

<?php get_header(); ?>

    <header class="block__header">
        <h1 class="block__title">
            <?php single_term_title(); ?>
        </h1>
        
        <div class="block__subtitle">
            <?php if ('' != the_archive_description()) {
                echo esc_html(the_archive_description());
            } ?>
        </div>
    </header>

    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>

            <?php get_template_part('template-parts/content', 'overview'); ?>

        <?php endwhile; ?>

        <?php get_template_part('template-parts/nav', 'pagination'); ?>

    <?php endif; ?>

<?php get_footer();