<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/* TITLE */
$title = get_the_title();

/* hide title */
$title_class = '';
if (get_theme_mod('wtp_hide_title_page')) {
    $title_class = 'screen-reader-text';
}

$class_has_image = '';

/* IMAGE */
$image = '';
if (!empty(get_the_post_thumbnail(get_the_id(), 'original'))) {
    $image = get_the_post_thumbnail(get_the_id(), 'original') ?? false;
    $class_has_image = 'block--pagedetail-with-image';
}



?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
    <div class="block  block--pagedetail <?php echo $class_has_image; ?>">
        <?php if ($image) : ?>
            <div class="block__media">
                <?php echo $image; ?>
            </div>
        <?php endif; ?>

        <div class="block__content">
            <div class="block__header">
                <h1 class="block__title  <?php echo $title_class; ?>">
                    <?php echo $title; ?>
                </h1>
            </div>
        </div>
    </div>

    <div class="entry-content  clearfix">
        <?php the_content(get_option('page_for_posts')); ?>
    </div>

    <?php comments_template('', true); ?>

    <?php wp_link_pages(array(
        'before' => '<div class="">',
        'after' => '</div>',
    )); ?>

</article>