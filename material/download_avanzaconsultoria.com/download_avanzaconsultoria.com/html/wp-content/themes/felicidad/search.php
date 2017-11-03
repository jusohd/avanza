<?php get_header(); ?>


<?php include(TEMPLATEPATH."/left.php");?>

<?php include(TEMPLATEPATH."/right.php");?>
<div id="middlepic"></div>
<div id="content">


	<?php if (have_posts()) : ?>

		<h2>Resultados de Busqueda</h2>

		<?php next_posts_link('&laquo; Entradas previas') ?>

		<?php previous_posts_link('Entradas siguientes &raquo;') ?>
		

		<?php while (have_posts()) : the_post(); ?>

				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>"><?php the_title(); ?></a></h3>
		<br/>

                           Escrito en <?php the_category(', ') ?>

		<?php endwhile; ?>


		<?php next_posts_link('&laquo; Entradas previas') ?>

		<?php previous_posts_link('Entradas siguientes &raquo;') ?>
		

	<?php else : ?>
<br/>
		No se ha encontrado nada. Prueba otra vez

		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>
		
</div>

<?php get_footer(); ?>