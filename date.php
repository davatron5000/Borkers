<?php
/**
 * @package WordPress
 * @subpackage Starkers
 */

get_header();
?>

<div id="main">
	<?php if (have_posts()) : ?>

	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	<?php if (is_day()) { ?>
	<h1>Archive for <?php the_time('F jS, Y'); ?></h1>
	<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
	<h1>Archive for <?php the_time('F, Y'); ?></h1>
	<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
	<h1>Archive for <?php the_time('Y'); ?></h1>
 ?>
	<h2>Blog Archives</h2>
	<?php } ?>

    <ul class="archivelist">
			<?php while(have_posts()): the_post(); ?>
			<li><?php the_time('M dS, Y (D)');?> <a href="<?php the_permalink();?>"><?php the_title();?></a></li>
			<?php endwhile; ?>
    </ul>

	<?php else :

		if ( is_category() ) { // If this is a category archive
			printf("<h2>Sorry, but there aren't any posts in the %s category yet.</h2>", single_cat_title('',false));
		} else if ( is_date() ) { // If this is a date archive
			echo("<h2>Sorry, but there aren't any posts with this date.</h2>");
		} else if ( is_author() ) { // If this is a category archive
			$userdata = get_userdatabylogin(get_query_var('author_name'));
			printf("<h2>Sorry, but there aren't any posts by %s yet.</h2>", $userdata->display_name);
		} else {
			echo("<h2>No posts found.</h2>");
		}
		get_search_form();

	endif;
?>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>