<?php function mytheme_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	   <div id="comment-<?php comment_ID(); ?>" class="comment-body clearfix">
			<div class="alignleft authordata">
				<div class="avatar">
					<?php echo get_avatar($comment,$size='57'); ?>
					<span class="avatar-overlay"></span>
				</div> <!-- end .avatar-->

				<div class="comment-meta commentmetadata"><?php comment_date( get_option( 'nova_comment_date_format' ) ); ?></div>
			</div>
			
			<div class="comment-wrap">
				<div class="comment-wrap-inner clearfix">
					<div class="comment-arrow"></div>
					<?php printf( '<span class="fn">%s says:</span>', get_comment_author_link() ); ?>
					
					<?php if ($comment->comment_approved == '0') : ?>
						<em class="moderation"><?php _e('Your comment is awaiting moderation.','Nova') ?></em>
						<br />
					<?php endif; ?>
					
					<div class="comment-content"><?php comment_text() ?></div> <!-- end comment-content-->
					<div class="reply-container"><?php comment_reply_link(array_merge( $args, array('reply_text' => __('reply','Nova'),'depth' => $depth, 'max_depth' => $args['max_depth']))) ?></div>
				</div> <!-- end comment-wrap-inner -->  
			</div> <!-- end comment-wrap-->
		</div> <!-- end comment-body-->	
<?php } ?>
<?php function list_pings($comment, $args, $depth) {
       $GLOBALS['comment'] = $comment;
?>
	<li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?> - <?php comment_excerpt(); ?> 
<?php } ?>
<?php //modify the comment counts to only reflect the number of comments minus pings
if( phpversion() >= '4.4' ) add_filter('get_comments_number', 'comment_count', 0);

function comment_count( $count ) {
		if ( ! is_admin() ) {
			global $id;
			$get_comments = get_comments('post_id=' . $id);
			$comments_by_type = &separate_comments($get_comments);
			return count($comments_by_type['comment']);	
		} else {
            return $count;
        }
}
?>