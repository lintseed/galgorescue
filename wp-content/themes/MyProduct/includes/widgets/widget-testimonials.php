<?php class TestimonialsWidget extends WP_Widget
{
    function TestimonialsWidget(){
		$widget_ops = array('description' => 'Displays Testimonials');
		$control_ops = array('width' => 400, 'height' => 500);
		parent::WP_Widget(false,$name='ET Testimonials',$widget_ops,$control_ops);
	}

  /* Displays the Widget in the front-end */
    function widget($args, $instance){
		extract($args);
		
		$maxNumber = empty($instance['maxNumber']) ? '' : $instance['maxNumber'];
		
		$testimonialContent[1] = empty($instance['testimonialOneContent']) ? '' : $instance['testimonialOneContent'];
		$testimonialAuthor[1] = empty($instance['testimonialOneAuthor']) ? '' : $instance['testimonialOneAuthor'];
		
		$testimonialContent[2] = empty($instance['testimonialTwoContent']) ? '' : $instance['testimonialTwoContent'];
		$testimonialAuthor[2] = empty($instance['testimonialTwoAuthor']) ? '' : $instance['testimonialTwoAuthor'];
		
		$testimonialContent[3] = empty($instance['testimonialThreeContent']) ? '' : $instance['testimonialThreeContent'];
		$testimonialAuthor[3] = empty($instance['testimonialThreeAuthor']) ? '' : $instance['testimonialThreeAuthor'];
		
		$testimonialContent[4] = empty($instance['testimonialFourContent']) ? '' : $instance['testimonialFourContent'];
		$testimonialAuthor[4] = empty($instance['testimonialFourAuthor']) ? '' : $instance['testimonialFourAuthor'];
		
		$testimonialContent[5] = empty($instance['testimonialFiveContent']) ? '' : $instance['testimonialFiveContent'];
		$testimonialAuthor[5] = empty($instance['testimonialFiveAuthor']) ? '' : $instance['testimonialFiveAuthor'];
		
		$testimonialContent[6] = empty($instance['testimonialSixContent']) ? '' : $instance['testimonialSixContent'];
		$testimonialAuthor[6] = empty($instance['testimonialSixAuthor']) ? '' : $instance['testimonialSixAuthor'];
		
		echo $before_widget;

?>	

<div id="testimonial">
	<?php $i = rand(1, $maxNumber); ?>
	<div class="testimonials">
		<?php echo($testimonialContent[$i]); ?>
		<p class="author">- <?php echo($testimonialAuthor[$i]); ?></p>
	</div> <!-- end .testimonials -->
</div> <!-- end #testimonial -->


<?php
		echo $after_widget;
	}

  /*Saves the settings. */
    function update($new_instance, $old_instance){
		$instance = $old_instance;
						
		$instance['maxNumber'] = stripslashes($new_instance['maxNumber']);
		
		$instance['testimonialOneContent'] = stripslashes($new_instance['testimonialOneContent']);
		$instance['testimonialOneAuthor'] = stripslashes($new_instance['testimonialOneAuthor']);
		
		$instance['testimonialTwoContent'] = stripslashes($new_instance['testimonialTwoContent']);
		$instance['testimonialTwoAuthor'] = stripslashes($new_instance['testimonialTwoAuthor']);
		
		$instance['testimonialThreeContent'] = stripslashes($new_instance['testimonialThreeContent']);
		$instance['testimonialThreeAuthor'] = stripslashes($new_instance['testimonialThreeAuthor']);
		
		$instance['testimonialFourContent'] = stripslashes($new_instance['testimonialFourContent']);
		$instance['testimonialFourAuthor'] = stripslashes($new_instance['testimonialFourAuthor']);
		
		$instance['testimonialFiveContent'] = stripslashes($new_instance['testimonialFiveContent']);
		$instance['testimonialFiveAuthor'] = stripslashes($new_instance['testimonialFiveAuthor']);
		
		$instance['testimonialSixContent'] = stripslashes($new_instance['testimonialSixContent']);
		$instance['testimonialSixAuthor'] = stripslashes($new_instance['testimonialSixAuthor']);
		
		return $instance;
	}

  /*Creates the form for the widget in the back-end. */
    function form($instance){
		//Defaults
		$instance = wp_parse_args( (array) $instance, array('maxNumber'=>'6','testimonialOneContent'=>'', 'testimonialOneAuthor'=>'', 'testimonialTwoContent'=>'', 'testimonialTwoAuthor'=>'','testimonialThreeContent'=>'', 'testimonialThreeAuthor'=>'', 'testimonialFourContent'=>'', 'testimonialFourAuthor'=>'','testimonialFiveContent'=>'', 'testimonialFiveAuthor'=>'', 'testimonialSixContent'=>'', 'testimonialSixAuthor'=>'') );
		
		$maxNumber = htmlspecialchars($instance['maxNumber']);
		$testimonialContent[1] = htmlspecialchars($instance['testimonialOneContent']);
		$testimonialAuthor[1] = htmlspecialchars($instance['testimonialOneAuthor']);
		$testimonialContent[2] = htmlspecialchars($instance['testimonialTwoContent']);
		$testimonialAuthor[2] = htmlspecialchars($instance['testimonialTwoAuthor']);
		$testimonialContent[3] = htmlspecialchars($instance['testimonialThreeContent']);
		$testimonialAuthor[3] = htmlspecialchars($instance['testimonialThreeAuthor']);
		$testimonialContent[4] = htmlspecialchars($instance['testimonialFourContent']);
		$testimonialAuthor[4] = htmlspecialchars($instance['testimonialFourAuthor']);
		$testimonialContent[5] = htmlspecialchars($instance['testimonialFiveContent']);
		$testimonialAuthor[5] = htmlspecialchars($instance['testimonialFiveAuthor']);
		$testimonialContent[6] = htmlspecialchars($instance['testimonialSixContent']);
		$testimonialAuthor[6] = htmlspecialchars($instance['testimonialSixAuthor']);
		
		?>
				
		<?php 
		# Number of testimonials to choose from
		echo '<p><label for="' . $this->get_field_id('maxNumber') . '">' . 'Number of testimonials to choose from:' . '</label><input class="widefat" id="' . $this->get_field_id('maxNumber') . '" name="' . $this->get_field_name('maxNumber') . '" type="text" value="' . $maxNumber . '" /></p>';
		
		# Testimonial #1 Content
		echo '<p><label for="' . $this->get_field_id('testimonialOneContent') . '">' . 'Testimonial #1 Content:' . '</label><textarea class="widefat" id="' . $this->get_field_id('testimonialOneContent') . '" name="' . $this->get_field_name('testimonialOneContent') . '">'.$testimonialContent[1].'</textarea></p>';
				
		# Testimonial #1 Author
		echo '<p><label for="' . $this->get_field_id('testimonialOneAuthor') . '">' . 'Testimonial #1 Author:' . '</label><input class="widefat" id="' . $this->get_field_id('testimonialOneAuthor') . '" name="' . $this->get_field_name('testimonialOneAuthor') . '" type="text" value="' . $testimonialAuthor[1] . '" /></p>';
		
		# Testimonial #2 Content
		echo '<p><label for="' . $this->get_field_id('testimonialTwoContent') . '">' . 'Testimonial #2 Content:' . '</label><textarea class="widefat" id="' . $this->get_field_id('testimonialTwoContent') . '" name="' . $this->get_field_name('testimonialTwoContent') . '">'.$testimonialContent[2].'</textarea></p>';
		# Testimonial #2 Author
		echo '<p><label for="' . $this->get_field_id('testimonialTwoAuthor') . '">' . 'Testimonial #2 Author:' . '</label><input class="widefat" id="' . $this->get_field_id('testimonialTwoAuthor') . '" name="' . $this->get_field_name('testimonialTwoAuthor') . '" type="text" value="' . $testimonialAuthor[2] . '" /></p>';
		
		# Testimonial #3 Content
		echo '<p><label for="' . $this->get_field_id('testimonialThreeContent') . '">' . 'Testimonial #3 Content:' . '</label><textarea class="widefat" id="' . $this->get_field_id('testimonialThreeContent') . '" name="' . $this->get_field_name('testimonialThreeContent') . '">'.$testimonialContent[3].'</textarea></p>';
		# Testimonial #3 Author
		echo '<p><label for="' . $this->get_field_id('testimonialThreeAuthor') . '">' . 'Testimonial #3 Author:' . '</label><input class="widefat" id="' . $this->get_field_id('testimonialThreeAuthor') . '" name="' . $this->get_field_name('testimonialThreeAuthor') . '" type="text" value="' . $testimonialAuthor[3] . '" /></p>';
		
		# Testimonial #4 Content
		echo '<p><label for="' . $this->get_field_id('testimonialFourContent') . '">' . 'Testimonial #4 Content:' . '</label><textarea class="widefat" id="' . $this->get_field_id('testimonialFourContent') . '" name="' . $this->get_field_name('testimonialFourContent') . '">'.$testimonialContent[4].'</textarea></p>';
		# Testimonial #4 Author
		echo '<p><label for="' . $this->get_field_id('testimonialFourAuthor') . '">' . 'Testimonial #4 Author:' . '</label><input class="widefat" id="' . $this->get_field_id('testimonialFourAuthor') . '" name="' . $this->get_field_name('testimonialFourAuthor') . '" type="text" value="' . $testimonialAuthor[4] . '" /></p>';
		
		# Testimonial #5 Content
		echo '<p><label for="' . $this->get_field_id('testimonialFiveContent') . '">' . 'Testimonial #5 Content:' . '</label><textarea class="widefat" id="' . $this->get_field_id('testimonialFiveContent') . '" name="' . $this->get_field_name('testimonialFiveContent') . '">'.$testimonialContent[5].'</textarea></p>';
		# Testimonial #5 Author
		echo '<p><label for="' . $this->get_field_id('testimonialFiveAuthor') . '">' . 'Testimonial #5 Author:' . '</label><input class="widefat" id="' . $this->get_field_id('testimonialFiveAuthor') . '" name="' . $this->get_field_name('testimonialFiveAuthor') . '" type="text" value="' . $testimonialAuthor[5] . '" /></p>';
		
		# Testimonial #6 Content
		echo '<p><label for="' . $this->get_field_id('testimonialSixContent') . '">' . 'Testimonial #6 Content:' . '</label><textarea class="widefat" id="' . $this->get_field_id('testimonialSixContent') . '" name="' . $this->get_field_name('testimonialSixContent') . '">'.$testimonialContent[6].'</textarea></p>';
		# Testimonial #6 Author
		echo '<p><label for="' . $this->get_field_id('testimonialSixAuthor') . '">' . 'Testimonial #6 Author:' . '</label><input class="widefat" id="' . $this->get_field_id('testimonialSixAuthor') . '" name="' . $this->get_field_name('testimonialSixAuthor') . '" type="text" value="' . $testimonialAuthor[6] . '" /></p>';
	}

}// end AdvWidget class

function TestimonialsWidgetInit() {
	register_widget('TestimonialsWidget');
}

add_action('widgets_init', 'TestimonialsWidgetInit');

?>