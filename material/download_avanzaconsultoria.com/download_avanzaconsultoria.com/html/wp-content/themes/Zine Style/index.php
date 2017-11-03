<?php get_header(); ?>
<div class="content-left">
<?

if (have_posts()) {
	while (have_posts()) {

		the_post();
		?>
  <div class="post">
    <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
    <div class="posted">publicado por <?php the_author(); ?> el <?php the_time('j F, Y ') ?></div>
    <?php the_content('Leer el resto de esta entrada'); ?>
  <div class="comments">  <?php comments_popup_link('No hay comentarios', '1 comentario', '% comentarios'); ?></div></div><br clear="all" /><?php

	} ?>
  <div class="navigation">
   <div style="float:left"><?php next_posts_link('&larr; Entradas anteriores') ?></div>
   <div style="float:right"><?php previous_posts_link('Entradas siguientes &rarr;') ?></div>
  </div>
</div>
<div class="content-right">
 <div>
  <h2>ULTIMA HORA</h2>
  <img src="<?php bloginfo('stylesheet_directory'); ?>/images/img.gif" align="left" />
  <h3><a href="http://ayudawordpress.com/categoria/general/">Ayuda Wordpress publica nuevos themes</a></h3>
  Lorem ipsum dolor sit amet, integer ut, ipsum justo sed amit apel veritas liberabit vos. Que pasa de honor libera.
 </div>
 <div>
  <h2>TUTORIALES</h2>
  <img src="<?php bloginfo('stylesheet_directory'); ?>/images/img.gif" align="left" />
  <h3><a href="http://ayudawordpress.com/categoria/tutoriales/">Nuevas guías de 2008</a></h3>
  Lorem ipsum dolor sit amet, integer ut, ipsum justo sed amit apel veritas liberabit vos. Que pasa de honor libera.
 </div>
 <div>
  <h2>TRUCOS</h2>
  <img src="<?php bloginfo('stylesheet_directory'); ?>/images/img.gif" align="left" />
  <h3><a href="http://ayudawordpress.com/categoria/trucos/">Aprende a configurar tu blog</a></h3>
  Lorem ipsum dolor sit amet, integer ut, ipsum justo sed amit apel veritas liberabit vos. Que pasa de honor libera.
 </div>
 <div>
  <h2>DESCARGAS</h2>
  <img src="<?php bloginfo('stylesheet_directory'); ?>/images/img.gif" align="left" />
  <h3><a href="http://ayudawordpress.com/downloads/">Cientos de descargas disponibles</a></h3>
  Lorem ipsum dolor sit amet, integer ut, ipsum justo sed amit apel veritas liberabit vos. Que pasa de honor libera.
 </div>
 <div>
  <h2>RECURSOS</h2>
  <img src="<?php bloginfo('stylesheet_directory'); ?>/images/img.gif" align="left" />
  <h3><a href="http://ayudawordpress.com/categoria/wordpressorg/">Nueva información disponible</a></h3>
  Lorem ipsum dolor sit amet, integer ut, ipsum justo sed amit apel veritas liberabit vos. Que pasa de honor libera.
 </div>
 <div>
  <h2>VIDEOS</h2>
  <img src="<?php bloginfo('stylesheet_directory'); ?>/images/img.gif" align="left" />
  <h3><a href="http://ayudawordpress.com/categoria/videos/">Como instalar Wordpress en local paso a paso</a></h3>
  Lorem ipsum dolor sit amet, integer ut, ipsum justo sed amit apel veritas liberabit vos. Que pasa de honor libera.
 </div>
</div>
<?php



} else {

	?>
  <div class="post">
    <h1><a href="/">No se ha encontrado</a></h1>
   <p>Lo siento, lo que buscas no está aquí.</p>
  </div><?php
}
?>
<?php get_footer(); ?>