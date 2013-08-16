<?php get_header(); ?>

<div id="content-left">

	<?php if ((is_front_page() || is_home()) && get_option('myproduct_featured') == 'on') include(TEMPLATEPATH . '/includes/featured.php');?>
	
	<?php if (get_option('myproduct_services') == 'on' && !is_page() && (get_option('myproduct_blog_style') == 'false')) { ?>	
		<div id="services" class="clearfix">
			
			<div class="service">
				<?php query_posts('page_id=' . get_pageId(html_entity_decode(get_option('myproduct_service_1')))); while (have_posts()) : the_post(); ?>
					<?php include(TEMPLATEPATH . '/includes/service_content.php'); ?>
				<?php endwhile; wp_reset_query(); ?>
			</div> <!-- end .service -->
			
			<div class="service even">
				<?php query_posts('page_id=' . get_pageId(html_entity_decode(get_option('myproduct_service_2')))); while (have_posts()) : the_post(); ?>
					<?php include(TEMPLATEPATH . '/includes/service_content.php'); ?>
				<?php endwhile; wp_reset_query(); ?>
			</div> <!-- end .service -->
			
			<div class="service lastrow">
				<?php query_posts('page_id=' . get_pageId(html_entity_decode(get_option('myproduct_service_3')))); while (have_posts()) : the_post(); ?>
					<?php include(TEMPLATEPATH . '/includes/service_content.php'); ?>
				<?php endwhile; wp_reset_query(); ?>
			</div> <!-- end .service -->
			
			<div class="service even lastrow">
				<?php query_posts('page_id=' . get_pageId(html_entity_decode(get_option('myproduct_service_4')))); while (have_posts()) : the_post(); ?>
					<?php include(TEMPLATEPATH . '/includes/service_content.php'); ?>
				<?php endwhile; wp_reset_query(); ?>
			</div> <!-- end .service -->	
			
		</div> <!-- end #services -->
	<?php }; ?>

<?php include(TEMPLATEPATH . '/includes/default.php'); ?>

<?php get_footer(); ?>