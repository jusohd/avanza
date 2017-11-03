<div id="left">

<div id="lpic"></div>


<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar(1) ) : ?>


	<h2>Entradas recientes</h2>
	<ul>
	<?php get_archives('postbypost', 10); ?>
	</ul>


		<h2>Archivo</h2>
		<ul>
		<?php wp_get_archives('type=monthly'); ?>
		</ul>


		<h2>Categorias</h2>			
		<ul><?php wp_list_cats('sort_column=name'); ?>
		</ul>



			<?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>				

				<h2>Meta</h2>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<li><a href="http://ayudawordpress.com/" title="Ayuda sobre Wordpress.">Ayuda Wordpress</a></li>
					<?php wp_meta(); ?>
				</ul>

			<?php } ?>

<?php endif; ?>

</div>