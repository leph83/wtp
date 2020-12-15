<?php 
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }

    $date =  get_the_time( 'D, j.n' );
    $time =  get_the_time( 'H.i' );

    $current = strtotime(date('Y-m-d'));
    $timestamp = strtotime(get_the_date('Y-m-d'));

    $datediff = $timestamp - $current;
    

    $difference = floor($datediff/(60*60*24));
    if($difference==0) {
       $date = 'heute';
    }

    
    $subtitle = get_field('subtitle') ?? false;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('block  block--card  block--card-first  '); ?>>

    <?php if ( has_post_thumbnail() ) : ?>
        <div class="block__media">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <?php the_post_thumbnail('large'); ?>
            </a>
        </div>
    <?php endif; ?>

    <div class="block__content">

        <div class="block__datetime  fw--bold">
            <div class="block__date">
                <?php echo $date; ?>
            </div>
            <div class="block__time">
                <?php echo $time; ?> Uhr
            </div>
        </div>

        <header class="block__header  fw--bold">
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
                <?php //get_template_part('template-parts/entry-meta'); ?>
            </div>
        </header>

        <div class="block__description">
            <?php the_excerpt(); ?>

            <div class="block__more  margin-top--third">
                <a href="<?php the_permalink(); ?>" class="btn">weiter</a>
            </div>
        </div>

        
    </div>
</article>