<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$title = get_the_title('', false);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>

    <div class="block  alignwide">
        <div class="block__media">
            <?php echo get_the_post_thumbnail(); ?>
        </div>

        <div class="block__content">
            <header class="block__heading">
                <h1 class="block__title"><?php echo $title; ?></h1>

                <?php the_tags('', ' | ', ''); ?>

                <?php the_category(); ?>
            </header>
        </div>
    </div>

    <div class="entry-content" id="page-content">
        <?php the_content(); ?>
    </div>


    
    <?php comments_template(); ?>



    <div class="entry-links  alignwide">
        <?php
        // Pagination inside page or post
        wp_link_pages(
            array(
                'before'   => '<nav class="page-links" aria-label="' . esc_attr__('Page', 'wtp') . '">',
                'after'    => '</nav>',
                /* translators: %: page number. */
                'pagelink' => esc_html__('Page %', 'wtp'),
            )
        );
        ?>
    </div>

</article>