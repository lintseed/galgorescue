<?php 
/*
Template Name: Search Page
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
							
							<div id="et-search">
								<div id="et-search-inner" class="clearfix">
									<p id="et-search-title"><span><?php _e('search this website','Nova'); ?></span></p>
									<form action="<?php bloginfo('url'); ?>" method="get" id="et_search_form">
										<div id="et-search-left">
											<p id="et-search-word"><input type="text" id="et-searchinput" name="s" value="search this site..." /></p>
																			
											<p id="et_choose_posts"><label><input type="checkbox" id="et-inc-posts" name="et-inc-posts"> <?php _e('Posts','Nova'); ?></label></p>
											<p id="et_choose_pages"><label><input type="checkbox" id="et-inc-pages" name="et-inc-pages"> <?php _e('Pages','Nova'); ?></label></p>
											<p id="et_choose_date">
												<select id="et-month-choice" name="et-month-choice">
													<option value="no-choice"><?php _e('Select a month','Nova'); ?></option>
													<?php 
														global $wpdb, $wp_locale;
														
														$selected = '';
														$query = "SELECT YEAR(post_date) AS `year`, MONTH(post_date) AS `month`, count(ID) as posts FROM $wpdb->posts GROUP BY YEAR(post_date), MONTH(post_date) ORDER BY post_date DESC";
														
														$arcresults = $wpdb->get_results($query);
																															
														foreach ( (array) $arcresults as $arcresult ) {
															if ( isset($_POST['et-month-choice']) && ( $_POST['et-month-choice'] == ($arcresult->year . $arcresult->month) ) ) {
																$selected = ' selected="selected"';
															}
															echo "<option value='{$arcresult->year}{$arcresult->month}'{$selected}>{$wp_locale->get_month($arcresult->month)}" . ", {$arcresult->year}</option>";
															if ( $selected <> '' ) $selected = '';
														}
													?>
												</select>
											</p>
										
											<p id="et_choose_cat"><?php wp_dropdown_categories('show_option_all=Choose a Category&show_count=1&hierarchical=1&id=et-cat&name=et-cat'); ?></p>
										</div> <!-- #et-search-left -->
										
										<div id="et-search-right">
											<input type="hidden" name="et_searchform_submit" value="et_search_proccess" />
											<input class="et_search_submit" type="submit" value="<?php _e('Submit','Nova'); ?>" id="et_search_submit" />
										</div> <!-- #et-search-right -->
									</form>
								</div> <!-- end #et-search-inner -->
							</div> <!-- end #et-search -->
							
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