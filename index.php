<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header();

$title = '';

// SEARCH
if (is_search()) {
    // can't deal with _n for now
    $title = (int) $wp_query->found_posts . ' ' . __('results for', 'wtp-theme');
    if ((int) $wp_query->found_posts == 1) {
        $title = (int) $wp_query->found_posts . ' ' . __( 'result for', 'wtp-theme');
    }

    $title = $title . ' <span>"' . esc_html(get_search_query()) . '"</span>';
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
