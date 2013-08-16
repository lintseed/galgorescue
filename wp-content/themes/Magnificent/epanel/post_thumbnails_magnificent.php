<?php

/* sets predefined Post Thumbnail dimensions */
if ( function_exists( 'add_theme_support' ) ) {
   add_theme_support( 'post-thumbnails' );
   
   //blog page template
	add_image_size( 'ptentry-thumb', 184, 184, true );
	//gallery page template
	add_image_size( 'ptgallery-thumb', 207, 136, true );
      
   //entry image size
   add_image_size( 'thumb1', 218, 218, true );
   
   add_image_size( 'thumb2', 73, 73, true );
   
   add_image_size( 'thumb3', 461, 271, true );
   
   add_image_size( 'thumb4', 40, 40, true );
   
};
/* --------------------------------------------- */

?>