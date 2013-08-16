<?php 
/*
Template Name: Login Page
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
			
			<div id="et-login">
				<div class='et-protected'>
					<div class='et-protected-form'>
						<form action='<?php echo get_option('home'); ?>/wp-login.php' method='post'>
							<p><label><?php _e('Username','MyProduct'); ?>: <input type='text' name='log' id='log' value='<?php echo wp_specialchars(stripslashes($user_login), 1) ?>' size='20' /></label></p>
							<p><label><?php _e('Password','MyProduct'); ?>: <input type='password' name='pwd' id='pwd' size='20' /></label></p>
							<input type='submit' name='submit' value='Login' class='etlogin-button' />
						</form> 
					</div> <!-- .et-protected-form -->
					<p class='et-registration'><?php _e('Not a member?','MyProduct'); ?> <a href='<?php echo site_url('wp-login.php?action=register', 'login_post'); ?>'><?php _e('Register today!','MyProduct'); ?></a></p>
				</div> <!-- .et-protected -->
			</div> <!-- end #et-login -->
			
			<div class="clear"></div>
			
			<?php edit_post_link(__('Edit this page','MyProduct')); ?>
			<div class="clear"></div>
		</div> <!-- end .post -->
		
	</div> <!-- end #content-left -->
	
	<?php if (!$fullwidth) get_sidebar(); ?>
	<?php get_footer(); ?>
<?php } ?>