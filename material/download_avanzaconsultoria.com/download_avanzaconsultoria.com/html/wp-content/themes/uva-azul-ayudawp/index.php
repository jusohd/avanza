<?php get_header(); ?>

<div id="content">

<?php include(TEMPLATEPATH."/l_sidebar.php");?>

<div id="contentmiddle">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="contentdate">
	<h3><?php the_time('M'); ?></h3>
	<h4><?php the_time('j'); ?></h4>
	</div>
	
<div class="contenttitle">
	<h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
	<p><?php the_time('F j, Y'); ?> | <?php comments_popup_link('Escribe un comentario', '1 Comentario', '% Comentarios'); ?></p>
	</div>
	<?php the_content(__('Leer mas …'));?>
	<!--
	<?php trackback_rdf(); ?>
	-->

	<?php endwhile; else: ?>

	<p><?php _e('Lo siento, no hay articulos sobre lo que buscas.'); ?></p><?php endif; ?><br />

	<h1>Comentarios</h1>
	<?php comments_template(); // Get wp-comments.php template ?>
	</div>
	
<?php include(TEMPLATEPATH."/r_sidebar.php");?>

</div>

<!-- The main column ends  -->

<?php get_footer(); ?>