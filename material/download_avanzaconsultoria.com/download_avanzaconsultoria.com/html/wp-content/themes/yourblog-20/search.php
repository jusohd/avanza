<?php get_header(); ?>

	<div id="content" class="narrowcolumn">

	<?php if (have_posts()) : ?>

		<h2 class="pagetitle">Resultados de búsqueda</h2>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Artículos anteriores') ?></div>
			<div class="alignright"><?php previous_posts_link('Artículos siguientes &raquo;') ?></div>
		</div>


		<?php while (have_posts()) : the_post(); ?>

			<div class="post">
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>"><?php the_title(); ?></a></h3>
				<small><?php the_time('l j F Y') ?></small>

				<p class="postmetadata">Archivado en <?php the_category(', ') ?> | <?php edit_post_link('Modifier', '', ' | '); ?>  <?php comments_popup_link('Escribe un comentario &#187;', '1 comentario &#187;', '% comentarios &#187;'); ?></p>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Artículos anteriores') ?></div>
			<div class="alignright"><?php previous_posts_link('Artículos siguientes &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">No se ha encontrado nada. Prueba otra búsqueda</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

	</div>

<?php get_footer(); ?>