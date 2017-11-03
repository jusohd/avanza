<?php get_header(); ?>

<div id="content">

<?php include(TEMPLATEPATH."/l_sidebar.php");?>

<div id="contentmiddle">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<h1><?php the_title(); ?></h1>
	<?php the_content(__('Leer mas …'));?>
	<!--
	<?php trackback_rdf(); ?>
	-->

	<?php endwhile; else: ?>

	<p><?php _e('Lo siento, no hay articulos sobre lo que buscas.'); ?></p><?php endif; ?>
<?php posts_nav_link(' &#8212; ', __('&laquo; Entradas anteriores'), __('Entradas siguientes &raquo;')); ?>
	</div>

	
<?php include(TEMPLATEPATH."/r_sidebar.php");?>
	
</div>

<!-- The main column ends  -->

<?php get_footer(); ?>