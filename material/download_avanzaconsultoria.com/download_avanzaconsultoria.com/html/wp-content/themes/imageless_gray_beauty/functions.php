<?php


if ( function_exists('register_sidebars') )
	register_sidebars(1,array(
        'before_widget' => '<div class="widget_box">',
    'after_widget' => '</div>',
 'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));



//  Pages Box 	
	function widget_pages() {
?>

<div class="widget_box">

<h3><?php _e('Páginas'); ?></h3>
   <ul>
<li class="page_item"><a href="<?php bloginfo('url'); ?>">Blog</a></li>

<?php wp_list_pages('title_li='); ?>

 </ul>

</div>

<?php
}
if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('Páginas'), 'widget_pages');


//  Search Box 	
	function widget_search() {
?>
  
<div class="widget_box">

   <label for="s"><h3><?php _e('Buscar Entradas'); ?></h3></label>	
   <form id="searchform" method="get" action="<?php bloginfo('url'); ?>/index.php">
	<div>
		
            <input type="text" name="s" size="18" /><br>

       
            <input type="submit" id="submit" name="Enviar" value="Buscar" />
        
        </div>
	</form>

</div>

<?php
}
if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('Busqueda'), 'widget_search');

// Blogroll 	
	function widget_blogroll() {
?>

<div class="widget_box">

<h3><?php _e('Blogroll'); ?></h3>

<ul>

<?php get_links(-1, '<li>', '</li>', '', FALSE, 'name', FALSE, FALSE, -1, FALSE); ?>

</ul>

</div>

<?php
}
if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('Blogroll'), 'widget_blogroll');
 


?>