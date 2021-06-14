<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header();


$title = '';


if (get_option('page_for_posts') != '0') {
    $id = get_option('page_for_posts') ?? false;
    $title = get_the_title($id) ?? false;
    $image_id = get_post_thumbnail_id(get_option('page_for_posts')) ?? false;
    $image = wp_get_attachment_image($image_id, 'original') ?? false;
    $description = get_the_content(null, false, get_option('page_for_posts')) ?? false;
}

// ARCHIVE PAGES
if (is_category()) {
    $title = single_cat_title('', false);
    $description = get_the_archive_description();
}

if (is_tag()) {
    $title = single_tag_title('', false);
    $description = get_the_archive_description();
}

if (is_author()) {
    $title = get_the_author();
}

if (is_tax()) {
    $title = single_term_title('', false);
    $description = get_the_archive_description();
}

if (is_post_type_archive()) {
    $title = post_type_archive_title('', false);
    $description = get_the_archive_description();
}

$args = array(
    // 'prev_text' => '',
    // 'next_text' => '',
    'screen_reader_text' => '',
    'aria_label' => '',
    'class' => 'nav',
);

?>
<section class="section  section--index">

    <div class="block  block--index">
        <div class="block__media">
            <?php if ($image) : ?>
                <?php echo $image; ?>
            <?php endif; ?>

            <div class="block__content">
                <div class="block__header">
                    <h1 class="block__title">
                        <?php echo $title; ?>
                    </h1>
                </div>

                <div class="block__description">
                    <?php echo $description; ?>
                </div>
            </div>
        </div>
    </div>

    <?php if (have_posts()) : ?>
        <div class="section__content">
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content/content', 'overview'); ?>
            <?php endwhile; ?>
        </div>

        <?php echo get_the_posts_navigation($args); ?>

    <?php else : ?>

        <?php get_template_part('template-parts/content/content', 'none'); ?>

    <?php endif; ?>

</section>

<?php get_footer();
