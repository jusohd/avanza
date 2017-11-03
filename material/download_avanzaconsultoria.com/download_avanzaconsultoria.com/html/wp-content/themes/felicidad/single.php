<?php get_header(); ?>


<?php include(TEMPLATEPATH."/left.php");?>

<?php include(TEMPLATEPATH."/right.php");?>

<div id="content">

	
		
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<br/>
<p><?php previous_post_link('&laquo; %link  |') ?>  <a href="<?php bloginfo('url'); ?>">Inicio</a>  <?php next_post_link('|  %link &raquo;') ?></p>
	

			<h2 id="post-<?php the_ID(); ?>"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Enlace permanente: <?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<p><b>Por <?php the_author(); ?></b> | <?php the_time('F j, Y'); ?></p>
<div class="postspace2">
	</div>			

			<?php the_content('<p class="serif">Leer el resto de esta entrada &raquo;</p>'); ?>
	

			<?php link_pages('<p><strong>Paginas:</strong> ', '</p>', 'number'); ?>

<p><b>Materias:</b> <?php the_category(', ') ?> | <?php edit_post_link('Editar', '', ' | '); ?>  <?php comments_popup_link('No hay comentarios &#187;', '1 Comentario &#187;', '% Comentarios &#187;'); ?></p>
				
<div class="postspace">
	</div>


	<?php comments_template(); ?>
	

	<?php endwhile; else: ?>
	
	Lo siento, no hay coincidencias con lo que buscas.


<?php endif; ?>
	

</div>



<?php get_footer(); ?>