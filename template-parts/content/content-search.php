<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>

<article class="">

    <?php if (has_post_thumbnail()) : ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <?php the_post_thumbnail('medium'); ?>
        </a>
    <?php endif; ?>

    <h2>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <?php echo get_the_title(); ?>
        </a>
    </h2>

    <?php the_excerpt(); ?>

</article>