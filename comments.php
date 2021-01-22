<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

?>


<?php if (have_comments() &&  !post_password_required() ) : ?>
    <?php wp_enqueue_script( "comment-reply" ); ?>

    <div class="comments">

        <?php
        global $comments_by_type;
        $comments_by_type = separate_comments($comments);
        ?>

        <?php if (!empty($comments_by_type['comment'])) : ?>

            <section class="comment">
                <h3 class="comment__title">
                    <?php comments_number(); ?>
                </h3>

                <?php if (get_comment_pages_count() > 1) : ?>
                    <nav class="comment__navigation">
                        <div class="comment__links"><?php paginate_comments_links(); ?></div>
                    </nav>
                <?php endif; ?>

                <ul class="comment__list">
                    <?php wp_list_comments('type=comment'); ?>
                </ul>


                <?php if (get_comment_pages_count() > 1) : ?>
                    <nav class="comment__navigation">
                        <div class="comment__links"><?php paginate_comments_links(); ?></div>
                    </nav>
                <?php endif; ?>
            </section>

        <?php endif; ?>



        <?php if (!empty($comments_by_type['pings'])) : ?>

            <?php $ping_count = count($comments_by_type['pings']); ?>

            <section class="comment">
                <h3 class="comment__title">
                    <?php echo '<span class="comment__ping-count">' . esc_html($ping_count) . '</span> ' . esc_html(_nx('Trackback or Pingback', 'Trackbacks and Pingbacks', $ping_count, 'comments count', 'wtp')); ?>
                </h3>

                <ul class="comment__list">
                    <?php wp_list_comments('type=pings&callback=wtp_custom_pings'); ?>
                </ul>
            </section>

        <?php endif; ?>

    </div>

<?php endif; ?>





<?php if (comments_open()) : ?>

    <?php comment_form(); ?>

<?php endif; ?>