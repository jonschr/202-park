<?php

// Starts the engine.
require_once get_template_directory() . '/lib/init.php';

// Defines the child theme (do not remove).
define( 'CHILD_THEME_NAME', '202 Park' );
define( 'CHILD_THEME_URL', 'https://elod.in' );
define( 'CHILD_THEME_VERSION', '1.1.4' );

// Sets up the Theme.
require_once get_stylesheet_directory() . '/lib/theme-defaults.php';

// Localization
add_action( 'after_setup_theme', 'genesis_sample_localization_setup' );
function genesis_sample_localization_setup() {
	load_child_theme_textdomain( 'genesis-sample', get_stylesheet_directory() . '/languages' );
}

// Adds helper functions.
require_once get_stylesheet_directory() . '/lib/helper-functions.php';

// Adds image upload and color select to Customizer.
require_once get_stylesheet_directory() . '/lib/customize.php';

// Includes Customizer CSS.
require_once get_stylesheet_directory() . '/lib/output.php';

// Adds WooCommerce support.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-setup.php';

// Adds the required WooCommerce styles and Customizer CSS.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-output.php';

// Adds the Genesis Connect WooCommerce notice.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-notice.php';

// Header customizations
require_once get_stylesheet_directory() . '/lib/header.php';

// Gutenberg
require_once get_stylesheet_directory() . '/lib/gutenberg-init.php';

// First block customization (add body class for the first block for padding and remove the entry header)
require_once get_stylesheet_directory() . '/lib/gutenberg-first-block-logic.php';

// Last block customization (add body class for the last block for padding and remove the entry header)
require_once get_stylesheet_directory() . '/lib/gutenberg-last-block-logic.php';

// Footer customizations
require_once get_stylesheet_directory() . '/lib/footer.php';

// Theme colors
require_once  get_stylesheet_directory() . '/lib/theme-colors.php';

// Enqueues
require_once  get_stylesheet_directory() . '/lib/enqueue.php';

// Sidebar customizations (unregistering layouts, etc.)
require_once  get_stylesheet_directory() . '/lib/sidebar.php';

// Text sizes
require_once get_stylesheet_directory() . '/lib/text-sizes.php';

// Disable tags
require_once get_stylesheet_directory() . '/lib/disable-tags.php';

// Body classes for login state
require_once get_stylesheet_directory() . '/lib/body-class-logged-in-out.php';

// Adds support for HTML5 markup structure.
add_theme_support( 'html5', genesis_get_config( 'html5' ) );

// Adds support for accessibility.
add_theme_support( 'genesis-accessibility', genesis_get_config( 'accessibility' ) );

// Adds viewport meta tag for mobile browsers.
add_theme_support( 'genesis-responsive-viewport' );

// Adds custom logo in Customizer > Site Identity.
add_theme_support( 'custom-logo', genesis_get_config( 'custom-logo' ) );

// Renames primary and secondary navigation menus.
add_theme_support( 'genesis-menus', genesis_get_config( 'menus' ) );

// Adds image sizes.
add_image_size( 'blog', 780, 390, true );
add_image_size( 'blog-sidebar', 360, 180, true );

// Remove the edit link by default on posts/pages
add_filter ( 'genesis_edit_post_link' , '__return_false' );

//* Remove the entry footer markup (requires HTML5 theme support)
remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_open', 5 );
remove_action( 'genesis_entry_footer', 'genesis_post_meta' );
remove_action( 'genesis_entry_footer', 'genesis_entry_footer_markup_close', 15 );

//* Disable fullscreen mode
add_action( 'enqueue_block_editor_assets', 'elodin_disable_fullscreen_mode' );
function elodin_disable_fullscreen_mode() {
	
	if ( !is_admin() )
		return;
		
	$script = "
		jQuery( window ).load(function() { 
			const isFullscreenMode = wp.data.select( 'core/edit-post' ).isFeatureActive( 'fullscreenMode' ); 
			if ( isFullscreenMode ) { 
				wp.data.dispatch( 'core/edit-post' ).toggleFeature( 'fullscreenMode' ); 
			} 
		});
	";
	
	wp_add_inline_script( 'wp-blocks', $script );
	
}

//* Add heading attributes
add_action('enqueue_block_editor_assets', function() {
	wp_enqueue_script(
		'elodin-heading-attributes', 
		get_stylesheet_directory_uri() . '/js/headingattributes.js', 
		['wp-blocks']
	);
});

//* Add image badge attributes
add_action('enqueue_block_editor_assets', function() {
	wp_enqueue_script(
		'elodin-image-attributes', 
		get_stylesheet_directory_uri() . '/js/imageattributes.js', 
		['wp-blocks']
	);
});

//* Layouts
require_once( 'lib/expand.php' );
require_once( 'layout/specials.php' );
