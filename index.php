<?php 
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }
?>

<?php 
    $featured_image = false;
    if (is_home() && get_option('page_for_posts') ) {
        $img = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')),'full'); 

        $featured_image = $img[0];
    }
 
?>

<?php get_header(); ?>
    <section>
        <div class="block  block--hero">
            <div class="block__media">
                <img src="<?php echo $featured_image; ?>">
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