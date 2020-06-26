<?php 
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="block__header">
        <h1 class="block__title">
            <?php the_title(); ?>
        </h1>

        <div class="block__subtitle">
            <?php get_template_part('template-parts/entry-meta', 'single'); ?>
        </div>
    </header>
   
    <section class="">
        <?php the_content(); ?>
    </section>

    <?php comments_template(); ?>
</article>

<?php get_template_part('template-parts/nav-pagination', 'single'); ?>