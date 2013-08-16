<div id="breadcrumbs">
	<div id="breadcrumbs-left"></div>
	<div id="breadcrumbs-content">
			
		<?php if(function_exists('bcn_display')) { bcn_display(); } 
			  else { ?>
					<a href="<?php bloginfo('url'); ?>"><?php _e('Home','Nova') ?></a> <span class="raquo">&raquo;</span>
					
					<?php if( is_tag() ) { ?>
						<?php _e('Posts Tagged ','Nova') ?><span class="raquo">&quot;</span><?php single_tag_title(); echo('&quot;'); ?>
					<?php } elseif (is_day()) { ?>
						<?php _e('Posts made in','Nova') ?> <?php the_time('F jS, Y'); ?>
					<?php } elseif (is_month()) { ?>
						<?php _e('Posts made in','Nova') ?> <?php the_time('F, Y'); ?>
					<?php } elseif (is_year()) { ?>
						<?php _e('Posts made in','Nova') ?> <?php the_time('Y'); ?>
					<?php } elseif (is_search()) { ?>
						<?php _e('Search results for','Nova') ?> <?php the_search_query() ?>
					<?php } elseif (is_single()) { ?>
						<?php $category = get_the_category();
							  $catlink = get_category_link( $category[0]->cat_ID );
							  echo ('<a href="'.$catlink.'">'.$category[0]->cat_name.'</a> '.'<span class="raquo">&raquo;</span> '.get_the_title()); ?>
					<?php } elseif (is_category()) { ?>
						<?php single_cat_title(); ?>
					<?php } elseif (is_author()) { ?>
						<?php _e('Posts by ','Nova'); echo ' ',$curauth->nickname; ?>
					<?php } elseif (is_page()) { ?>
						<?php wp_title(''); ?>
					<?php }; ?>
		<?php }; ?>

	</div> <!-- end #breadcrumbs-content -->
	<div id="breadcrumbs-right"></div>
</div> <!-- end #breadcrumbs -->

<div class="clear"></div>