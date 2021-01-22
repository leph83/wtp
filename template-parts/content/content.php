<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$title = '<a href="' . get_the_permalink() . '">' . get_the_title() . '</a>';
$image = get_the_post_thumbnail(get_the_id(), 'large') ?? false;
$author = esc_html('by ') . get_the_author_posts_link();
$date = get_the_time(get_option('date_format'));

// TAGS
$tags = '';
$posttags = get_the_tags();
if ($posttags) {
    foreach ($posttags as $tag) {
        $tags .= '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>';
    }
}

// CATEGORIES
$categories = get_the_category_list(', ');

// POSTS
$postmeta = '';
if (get_post_type() == 'post') {
    $postmeta .=
        '<div class="">'
        . $author . ' | ' . $date .
        '</div>'
        .
        '<div class="">' . $tags . '</div>'
        .
        '<div class="">' . $categories . '</div>
    ';
}

// SINGULAR
if (is_singular()) {
    $title = get_the_title();
}

// BLOG PAGE
if (is_home()) {
    // Blog not as Startpage
    if (get_option('page_for_posts') != 0) {
        $id = get_post_thumbnail_id(get_option('page_for_posts'));
        $image = wp_get_attachment_image($id, 'full');
    }
}

// 404
if (is_404()) {
    $title = esc_html('404', 'wtp');
}

?>



<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>

    <?php echo $image; ?>

    <h1>
        <?php echo $title; ?>
    </h1>

    <?php echo $postmeta; ?>

    <?php if (is_singular()) : ?>
        <?php the_content(); ?>
    <?php else : ?>
        <?php the_excerpt(); ?>
    <?php endif; ?>

    <?php
    $args = array(
        'before'    => '<nav class="alignwide">',
        'after'     => '</nav>'
    );

    wp_link_pages($args);
    ?>

    <?php comments_template('', true); ?>

</article>