<?php get_header(); ?>

	<div id="content" class="widecolumn">

	<?php if (have_posts()) : ?>

		<h2 class="title">Resultados de Busqueda</h2>

		<?php while (have_posts()) : the_post(); ?>

			<div class="post">
				<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>"><?php the_title(); ?></a></h3>
				&bull; <?php the_time('l, j F, Y') ?>
				<p class="postmetadata">Publicado en <?php the_category(', ') ?> | <?php edit_post_link('Editar', '', ' | '); ?>  <?php comments_popup_link('No hay criticas &#187;', '1 critica &#187;', '% criticas &#187;'); ?></p>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; fotografias anteriores') ?></div>
			<div class="alignright"><?php previous_posts_link('fotografias siguientes &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">No se han encontrado fotos de lo que buscas. Intentalo de nuevo</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>