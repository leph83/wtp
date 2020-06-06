</main>

<footer class="footer" id="footer">
    <div class="footer__content" id="copyright">
        &copy; <?php echo esc_html(date_i18n(__('Y', 'wtp'))); ?> <?php echo esc_html(get_bloginfo('name')); ?>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>