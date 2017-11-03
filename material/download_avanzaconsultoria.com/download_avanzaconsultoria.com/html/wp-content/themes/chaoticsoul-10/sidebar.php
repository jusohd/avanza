	<div id="sidebar">
	
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>
		
		<?php if (is_single()) { ?>
			
			<h3>Acerca de esta entrada</h3>
			<p class="postmetadata alt">
				<small>
					Esta fotografia fue publicada
					<?php /* This is commented, because it requires a little adjusting sometimes.
						You'll need to download this plugin, and follow the instructions:
						http://binarybonsai.com/archives/2004/08/17/time-since-plugin/ */
						/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?> 
					el <?php the_time('l, j F, Y') ?> a las <?php the_time() ?>
					y esta archivada en la seccion <?php the_category(', ') ?>.
					Puedes seguir las criticas en el <?php comments_rss_link('RSS 2.0'); ?> feed. 

					<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
						// Both Comments and Pings are open ?>
						Puedes <a href="#respond">escribir una critica</a>, o hacer <a href="<?php trackback_url(true); ?>" rel="trackback">trackback</a> desde tu propia Web.

					<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
						// Only Pings are Open ?>
						Actualente no estan activas las criticas pero puedes hacer <a href="<?php trackback_url(true); ?> " rel="trackback">trackback</a> desde tu propia web.

					<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
						// Comments are open, Pings are not ?>
						Puedes ir al final y escribir una critica. Actualmente no estan activos los pings.

					<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
						// Neither Comments, nor Pings are open ?>
						Actualmente no estan activas las criticas y los pings.

					<?php } edit_post_link('Editar esta entrada.','',''); ?>

				</small>
			</p>
			
			<h3>Navegar</h3>
			
			<ul class="navigation">
				<?php previous_post_link('<li>Anterior: <strong>%link</strong></li>') ?>
				<?php next_post_link('<li>Siguiente: <strong>%link</strong></li>') ?>
			</ul>	
		
		<?php } else { ?>
			
			<!-- Author information is disabled per default. Uncomment and fill in your details if you want to use it.
			<li><h2>Author</h2>
			<p>A little something about you, the author. Nothing lengthy, just an overview.</p>
			</li>
			-->
			
			<?php /* If this is a 404 page */ if (is_404()) { ?>
			<?php /* If this is a category archive */ } elseif (is_category()) { ?>
			<h3>Acerca de esta pagina</h3>
			<p>Estas viendo el archivo de la seccion <?php single_cat_title(''); ?>.</p>

			<?php /* If this is a yearly archive */ } elseif (is_day()) { ?>
			<h3>Acerca de esta pagina</h3>
			<p>Estas viendo el archivo del fotoblog <a href="<?php bloginfo('home'); ?>/"><?php echo bloginfo('name'); ?></a>
			del dia <?php the_time('l, j F, Y'); ?>.</p>

			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<h3>Acerca de esta pagina</h3>
			<p>Estas viendo el archivo del fotoblog <a href="<?php bloginfo('home'); ?>/"><?php echo bloginfo('name'); ?></a> de <?php the_time('F, Y'); ?>.</p>

      <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<h3>Acerca de esta pagina</h3>
			<p>Estas viendo el archivo del fotoblog <a href="<?php bloginfo('home'); ?>/"><?php echo bloginfo('name'); ?></a> del año <?php the_time('Y'); ?>.</p>

		 <?php /* If this is a monthly archive */ } elseif (is_search()) { ?>
			<h3>Acerca de esta pagina</h3>
			<p>Has buscado en el archivo del fotoblog <a href="<?php echo bloginfo('home'); ?>/"><?php echo bloginfo('name'); ?></a> por <strong>'<?php echo wp_specialchars($s); ?>'</strong>. Si no has encontrado lo que buscabas prueba uno de estos enlaces.</p>

			<?php /* If this is a monthly archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<h3>Acerca de esta pagina</h3>
			<p>Estas viendo el archivo del fotoblog <a href="<?php echo bloginfo('home'); ?>/"><?php echo bloginfo('name'); ?></a>.</p>

			<?php } ?>

			<h3>Paginas</h3>
				<ul>
				<?php wp_list_pages('title_li='); ?>
				</ul>
            <h3>Secciones</h3>
				<ul>
				<?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=0'); ?>
				</ul>
            <h3>Archivo</h3>
				<ul>
				<?php wp_get_archives('type=monthly'); ?>
				</ul>

            <h3>Sitios de Interes</h3>
				<ul>
				<?php get_links_list(); ?>
				</ul>
            <h3>Laboratorio</h3>
				<ul>
                <?php wp_register(); ?>
                <li><?php wp_loginout(); ?></li>
                <?php wp_meta(); ?>
                </ul>
						
		<?php } ?>
	
	</div>