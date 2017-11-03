<div id="content">
<div id="right">
<div class="top_right"></div>
<div id="sidebar">
<div class="wrap_widget">
<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar(2) ) : ?>
<div class="title"><h2>páginas</h2></div>
<ul>
<?php wp_list_pages('sort_column=menu_order&depth=1&title_li='); ?>
</ul>
<div class="title"><h2>archivo</h2></div>
<ul>
<?php wp_get_archives('type=monthly&show_post_count=1'); ?>
</ul>
<div class="title"><h2>blogroll</h2></div>
<ul>
<?php get_links(-1, '<li>', '</li>', ' - '); ?>
</ul>
<?php if(function_exists("wp_theme_switcher")) : ?>
<div class="title"><h2>plantillas</h2></div>
<p><?php wp_theme_switcher('dropdown'); ?></p>
<?php endif; ?>

<?php endif; ?>
</div>

</div>
<div class="bottom_right"></div>
</div>