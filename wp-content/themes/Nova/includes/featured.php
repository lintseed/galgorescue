<!-- Start Featured -->	
	<div id="featured">
		<div class="container clearfix">
			<div id="featured_content">
			<?php
				global $wp_embed;
				
				$ids = array();
				$arr = array();
				$i=1;
							
				$featured_cat = get_option('nova_feat_cat');
				$featured_num = get_option('nova_featured_num');
				
				if (get_option('nova_use_pages') == 'false') query_posts("showposts=$featured_num&cat=".get_catId($featured_cat));
				else { 
					global $pages_number;
					
					if (get_option('nova_feat_pages') <> '') $featured_num = count(get_option('nova_feat_pages'));
					else $featured_num = $pages_number;
					
					query_posts(array
									('post_type' => 'page',
									'orderby' => 'menu_order',
									'order' => 'ASC',
									'post__in' => get_option('nova_feat_pages'),
									'showposts' => $featured_num)
								);
				}
				
				while (have_posts()) : the_post();
					$et_nova_settings = maybe_unserialize( get_post_meta($post->ID,'et_nova_settings',true) );
					
					$variation = isset( $et_nova_settings['et_fs_variation'] ) ? (int) $et_nova_settings['et_fs_variation'] : 1;
					$link = isset( $et_nova_settings['et_fs_link'] ) && !empty($et_nova_settings['et_fs_link']) ? $et_nova_settings['et_fs_link'] : get_permalink();
					$title = isset( $et_nova_settings['et_fs_title'] ) && !empty($et_nova_settings['et_fs_title']) ? $et_nova_settings['et_fs_title'] : get_the_title();
					$description = isset( $et_nova_settings['et_fs_description'] ) && !empty($et_nova_settings['et_fs_description']) ? $et_nova_settings['et_fs_description'] : truncate_post(20,false);
					$button = isset( $et_nova_settings['et_fs_button'] ) && !empty($et_nova_settings['et_fs_button']) ? $et_nova_settings['et_fs_button'] : '';
					$video = isset( $et_nova_settings['et_fs_video'] ) && !empty($et_nova_settings['et_fs_video']) ? $et_nova_settings['et_fs_video'] : '';
					$video_manual_embed = isset( $et_nova_settings['et_fs_video_embed'] ) && !empty($et_nova_settings['et_fs_video_embed']) ? $et_nova_settings['et_fs_video_embed'] : '';
					
					$additional_class = ' ';
					$width = 441;
					$height = 269;
					
					switch ($variation) {
						case 2:
							$additional_class .= 'pngimage';
							$width = 439;
							$height = 324;
							break;
						case 3:
							$additional_class .= 'description-left';
							break;
						case 4:
							$additional_class .= 'description-center';
							break;
					}
			?>
					<div class="slide clearfix<?php echo $additional_class; ?>">
						
						<?php if ($variation != 4) { ?>
							<div class="featured-img">
								<?php if ( $video == '' && $video_manual_embed == '' ) { ?>
									<a href="<?php echo $link; ?>">							
										<?php $thumbnail = get_thumbnail($width,$height,'',$post_title,$post_title,false,'Featured');
										$thumb = $thumbnail["thumb"];
										print_thumbnail($thumb, $thumbnail["use_timthumb"], $post_title, $width, $height, ''); ?>
					
										<?php if ( in_array($variation, array(1,3)) ) { ?>
											<span class="overlay"></span>
										<?php } ?>
									</a>
								<?php } else { ?>
									<?php if ( $variation != 2 ) { ?>
										<div class="video-slide">
									<?php } ?>
									<?php
										if ( $video <> '' ) { 
											$video_embed = $wp_embed->shortcode( '', $video );
											if ( $video_embed == '<a href="'.$video.'">'.$video.'</a>' ) $video_embed = $video_manual_embed;
										} else {
											$video_embed = $video_manual_embed;
										}
																			
										$video_embed = preg_replace('/<embed /','<embed wmode="transparent" ',$video_embed);
										$video_embed = preg_replace('/<\/object>/','<param name="wmode" value="transparent" /></object>',$video_embed); 
										$video_embed = preg_replace("/height=\"[0-9]*\"/", "height={$height}", $video_embed);
										$video_embed = preg_replace("/width=\"[0-9]*\"/", "width={$width}", $video_embed);
										
										echo $video_embed;
									?>
									<?php if ( $variation != 2 ) { ?>
										</div> <!-- end .video-slide -->
									<?php } ?>
								<?php } ?>
							</div> 	<!-- end .featured-img -->
						<?php } ?>
						
						<div class="description">
							<h2 class="title"><a href="<?php echo $link; ?>"><?php echo $title; ?></a></h2>
							
							<p><?php echo $description; ?></p>
							<?php if ( $button != '' ) { ?>
								<a href="<?php echo $link; ?>" class="join-today"><?php echo $button; ?></a>
							<?php } ?>
						</div> <!-- end .description -->
					</div> <!-- end .slide -->
			<?php
					$ids[]= $post->ID;
				endwhile; wp_reset_query();	
			?>
			</div> <!-- end #featured_content -->
			
			<div id="controllers" class="clearfix"></div>
		</div> <!-- end .container -->
	</div>	<!-- end #featured -->