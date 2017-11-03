<?php get_header(); ?>
  <div id="container" class="clearfix">
    <div id="leftnav">
	  <?php get_sidebar(); ?>
    </div>
	
    <div id="rightnav">
	  <?php include (TEMPLATEPATH . '/sidebar2.php'); ?>
</div>
	
    <div id="content">

		<?php if (have_posts()) : ?>

		 <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
<?php /* If this is a category archive */ if (is_category()) { ?>				
		<h4 class="pagetitle">Archivo de '<?php echo single_cat_title(); ?>' Category</h4>
		
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h4 class="pagetitle">Archivo de <?php the_time('F jS, Y'); ?></h4>
		
	 <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h4 class="pagetitle">Archivo de <?php the_time('F, Y'); ?></h4>

		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h4 class="pagetitle">Archivo de <?php the_time('Y'); ?></h4>
		
	  <?php /* If this is a search */ } elseif (is_search()) { ?>
		<h4 class="pagetitle">Resultados de la busqueda</h4>
		
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h4 class="pagetitle">Archivo del autor</h4>

		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h4 class="pagetitle">Archivo del Blog</h4>

		<?php } ?>


		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Entradas anteriores') ?></div>
			<div class="alignright"><?php previous_posts_link('Entradas siguientes &raquo;') ?></div>
		</div>

		<?php while (have_posts()) : the_post(); ?>
		<div class="post">
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>"><?php the_title(); ?></a></h3>
				<small><?php the_time('l, F jS, Y') ?></small>
				
				<div class="entry">
					<?php the_excerpt() ?>
				</div>
		
				<p class="postmetadata">Escrito en <?php the_category(', ') ?> <strong>|</strong> <?php edit_post_link('Editar','','<strong>|</strong>'); ?>  <?php comments_popup_link('No hay comentarios &#187;', '1 Comentario &#187;', '% Comentarios &#187;'); ?></p> 

			</div>
	
		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Entradas anteriores') ?></div>
			<div class="alignright"><?php previous_posts_link('Entradas siguientes &raquo;') ?></div>
		</div>
	
	<?php else : ?>

		<h4 class="center">No se ha encontrado</h4>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>
    </div>
</div>
    <?php get_footer(); ?>
	