<?php
function add_modernizr() {
	wp_register_script('modernizr', get_bloginfo('template_directory').'/js/libs/modernizr-1.6.min.js', null, '1.6');
}
add_filter('init','add_modernizr');

function jquery_from_google_ajax_libs() {
	if(!is_admin()):
  	wp_deregister_script( 'jquery' );
  	wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js', null, '1.4.4');
  endif;
}
add_filter('init','jquery_from_google_ajax_libs');

function add_jquery_backup_and_no_conflict() { ?>
<script>!window.jQuery && document.write(unescape('%3Cscript src="<?php bloginfo('template_directory'); ?>/js/libs/jquery-1.4.4.js"%3E%3C/script%3E'))</script>
<script>jQuery.noConflict();</script>
<?php }
add_filter('wp_head', 'add_jquery_backup_and_no_conflict', 9);


function add_ddbelatedpng() { 
?>
  <!--[if lt IE 7 ]>
    <script src="<?php bloginfo('template_directory');?>/js/libs/dd_belatedpng.js"></script>
    <script> DD_belatedPNG.fix('*'); </script>
  <![endif]-->
<?php

}
add_filter('wp_footer','add_ddbelatedpng');