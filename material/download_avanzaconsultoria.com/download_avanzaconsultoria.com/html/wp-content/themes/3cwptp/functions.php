<?php

if ( function_exists('register_sidebars') )
    register_sidebars(2, array(
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="title"><h2>',
        'after_title' => '</h2></div>',
    ));

function get_leftbar(){
include (TEMPLATEPATH . "/left_sidebar.php");
}

function widget_mytheme_about() {
?>
<div class="title"><h2>Acerca de</h2></div>
<p>Hola, estás viendo el blog <?php bloginfo('name'); ?>. Puedes editar este texto en functions.php.</p>

<?php
}

if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('About'), 'widget_mytheme_about');



function widget_mytheme_blogroll() {
?>
<div class="title"><h2>Blogroll</h2></div>
<ul><?php get_links(-1, '<li>', '</li>', ' - '); ?></ul>
<?php
}
if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('blogroll'), 'widget_mytheme_blogroll');



function widget_mytheme_mycalendar() {
?>
<div class="title"><h2>calendario</h2></div>
<?php get_calendar(1); ?>
<?php
}

if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('mycalendar'), 'widget_mytheme_mycalendar');


function widget_mytheme_themeswitch() {
?>
<div class="title"><h2>Plantillas</h2></div>
<p><?php wp_theme_switcher('dropdown'); ?></p>
<?php
}
if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('themeswitch'), 'widget_mytheme_themeswitch');

?>