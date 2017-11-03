<!-- begin l_sidebar -->

	<div id="l_sidebar">
	<ul id="l_sidebarwidgeted">
	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>
	
	<li id="Recientes">
	<h2>Articulos recientes</h2>
	<ul>
	<?php get_archives('postbypost', 10); ?>
	</ul>

	<li id="Categorias">
	<h2>Categorias</h2>
		<ul>
		<?php wp_list_cats('sort_column=name'); ?>
		</ul>
		
	<li id="Archivo">
	<h2>Archivo</h2>
		<ul>
		<?php wp_get_archives('type=monthly'); ?>
		</ul>
		
	<li id="Enlaces">
	<h2>Enlaces</h2>
		<ul>
		<?php get_links(-1, '<li>', '</li>', ' - '); ?>
		</ul>
		
	<li id="Admin">
	<h2>Admin</h2>
		<ul>
		<?php wp_register(); ?>
		<li><?php wp_loginout(); ?></li>
        <li><a href="http://ayudawordpress.com/">Ayuda Wordpress</a></li>
		<li><a href="http://www.wordpress.org/">Wordpress</a></li>
		<?php wp_meta(); ?>
		<li><a href="http://validator.w3.org/check?uri=referer">XHTML</a></li>
		</ul>
		
	<h2>Busqueda</h2>
	   	<form id="searchform" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<input type="text" name="s" id="s" size="30" value="buscar en este sitio..."/></form>
		
		<?php endif; ?>
		</ul>
			
</div>

<!-- end l_sidebar -->