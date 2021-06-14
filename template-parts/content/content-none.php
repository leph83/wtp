<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
?>

<div class="block  block--none">

	<div class="block__media"></div>

	<div class="block__content">
		<h2 class="block__title">
			<?php esc_html_e('Nothing here', 'wtp'); ?>
		</h2>

		<div class="block__description">
			<p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for.', 'wtp'); ?></p>

			<a class="btn" href="<?php echo get_home_url(); ?>">
				<?php echo __('back to homepage', 'wtp'); ?>
			</a>
		</div>
	</div>

</div>