<?php 
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }
?>

<?php if (
    is_active_sidebar( 'footer-1-widget-area' )
    || is_active_sidebar( 'footer-2-widget-area' )
    || is_active_sidebar( 'footer-3-widget-area' )
    || is_active_sidebar( 'footer-4-widget-area' )
) : ?>

    <div class="footer__content  footer__content--top">
        <div class="lc">
            <div class="footer__contentgrid">
                <?php if ( is_active_sidebar( 'footer-1-widget-area' ) ) : ?>
                    <div class="footer_1  footer__item  footer__item--top" >
                        <div class="widget-area">
                            <ul>
                                <?php dynamic_sidebar( 'footer-1-widget-area' ); ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ( is_active_sidebar( 'footer-2-widget-area' ) ) : ?>
                    <div class="footer_2  footer__item  footer__item--top" >
                        <div class="widget-area">
                            <ul>
                                <?php dynamic_sidebar( 'footer-2-widget-area' ); ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ( is_active_sidebar( 'footer-3-widget-area' ) ) : ?>
                    <div class="footer_3  footer__item  footer__item--top" >
                        <div class="widget-area">
                            <ul>
                                <?php dynamic_sidebar( 'footer-3-widget-area' ); ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ( is_active_sidebar( 'footer-4-widget-area' ) ) : ?>
                    <div class="footer_4  footer__item  footer__item--top" >
                        <div class="widget-area">
                            <ul>
                                <?php dynamic_sidebar( 'footer-4-widget-area' ); ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php endif; ?>