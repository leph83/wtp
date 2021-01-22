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

// SINGULAR
if (is_singular()) {
    $title = get_the_title();
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



// BLOG PAGE
if (is_home()) {
    $featured_image = '';

    // Blog not as Startpage
    if (get_option('page_for_posts') != 0) {
        $id = get_post_thumbnail_id(get_option('page_for_posts'));
        $featured_image = wp_get_attachment_image($id, 'full');
    }
}

// ARCHIVE
if (is_archive()) {
    $title = get_the_archive_title();
    $description = get_the_archive_description();
}

// SEARCH
if (is_search()) {
    $title = _n(
        'We found ' . (int) $wp_query->found_posts . ' result for',
        'We found ' . (int) $wp_query->found_posts . ' results for',
        'wtp'
    ) . ' <span>"' . esc_html(get_search_query()) . '"</span>';

    $description = get_search_form(false);
}

// 404
if (is_404()) {
    $title = esc_html('404', 'wtp');
}

?>


<article id="post-<?php the_ID(); ?>" <?php post_class('block  margin padding'); ?>>

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