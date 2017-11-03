<?php get_header(); ?>

<div id="content">

	<?php if (have_posts()) : ?>

		<h2>Resultados de busqueda</h2>
		
		<p><?php while (have_posts()) : the_post(); ?></p>
				
		<h4><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>"><?php the_title(); ?></a></h4>
		<small><?php the_time('j F Y') ?> <!-- by <?php the_author() ?> --></small>
		<p><?php the_excerpt() ?></p>
	
		<?php endwhile; ?>

<p><?php posts_nav_link(' &#8212; ', __('&laquo; Pag. anterior'), __('Pag siguiente &raquo;')); ?></p>
	
	<?php else : ?>

		<h2>Mensaje no encontrado</h2>

	<?php endif; ?>
		
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
