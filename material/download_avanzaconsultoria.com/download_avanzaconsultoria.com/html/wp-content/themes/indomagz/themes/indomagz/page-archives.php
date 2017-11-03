<?php
/*
Template Name: Archives Page
*/
?>

<?php get_header(); ?>

  <div id="content">

	<?php if (function_exists('breadcrumb_nav_xt_display')) {	breadcrumb_nav_xt_display();} ?>

	<div class="post">
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			  <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<div class="entry">
					<?php the_content('Sigue leyendo &raquo;'); ?>
				</div>
		<?php endwhile; ?>
	<?php else : ?>
		<div class="post">
		<h2 class="center">No se ha encontrado</h2>
		<p class="center">Lo siento, lo que buscas no está aquí.</p>
		</div>
	<?php endif; ?>

	<h3>Páginas</h3>
	<ul>
	<?php wp_list_pages('title_li='); ?>
	</ul>
	
	<?php query_posts('posts_per_page=-1'); ?>
	<?php if (have_posts()) : ?>
	<h3>Hay <strong><?php global $numposts; echo $numposts; ?></strong> entradas y <strong><?php global $numcmnts; echo $numcmnts;?></strong> comentarios en total.</h3>	
	<ul>
	<?php while (have_posts()) : the_post(); ?>
	<li><?php the_time('j-m-Y') ?> - <a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>" class="title"><?php the_title(); ?></a> (<?php the_category(', ') ?>)</li>
	<?php endwhile; ?>
	</ul>
	<?php endif; ?>

	</div>
	
		<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/ads468x60.jpg" title="Anúnciate aquí" alt="Anúnciate aquí" /></a>

  </div><!--/content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
