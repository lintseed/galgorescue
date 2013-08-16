<?php global $shortname; ?>
	
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.cycle.all.min.js"></script> 
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.easing.1.3.js"></script>	
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/superfish.js"></script>
	
	
	<script type="text/javascript">
	//<![CDATA[
		jQuery.noConflict();
				
		jQuery('ul.nav').superfish({ 
			delay:       200,                            // one second delay on mouseout 
			animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation 
			speed:       'fast',                          // faster animation speed 
			autoArrows:  true,                           // disable generation of arrow mark-up 
			dropShadows: false                            // disable drop shadows 
		});
		
		jQuery('ul.nav > li > a.sf-with-ul').parent('li').addClass('sf-ul');
				
		et_search_bar();
		
		var $featured_content = jQuery('#slides');
		
		if ($featured_content.length) {
			$featured_content.cycle({
				<?php if(get_option($shortname.'_slider_auto') == 'on') { ?>
					timeout: <?php echo(get_option($shortname.'_slider_autospeed')); ?>
				<?php } else { ?>
					timeout: 0
				<?php }; ?>,
				<?php if(get_option($shortname.'_pause_hover') == 'on') { ?>
					pause: true,
				<?php } ?>
				speed: 500,
				cleartypeNoBg: true,
				prev:   '#featured a#left-arrow', 
				next:   '#featured a#right-arrow'
			});
		}
		
		<!---- Search Bar Improvements ---->
		function et_search_bar(){
			var $searchform = jQuery('div#search-form'),
				$searchinput = $searchform.find("input#searchinput"),
				searchvalue = $searchinput.val();
				
			$searchinput.focus(function(){
				if (jQuery(this).val() === searchvalue) jQuery(this).val("");
			}).blur(function(){
				if (jQuery(this).val() === "") jQuery(this).val(searchvalue);
			});
		};
		
		/* footer widgets improvements */
		
		var $footer_widget = jQuery("#footer .footer-widget");
		
		if (!($footer_widget.length == 0)) {
			$footer_widget.each(function (index, domEle) {
				// domEle == this
				if ((index+1)%4 == 0) jQuery(domEle).addClass("last").after("<div class='clear'></div>");
			});
		};
		
		var $threaded_comments = jQuery('.depth-1 > ul.children');
		
		if ($threaded_comments.length) {			
			$threaded_comments.each(function(index, domEle) {
				var $right_place = jQuery(domEle).parent('.depth-1').find('.entry-content');
				jQuery(domEle).appendTo($right_place);
			});
		}
		
		<?php if (get_option($shortname.'_disable_toptier') == 'on') echo('jQuery("ul.nav > li > ul").prev("a").attr("href","#");'); ?>
	
	//]]>	
	</script>