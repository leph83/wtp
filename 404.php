<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header();
?>


<header class="alignwide">
    <h1 class="h1"><?php esc_html_e('Nothing here', 'wtp'); ?></h1>
</header><!-- .page-header -->

<div class="error-404 not-found alignwide">
    <div class="">
        <p>
            <?php esc_html_e('It looks like nothing was found at this location. Maybe try a search?', 'wtp'); ?>
        </p>

        <?php get_search_form(); ?>
    </div><!-- .page-content -->
</div><!-- .error-404 -->


<?php get_footer();
