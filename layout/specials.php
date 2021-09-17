<?php

//* Output specials before
// add_action( 'before_loop_layout_specials', 'rb_specials_before' );
function rb_specials_before( $args ) {
	// wp_enqueue_script( 'SCRIPTHANDLE' );
}

//* Output each specials
add_action( 'add_loop_layout_specials', 'rb_specials_each' );
function rb_specials_each() {

	//* Global vars
	global $post;
	$id = get_the_ID();

	//* Vars
	$title = get_the_title();
    $permalink = get_the_permalink();
    $excerpt = get_the_excerpt();
    $background = get_the_post_thumbnail_url( get_the_ID(), 'large' );   
    
    edit_post_link();
    
    if ( $title )
        printf( '<h3>%s</h3>', $title );
        
    if ( $excerpt )
        printf( '<div class="excerpt">%s</div>', $excerpt );
                
    if ( $background ) 
        printf( '<div class="featured-image" style="background-image:url( %s )"></div>', $background );
        
}