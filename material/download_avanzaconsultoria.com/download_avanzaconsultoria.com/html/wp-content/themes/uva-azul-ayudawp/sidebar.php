<!-- begin sidebar -->

	<div id="sidebar">

	<h2>Articulos Recientes</h2>
	<ul>
	<?php get_archives('postbypost', 10); ?>
	</ul>

	<h2>Categorias</h2>
		<ul>
		<?php wp_list_cats('sort_column=name'); ?>
		</ul>
		
	<h2>Archivo</h2>
		<ul>
		<?php wp_get_archives('type=monthly'); ?>
		</ul>
		
	<h2>Admin</h2>
		<ul>
		<?php wp_register(); ?>
		<li><?php wp_loginout(); ?></li>
		<li><a href="http://www.wordpress.org/">Wordpress</a></li>
        <li><a href="http://www.ciberprensa.com/">CiberPrensa</a></li>
		<?php wp_meta(); ?>
		<li><a href="http://validator.w3.org/check?uri=referer">XHTML</a></li>
		</ul>
		
	<h2>Buscar</h2>
	   	<form id="searchform" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<input type="text" name="s" id="s" value="buscar en este sitio..."/></form>
			
</div>

<!-- end sidebar -->