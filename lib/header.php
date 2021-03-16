<?php

///////////////////////
// PREHEADER WIDGETS //
///////////////////////

/**
 * Header customization
 */
//* Register the widget area
genesis_register_sidebar( array(
	'id'		=> 'preheader',
	'name'		=> __( 'Preheader', 'elodin-twentynineteen' ),
	'description'	=> __( 'Displays before anything else.', 'elodin-twentynineteen' ),
) );

//* Add the widget area before the opening wrap
remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
add_action( 'genesis_header', 'elodin_header_markup_open', 5 );

/**
 * This is a modified version of the core genesis function, instead inserting the preheader area
 */
function elodin_header_markup_open() {

	genesis_markup( array(
		'open'    => '<header %s>',
		'context' => 'site-header',
	) );

	if ( is_active_sidebar( 'preheader' ) ) {
		genesis_widget_area ('preheader', array(
			'before' => '<div class="preheader"><div class="wrap">',
			'after' => '</div></div>',
		) );
	}

	genesis_structural_wrap( 'header' );

}

/////////////////
// SITE HEADER //
/////////////////

// Displays custom logo.
add_action( 'genesis_site_title', 'the_custom_logo', 0 );

// Repositions primary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 12 );

// Removes header right widget area.
unregister_sidebar( 'header-right' );

// Removes output of primary navigation right extras.
remove_filter( 'genesis_nav_items', 'genesis_nav_right', 10, 2 );
remove_filter( 'wp_nav_menu_items', 'genesis_nav_right', 10, 2 );


////////////////////
// HAMBURGER MENU //
////////////////////

add_action( 'genesis_header', 'elodin_output_hamburger', 13 );
function elodin_output_hamburger() {
	echo '<a href="#" class="open-hamburger-nav"><span></span><span></span><span></span></a>';
}

// add_action( 'genesis_header', 'elodin_menu_close', 14 );
function elodin_menu_close() {
	echo 'hello world!</div>'; // .menu-wrap 
}

//* Register the widget area
genesis_register_sidebar( array(
	'id'		=> 'hamburger-overlay',
	'name'		=> __( 'Hamburger overlay (desktop)', 'sixcanyon' ),
	'description'	=> __( 'This displays after opening the hamburger menu.', 'sixcanyon' ),
) );

add_action( 'genesis_after', 'elodin_output_menu_overlay', 999 );
function elodin_output_menu_overlay() {
	genesis_widget_area ('hamburger-overlay', array(
        'before' => '<div class="hamburger-overlay" data-open="false"><a href="#" class="close-hamburger-nav"><span></span><span></span></a><div class="wrap">',
        'after' => '</div></div>',
	) );
}


/////////////////////
// RESPONSIVE MENU //
/////////////////////

/**
 * Defines responsive menu settings.
 *
 * @since 2.3.0
 */
function genesis_sample_responsive_menu_settings() {

	$settings = array(
		'mainMenu'         => __( 'Menu', 'genesis-sample' ),
		'menuIconClass'    => 'dashicons-before dashicons-menu',
		'subMenu'          => __( 'Submenu', 'genesis-sample' ),
		'subMenuIconClass' => 'dashicons-before dashicons-arrow-down-alt2',
		'menuClasses'      => array(
			'combine' => array(
				'.nav-primary',
			),
			'others'  => array(),
		),
	);

	return $settings;

}
