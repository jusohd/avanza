<div id="top-content">
<div class="t-content"></div>

<div class="t-block">


<?php if ( !function_exists('dynamic_sidebar')
|| !dynamic_sidebar(1) ) : ?>


<div class="h-block">
<h3><?php _e('Posts recientes'); ?></h3>
<ul class="list">
<?php get_archives('postbypost', 10); ?>
</ul>
</div>

<div class="h-block">
<h3><?php _e('Comentarios recientes'); ?></h3>
<ul class="list">
<?php if(function_exists("get_recent_comments")) : ?>
<?php get_recent_comments(); ?>
<?php else : ?>
<?php mw_recent_comments(10, false, 55, 35, 35, 'all', '<li><a href="%permalink%" title="%title%"><strong>%author_name%</strong></a>&nbsp;en&nbsp;%title%</li>','d.m.y, H:i'); ?>
<?php endif; ?>
</ul>
</div>

<div class="h-block">
<h3><?php _e('Posts actualizados'); ?></h3>
<ul class="list">
<?php gte_recent_updated_posts(); ?>
</ul>
</div>

<?php endif; ?>


</div>

</div>