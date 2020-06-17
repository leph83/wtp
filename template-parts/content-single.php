<?php 
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header>
        <h1>
            <?php the_title(); ?>
        </h1>

        <div class="entry-meta">
  
   +
                <?php the_author_posts_link(); ?>
  

                <?php the_time( get_option( 'date_format' ) ); ?>

                <?php the_tags('', ' | ', ''); ?>

                <?php the_category( ); ?>

        </div>
    </header>
   
    <div class="">
        <?php the_content(); ?>
    </div>
</article>

<?php comments_template(); ?>

<?php get_template_part('template-parts/nav-below', 'single'); ?>