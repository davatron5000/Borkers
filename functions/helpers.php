<?php
/**
 * @package WordPress
 * @subpackage Borkers
 *
 * Comments:	A collection of helper functions for debugging, etc.
 */
 
// pr() will print_r wrapped in a <pre> tag. Taken from CakePHP.
function pr( $content = null ) {
	echo "<pre>";
	print_r($content);
	echo "</pre>";
}