<?php get_header(); ?>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		<h2><?php the_title(); ?></h2>
			<div class="entry">
				<?php the_content('<p class="serif">Leer mas &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Páginas:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
	<?php edit_post_link('Editar.', '<p>', '</p>'); ?>

			</div>
		</div>
		<?php endwhile; endif; ?>
	
<?php get_footer(); ?>