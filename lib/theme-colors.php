<?php

/**
 * Set the theme colors
 */
add_action( 'after_setup_theme', 'elodin_register_colors' );
function elodin_register_colors() {
	add_theme_support(
		'editor-color-palette', array(
			array(
				'name'  => esc_html__( 'White', 'elodin_twentynineteen' ),
				'slug' => 'white',
				'color' => '#ffffff',
			),
			array(
				'name'  => esc_html__( 'Light', 'elodin_twentynineteen' ),
				'slug' => 'light',
				'color' => '#f5f5f5',
            ),
            array(
				'name'  => esc_html__( 'Highlight', 'elodin_twentynineteen' ),
				'slug' => 'highlight',
				'color' => '#bca664',
            ),
            array(
				'name'  => esc_html__( 'Bluelight', 'elodin_twentynineteen' ),
				'slug' => 'bluelight',
				'color' => '#8aa6ab',
			),
			array(
				'name'  => esc_html__( 'Blue', 'elodin_twentynineteen' ),
				'slug' => 'blue',
				'color' => '#3f5f6e',
            ),
			array(
				'name'  => esc_html__( 'Dark', 'elodin_twentynineteen' ),
				'slug' => 'dark',
				'color' => '#1f313b',
            ),
		)
	);
}