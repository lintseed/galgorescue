<?php 
/*
Template Name: Sitemap Page
*/
?>
<?php the_post(); ?>

<?php 
$et_ptemplate_settings = array();
$et_ptemplate_settings = maybe_unserialize( get_post_meta($post->ID,'et_ptemplate_settings',true) );

$fullwidth = isset( $et_ptemplate_settings['et_fullwidthpage'] ) ? (bool) $et_ptemplate_settings['et_fullwidthpage'] : (bool) $et_ptemplate_settings['et_fullwidthpage'];
?>

<?php get_header(); ?>

<div id="main-content"<?php if ($fullwidth) echo ' class="fullwidth"'; ?>>
	<div class="container clearfix">		
		<div id="entries-area">
			<div id="entries-area-inner">
				<div id="entries-area-content" class="clearfix">
					<div id="content-area">
						<?php include(TEMPLATEPATH . '/includes/breadcrumbs.php'); ?>
						
						<div class="entry post clearfix">							
							<h1 class="title" style="margin-bottom: 20px;"><?php the_title(); ?></h1>
							
							<?php if (get_option('nova_page_thumbnails') == 'on') { ?>
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
							
							<div id="sitemap">
								<div class="sitemap-col">
									<h2><?php _e('Pages','Nova'); ?></h2>
									<ul id="sitemap-pages"><?php wp_list_pages('title_li='); ?></ul>
								</div> <!-- end .sitemap-col -->
								
								<div class="sitemap-col">
									<h2><?php _e('Categories','Nova'); ?></h2>
									<ul id="sitemap-categories"><?php wp_list_categories('title_li='); ?></ul>
								</div> <!-- end .sitemap-col -->
								
								<div class="sitemap-col">
									<h2><?php _e('Tags','Nova'); ?></h2>
									<ul id="sitemap-tags">
										<?php $tags = get_tags();
										if ($tags) {
											foreach ($tags as $tag) {
												echo '<li><a href="' . get_tag_link( $tag->term_id ) . '">' . $tag->name . '</a></li> ';
											}
										} ?>
									</ul>
								</div> <!-- end .sitemap-col -->
																
								<div class="sitemap-col<?php echo ' last'; ?>">
									<h2><?php _e('Authors','Nova'); ?></h2>
									<ul id="sitemap-authors" ><?php wp_list_authors('show_fullname=1&optioncount=1&exclude_admin=0'); ?></ul>
								</div> <!-- end .sitemap-col -->
							</div> <!-- end #sitemap -->
							
							<div class="clear"></div>
							
							<?php edit_post_link(__('Edit this page','Nova')); ?>
						
						</div> <!-- end .entry -->
												
					</div> <!-- end #content-area -->
					
					<?php if (!$fullwidth) get_sidebar(); ?>
				</div> <!-- end #entries-area-content -->
			</div> <!-- end #entries-area-inner -->
		</div> <!-- end #entries-area -->
	</div> <!-- end .container -->
</div> <!-- end #main-content -->
		
<?php get_footer(); ?>