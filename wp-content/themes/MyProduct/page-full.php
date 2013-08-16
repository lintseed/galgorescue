<?php 
/*
Template Name: Full Width Page
*/
?>
<?php the_post(); ?>
	<?php get_header(); ?>
	
	<div id="content-left">
	
		<div class="entry post clearfix" style="padding-right: 10px;">
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
			<?php edit_post_link(__('Edit this page','MyProduct')); ?>
			<div class="clear"></div>
		</div> <!-- end .post -->
		
		<?php if (get_option('myproduct_show_pagescomments') == 'on') comments_template('', true); ?>
			
	</div> <!-- end #content-left -->
	
	<?php get_footer(); ?>