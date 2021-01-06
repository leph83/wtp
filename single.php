<?php 
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }

    get_header(); 
?>

    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>

            <?php get_template_part('template-parts/content/content', 'single'); ?>

        <?php endwhile; ?>

        <?php get_template_part('template-parts/nav', 'pagination'); ?>

    <?php endif; ?>

<?php get_footer();