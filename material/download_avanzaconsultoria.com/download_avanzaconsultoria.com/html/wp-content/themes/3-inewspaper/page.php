<?php get_header(); ?>

<?php get_sidebar(); ?>

	<div id="content" class="narrowcolumn_single">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="post" id="post-<?php the_ID(); ?>">
				<h2 class="pageTitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace a  <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<div class="entry">
					<?php the_content('Leer el resto de esta página &raquo;'); ?>
				</div>

	</div>
		<?php endwhile; endif; ?>
	<?php edit_post_link('Editar esta página.', '<p>', '</p>'); ?>
	</div>

<?php get_footer(); ?>