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

                <?php if (get_post_type() == 'post') : ?>
                    <div class="entry-meta">
                        <span class="author">
                            <?php _e('by'); ?> <?php the_author_posts_link(); ?>
                        </span>

                        <span class="meta-sep"> | </span>

                        <span class="entry-date">
                            <?php the_time(get_option('date_format')); ?>
                        </span>

                        <div>
                            <?php esc_html_e('Tags: ', 'wtp'); ?>
                            <?php the_tags('', ' | ', ''); ?>
                        </div>

                        <div>
                            <?php esc_html_e('Categories: ', 'wtp'); ?>
                            <?php the_category(', '); ?>
                        </div>
                    </div>
                <?php endif; ?>

            </header>
        </div>
    </div>



    <div class="entry-content" id="page-content">
        <?php the_content(); ?>
    </div>



    <div class="entry-links  alignwide">
        <?php
        // Pagination inside page or post
        wp_link_pages(
            array(
                'before'           => '<nav class="page-links" aria-label="' . esc_attr__('Page', 'wtp') . '">',
                'after'            => '</nav>',
                'link_before'      => '',
                'link_after'       => '',
                'next_or_number'   => 'next',
                'separator'        => ' ',
                'nextpagelink'     => esc_html__('Next page', 'wtp'),
                'previouspagelink' => esc_html__('Previous page', 'wtp'),
                'pagelink'         =>  esc_html__('Page %', 'wtp'),
                'echo'             => 1
            )
        );
        ?>
    </div>



    <div class="alignwide">
        <?php comments_template('', true); ?>
    </div>

</article>