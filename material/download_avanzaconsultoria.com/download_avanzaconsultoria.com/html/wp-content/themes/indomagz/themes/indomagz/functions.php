<?php
if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'name' => 'Left',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'name' => 'Right',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
}

// helper functions
	$numpages = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_type='page'");
		if (0 < $numpages) $numpages = number_format($numpages); 

	$numposts = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_type='post' and post_status = 'publish'");
		if (0 < $numposts) $numposts = number_format($numposts); 

	$numcmnts = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->comments WHERE comment_approved = '1'");
		if (0 < $numcmnts) $numcmnts = number_format($numcmnts);

// ----------------

?>