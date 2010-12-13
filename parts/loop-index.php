<?php
/**
 * @package WordPress
 * @subpackage Borkers
 *
 * Comments: Using the term "index" in the MVC sense of the word.
 */
?>

<?php 
if(is_search()): ?>
<h1>Search Results for "<?php echo htmlspecialchars($_GET['s']);?>"</h1>
<?php endif; ?>

<?php if (have_posts()) : ?>

	<?php while (have_posts()) : the_post(); ?>

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
		  <header class="post-header">
			  <h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			  <p><time pubdate datetime="<?php the_time('c') ?>"><?php the_time('F jS, Y') ?></time> <!-- by <?php the_author() ?> --></p>
			</header>
			<div class="post-content">
			  <?php the_excerpt(); ?>
			</div>
			<footer class="post-footer">
			  <p><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?> <?php edit_post_link('Edit','',' | '); ?></p>
		  </footer>
		</div>

	<?php endwhile; ?>

	<?php next_posts_link('&laquo; Older Entries') ?><?php previous_posts_link('Newer Entries &raquo;') ?>

<?php else : 
		get_template_part('parts/notfound');
endif; ?>