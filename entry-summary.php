<div class="entry-summary">
    <?php if ( has_post_thumbnail() ) : ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <?php the_post_thumbnail('medium'); ?>
        </a>
    <?php endif; ?>
    
    <?php the_excerpt(); ?>
    
    <?php if ( is_search() ) { ?>
        <div class="entry-links">
            <?php
                wp_link_pages( array(
                    'before'           => '',
                    'after'            => '',
                    'link_before'      => '',
                    'link_after'       => '',
                    'next_or_number'   => 'next',
                    'separator'        => ' ',
                    'nextpagelink'     => 'Next page',
                    'previouspagelink' => 'Previous page',
                    'pagelink'         => '%',
                    'echo'             => 1
                    )
                );
            ?>
        </div>
    <?php } ?>
</div>