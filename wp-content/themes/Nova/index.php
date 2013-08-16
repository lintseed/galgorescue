<?php if (is_archive()) $post_number = get_option('nova_archivenum_posts');
if (is_search()) $post_number = get_option('nova_searchnum_posts');
if (is_tag()) $post_number = get_option('nova_tagnum_posts');
if (is_category()) $post_number = get_option('nova_catnum_posts'); ?>
<?php get_header(); ?>

<div id="main-content">
	<div class="container clearfix">		
		<div id="entries-area">
			<div id="entries-area-inner">
				<div id="entries-area-content" class="clearfix">
					<div id="content-area">
						<?php include(TEMPLATEPATH . '/includes/breadcrumbs.php'); ?>
					
						<?php global $query_string; 
						if (is_category()) query_posts($query_string . "&showposts=$post_number&paged=$paged&cat=$cat");
						else query_posts($query_string . "&showposts=$post_number&paged=$paged"); ?>
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php include(TEMPLATEPATH . '/includes/entry.php'); ?>
						<?php endwhile; ?>
							<div class="clear"></div>			
							<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); }
							else { ?>
								 <?php include(TEMPLATEPATH . '/includes/navigation.php'); ?>
							<?php } ?>
						<?php else : ?>
							<?php include(TEMPLATEPATH . '/includes/no-results.php'); ?>
						<?php endif; wp_reset_query(); ?>
					</div> <!-- end #content-area -->
					
					<?php get_sidebar(); ?>
				</div> <!-- end #entries-area-content -->
			</div> <!-- end #entries-area-inner -->
		</div> <!-- end #entries-area -->
	</div> <!-- end .container -->
</div> <!-- end #main-content -->
		
<?php get_footer(); ?>