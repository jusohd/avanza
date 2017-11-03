<?php get_header(); ?>

	<div id="content">

	<?php if (have_posts()) : ?>

		<h2 class="pagetitle">Resultados de Búsqueda</h2>

			<?php while (have_posts()) : the_post(); ?>

			<div class="post">
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<small><?php the_time('l, j F, Y') ?></small>
	<div class="entry">
					<?php the_excerpt() ?>
				</div>
<hr /><br />
				
			</div>

		<?php endwhile; ?>
		
		<div class="navigation">
			<?php next_posts_link('&laquo; Publicaciones anteriores') ?>
			<?php previous_posts_link('Publicaciones siguientes &raquo;') ?>
		</div>

	<?php else : ?>

		<h2 class="center">No se han encontrado artículos de lo que buscas. Intenta una nueva búsqueda</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>