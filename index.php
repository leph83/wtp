<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header();

$featured_image = '';
if (is_home() && get_option('page_for_posts')) {
    $id = get_post_thumbnail_id(get_option('page_for_posts'));
    $featured_image = wp_get_attachment_image($id, 'full');
}

?>

<section>
    <div class="block  block--hero">
        <div class="block__media">
            <?php echo $featured_image; ?>
        </div>

        <div class="block__content">
            <header class="block__header">
                <h1 class="block__title">
                    <?php echo single_post_title(); ?>
                </h1>
            </header>
        </div>
    </div>

    <?php if (have_posts()) : ?>
        <div class="grid  grid--auto">
            <?php while (have_posts()) : the_post(); ?>

                <?php get_template_part('template-parts/content', 'overview'); ?>

            <?php endwhile; ?>

            <?php get_template_part('template-parts/nav', 'pagination'); ?>
        </div>
    <?php endif; ?>
</section>

<?php get_footer();
