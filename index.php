<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header();

$title = '';

// SEARCH
if (is_search()) {
    $title = _n(
        'We found ' . (int) $wp_query->found_posts . ' result for',
        'We found ' . (int) $wp_query->found_posts . ' results for',
        'wtp'
    ) . ' <span>"' . esc_html(get_search_query()) . '"</span>';

    $description = get_search_form(false);
}

// ARCHIVE
if (is_archive()) {
    $title = get_the_archive_title();
    $description = get_the_archive_description();
}

?>

<?php echo $title; ?>

<?php if (have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>

        <?php get_template_part('template-parts/content/content', 'content'); ?>

    <?php endwhile; ?>

    <?php the_posts_navigation(); ?>

<?php else : ?>
    <?php get_template_part('template-parts/content/content', 'none'); ?>
<?php endif; ?>


<?php get_footer();
