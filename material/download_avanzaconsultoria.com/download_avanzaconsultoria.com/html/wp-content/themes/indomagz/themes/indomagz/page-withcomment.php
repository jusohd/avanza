<?php
/*
Template Name: Commented Page
*/
?>

<?php get_header(); ?>

  <div id="content">

	<?php if (function_exists('breadcrumb_nav_xt_display')) {	breadcrumb_nav_xt_display();} ?>

	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div class="post" id="post-<?php the_ID(); ?>">
			  <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<div class="entry">
					<?php the_content('Sigue leyendo &raquo;'); ?>
				</div>
				<div style="clear:both;"></div>
			</div>

		<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/ads468x60.jpg" title="Anúnciate aquí" alt="Anúnciate aquí" /></a>

			<?php comments_template(); ?>

		<?php endwhile; ?>

	<?php else : ?>

		<div class="post">
		<h2 class="center">No se ha encontrado</h2>
		<p class="center">Lo siento, lo que buscas no está aquí.</p>
		</div>

	<?php endif; ?>

  </div><!--/content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
