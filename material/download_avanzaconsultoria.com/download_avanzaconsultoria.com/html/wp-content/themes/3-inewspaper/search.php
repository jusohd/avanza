<?php get_header(); ?>

<?php get_sidebar(); ?>

	<div id="content" class="narrowcolumn">

	<?php if (have_posts()) : ?>

		<h2 class="pagetitle">Resultados de la Búsqueda</h2>

		<?php while (have_posts()) : the_post(); ?>

				<div class="post" id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace a <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<div class="author">Por: <?php the_author_link(); ?></div>
                <div class="published">Publicado: <?php the_time('j F Y') ?></div>

				<div class="entry">
					<?php the_content('Leer el resto de este artículo &raquo;'); ?>
				</div>

				<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Archivado en <?php the_category(', ') ?> | <?php edit_post_link('Editar', '', ' | '); ?>  <?php comments_popup_link('No hay comentarios &#187;', '1 comentario &#187;', '% comentarios &#187;'); ?></p>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Artículos anteriores') ?></div>
			<div class="alignright"><?php previous_posts_link('Artículos siguientes &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">No se ha encontrado nada. ¿Quieres probar a buscar de nuevo?</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

	</div>

<?php get_footer(); ?>