<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header();

$title = '';

// SEARCH
if (is_search()) {
    // can't deal with _n for now
    $title = (int) $wp_query->found_posts . ' ' . __('results for', 'wtp');
    if ((int) $wp_query->found_posts == 1) {
        $title = (int) $wp_query->found_posts . ' ' . __('result for', 'wtp');
    }

    $title = $title . ' <span>"' . esc_html(get_search_query()) . '"</span>';
}

// ARCHIVE
if (is_archive()) {
    $title = get_the_archive_title();
    $description = get_the_archive_description();
}

if (is_home()) {
    if (get_option('page_for_posts') != 0) {
        $id = get_option('page_for_posts');
        $title = get_the_title($id);
    }
}


// HTML 5 MARKUP
$section_tag = 'section';
if (is_singular()) {
    $section_tag = 'div';
}

?>
<<?php echo $section_tag; ?>>

    <?php if ($title) : ?>
        <h2 class="lc  lc--2  padding-left padding-right"><?php echo $title; ?></h2>
    <?php endif; ?>


    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>

            <?php get_template_part('template-parts/content/content', 'content'); ?>

        <?php endwhile; ?>

        <?php the_posts_navigation(); ?>

    <?php else : ?>
        <?php get_template_part('template-parts/content/content', 'none'); ?>
    <?php endif; ?>

</<?php echo $section_tag; ?>>

<?php get_footer();
