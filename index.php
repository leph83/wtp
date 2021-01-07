<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header();


// DEFAULT
$title = single_post_title('', false);
$description = '';

// BLOG PAGE
$featured_image = '';
if (is_home() && get_option('page_for_posts')) {
    $id = get_post_thumbnail_id(get_option('page_for_posts'));
    $featured_image = wp_get_attachment_image($id, 'full');
}

// ARCHIVE
if (is_archive()) {
    $title = get_the_archive_title();
    $description = get_the_archive_description();
}

// SEARCH
if (is_search()) {
    $title = _n(
        'We found ' . (int) $wp_query->found_posts . ' result for',
        'We found ' . (int) $wp_query->found_posts . ' results for',
        'wtp'
    ) . ' <span>"' . esc_html(get_search_query()) . '"</span>';

    $description = get_search_form(false);
}

// 404
if (is_404()) {
    $title = esc_html('404', 'wtp');
}


?>


<div class="page__header  block  block--hero">
    <div class="block__media">
        <?php echo $featured_image; ?>
    </div>

    <div class="block__content  alignwide">
        <header class="block__header">
            <h1 class="page__title  block__title">
                <?php echo $title; ?>
            </h1>
        </header>

        <?php echo $description; ?>
    </div>
</div>

<div class="alignwide">
    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>

            <?php get_template_part('template-parts/content/content', 'overview'); ?>

        <?php endwhile; ?>



        <?php
        $args = array(
            'prev_text'             => __('Older posts'),
            'next_text'             => __('Newer posts'),
            'screen_reader_text'    => __('Posts navigation'),
            'aria_label'            => __('Posts'),
        );

        the_posts_navigation($args);
        ?>


    <?php else : ?>
        <?php get_template_part('template-parts/content/content', 'none'); ?>
    <?php endif; ?>
</div>

<?php get_footer();
