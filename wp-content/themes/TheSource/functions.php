<?php 
add_action( 'after_setup_theme', 'et_setup_theme' );
if ( ! function_exists( 'et_setup_theme' ) ){
	function et_setup_theme(){
		global $themename, $shortname;
		$themename = "TheSource";
		$shortname = "thesource";
	
		require_once(TEMPLATEPATH . '/epanel/custom_functions.php'); 

		require_once(TEMPLATEPATH . '/includes/functions/comments.php'); 

		require_once(TEMPLATEPATH . '/includes/functions/sidebars.php'); 

		load_theme_textdomain('TheSource',get_template_directory().'/lang');

		require_once(TEMPLATEPATH . '/epanel/options_thesource.php');

		require_once(TEMPLATEPATH . '/epanel/core_functions.php'); 

		require_once(TEMPLATEPATH . '/epanel/post_thumbnails_thesource.php');

		include(TEMPLATEPATH . '/includes/widgets.php');
	}
}

add_action('wp_head','et_portfoliopt_additional_styles',100);
function et_portfoliopt_additional_styles(){ ?>
	<style type="text/css">
		#et_pt_portfolio_gallery { margin-left: 2px; }
		.et_pt_portfolio_item { margin-left: 11px; }
		.et_portfolio_small { margin-left: -14px !important; }
		.et_portfolio_small .et_pt_portfolio_item { margin-left: 22px !important; }
		.et_portfolio_large { margin-left: -12px !important; }
		.et_portfolio_large .et_pt_portfolio_item { margin-left: 13px !important; }
	</style>
<?php }

function register_main_menus() {
   register_nav_menus(
      array(
         'primary-menu' => __( 'Primary Menu' ),
         'secondary-menu' => __( 'Secondary Menu' ),
		 'footer-menu' => __( 'Footer Menu' ),
      )
   );
};
if (function_exists('register_nav_menus')) add_action( 'init', 'register_main_menus' );

if ( ! function_exists( 'et_list_pings' ) ){
	function et_list_pings($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment; ?>
		<li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?> - <?php comment_excerpt(); ?>
	<?php }
} 

/* Custom Function for Adopted Page */
function ADOPTED_GALGOS(){
	global $post;

	ob_start();
		echo '<ul id="adopted">';
			$query_args = array('category_name' => 'adopted_galgos', 'post_status' => 'publish');
			$loop = new WP_Query( $query_args );
			while ( $loop->have_posts() ) : $loop->the_post();
			?>
				<li>
					<?php if (has_post_thumbnail()) : ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail(array(100,100)); ?></a>
 					<?php endif; ?>
					<h2><a href="<?php the_permalink(); ?>"><?php the_time('F Y'); ?> - <?php the_title(); ?></a></h2>
					<?php the_excerpt(); ?>
				</li>
			<? endwhile;
		echo '</ul>';
		wp_reset_query();
   
	$output = ob_get_contents(); 
	ob_end_clean();

	return $output;

}
add_shortcode('ADOPTED_GALGOS', 'ADOPTED_GALGOS');

?>