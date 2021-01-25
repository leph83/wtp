<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>

</main>

<footer id="footer" class="footer  bg-color--black  color--white">
    <section class="lc lc--2 flex flex-wrap--wrap  flex-justify--space-between  flex-align-items--center">
        <h2 class="screen-reader-text"><?php echo __('Footer', 'wtp-child'); ?></h2>

        <div class="padding">
            &copy;<?php echo date('Y'); ?> - <?php echo get_bloginfo('name'); ?>
        </div>

        <div class="padding-left--half  padding-right--half">
            <?php get_template_part('template-parts/footer/footer-nav'); ?>
        </div>
    </section>
</footer>

<?php wp_footer(); ?>

</body>

</html>