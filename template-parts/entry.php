TO BE REMOVED: entry.php

<?php 
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }

    if ( is_singular() ) {
        $title_tag = 'h1';
    } else {
        $title_tag = 'h2';
    } 
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header>
        <<?php echo $title_tag; ?>>
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
        </<?php echo $title_tag; ?>>
   
   
   
   <?php edit_post_link(); ?>
        <?php if ( ! is_search() ) { get_template_part( 'entry', 'meta' ); } ?>
    </header>
        <?php get_template_part( 'entry', ( is_front_page() || is_home() || is_front_page() && is_home() || is_archive() || is_search() ? 'summary' : 'content' ) ); ?>
        <?php if ( is_singular() ) { get_template_part( 'entry-footer' ); } ?>
</article>