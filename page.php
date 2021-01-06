<?php 
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }

    get_header();
?>

    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>

            <?php get_template_part( 'template-parts/content/content', 'page' ); ?>

            <?php if (comments_open() && !post_password_required()) {
                comments_template('', true);
            } ?>

        <?php endwhile; ?>

    <?php endif; ?>

<?php get_footer();