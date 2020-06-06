<?php get_header(); ?>

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('template-parts/content'); ?>
            <?php comments_template(); ?>
        <?php endwhile; ?>
    <?php endif; ?>

    <?php get_template_part('nav', 'below'); ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>