		<ul id="sidebarleft">
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>

 
	<?php wp_list_pages('title_li=<h2>Paginas</h2>'); ?>
 <li id="categories"><?php _e('<h2>Categorias</h2>'); ?>
	<ul>
	<?php wp_list_cats(); ?>
	</ul>
 </li>
 <li id="archives"><?php _e('<h2>Archivo</h2>'); ?>
 	<ul>
	 <?php wp_get_archives('type=monthly'); ?>
 	</ul>
 </li>



<?php endif; ?>
		</ul>