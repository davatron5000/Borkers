<?php if(is_search()): ?>
	<p>Sorry, no matches found. Please try your search again using different keywords.</p>	
	<?php get_search_form(); ?>
<?php else: ?>

<h2>Page Not Found</h2>
<p>Sorry, the requested address: <?php echo get_bloginfo('url') . $_SERVER['REQUEST_URI'] ?> could not be found or no longer exists.</p>

<p>Please try again or maybe visit our <a 
title="<?php bloginfo('title');?>" href="<?php bloginfo('url');?>">Home 
Page</a> to start fresh.</p>

<h3>Search the site</h3>
<?php get_search_form(); ?>
<?php endif;?>