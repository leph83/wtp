<?php 
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
    
    <div class="block  block--hero">
        <?php if (has_post_thumbnail()) : ?>
            <div class="block__media">
                <?php the_post_thumbnail('original'); ?>
            </div>
        <?php endif; ?>

        <div class="block__content">
            <header class="block__header">
                <h1 class="block__title">
                    <?php the_title(); ?>
                </h1> 
            </header>

            <a class="block__down" href="#page-content">scroll down</a>
        </div>
    </div>


    <div class="" id="page-content">
        <?php the_content(); ?>

        <div class="entry-links">
            <?php wp_link_pages(); ?>
        </div>
    </div>

</article>