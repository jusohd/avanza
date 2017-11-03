<?php get_header(); ?>

<div id="content">

<div id="contentleft">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
	<p>Publicado el <?php the_time('j F Y'); ?><br />Archivado en <?php the_category(', ') ?> | <?php comments_popup_link('Salir del comentario', '1 comentario', '% comentarios'); ?></p>  
	<?php the_content(__('Leer mas'));?><div style="clear:both;"></div>
 			
	<!--
	<?php trackback_rdf(); ?>
	-->
	
	<?php endwhile; else: ?>
	
	<p><?php _e('Lo sentimos, no se han encontrado referencias a tu busqueda '); ?></p><?php endif; ?>
	<?php posts_nav_link(' &#8212; ', __('&laquo; volver'), __('sige buscando &raquo;')); ?>

	</div>
	
<?php include(TEMPLATEPATH."/l_sidebar.php");?>

<?php include(TEMPLATEPATH."/r_sidebar.php");?>

</div>

<!-- The main column ends  -->

<?php get_footer(); ?>