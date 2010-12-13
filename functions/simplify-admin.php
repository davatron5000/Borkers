<?php
// Limit the WYSIWYG Editor.
function fb_mce_change_buttons($initArray){ 
 	$initArray['theme_advanced_buttons1'] = 'formatselect,bold,italic,underline,|,bullist,numlist,blockquote,|,pastetext,pasteword,|,link,unlink,|,spellchecker,|,indent,outdent';
	$initArray['theme_advanced_buttons2'] = '';
	return $initArray;
}
add_filter('tiny_mce_before_init', 'fb_mce_change_buttons');


// Limit the WYSIWYG Editor.
function fb_change_mce_buttons( $initArray ) {
	//@see http://wiki.moxiecode.com/index.php/TinyMCE:Control_reference
	$initArray['theme_advanced_blockformats'] = 'p,blockquote,h1,h2,h3,h4,h5,h6';
	$initArray['theme_advanced_disable'] = 'forecolor';
 
	return $initArray;
}
add_filter('tiny_mce_before_init', 'fb_change_mce_buttons');

// Simplify options for `page` and `post` screens (for non-admins)
add_action('init', 'borkers_post_type_support');
function borkers_post_type_support() {
	if(!current_user_can('update_core')):
		// for posts
//  remove_post_type_support( 'post', 'author' );
  	remove_post_type_support( 'post', 'comments' );
 		remove_post_type_support( 'post', 'custom-fields' );
  	remove_post_type_support( 'post', 'discussion' );
//  	remove_post_type_support( 'post', 'excerpt' );
  	remove_post_type_support( 'post', 'revisions' );
  	remove_post_type_support( 'post', 'trackbacks');

		// for pages
//  remove_post_type_support( 'page', 'author' );
  	remove_post_type_support( 'page', 'comments' );
 		remove_post_type_support( 'page', 'custom-fields' );
  	remove_post_type_support( 'page', 'discussion' );
  	remove_post_type_support( 'page', 'excerpt' );
  	remove_post_type_support( 'page', 'revisions' );
  	remove_post_type_support( 'page', 'trackbacks');
	endif;
}