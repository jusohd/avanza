<?php 

/*-----------------------------------------------------------------------------------*/
/* Theme Filters */
/*-----------------------------------------------------------------------------------*/

// Change Excerpt [...] Symbol
function _theme_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', '_theme_excerpt_more');     
?>