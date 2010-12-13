<?php 
// Custom HTML5 comment styling refrerenced by `wp_list_comments('type=comment&callback=borkers_comment');` in comments.php
function borkers_comment($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment; 
  ?>
  <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
    <article id="comment-<?php comment_ID(); ?>">
      <header class="comment-header">
        <div class="comment-author vcard">
           <?php echo get_avatar($comment,$size='48',$default='<path_to_url>' ); ?>
           <?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
        </div>
        <div class="comment-meta commentmetadata"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?><?php edit_comment_link(__('(Edit)'),'  ','') ?></div>
      </header>
      
      <div class="comment-body">
      <?php if ($comment->comment_approved == '0') : ?>
         <p class="warning"><em><?php _e('Your comment is awaiting moderation.') ?></em></p>
      <?php endif; ?>
        <?php comment_text() ?>
      </div>
      
      <footer class="comment-actions">
        <a class="permalink" href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">Permalink</a> | 
        <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </footer>
    </article>
<?php
}