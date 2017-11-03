<?php get_header(); ?>


<?php include(TEMPLATEPATH."/left.php");?>

<?php include(TEMPLATEPATH."/right.php");?>

<div id="content">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
				

				<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>"><?php the_title(); ?></a></h2>
	<p><b>Por <?php the_author(); ?></b> | <?php the_time('F j, Y'); ?> </p>
		<div class="postspace2">
	</div>	

					<?php the_content('Sigue leyendo … &raquo;'); ?>

		
				<p><b>Materias:</b> <?php the_category(', ') ?> | <?php edit_post_link('Editar', '', ' | '); ?>  <?php comments_popup_link('No hay comentarios &#187;', '1 Comentario &#187;', '% Comentarios &#187;'); ?></p>
	<div class="postspace">
	</div>		

		<?php endwhile; ?>
<br/>
                <?php next_posts_link('&laquo; Entradas previas') ?>
		<?php previous_posts_link('Entradas siguientes &raquo;') ?>
		

	<?php else : ?>

		No se ha encontrado
		Lo siento pero lo que buscas no esta aqui.
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>


</div>
	


<?php get_footer(); ?>
