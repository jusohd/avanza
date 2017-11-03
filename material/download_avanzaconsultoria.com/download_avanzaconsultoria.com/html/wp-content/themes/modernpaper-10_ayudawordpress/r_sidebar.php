<!-- begin r_sidebar -->

	<div id="r_sidebar">
	<ul id="r_sidebarwidgeted">
	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(2) ) : else : ?>

	<li id="About">
	<h2>Bar&anka's Blog</h2>
		<p>En este lugar puedes agregar texto. Aqui podras informar acerca del blog, y de tus intenciones sobre el.</p>
	</li>
	
	<li id="Search">
	<h2>Buscar</h2>
		<ul>
   			<li><form id="searchform" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>"><input type="text" value="Escribe y pulsa enter" name="s" id="s" onfocus="if (this.value == 'Escribe y pulsa enter') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Escribe y pulsa enter';}"/></form></li>
		</ul>
	</li>
		
	<li id="Admin">
	<h2>Enlaces Admin</h2>
		<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<li><a href="http://www.wordpress.org/">Wordpress</a></li>
			<?php wp_meta(); ?>
			<li><a href="http://validator.w3.org/check?uri=referer">XHTML</a></li>
		</ul>
	</li>
				
		<?php endif; ?>
		</ul>
			
</div>

<!-- end r_sidebar -->