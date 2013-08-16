<?php 

require_once(TEMPLATEPATH . '/epanel/custom_functions.php'); 

require_once(TEMPLATEPATH . '/includes/functions/comments.php'); 

require_once(TEMPLATEPATH . '/includes/functions/sidebars.php'); 

load_theme_textdomain('Nova',get_template_directory().'/lang');

require_once(TEMPLATEPATH . '/epanel/options_nova.php');

require_once(TEMPLATEPATH . '/epanel/core_functions.php'); 

require_once(TEMPLATEPATH . '/epanel/post_thumbnails_nova.php');

function register_main_menus() {
	register_nav_menus(
		array(
			'primary-menu' => __( 'Primary Menu' )
		)
	);
}
if (function_exists('register_nav_menus')) add_action( 'init', 'register_main_menus' );

// add Home link to the custom menu WP-Admin page
function et_add_home_link( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'et_add_home_link' );

require_once(TEMPLATEPATH . '/includes/additional_functions.php');

$wp_ver = substr($GLOBALS['wp_version'],0,3);
if ($wp_ver >= 2.8) include(TEMPLATEPATH . '/includes/widgets.php'); ?>