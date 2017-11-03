<?php

/*-----------------------------------------------------------------------------------*/
/* Register Theme Sidebars */
/*-----------------------------------------------------------------------------------*/  

if ( function_exists('register_sidebar') )
    register_sidebar(array(
		'name' => 'Sidebar',
		'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
		'after_widget' => '</div> <!-- end .widget-content --></div> <!-- end .widget -->',
		'before_title' => '<div class="sidebar-header"><h3>',
		'after_title' => '</h3></div><div class="widget-content">',
    ));
    
    
if ( function_exists('register_sidebar') )
    register_sidebar(array(
	'name' => 'Footer',
    'before_widget' => '<div class="footer-widget %2$s">',
    'after_widget' => '</div> <!-- end .widget-content --></div> <!-- end .footer-widget -->',
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4><div class="widget-content">',
    ));    
?>