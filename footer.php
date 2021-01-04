<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>

</main>
</div>

<footer class="footer" id="footer">
    <div class="footer__content">
        <div class="">
            <?php echo get_template_part('template-parts/content', 'widgets'); ?>
        </div>

        <div class="">
            <?php get_template_part('template-parts/footer/footer-nav'); ?>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>