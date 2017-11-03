<?php get_header(); ?>
<?php
	if (have_posts()) {
		while (have_posts()) {

		the_post();
		?>
		<h1>Resultados de Búsqueda</h1>
  <div class="post">
    <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
    <div class="posted">publicado por <?php the_author(); ?><?php the_time('j F, Y ') ?></div>
    <?php the_content('Leer la entrada completa'); ?>
  <div class="comments"> | <?php comments_popup_link('No hay comentarios', '1 comentario', '% comentarios'); ?></div></div><br clear="all" /><?php
	}
	?>
  <div class="navigation">
   <div style="float:left"><?php next_posts_link('&laquo; Entradas anteriores') ?></div>
   <div style="float:right"><?php previous_posts_link('Entradas siguientes &raquo;') ?></div>
  </div><?php

} else {
	?>
  <div class="post">
    <h1><a href="/">No encontrado</a></h1>
   <p>Lo siento, lo que buscas no está aquí.</p>
  </div><?php

}
?>
<?php get_footer(); ?>