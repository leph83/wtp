<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header();
?>


<header class="page__header alignwide">
    <h1 class="page__title">
        <?php
        printf(
            esc_html(
                /* translators: %d: the number of search results. */
                _n(
                    'We found %d result for',
                    'We found %d results for',
                    (int) $wp_query->found_posts,
                    'wtp'
                )
            ),
            (int) $wp_query->found_posts
        );

        printf(
            /* translators: %s: search term. */
            esc_html__(' "%s"', 'wtp'),
            '<span>' . esc_html(get_search_query()) . '</span>'
        );
        ?>
    </h1>
</header><!-- .page-header -->



<div class="page__content  alignwide">

    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>

            <?php get_template_part('template-parts/content/content', 'search'); ?>

        <?php endwhile; ?>

    <?php else : ?>

        <p>
            <?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'wtp'); ?>
        </p>

    <?php endif; ?>
</div>






<div class="entry-links">
        <?php
            wp_link_pages( array(
                'before'           => '',
                'after'            => '',
                'link_before'      => '',
                'link_after'       => '',
                'next_or_number'   => 'next',
                'separator'        => ' ',
                'nextpagelink'     => 'Next page',
                'previouspagelink' => 'Previous page',
                'pagelink'         => '%',
                'echo'             => 1
                )
            );
        ?>
    </div>


<div class="alignwide">
    <?php get_search_form(); ?>
</div>






<?php get_footer();