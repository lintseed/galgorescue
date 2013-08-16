<?php get_header(); ?>

<?php $blogStyle = (get_option('magnificent_blog_style') == 'false') ? false : true; ?>

<?php if (!$blogStyle) { ?>

	<div id="sidebar-left" class="sidebar">
		<div class="block">
			<div class="block-border">
				<div class="block-content">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Left Top') ) : ?> 
					<?php endif; ?>
				</div> <!-- end .block-content -->
			</div> <!-- end .block-border -->
		</div> <!-- end .block -->	
		
		<div class="block">
			<div class="block-border">
				<div class="block-content">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Left Bottom') ) : ?> 
					<?php endif; ?>
					
				</div> <!-- end .block-content -->
			</div> <!-- end .block-border -->
		</div> <!-- end .block -->
	</div> <!-- end #sidebar-left -->

	<div id="main-content">
	
		<?php if (get_option('magnificent_featured') == 'on') include(TEMPLATEPATH . '/includes/featured.php'); ?>
	
<?php } else { ?>
	<div id="entries">
<?php } ?>
	
	<?php $i=1; ?>
	<?php $args=array(
		'showposts' => get_option('magnificent_homepage_posts'),
		'paged' => $paged,
		'category__not_in' => get_option('magnificent_exlcats_recent')
	);
	query_posts($args); ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
		<?php if (!$blogStyle) include(TEMPLATEPATH . '/includes/entry.php');
		else include(TEMPLATEPATH . '/includes/entry-blogstyle.php'); ?>
	<?php endwhile; ?>
		
		<?php include(TEMPLATEPATH . '/includes/navigation.php'); ?>		
	<?php else : ?>
		<?php include(TEMPLATEPATH . '/includes/no-results.php'); ?>
	<?php endif; wp_reset_query(); ?>
	
</div> <!-- end <?php if (!$blogStyle) echo '#main-content'; else '#entries'; ?> -->	
	
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