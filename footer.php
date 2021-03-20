<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>

<?php if (is_active_sidebar('sidebar-1')) : ?>
    <aside class="sidebar">
        <h2 class="screen-reader-text">Sidebar</h2>
        <div class="sidebar__content">
            <ul class="widget">
                <?php dynamic_sidebar('sidebar-1'); ?>
            </ul>
        </div>
    </aside>
<?php endif; ?>

</main>

<footer id="footer" class="footer">
    <section class="footer__content">
        <h2 class="screen-reader-text"><?php echo __('Footer', 'wtp'); ?></h2>

        <div class="footer__item">
            &copy;<?php echo date('Y'); ?> - <?php echo get_bloginfo('name'); ?>
        </div>

        <div class="footer__item">
            <?php get_template_part('template-parts/footer/footer-nav'); ?>
        </div>
    </section>
</footer>

<?php wp_footer(); ?>

</body>

</html>