<?php	
	$ids = array();
	$arr = array();
	$i=1;
	
	$width = 140;
	$height = 140;
			
	$featured_cat = get_option('myproduct_feat_cat');
	$featured_num = get_option('myproduct_featured_num');
	
	if (get_option('myproduct_use_pages') == 'false') query_posts("showposts=$featured_num&cat=".get_catId($featured_cat));
	else { 
		global $pages_number;
		
		if (get_option('myproduct_feat_pages') <> '') $featured_num = count(get_option('myproduct_feat_pages'));
		else $featured_num = $pages_number;
		
		query_posts(array
						('post_type' => 'page',
						'orderby' => 'menu_order',
						'order' => 'ASC',
						'post__in' => get_option('myproduct_feat_pages'),
						'showposts' => $featured_num
					));
	};
	
	while (have_posts()) : the_post();
			
		$arr[$i]["title"] = truncate_title(350,false);
		$arr[$i]["fulltitle"] = truncate_title(350,false);
		
		$arr[$i]["excerpt"] = truncate_post(455,false);
		
		$arr[$i]["tabtitle"] = get_post_meta($post->ID, 'Tab', $single = true);
		$arr[$i]["permalink"] = get_permalink();
		
		$arr[$i]["thumbnail"] = get_thumbnail($width,$height,'thumbnail alignleft',$arr[$i]["fulltitle"],$arr[$i]["tabtitle"]);
		$arr[$i]["thumb"] = $arr[$i]["thumbnail"]["thumb"];		
		$arr[$i]["use_timthumb"] = $arr[$i]["thumbnail"]["use_timthumb"];

		$i++;
		$ids[]= $post->ID;
	endwhile; wp_reset_query();	?>



<div id="featured-wrap">
	<ul id="featured-control">
		<?php for ($i = 1; $i <= $featured_num; $i++) { ?>
			<?php if ($arr[$i]["tabtitle"] == '') $arr[$i]["tabtitle"] = 'Tab Custom field'; ?>
			<li<?php if ($i == 1) echo(' class="active"'); ?>><a href="#"><?php echo($arr[$i]["tabtitle"]); ?></a></li>
		<?php }; ?>
	</ul>
	
	<div id="featured">
		<?php for ($i = 1; $i <= $featured_num; $i++) { ?>
			
			<div class="slide clearfix">
				<h2 class="title"><a href="<?php echo($arr[$i]["permalink"]); ?>" title="<?php printf(__('Permanent Link to %s', 'MyProduct'), $arr[$i]["fulltitle"]) ?>"><?php echo($arr[$i]["title"]); ?></a></h2>
				
				<a href="<?php echo($arr[$i]["permalink"]); ?>" title="<?php printf(__('Permanent Link to %s', 'MyProduct'), $arr[$i]["fulltitle"]) ?>">
					<?php print_thumbnail($arr[$i]["thumb"], $arr[$i]["use_timthumb"], $arr[$i]["fulltitle"] , $width, $height, 'thumbnail alignleft'); ?>
				</a>
				
				<p><?php echo($arr[$i]["excerpt"]); ?></p>
			</div> <!-- end .slide -->
			
		<?php }; ?>
	</div> <!-- end #featured -->
</div> <!-- end #featured-wrap -->