<?php 
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }

    get_header(); 
?>

    <article id="post-0" class="post not-found">
        <header class="block__header">
            <h1 class="block__title">
                <?php esc_html_e('Not Found', 'wtp'); ?>
            </h1>
        </header>

        <div class="block__content">
            <p>
                <?php esc_html_e('Nothing found for the requested page. Try a search instead?', 'wtp'); ?>
            </p>

            <?php get_search_form(); ?>
        </div>
    </article>

<?php get_footer();