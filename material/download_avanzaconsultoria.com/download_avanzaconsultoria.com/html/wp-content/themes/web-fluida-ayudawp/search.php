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

		<h2 class="pagetitle">Resultados de busqueda</h2>
		
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
		
				<p class="postmetadata">Archivado en <?php the_category(', ') ?> <strong>|</strong> <?php edit_post_link('Editar','','<strong>|</strong>'); ?>  <?php comments_popup_link('No hay comentarios &#187;', '1 Comentario &#187;', '% Comentarios &#187;'); ?></p>
			</div>
	
		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Entradas anteriores') ?></div>
			<div class="alignright"><?php previous_posts_link('Entradas siguientes &raquo;') ?></div>
		</div>
	
	<?php else : ?>

		<h2 class="center">No encontrado</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>
    </div>

</div>	
    <?php get_footer(); ?>
	