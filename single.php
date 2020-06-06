<?php get_header(); ?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php get_template_part('template-parts/entry'); ?>
            <?php if (comments_open() && !post_password_required()) {
                comments_template('', true);
            } ?>
    <?php endwhile;
    endif; ?>
    <footer>
        <?php get_template_part('nav', 'below-single'); ?>
    </footer>

<?php get_sidebar(); ?>
<?php get_footer(); ?>