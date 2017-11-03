<?php get_header(); ?>

	<div id="content" class="widecolumn">

		<?php if (have_posts()) : ?>

		 <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
<?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 class="title">Archivo de la seccion '<?php echo single_cat_title(); ?>'</h2>

 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="title">Archivo del <?php the_time('j F, Y'); ?></h2>

	 <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="title">Archivo de <?php the_time('F, Y'); ?></h2>

		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="title">Archivo de <?php the_time('Y'); ?></h2>

	  <?php /* If this is a search */ } elseif (is_search()) { ?>
		<h2 class="title">Resultados de busqueda</h2>

	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="title">Archivo del Autor</h2>

		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="title">Archivo de Fotografias</h2>

		<?php } ?>

		<?php while (have_posts()) : the_post(); ?>
		<div class="post">
			<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>"><?php the_title(); ?></a></h3>
			&bull; <?php the_time('l, j F, Y') ?>
			<p class="postmetadata">Escrito en la seccion <?php the_category(', ') ?> | <?php edit_post_link('Editar', '', ' | '); ?>  <?php comments_popup_link('No hay criticas &#187;', '1 critica &#187;', '% criticas &#187;'); ?></p> 
		</div>
		
		<br />

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; fotos anteriores') ?></div>
			<div class="alignright"><?php previous_posts_link('fotos siquientes &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">No se ha encontrado nada</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>