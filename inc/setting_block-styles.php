<?php

if ( function_exists( 'register_block_style' ) ) {
	/**
	 * Register block styles.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function wtp_register_block_styles() {
		// Columns: Overlap.
		register_block_style(
			'core/spacer',
			array(
				'name'  => 'small',
				'label' => esc_html__( 'small', 'wtp' ),
			)
		);
    }

    add_action( 'init', 'wtp_register_block_styles' );
}
