<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header();



$searchquery = esc_html(get_search_query());
$title .= __('Search Results for ', 'wtp-theme') . '"' . $searchquery . '" : ' . $wp_query->found_posts;

?>

<section class="section  section--search">

    <div class="block  block--search">
        <div class="block__media"></div>

        <div class="block__content">
            <div class="block__header">
                <h1 class="block__title">
                    <?php echo $title; ?>
                </h1>
            </div>
        </div>
    </div>

    <?php if (have_posts()) : ?>
        <div class="section__content">
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content/content', 'overview'); ?>
            <?php endwhile; ?>
        </div>

        <?php the_posts_navigation(); ?>

    <?php else : ?>
        <?php get_template_part('template-parts/content/content', 'none'); ?>
    <?php endif; ?>

</section>

<?php get_footer();
