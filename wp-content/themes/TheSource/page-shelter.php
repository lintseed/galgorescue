<?php
/*
Template Name: Shelter Page
*/
?>
<?php the_post(); ?>
<?php get_header(); ?>
	<?php if (get_option('thesource_integration_single_top') <> '' && get_option('thesource_integrate_singletop_enable') == 'on') echo(get_option('thesource_integration_single_top')); ?>	
	
	<div id="main-content-wrap" class="shelterPage">
		<div id="main-content" class="clearfix">
			<?php include(TEMPLATEPATH . '/includes/breadcrumb.php'); ?>
			<div id="top-shadow"<?php if(is_front_page()) echo(' class="nobg"'); ?>></div>
				
			<div id="recent-posts" class="clearfix">
				<div class="entry post clearfix">
					<h1 class="title"><?php the_title(); ?></h1>
					<div class="entry-content">				
						<?php $thumb = '';
							  $width = get_option('thesource_thumbnail_width_pages');
							  $height = get_option('thesource_thumbnail_height_pages');
							  $classtext = 'thumb alignleft';
							  $titletext = get_the_title();
							
							  $thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext);
							  $thumb = $thumbnail["thumb"]; ?>
							  
						<?php if($thumb <> '' && get_option('thesource_page_thumbnails') == 'on') { ?>						
							<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext , $width, $height, $classtext); ?>
							<p class="date"><span><?php the_time(get_option('thesource_date_format')) ?></span></p>	
						<?php }; ?>

						<?php the_content(); ?>
						
						<?php $args = array(
							'orderby'          => 'name',
							'order'            => 'ASC',
							'limit'            => -1,
							'category_name'    => the_title('','',false),
							'show_description' => 1,
							'between'		   => '<br />',
							'hide_invisible'   => 1,
							'show_updated'     => 0,
							'echo'             => 1,
							'categorize'       => 1,
							'title_li'         => 0,
							'title_before'     => '<h3>',
							'title_after'      => '</h3>',
							'link_before'	   => '<span>',
							'link_after'	   => '</span>',
							'category_orderby' => 'name',
							'category_order'   => 'ASC',
							'class'            => 'linkcat',
							'category_before'  => '<div id="shelterList" class="section">',
							'category_after'   => '</div>' ); ?>
							
						<?php wp_list_bookmarks($args); ?>
						
						

						<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages','TheSource').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
						<?php edit_post_link(__('Edit this page','TheSource')); ?>

					</div> <!-- end .entry-content -->
					<?php
						if( method_exists( $GoogleTranslation, 'google_ajax_translate_button' ) ) {
							$GoogleTranslation -> google_ajax_translate_button();
						}
						?>
				</div> <!-- end .entry -->
				
				<?php if (get_option('thesource_show_pagescomments') == 'on') comments_template('', true); ?>
				
			</div> <!-- end #recent-posts -->
			
	<?php get_sidebar(); ?>
<?php get_footer(); ?>