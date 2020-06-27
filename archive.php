<?php 
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }

    $archive_title = '';

    if ( is_archive() ) {
        $archive_title = get_the_archive_title();
    }

    if ( is_archive() && is_author() ) {
        $archive_title = __('Posts') . ' ' . __('by') . ' ' . the_author( '', false );
    }
?>

<?php get_header(); ?>
    <section>
        <div class="block">
            <header class="block__header">
                <h1 class="block__title">
                    <?php echo $archive_title; ?>
                </h1>
                
                <div class="block__subtitle">
                    <?php if ('' != the_archive_description()) {
                        echo esc_html(the_archive_description());
                    } ?>
                </div>
            </header>
        </div>

        <?php if (have_posts()) : ?>

            <?php while (have_posts()) : the_post(); ?>

                <?php get_template_part('template-parts/content', 'overview'); ?>

            <?php endwhile; ?>

            <?php get_template_part('template-parts/nav', 'pagination'); ?>

        <?php endif; ?>
    </section>
<?php get_footer();