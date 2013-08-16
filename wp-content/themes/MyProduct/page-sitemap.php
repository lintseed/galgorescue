<?php 
/*
Template Name: Sitemap Page
*/
?>
<?php if (is_front_page()) { ?>
	<?php include(TEMPLATEPATH . '/home.php'); ?>
<?php } else { ?>
	<?php the_post(); ?>
	
	<?php 
	$et_ptemplate_settings = array();
	$et_ptemplate_settings = maybe_unserialize( get_post_meta($post->ID,'et_ptemplate_settings',true) );

	$fullwidth = isset( $et_ptemplate_settings['et_fullwidthpage'] ) ? (bool) $et_ptemplate_settings['et_fullwidthpage'] : (bool) $et_ptemplate_settings['et_fullwidthpage'];
	?>
	
	<?php get_header(); ?>
	
	<div id="content-left">
	
		<div class="entry post clearfix"<?php if ($fullwidth) echo ' style="padding-right: 10px;"'; ?>>
			<?php $width = 140;
				  $height = 140;
				  $classtext = 'thumbnail alignleft';
				  $titletext = get_the_title();
				
				  $thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext);
				  $thumb = $thumbnail["thumb"]; ?>
			
			<?php if($thumb <> '' && get_option('myproduct_page_thumbnails') == 'on') { ?>
				<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext , $width, $height, $classtext); ?>
			<?php }; ?>
			<?php the_content(); ?>
			<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			
			<div id="sitemap">
				<div class="sitemap-col">
					<h2><?php _e('Pages','MyProduct'); ?></h2>
					<ul id="sitemap-pages"><?php wp_list_pages('title_li='); ?></ul>
				</div> <!-- end .sitemap-col -->
				
				<div class="sitemap-col">
					<h2><?php _e('Categories','MyProduct'); ?></h2>
					<ul id="sitemap-categories"><?php wp_list_categories('title_li='); ?></ul>
				</div> <!-- end .sitemap-col -->
				
				<div class="sitemap-col">
					<h2><?php _e('Tags','MyProduct'); ?></h2>
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
					<h2><?php _e('Authors','MyProduct'); ?></h2>
					<ul id="sitemap-authors" ><?php wp_list_authors('show_fullname=1&optioncount=1&exclude_admin=0'); ?></ul>
				</div> <!-- end .sitemap-col -->
			</div> <!-- end #sitemap -->
			
			<div class="clear"></div>
			
			<?php edit_post_link(__('Edit this page','MyProduct')); ?>
			<div class="clear"></div>
		</div> <!-- end .post -->
		
	</div> <!-- end #content-left -->
	
	<?php if (!$fullwidth) get_sidebar(); ?>
	<?php get_footer(); ?>
<?php } ?>