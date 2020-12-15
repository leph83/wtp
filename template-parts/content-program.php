<?php 
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }

    $date =  get_the_time( 'D, j.n' );
    $time =  get_the_time( 'H:i' );

    $subtitle = get_field('subtitle') ?? false;
    $country = get_field('country') ?? false;
    $year = get_field('year') ?? false;
    $length = get_field('length') ?? false;
    $version = get_field('version') ?? false;
    $regie = get_field('regie') ?? false;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('block  block--card  block--card-rest'); ?>>

    <div class="block__datetime  fw--bold">
        <div class="block__date">
            <?php echo $date; ?>
        </div>
        <div class="block__time">
            <?php echo $time; ?>
        </div>
    </div>

    <?php if ( has_post_thumbnail() ) : ?>
        <div class="block__media">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <?php the_post_thumbnail('large'); ?>
            </a>
        </div>
    <?php endif; ?>

    <div class="block__content">
        <header class="block__header">
            <h2 class="block__title">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
                    <?php the_title(); ?> 
                </a>            
            </h2>

            <?php if ($subtitle) : ?>
                <h3 class="block__subtitle  h7">
                    <?php echo $subtitle; ?>
                </h3>
            <?php endif; ?>



            <div>
                <?php // get_template_part('template-parts/entry-meta'); ?>
            </div>
        </header>

        <?php if ($country || $year || $length || $version || $regie) : ?>
            <div class="block__additionalinfo">
                <?php if ($country || $year) : ?>
                    <?php echo $country; ?> <?php echo $year; ?> |
                <?php endif; ?>
                
                <?php if ($length) : ?>
                    <?php echo $length; ?> min |
                <?php endif; ?>

                <?php if ($version) : ?>
                    <?php echo $version; ?> |
                <?php endif; ?>

                <?php if ($regie) : ?>
                    Regie: <?php echo $regie; ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="block__description  h8">
            <?php the_excerpt(); ?>
        </div>

        <div class="block__more">
            <a href="<?php the_permalink(); ?>" class="btn">weiter</a>
        </div>
    </div>
</article>