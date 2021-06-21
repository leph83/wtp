<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$title = get_the_title() ?? false;
$image = get_the_post_thumbnail() ?? false;
$description = wpautop(get_the_excerpt()) ?? false;

if (empty($title)) {
    $title = __('Unbenannt', 'wtp-theme');
}

/**
 * OPTIONAL META DATA
 */

// $date = get_the_time(get_option('date_format'));
$author = get_the_author();

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('block  block--overview'); ?>>
    <div class="block__media">
        <?php if ($image) : ?>
            <a aria-label="<?php echo $title; ?>" href="<?php echo get_the_permalink(); ?>">
                <?php echo $image; ?>
            </a>
        <?php endif; ?>
    </div>

    <div class="block__content">
        <div class="block__header">
            <h2 class="block__title">
                <a class="block__title-link" href="<?php echo get_the_permalink(); ?>">
                    <?php echo $title; ?>
                </a>
            </h2>
        </div>

        <div class="block__description">
            <?php echo $description; ?>
        </div>
    </div>
</article>