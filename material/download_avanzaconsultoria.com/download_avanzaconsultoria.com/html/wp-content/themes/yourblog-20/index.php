<?php get_header(); ?>

	<div id="content" class="narrowcolumn">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div class="post" id="post-<?php the_ID(); ?>">
				<div class="posttitle">
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<small><?php the_time('j F Y') ?> <!-- by <?php the_author() ?> --></small>
				</div>
				<div class="commentsquare"><?php comments_popup_link('0', '1', '%'); ?></div>
				<div class="postcontent">
					<?php the_content('Sigue leyendo &raquo;'); ?>
				</div>

				<div class="postfoot">
				Archivado en <?php the_category(', ') ?> | <?php edit_post_link('Editar', '', ' | '); ?>  <?php comments_popup_link('Escribe un comentario &#187;', '1 comentario &#187;', '% comentarios &#187;'); ?>
				</div>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Artículos anteriores') ?></div>
			<div class="alignright"><?php previous_posts_link('Artículos siguientes &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">No encontrado</h2>
		<p class="center">Lo siento pero lo que buscas no está aquí.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>

	</div>

<?php get_footer(); ?>
