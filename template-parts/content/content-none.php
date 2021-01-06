<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
?>

<section class="">
	<header class="page__header  alignwide">
		<h1 class="page__title">
			<?php esc_html_e('Nothing here', 'wtp'); ?>
		</h1>
	</header>

	<div class="page__content  alignwide">

		<?php if (is_home() && current_user_can('publish_posts')) : ?>

			<?php
			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'wtp'),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url(admin_url('post-new.php'))
			);
			?>

		<?php else : ?>

			<p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'wtp'); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>
	</div>
</section>