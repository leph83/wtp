<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header();

$description = get_the_archive_description();
?>



<header class="page__header alignwide">
    <?php the_archive_title('<h1 class="page__title">', '</h1>'); ?>
    <?php if ($description) : ?>
        <div class="archive-description"><?php echo wp_kses_post(wpautop($description)); ?></div>
    <?php endif; ?>
</header>


<div class="page__content  alignwide">
    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>

            <?php get_template_part('template-parts/content/content', 'overview'); ?>

        <?php endwhile; ?>

    <?php else : ?>

        <?php get_template_part('template-parts/content/content-none'); ?>

    <?php endif; ?>
</div>


<?php
$args = array(
    'prev_text'             => __('Older posts'),
    'next_text'             => __('Newer posts'),
    'screen_reader_text'    => __('Posts navigation'),
    'aria_label'            => __('Posts'),
);

the_posts_navigation($args);
?>



<?php get_footer(); ?>