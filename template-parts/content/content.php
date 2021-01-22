<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$title = get_the_title();
$image = get_the_post_thumbnail(get_the_id(), 'large') ?? false;
$author = esc_html('by ') . get_the_author_posts_link();
$date = get_the_time(get_option('date_format'));

if (empty($title)) {
    $title = __('Unbenannt', 'wtp-theme');
}

// TAGS
$tags = '';
$count_tags = 0;
$posttags = get_the_tags();
if ($posttags) {
    foreach ($posttags as $tag) {
        if ($count_tags != 0) {
            $tags .= ', ';
        }
        $tags .= '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>';

        $count_tags++;
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

    if (!empty(get_the_post_thumbnail_caption())) {
        $image = '<figure>' . $image . '<figcaption>' . get_the_post_thumbnail_caption() . '</figcaption></figure>';
    }
}

// SINGULAR
if (!is_singular()) {
    $title = '<a href="' . get_the_permalink() . '">' . get_the_title() . '</a>';
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
    $title = esc_html('404', 'wtp-theme');
}

?>



<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

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

</article>

<?php comments_template('', true); ?>

<?php if (is_singular()) : ?>
    <?php wp_link_pages(); ?>

    <?php if (is_single()) : ?>
        <?php previous_post_link(); ?>
        <?php next_post_link(); ?>
    <?php endif; ?>
<?php endif; ?>

