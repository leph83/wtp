<?php 
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }
?>

<?php if ( is_active_sidebar( 'primary-widget-area' ) ) : ?>
    <aside class="aside" id="sidebar">
        <section id="primary" class="widget-area">
            <ul class="xoxo">
                <?php dynamic_sidebar( 'primary-widget-area' ); ?>
            </ul>
        </section>
    </aside>
<?php endif; ?>