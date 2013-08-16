<?php 
/*
Template Name: Login Page
*/
?>
<?php the_post(); ?>

<?php 
	$et_ptemplate_settings = array();
	$et_ptemplate_settings = maybe_unserialize( get_post_meta($post->ID,'et_ptemplate_settings',true) );
	
	$fullwidth = isset( $et_ptemplate_settings['et_fullwidthpage'] ) ? (bool) $et_ptemplate_settings['et_fullwidthpage'] : (bool) $et_ptemplate_settings['et_fullwidthpage'];
?>

<?php get_header(); ?>

<?php include(TEMPLATEPATH . '/includes/breadcrumbs.php'); ?>

<?php if (get_option('magnificent_integration_single_top') <> '' && get_option('magnificent_integrate_singletop_enable') == 'on') echo(get_option('magnificent_integration_single_top')); ?>

	<div id="entries"<?php if ($fullwidth) echo ' class="fullwidth"'; ?>>
		<div class="entry post entry-full">
			<div class="border">
				<div class="bottom">
					<div class="entry-content clearfix">
						<h1 class="title"><?php the_title(); ?></h1>
						
						
						<?php if (get_option('magnificent_page_thumbnails') == 'on') { ?>
				
							<?php $thumb = '';
							$width = 218;
							$height = 218;
							$classtext = '';
							$titletext = get_the_title();
							
							$thumbnail = get_thumbnail($width,$height,$classtext,$titletext,$titletext);
							$thumb = $thumbnail["thumb"]; ?>
							
							<?php if($thumb <> '') { ?>
								<div class="thumbnail">
									<?php print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext, $width, $height, $classtext); ?>
									<span class="overlay"></span>
								</div> 	<!-- end .thumbnail -->	
							<?php }; ?>
								
						<?php }; ?>
						
						<?php the_content(); ?>
						<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages','Magnificent').':</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
						
						<div id="et-login">
							<div class='et-protected'>
								<div class='et-protected-form'>
									<form action='<?php echo get_option('home'); ?>/wp-login.php' method='post'>
										<p><label><?php _e('Username','Magnificent'); ?>: <input type='text' name='log' id='log' value='<?php echo wp_specialchars(stripslashes($user_login), 1) ?>' size='20' /></label></p>
										<p><label><?php _e('Password','Magnificent'); ?>: <input type='password' name='pwd' id='pwd' size='20' /></label></p>
										<input type='submit' name='submit' value='Login' class='etlogin-button' />
									</form> 
								</div> <!-- .et-protected-form -->
								<p class='et-registration'><?php _e('Not a member?','Magnificent'); ?> <a href='<?php echo site_url('wp-login.php?action=register', 'login_post'); ?>'><?php _e('Register today!','Magnificent'); ?></a></p>
							</div> <!-- .et-protected -->
						</div> <!-- end #et-login -->
						
						<div class="clear"></div>
						
						<?php edit_post_link(__('Edit this page','Magnificent')); ?>
						
					</div> <!-- end .entry-content -->	
				</div> <!-- end .bottom -->	
			</div> <!-- end .border -->	
		</div> <!-- end .entry -->
		
		<div class="clear"></div>
		
		<?php if (get_option('magnificent_integration_single_bottom') <> '' && get_option('magnificent_integrate_singlebottom_enable') == 'on') echo(get_option('magnificent_integration_single_bottom')); ?>
		
	</div> <!-- end #entries -->
	
	<?php if (!$fullwidth) { ?>	
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
	<?php }  ?>	
			
<?php get_footer(); ?>