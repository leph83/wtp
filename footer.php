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
    <section class="">
        <h2 class="screen-reader-text"><?php echo __('Footer', 'wtp'); ?></h2>

        <?php if (is_active_sidebar('footer')) : ?>
            <ul class="widget">
                <?php dynamic_sidebar('footer'); ?>
            </ul>
        <?php endif; ?>
    </section>
</footer>

<?php wp_footer(); ?>

</body>

</html>