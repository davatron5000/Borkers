<?php
/**
 * @package WordPress
 * @subpackage Borkers
 */
?>
  </div>
  
  <footer id="footer">
		<p>&copy;<?php echo date('Y');?> <?php bloginfo('name'); ?>. Powered by <a href="http://wordpress.org/">WordPress <?php bloginfo('version'); ?></a> <a href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a> <a href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a>. <!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. --></p>
  </footer>
  	
<?php wp_footer(); ?>

</body>
</html>