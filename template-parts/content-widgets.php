<?php if (
    is_active_sidebar( 'footer-1-widget-area' )
    || is_active_sidebar( 'footer-2-widget-area' )
    || is_active_sidebar( 'footer-3-widget-area' )
    || is_active_sidebar( 'footer-4-widget-area' )
) : ?>


    <div class="footer__content  footer__content-top">
        <?php if ( is_active_sidebar( 'footer-1-widget-area' ) ) : ?>
            <div class="footer_1" >
                <div class="widget-area">
                    <ul>
                        <?php dynamic_sidebar( 'footer-1-widget-area' ); ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>

        <?php if ( is_active_sidebar( 'footer-2-widget-area' ) ) : ?>
            <div class="footer_2" >
                <div class="widget-area">
                    <ul>
                        <?php dynamic_sidebar( 'footer-2-widget-area' ); ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>

        <?php if ( is_active_sidebar( 'footer-3-widget-area' ) ) : ?>
            <div class="footer_3" >
                <div class="widget-area">
                    <ul>
                        <?php dynamic_sidebar( 'footer-3-widget-area' ); ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>

        <?php if ( is_active_sidebar( 'footer-4-widget-area' ) ) : ?>
            <div class="footer_4" >
                <div class="widget-area">
                    <ul>
                        <?php dynamic_sidebar( 'footer-4-widget-area' ); ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
    </div>

<?php endif; ?>