<?php the_post(); ?>
<?php get_header(); ?>

<div id="main-content">
	<div class="container clearfix">		
		<div id="entries-area">
			<div id="entries-area-inner">
				<div id="entries-area-content" class="clearfix">
					<div id="content-area">
						<?php include(TEMPLATEPATH . '/includes/breadcrumbs.php'); ?>
						
						<div class="entry post clearfix">
							<?php if (get_option('nova_integration_single_top') <> '' && get_option('nova_integrate_singletop_enable') == 'on') echo(get_option('nova_integration_single_top')); ?>
							
							<h1 class="title"><?php the_title(); ?></h1>
							<?php include(TEMPLATEPATH . '/includes/postinfo.php'); ?>
							
							<?php if (get_option('nova_thumbnails') == 'on') { ?>
								<?php 
									$thumb = '';
									$width = 160;
									$height = 160;
									$classtext = '';
									$titletext = get_the_title();
									
									$thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext,false,'Portfolio');
									$thumb = $thumbnail["thumb"];
								?>
								
								<?php if($thumb <> '') { ?>
									<div class="thumbnail">
										<a href="<?php the_permalink(); ?>">
											<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext, $width, $height, $classtext); ?>
											<span class="overlay2"></span>
										</a>
									</div> <!-- .thumbnail -->
								<?php } ?>
							<?php } ?>
							
							<?php the_content(); ?>
							<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages','Nova').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
							<?php edit_post_link(__('Edit this page','Nova')); ?>
						
						</div> <!-- end .entry -->
						
						<?php if (get_option('nova_integration_single_bottom') <> '' && get_option('nova_integrate_singlebottom_enable') == 'on') echo(get_option('nova_integration_single_bottom')); ?>		
						
						<?php if (get_option('nova_468_enable') == 'on') { ?>
								  <?php if(get_option('nova_468_adsense') <> '') echo(get_option('nova_468_adsense'));
								else { ?>
								   <a href="<?php echo(get_option('nova_468_url')); ?>"><img src="<?php echo(get_option('nova_468_image')); ?>" alt="468 ad" class="foursixeight" /></a>
						   <?php } ?>   
						<?php } ?>
						
						<?php if (get_option('nova_show_postcomments') == 'on') comments_template('', true); ?>
						
					</div> <!-- end #content-area -->
					
					<?php get_sidebar(); ?>
				</div> <!-- end #entries-area-content -->
			</div> <!-- end #entries-area-inner -->
		</div> <!-- end #entries-area -->
	</div> <!-- end .container -->
</div> <!-- end #main-content -->
		
<?php get_footer(); ?>