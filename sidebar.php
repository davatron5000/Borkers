<?php
/**
 * @package WordPress
 * @subpackage Borkers
 *
 * Comments: Haven't used a true dynamic sidebar in a wordpress project in ages. Not sure this is necessary.
 */
?><section id="sidebar">
	<?php if(!is_search()): ?>
	<article class="widget">
		<h1>Search</h1>
		<?php get_search_form();?>
	</article>
	<?php endif;?>
  <?php if(is_page()):  ?>
    <nav class="subnav widget">
      <h1>Pages</h1>
      <ul>
        <?php wp_list_pages('title_li='); ?>
      </ul>
    </nav>
  <?php endif; ?>  
    
	<?php if (!dynamic_sidebar('sidebar-widget-area')) : ?>
		<article class="widget">
			<header class="widget-header">
				<h1 class="widget-title">Archives</h1>
			</header>
			<ul>
				<?php wp_get_archives( 'type=monthly' ); ?>
			</ul>
		</article>
	<?php endif; ?>
</section>