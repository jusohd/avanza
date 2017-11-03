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
		
		<?php while (have_posts()) : the_post(); ?>
				
			<div class="post" id="post-<?php the_ID(); ?>">
				<div style="float: right; padding: 6px; border: 1px dotted #999999; text-align:center;"><?php the_time('d') ?>
				<br /><strong><?php the_time('M') ?></strong> </div><h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>"><?php the_title(); ?></a></h3>
				
				
				<div class="entry">
					<?php the_content('Leer mas … &raquo;'); ?>
				</div>
		
				<p class="postmetadata">Archivado en <?php the_category(', ') ?> <strong>|</strong> <?php edit_post_link(' Editar ','','<strong>|</strong>'); ?>  <?php comments_popup_link('No hay comentarios &#187;', '1 Comentario &#187;', '% Comentarios &#187;'); ?> Enviado por: <?php the_author() ?></p>
			</div>
	
		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Entradas anteriores') ?></div>
			<div class="alignright"><?php previous_posts_link('Entradas siguientes &raquo;') ?></div>
		</div>
		
	<?php else : ?>

		<h2 class="center">No encontrado</h2>
		<p class="center">Lo siento, pero estas buscando algo que no esta aqui.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>
    </div>

</div>

<?php get_footer(); ?>

