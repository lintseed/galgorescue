<?php if (is_archive()) $post_number = get_option('magnificent_archivenum_posts');
if (is_search()) $post_number = get_option('magnificent_searchnum_posts');
if (is_tag()) $post_number = get_option('magnificent_tagnum_posts');
if (is_category()) $post_number = get_option('magnificent_catnum_posts'); ?>
<?php get_header(); ?>

<?php $blogStyle = (get_option('magnificent_blog_style') == 'false') ? false : true; ?>

<?php include(TEMPLATEPATH . '/includes/breadcrumbs.php'); ?>

	<div id="entries">
		<?php global $query_string;
		$i = 1;
		if (is_category()) query_posts($query_string . "&showposts=$post_number&paged=$paged&cat=$cat");
		else query_posts($query_string . "&showposts=$post_number&paged=$paged"); ?>
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>					
			<?php if (!$blogStyle) include(TEMPLATEPATH . '/includes/entry.php');
			else include(TEMPLATEPATH . '/includes/entry-blogstyle.php'); ?>
		<?php endwhile; ?>	
			<?php include(TEMPLATEPATH . '/includes/navigation.php'); ?>
		<?php else : ?>
			<?php include(TEMPLATEPATH . '/includes/no-results.php'); ?>
				
		<?php endif; wp_reset_query(); ?>
	</div> <!-- end #entries -->
	
	<div id="sidebar-right" class="sidebar">
		<div class="block">
			<div class="block-border">
				<div class="block-content">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Right Top') ) : ?> 
					<?php endif; ?>
				</div> <!-- end .block-content -->
			</div> <!-- end .block-border -->
		</div> <!-- end .block -->	
		
		<div class="block">
			<div class="block-border">
				<div class="block-content">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Right Bottom') ) : ?> 
					<?php endif; ?>
				</div> <!-- end .block-content -->
			</div> <!-- end .block-border -->
		</div> <!-- end .block -->
	</div> <!-- end #sidebar-right -->
			
<?php get_footer(); ?>			