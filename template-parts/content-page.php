<?php 
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <header class="">
        <h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
    </header>

    <div class="entry-content">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail(); ?>
        <?php endif; ?>

        <?php the_content(); ?>

        <div class="entry-links">
            <?php wp_link_pages(); ?>
        </div>
    </div>

</article>