<?php
/**
 * @package WordPress
 * @subpackage Borkers
 */
?>
<!doctype html>  
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title><?php wp_title('&laquo;', true, 'right'); ?><?php bloginfo('name'); ?></title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico">
  <link rel="apple-touch-icon" href="<?php bloginfo('template_directory'); ?>/apple-touch-icon.png">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

<?php wp_enqueue_script('modernizr'); ?>
<?php wp_enqueue_script('jquery'); ?>
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
  <?php wp_head(); ?>
 
</head>

<body <?php body_class(); ?>>

  <header id="header">
		<div id="logo"><a href="<?php bloginfo('url');?>"><?php echo bloginfo('blogtitle');?></a></div>
		<nav id="site-nav">
			<ul>
        <?php 
          $pages = get_pages('parent=0'); 
          foreach ($pages as $pagg) { 
        ?>
         	<li>
       	    <a id="site-nav-<?php echo $pagg->post_name ?>" href="<?php echo get_permalink($pagg->ID); ?>"><?php echo $pagg->post_title;?></a>
       	  </li>
        <?php } 
        ?>
        </ul>
		</nav>
  </header>
  
  <div id="content">