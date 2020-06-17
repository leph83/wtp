<?php 
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }
?>

        </main>

        <?php get_sidebar(); ?>

    </div>


    <footer class="footer" id="footer">
        <?php echo get_template_part( 'template-parts/content', 'widgets' ); ?>


        <div class="footer__content  footer__content--bottom" id="copyright">
            &copy; <?php echo esc_html(date_i18n(__('Y', 'wtp'))); ?> <?php echo esc_html(get_bloginfo('name')); ?>
        </div>
    </footer>

    <?php wp_footer(); ?>

</body>
</html>