<?php if (!is_single() && get_option('nova_postinfo1') <> '') { ?>
	<div class="post-info">
		<p class="post-meta"><?php _e('Posted','Nova'); ?> <?php if (in_array('author', get_option('nova_postinfo1'))) { ?> <?php _e('by','Nova'); ?> <?php the_author_posts_link(); ?><?php }; ?><?php if (in_array('date', get_option('nova_postinfo1'))) { ?> <?php _e('on','Nova'); ?> <?php the_time(get_option('nova_date_format')) ?><?php }; ?><?php if (in_array('categories', get_option('nova_postinfo1'))) { ?> <?php _e('in','Nova'); ?> <?php the_category(', ') ?><?php }; ?><?php if (in_array('comments', get_option('nova_postinfo1'))) { ?> | <?php comments_popup_link(__('0 comments','Nova'), __('1 comment','Nova'), '% '.__('comments','Nova')); ?><?php }; ?></p>
	</div> <!-- .post-info -->
<?php } elseif (is_single() && get_option('nova_postinfo2') <> '') { ?>
	<div class="post-info">
		<p class="post-meta">
			<?php _e('Posted','Nova'); ?> <?php if (in_array('author', get_option('nova_postinfo2'))) { ?> <?php _e('by','Nova'); ?> <?php the_author_posts_link(); ?><?php }; ?><?php if (in_array('date', get_option('nova_postinfo2'))) { ?> <?php _e('on','Nova'); ?> <?php the_time(get_option('nova_date_format')) ?><?php }; ?><?php if (in_array('categories', get_option('nova_postinfo2'))) { ?> <?php _e('in','Nova'); ?> <?php the_category(', ') ?><?php }; ?><?php if (in_array('comments', get_option('nova_postinfo2'))) { ?> | <?php comments_popup_link(__('0 comments','Nova'), __('1 comment','Nova'), '% '.__('comments','Nova')); ?><?php }; ?>
		</p>
	</div> <!-- .post-info -->
<?php }; ?>