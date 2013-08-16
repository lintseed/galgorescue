<?php $post_number = get_option('magnificent_searchnum_posts'); ?>
<?php get_header(); ?>

<?php $blogStyle = (get_option('magnificent_blog_style') == 'false') ? false : true; ?>

<?php include(TEMPLATEPATH . '/includes/breadcrumbs.php'); ?>

	<div id="entries">
		<?php $i = 1; ?>
		<?php 
			global $query_string; 

			parse_str($query_string, $qstring_array);
						
			$args = array('showposts' => $post_number,'paged'=>$paged);
			
			if ( isset($_GET['et_searchform_submit']) ) {			
				$postTypes = array();
				if ( !isset($_GET['et-inc-posts']) && !isset($_GET['et-inc-pages']) ) $postTypes = array('post');
				if ( isset($_GET['et-inc-pages']) ) $postTypes = array('page');
				if ( isset($_GET['et-inc-posts']) ) $postTypes[] = 'post';
				$args['post_type'] = $postTypes;
				
				if ( $_GET['et-month-choice'] != 'no-choice' ) {
					$et_year = substr($_GET['et-month-choice'],0,4);
					$et_month = substr($_GET['et-month-choice'], 4, strlen($_GET['et-month-choice'])-4);
					$args['year'] = $et_year;
					$args['monthnum'] = $et_month;
				}
				
				if ( $_GET['et-cat'] != 0 )
					$args['cat'] = $_GET['et-cat'];
			}	
			
			$args = array_merge($args,$qstring_array);
						
			query_posts($args);
		?>
		
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