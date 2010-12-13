<?php 
// http://www.themelab.com/2010/07/11/remove-code-wordpress-header/
remove_action('wp_head', 'rsd_link');										// Could be useful.
remove_action('wp_head', 'wlwmanifest_link');						// Useless
remove_action('wp_head', 'wp_generator');								// Insecure
remove_action('wp_head', 'start_post_rel_link');				// Crufty
remove_action('wp_head', 'index_rel_link');							// Crufty
remove_action('wp_head', 'adjacent_posts_rel_link');		// Crufty

// Ensure site is indexable by Google
remove_action('wp_head', 'noindex', 1);									

// Remove .recentcomments styling
add_action('widgets_init', 'my_remove_recent_comments_style');
function my_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}
