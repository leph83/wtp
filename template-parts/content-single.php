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
    $country = get_field('country') ?? false;
    $year = get_field('year') ?? false;
    $length = get_field('length') ?? false;
    $version = get_field('version') ?? false;
    $regie = get_field('regie') ?? false;
?>


<div class="lc">

    <article id="post-<?php the_ID(); ?>" >

        <div class="block  block--card  block--card-first ">
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="block__media">
                    <?php the_post_thumbnail('large'); ?>
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

                </header>
                
            </div>
        </div>


        <div class=" block--card-single"?>
            <div class="block__description">
                <div class="description  fw--bold">
                    <?php the_content(); ?>
                </div>

                
                <?php 
                    $fields = get_field_objects(  );
                        if( $fields ): ?>
                        <div class="block__description-sidebar">
                            <?php foreach( $fields as $field ): ?>

                                <?php if ( 
                                    $field['value'] 
                                    && 
                                    !( $field['name'] == 'subtitle' || $field['name'] == 'gallery'  )
                                    )  
                                : ?>
                                    
                                    <div class="label">
                                        <?php echo $field['label']; ?>: 
                                    </div>

                                    <div class="value">
                                        <?php if ( is_array( $field['value'] ) ) : ?>
                                            <?php 
                                                $type = '';
                                                switch ( $field['name'] ) {
                                                    case 'genre':
                                                        $type = 'category';
                                                        break;
                                                    case 'fsk':
                                                        $type = 'post_tag';
                                                        break;
                                                }  
                                            ?>
                                    
                                            <?php foreach ($field['value'] as $item) :  ?>
                                                <?php echo get_term($item, $type)->name; ?>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <?php echo $field['value']; ?>
                                        <?php endif; ?>
                                        
                                    
                                    </div>
                                <?php endif; ?>

                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </article>


    <?php comments_template(); ?>
</div>

<?php // get_template_part('template-parts/nav-pagination', 'single'); ?>