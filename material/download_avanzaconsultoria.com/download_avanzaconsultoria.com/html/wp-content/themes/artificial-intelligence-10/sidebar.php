<div id="sidebar">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>	
	<div class="box">
		<h2>Categorías</h2>
		<p><ul><?php wp_list_cats('sort_column=name'); ?></ul></p>
	</div>
	
	<div class="box">
		<h2>Enlaces</h2>
		<p><ul><?php if (wp_version()=='20') { get_links('1','<li>','</li>','',false,'name',false); } else { get_links('2','<li>','</li>','',false,'name',false); } ?></ul></p>
	</div>
	
	<div class="box">
		<h2>Buscar</h2>
		<form id="searchform" method="get" action="<?php echo get_settings('home'); ?>">
		  <input class="text" type="text" name="s" id="s" size="20" value="<?php echo wp_specialchars($s, 1); ?>" />
		  <input class="searchbutton" type="submit" value="Buscar" alt="Enviar" />
		</form>
	</div>
	
	<div class="note">
		<p><a href="#" title="Registrate!">Registrate</a> para acceder a secciones exclusivas!
	</div>
<?php endif; ?>
</div>