<?php 
    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly.
    }
?>

            </main>

            <?php get_sidebar(); ?>
        </div>
    </div>


    <footer class="footer" id="footer">
        <?php echo get_template_part( 'template-parts/content', 'widgets' ); ?>


        <div class="footer__content  footer__content--bottom" id="copyright">
            Merci Team
        </div>
    </footer>

    <?php wp_footer(); ?>

</body>
</html>