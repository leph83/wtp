<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$title = the_title('', '', false) ?? __(esc_html('unnamed'), 'wtp');

$author = esc_html('by ') . get_the_author_posts_link();
$date = get_the_time(get_option('date_format'));

// TAGS
$tags = '';
$posttags = get_the_tags();
if ($posttags) {
    foreach ($posttags as $tag) {
        $tags .= '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a> ';
    }
}

// CATEGORIES
$categories = get_the_category_list(', ');

// POST META
$postmeta = '';
if (get_post_type() == 'post') {
    $postmeta .=
        '<div class="">'
        . $author . ' | ' . $date .
        '</div>'
        .
        '<div class="">' . $categories . '</div>'
        .
        '<div class="">' . $tags . '</div>';
}
?>



<article id="post-<?php the_ID(); ?>" <?php post_class('entry-content'); ?>>

    <h2 class="block__title">
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
            <?php echo $title; ?>
        </a>
    </h2>


    <?php if (has_post_thumbnail()) : ?>
        <div class="alignwide">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <?php the_post_thumbnail('large'); ?>
            </a>
        </div>
    <?php endif; ?>


    <?php the_excerpt(); ?>

    <div class="aligncontent">
        <?php echo $postmeta; ?>
    </div>

</article>