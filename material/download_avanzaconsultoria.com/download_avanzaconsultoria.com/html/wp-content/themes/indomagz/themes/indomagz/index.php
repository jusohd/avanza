<?php get_header(); ?>

  <div id="content">

	<?php if (function_exists('breadcrumb_nav_xt_display')) {	breadcrumb_nav_xt_display();} ?>

	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); $loopcounter++; ?>
			<div class="post" id="post-<?php the_ID(); ?>">
			  <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<div class="postmeta">
				<?php comments_popup_link('No hay comentarios', 'Un comentario', '% comentarios'); ?>, escrito por <?php the_author() ?> el <?php the_time('j F Y') ?>, archivado en <?php the_category(', ') ?><?php edit_post_link('Editar', ', ', ''); ?>
				</div>
				<div class="entry">
					<?php the_content('Sigue leyendo &raquo;'); ?>
				</div>
				<div style="clear:both;"></div>
			</div>

			<?php if ($loopcounter == 1) { ?> 
		<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/ads468x60.jpg" title="Aúnciate aquí" alt="Anúnciate aquí" /></a>
			<?php } ?>

		<?php endwhile; ?>

		<div class="navigation">
		<?php if(function_exists('wp_pagenavi')) : wp_pagenavi(); else : ?>
		<div class="previous-entries"><?php next_posts_link('&laquo; Entradas anteriores') ?></div>
		<div class="next-entries"><?php previous_posts_link('Entradas siguientes &raquo;') ?></div>
		<hr class="clear"/>
		<?php endif; ?>
		</div>

	<?php else : ?>

		<div class="post">
		<h2 class="center">No se ha encontrado</h2>
		<p class="center">Lo siento, lo que buscas no está aquí.</p>
		</div>

	<?php endif; ?>

  </div><!--/content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
