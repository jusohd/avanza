<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="content-left">
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div class="post" id="post-<?php the_ID(); ?>">
				<div class="post-date"><span class="month"><?php the_time('F')?></span><br /><span class="dayofmonth"><?php the_time('j')?></span></div>
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<span class="post-category">Categoría: <span><?php the_category(', '); ?></span></span>
				<div class="entry">
					<?php the_content('Leer el resto de esta entrada &raquo;'); ?>
				</div>
				<!-- close entry -->

				<div class="postmetadata">
					<span class="comment"><a href="<?php the_permalink() ?>/#comment"><?php comments_number('Comentarios 0', 'Comentario 1', 'Comentarios %' ); ?></a></span>
					<span class="post-comment"><a href="<?php the_permalink() ?>/#respond">Publicar comentario</a></span>
					<span class="share-this"><a href="#">Compartir</a></span>
				</div>
			</div>
			<!-- close post -->

		<?php endwhile; ?>

	<?php comments_template(); ?>

	<?php endif; ?>

</div>
<!-- close content-left -->
<?php get_footer(); ?>

