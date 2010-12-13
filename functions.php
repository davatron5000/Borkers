<?php
/**
 * @package WordPress
 * @subpackage Borkers
 */
require_once('functions/clean-wphead.php');
require_once('functions/custom-comments.php');
require_once('functions/helpers.php');
require_once('functions/javascripts.php');
require_once('functions/sidebar-support.php');
require_once('functions/simplify-admin.php');

// Let there be syndication!
add_theme_support( 'automatic-feed-links' );


// i love featured images on everything.
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 50, 50, true ); // 50 pixels wide by 50 pixels tall, hard crop mode
add_image_size( 'single-post-thumbnail', 300, 9999 ); // Permalink thumbnail size
add_image_size( 'full-grid-width', 640, 9999 ); // Set the width to the full size of the post grid.

// Add custom post types to search.
function searchAll( $query ) {
    if ( $query->is_search ) { $query->set( 'post_type', array( 'post','page' )); } // Add all desired custom post_types to this array.
    return $query;
}
add_filter( 'the_search_query', 'searchAll' );


// Remove pings to self
function no_self_ping( &$links ) {
    $home = get_option( 'home' );
    foreach ( $links as $l => $link )
        if ( 0 === strpos( $link, $home ) )
            unset($links[$l]);
}
add_action( 'pre_ping', 'no_self_ping' );


// If more than one page exists, return TRUE. 
// http://www.ericmmartin.com/conditional-pagepost-navigation-links-in-wordpress-redux/
function show_posts_nav() {
	global $wp_query;
	return ($wp_query->max_num_pages > 1);
}