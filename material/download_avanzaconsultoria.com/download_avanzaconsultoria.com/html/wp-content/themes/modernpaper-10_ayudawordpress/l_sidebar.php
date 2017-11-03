<!-- begin l_sidebar -->

	<div id="l_sidebar">
	<ul id="l_sidebarwidgeted">
	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>
	
	<li id="Recent">
	<h2>Ultimos Comentarios</h2>
		<ul>
			<?php get_archives('postbypost', 10); ?>
		</ul>
	</li>

	<li id="Categories">
	<h2>Categorias</h2>
		<ul>
			<?php wp_list_cats('sort_column=name'); ?>
		</ul>
	</li>
		
	<li id="Archives">
	<h2>Archivo</h2>
		<ul>
			<?php wp_get_archives('type=monthly'); ?>
		</ul>
	</li>

	<li id="Blogroll">
	<h2>Blogroll</h2>
		<ul>
			<?php get_links(-1, '<li>', '</li>', ' - '); ?>
		</ul>
	</li>

		<?php endif; ?>
		</ul>
	
</div>

<!-- end l_sidebar -->