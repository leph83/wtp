<?php 
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }
?>

<div id="comments">
    <?php if ( have_comments() ) : ?>

        <?php 
            global $comments_by_type;
            $comments_by_type = separate_comments( $comments );
        ?>
        
        <?php if ( ! empty( $comments_by_type['comment'] ) ) : ?>
    
            <section id="comments-list" class="comments">
                <h3 class="comments-title"><?php comments_number(); ?></h3>
    
                <?php if ( get_comment_pages_count() > 1 ) : ?>
                    <nav id="comments-nav-above" class="comments-navigation" >
                        <div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
                    </nav>
                <?php endif; ?>
        
                <ul>
                    <?php wp_list_comments( 'type=comment' ); ?>
                </ul>


                <?php if ( get_comment_pages_count() > 1 ) : ?>
                    <nav id="comments-nav-below" class="comments-navigation" >
                        <div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
                    </nav>
                <?php endif; ?>
            </section>
        
        <?php endif; ?>
        
        <?php if ( ! empty( $comments_by_type['pings'] ) ) : ?>
        
            <?php $ping_count = count( $comments_by_type['pings'] ); ?>
        
            <section id="trackbacks-list" class="comments">
                <h3 class="comments-title"><?php echo '<span class="ping-count">' . esc_html( $ping_count ) . '</span> ' . esc_html( _nx( 'Trackback or Pingback', 'Trackbacks and Pingbacks', $ping_count, 'comments count', 'wtp' ) ); ?></h3>
        
                <ul>
                    <?php wp_list_comments( 'type=pings&callback=wtp_custom_pings' ); ?>
                </ul>
            </section>
        
        <?php endif; ?>
    <?php endif; ?>

    <?php if ( comments_open() ) : ?>
        <?php comment_form(); ?>
    <?php endif; ?>
</div>