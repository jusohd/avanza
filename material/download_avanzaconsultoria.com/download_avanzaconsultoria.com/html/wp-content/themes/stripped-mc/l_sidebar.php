<div id="l_sidebar">
<ul>

<!--sidebar.php-->

<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar(1) ) : ?>

<!--recent posts-->
<li>
	<h2>Posts recientes</h2>
	<ul>
	<?php get_archives('postbypost', 10); ?>
	</ul>
</li>

<!--list of categories, order by name, without children categories, no number of articles per category-->
<li>	
	<h2>Categorias</h2>			
	<ul>
	<?php wp_list_categories('orderby=name&title_li'); ?>
	</ul>
</li>

<?php endif; ?>

</ul>
</div>