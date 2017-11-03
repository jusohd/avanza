<?php get_header(); ?>
<?php
if (have_posts()) {
	$post = $posts[0];
	if (is_category()) {
		?><h1>Archivo de la categoría'<?php echo single_cat_title(); ?>'</h1><?php
	}
	elseif (is_day()) {
		?><h1>Archive del <?php the_time('j F, Y'); ?></h1><?php
	}
	elseif (is_month()) {
		?><h1>Archivo de mes<?php the_time('F, Y'); ?></h1><?php
	}
	elseif (is_year()) {
		?><h1>Archive del año <?php the_time('Y'); ?></h1><?php
	}
	elseif (is_search()) {
		?><h1>Resultados de busqueda</h1><?php
	}
	elseif (is_author()) {
		?><h1>Archivo del autor:</h1><?php
	}
	elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
		?><h1>Archivo del blog</h1><?php
	}
	?><br clear="all" /><?php
	while (have_posts()) {
		the_post();
		?>
  <div class="post">
    <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
    <div class="posted">publicado por<?php the_author(); ?><?php the_time('j, Y ') ?></div>
    <?php the_content('Leer el resto de esta entrada'); ?>
  <div class="comments"> | <?php comments_popup_link('Sin comentarios', '1 Comentario', '% Comentarios'); ?></div></div><br clear="all" /><?php
	}
	?>
<?php
 	
} else {
	?>
  <div class="post">
    <h1><a href="/">No se encuentra</a></h1>
   <p>Lo sentimos, la pagina que busca no se encuentra.</p>
  </div><?php
}
?>
<?php get_footer(); ?>