<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/* TITLE */
$title = get_the_title();

/* IMAGE */
$image = '';
if (!empty(get_the_post_thumbnail(get_the_id(), 'original'))) {
    $image = get_the_post_thumbnail(get_the_id(), 'original') ?? false;
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
    <div class="block  block--pagedetail">
        <div class="block__media">
            <?php echo $image; ?>
        </div>

        <div class="block__content">
            <div class="block__header">
                <h1 class="block__title">
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