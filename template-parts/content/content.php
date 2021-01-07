<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$title = get_the_title('', false);
$image = get_the_post_thumbnail() ?? false;


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

// POST INFO
$postmeta = '';
if (get_post_type() == 'post') {
    $postmeta .=
        '<div class="">'
        . $author . ' | ' . $date .
        '</div>'
        .
        '<div class="">' . $tags . '</div>'
        .
        '<div class="">' . $categories . '</div>';
}

?>


<article id="post-<?php the_ID(); ?>" <?php post_class('alignwide  block  alignwide'); ?>>
    <div class="block__media">
        <?php echo $image; ?>
    </div>

    <div class="block__content">
        <header class="block__heading">
            <h1 class="block__title">
                <?php echo $title; ?>
            </h1>

            <div>
                <?php echo $postmeta; ?>
            </div>

        </header>
    </div>
</article>


<?php the_content(); ?>




<?php
$args = array(
    'before'    => '<nav class="clearfix">',
    'after'     => '</nav>'
);

wp_link_pages($args);
?>




<div class="clearfix">
    <?php comments_template('', true); ?>
</div>