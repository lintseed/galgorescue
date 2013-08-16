<div class="entry post entry-full">
	<div class="border">
		<div class="bottom">
			<div class="entry-content clearfix nobottom">
				<h1 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
				<p class="meta-info"><?php the_time(get_option('magnificent_date_format')) ?> <span><?php _e('by','Magnificent'); ?></span> <?php the_author_posts_link(); ?></p>
				
				<?php if (get_option('magnificent_blog_thumbnails') == 'on') { ?>
		
					<?php $thumb = '';
					$width = 218;
					$height = 218;
					$classtext = '';
					$titletext = get_the_title();
					
					$thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext);
					$thumb = $thumbnail["thumb"]; ?>
					
					<?php if($thumb <> '') { ?>
						<div class="thumbnail">
							<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext, $width, $height, $classtext); ?>
							<span class="overlay"></span>
						</div> 	<!-- end .thumbnail -->	
					<?php }; ?>
						
				<?php }; ?>
				
				<?php the_content(''); ?>
                <a href="<?php the_permalink(); ?>" class="readmore"><span><?php _e('read more','Magnificent'); ?></span></a>

				<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages','Magnificent').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<?php edit_post_link(__('Edit this page','Magnificent')); ?>
				
				<div class="clear"></div>
				
				<div class="info-panel clearfix">
					<?php include(TEMPLATEPATH . '/includes/infopanel.php'); ?>
				</div> <!-- end .info-panel -->	
				
			</div> <!-- end .entry-content -->	
		</div> <!-- end .bottom -->	
	</div> <!-- end .border -->	
</div> <!-- end .entry -->
		