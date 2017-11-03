
<?php get_header(); ?>

  <div id="content">

	<?php if (function_exists('breadcrumb_nav_xt_display')) {	breadcrumb_nav_xt_display();} ?>

		<div class="post">
		<h2 class="center">No se ha encontrado</h2>
		<p class="center">Lo siento, lo que buscas no está aquí.</p>
		</div>

		<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/ads468x60.jpg" title="Anúnciate aquí" alt="Anúnciate aquí" /></a>

  </div><!--/content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
