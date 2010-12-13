<?php
/**
 * @package WordPress
 * @subpackage Borkers
 *
 * Comments:	+	The term "single" correlates to a "view" template in MVC.
 * 						+	Having `if(have_posts())` in the single template seems redundant.  
 *							If a page wasn't found, it'd redirect to a 404, right?
 * TODO:      + Using alot of `if(!is_page())`, consider refactoring that.
 */
?>
	<?php while (have_posts()) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header class="post-header">
				<h1 class="post-title"><?php the_title(); ?></h1>
				<?php if(!is_page()): ?>
				  <p><time pubdate datetime="<?php the_time('c') ?>"><?php the_time('F jS, Y') ?></time> | 
				    <!-- by <?php the_author() ?> | -->
			      <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?> |  
			      <?php if(get_the_category()): echo "Category: "; the_category(', '); else: echo ''; endif; ?> 
			      <?php edit_post_link('Edit','',' | '); ?>  
				  </p>
				<?php endif;?>
			</header>
			
			<section class="post-content">
				<?php the_content('Read the rest of this entry &raquo;'); ?>
			</section>
			
			<?php if(!is_page()): ?>
			<footer class="post-footer">
				<?php 
				  the_tags(
		        '<p class="post-footer-tags">Tags: ',
		        ', ', 
		        '</p>'
		      ); ?></p>
			</footer>
			<?php endif; ?>
		</article>
		
    <?php if (show_posts_nav()) : ?>
    <div class='navigation'>
    	<span class='older'><?php next_posts_link('&laquo; Older Entries'); ?></span>
    	<span class='newer'><?php previous_posts_link('Newer Entries &raquo;'); ?></span>
    </div>
    <?php endif; ?>
    	  
		<?php if(!is_page()): ?>
		  <?php comments_template(); ?>
		<?php endif; ?>
	<?php endwhile; ?>