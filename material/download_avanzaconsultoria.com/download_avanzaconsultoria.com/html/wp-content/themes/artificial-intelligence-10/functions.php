<?php
if ( function_exists('register_sidebar') ) {
    register_sidebar( array('before_widget' => '<div class="box">', 'after_widget' => '</div>', 'before_title' => '<h2>', 'after_title' => '</h2>') );
}

function wp_version() {
	global $wp_db_version;

	if ( $wp_db_version < 3582 ) {
		return '20';
	} else {
		return '21';
	}
}
?>