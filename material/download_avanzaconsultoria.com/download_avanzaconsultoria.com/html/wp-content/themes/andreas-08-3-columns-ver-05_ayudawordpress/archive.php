<?php get_header(); ?>

<div id="content">

		<?php if (have_posts()) : ?>

		 <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
<?php /* If this is a category archive */ if (is_category()) { ?>				
		<h3>Archivo para '<?php echo single_cat_title(); ?>'</h3>
		
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="pagetitle">Archivo para <?php the_time('j F, Y'); ?></h2>
		
	 <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="pagetitle">Archivo para <?php the_time('F, Y'); ?></h2>

		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="pagetitle">Archivo para <?php the_time('Y'); ?></h2>
		
	  <?php /* If this is a search */ } elseif (is_search()) { ?>
		<h2 class="pagetitle">Buscar resultados</h2>
		
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="pagetitle">Autor del archivo</h2>

		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pagetitle">Archivo</h2>

		<?php } ?>

		<?php while (have_posts()) : the_post(); ?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<small><?php the_time('j F Y') ?> <!-- by <?php the_author() ?> --></small>
		<?php the_excerpt() ?>

		<?php endwhile; ?>

<p><?php posts_nav_link(' &#8212; ', __('&laquo; Pag. anterior'), __('Pag. siguiente &raquo;')); ?></p>


	<?php else : ?>

		<h2 class="center">No encontrado</h2>

	<?php endif; ?>
		
	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>