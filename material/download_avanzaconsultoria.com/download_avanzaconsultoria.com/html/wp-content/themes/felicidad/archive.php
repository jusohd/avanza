<?php get_header(); ?>

<?php include(TEMPLATEPATH."/left.php");?>

<?php include(TEMPLATEPATH."/right.php");?>
<div id="middlepic"></div>
<div id="content">


		<?php if (have_posts()) : ?>

		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
<?php /* If this is a category archive */ if (is_category()) { ?>				
		<h3><?php echo single_cat_title(); ?></h3>
		
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h3>Archivo de <?php the_time('F jS, Y'); ?></h3>
		
	 <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h3>Archivo de <?php the_time('F, Y'); ?></h3>

		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h3>Archivo de <?php the_time('Y'); ?></h3>
		
	  <?php /* If this is a search */ } elseif (is_search()) { ?>
		<h3>Resultados de busqueda</h3>
		
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		Archivo del autor

		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		Archivos del Blog

 
		<?php } ?>



               <?php next_posts_link('&laquo; Entradas previas') ?>
		<?php previous_posts_link('Entradas siguientes &raquo;') ?>
		


		<?php while (have_posts()) : the_post(); ?>

<div class="postspace3">
	</div>	
				<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>"><?php the_title(); ?></a></h2>

				<b><?php the_time('l, F jS, Y') ?></b>

				<?php the_excerpt(); ?>


		<?php endwhile; ?>

               <?php next_posts_link('&laquo; Entradas previas') ?>
		<?php previous_posts_link('Entradas siguientes &raquo;') ?>

	<?php else : ?>

		No encontrado
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>
		

</div>

<?php get_footer(); ?>