<?php if (is_page() || is_category()) { ?>
	<?php $tagline = get_post_meta($post->ID, 'Tagline', $single = true);
		  if (is_category()) $tagline = category_description();
		  if ($tagline <> '') {	?>
				<p class="tagline">
					<?php echo($tagline); ?>
				</p>
		  <?php }; ?>	
<?php } elseif (is_single() && get_option('myproduct_postinfo2') <> '') { ?>
	<p class="tagline">
		<span><?php _e('Posted','MyProduct'); ?> <?php if (in_array('author', get_option('myproduct_postinfo2'))) { ?> <?php _e('by','MyProduct'); ?> <?php the_author_posts_link(); ?><?php }; ?><?php if (in_array('date', get_option('myproduct_postinfo2'))) { ?> <?php _e('on','MyProduct'); ?> <?php the_time(get_option('myproduct_date_format')) ?><?php }; ?><?php if (in_array('categories', get_option('myproduct_postinfo2'))) { ?> <?php _e('in','MyProduct'); ?> <?php the_category(', ') ?><?php }; ?><?php if (in_array('comments', get_option('myproduct_postinfo2'))) { ?> | <?php comments_popup_link(__('0 comments','MyProduct'), __('1 comment','MyProduct'), '% '.__('comments','MyProduct')); ?><?php }; ?></span>
	</p>
<?php }; ?>