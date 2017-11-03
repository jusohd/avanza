		<ul>
			<?php 	/* Widgetized sidebar, if you have the plugin installed. */
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
			<li>
				<?php include (TEMPLATEPATH . '/searchform.php'); ?>
			</li>

			<!-- La información del Autor está inhabilitada por defecto. Quita la marca de comentario rellena abajo tus datos si quieres utilizarlo.
			<li><h2>Autor</h2>
			<p>Una pequeña presentación nuestra, nada extenso. Solo un acercamiento... </p>
			</li>
			-->

			<?php if ( is_404() || is_category() || is_day() || is_month() ||
						is_year() || is_search() || is_paged() ) {
			?> <li>

			<?php /* If this is a 404 page */ if (is_404()) { ?>
			<?php /* If this is a category archive */ } elseif (is_category()) { ?>
			<p>Estas viendo los archivos de la categoría <?php single_cat_title(''); ?>.</p>

			<?php /* If this is a yearly archive */ } elseif (is_day()) { ?>
			<p>Estás viendo los archivos del día <?php the_time('l j F Y'); ?>.</p>

			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<p>Estás viendo los archivos del mes de  <?php the_time('F, Y'); ?>.</p>

			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<p>Estás viendo los archivos del año <?php the_time('Y'); ?>.</p>

			<?php /* If this is a monthly archive */ } elseif (is_search()) { ?>
			<p>Has buscado en los archivos de <a href="<?php echo bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a> por <strong>'<?php the_search_query(); ?>'</strong>. Si no has encontrado lo que buscabas puedes utilizar los enlaces siguientes :.</p>

			<?php /* If this is a monthly archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<p>Estás viendo los archivos de <a href="<?php echo bloginfo('url'); ?>/"><?php echo bloginfo('name'); ?></a>.</p>

			<?php } ?>
				
			</li> <?php }?>

			<?php wp_list_pages('title_li=<h2>Pages</h2>' ); ?>

			<li><h2>Archivo</h2>
				<ul>
				<?php wp_get_archives('type=monthly'); ?>
				</ul>
			</li>

			<?php wp_list_categories('show_count=1&title_li=<h2>Categorías</h2>'); ?>

			<?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>
				<?php wp_list_bookmarks(); ?>

				<li><h2>Meta</h2>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">XHTML <abbr title="eXtensible HyperText Markup Language">Válido</abbr></a></li>
					<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
					<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
					<?php wp_meta(); ?>
				</ul>
				</li>
			<?php } ?>
			
			<?php endif; ?>
		</ul>
