<?php get_header(); ?>
<?php
if (have_posts()) {
	while (have_posts()) {

		the_post();
		?>

  <div class="post">
    <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
    <div class="posted">publicado por <?php the_author(); ?> el <?php the_time('j F, Y ') ?></div>
    <?php the_content('Leer la entrada completa'); ?>
  </div><br clear="all" />
    <div class="post">
   <?php comments_template(); ?><br clear="all" /><br />
  </div><?php
	}
	?>   
   <?php

} else {
	?>
  <div class="post">
    <h1><a href="/">No encontrado</a></h1>
   <p>Lo siento, lo que buscas no está aquí.</p>
  </div><?php
}
?>
<?php get_footer(); ?>