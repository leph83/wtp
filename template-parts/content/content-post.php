<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$title = get_the_title();
$image = get_the_post_thumbnail(get_the_id(), 'large') ?? false;

/**
 * OPTIONAL
 * uncomment and echo meta information
 * like date, author, tags and categories
 */


 
 /*
 $date = get_the_time(get_option('date_format'));
 $author = get_the_author();


 $posttags = get_the_tags();
 $tags = '';
 if ($posttags) {
     $tags = __('tags', 'wtp') . ': ';
     foreach ($posttags as $tag) {
         $tags .= '<a href="' . get_term_link($tag->term_id) . '">' . $tag->name . '</a> ';
     }
 }

 $postcategories = get_the_category();
 $categories = '';
 if ($postcategories) {
     $categories = __('categories', 'wtp') . ': ';
     foreach ($postcategories as $category) {
         $categories .= '<a href="' . get_term_link($category->term_id) . '">' . $category->name . '</a> ';
     }
 }
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>

    <div class="block  block--postdetail">
        <div class="block__media">
            <?php echo $image; ?>
        </div>

        <div class="block__content">
            <div class="block__header">
                <h1 class="block__title">
                    <?php echo $title; ?>
                </h1>
            </div>
        </div>
    </div>

    <div class="entry-content  clearfix">
        <?php the_content(); ?>
    </div>

    <?php comments_template('', true); ?>

</article>


<?php wp_link_pages(array(
    'before' => '<div class="nav  nav--pagination">',
    'after' => '</div>',
)); ?>


<?php // UNCOMMENT FOR PREVIOUS AND NEXT POSTS ?>
<?php //previous_post_link(); ?> 
<?php //next_post_link(); ?>