<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header();
?>

<article id="post-404" <?php post_class(''); ?>>
    <h1 class="page__title">
        <?php echo __('404', 'wtp-theme'); ?>
    </h1>

    <?php get_template_part('template-parts/content/content', 'none'); ?>

</article>

<?php get_footer();