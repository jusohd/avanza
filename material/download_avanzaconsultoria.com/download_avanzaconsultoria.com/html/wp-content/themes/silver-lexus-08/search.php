<?php get_header(); ?>

	<?php if (have_posts()) : ?>

		<h2 class="pagetitle">Resultados de Búsqueda</h2>

        <p>Gracias por buscar en <?php bloginfo('name'); ?>. A continuación tienes una lista con los resultados acerca de lo que has buscado.</p>
        <p>Si no es lo que buscabas prueba otra vez o navega por los enlaces.</p>
        <p>Gracias por visitar <?php bloginfo('name'); ?>.</p>

		<?php while (have_posts()) : the_post(); ?>

			<div class="post">
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>"><?php the_title(); ?></a></h3>
				<small><?php the_time('l, j F, Y') ?></small>

				<p class="postmetadata">Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No hay comentarios &#187;', '1 comentario &#187;', '% comentarios &#187;'); ?></p>
			</div>

		<?php endwhile; ?>

	<?php else : ?>

		<h2 class="center">No hay artículos sobre lo que buscas</h2>
        <p><strong>La búsqueda realizada ha producido cero resultados</strong></p>
        <p>Prueba a ampliar los criterios de búsqueda e inténtalo de nuevo o navega por los enlaces</p>
        <p><em>Puede que buscando de nuevo tengas mas suerte</em></p>

		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>