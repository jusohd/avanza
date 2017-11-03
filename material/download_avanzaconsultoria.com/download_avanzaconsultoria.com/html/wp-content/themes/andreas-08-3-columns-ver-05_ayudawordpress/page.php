<?php get_header(); ?>

<div id="content">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>"><?php the_title(); ?></a> <a href="http://translate.google.com/translate?u=<?php the_permalink() ?>&langpair=it%7Cen&hl=en&ie=UTF-8&oe=UTF-8&prev=%2Flanguage_tools" title="Traduccion de Ingles On-line"><img alt="Traduccion de Ingles On-line" src="http://www.italiasw.com/img/pages/translate/inglese.gif"/></a> <a href="http://babelfish.altavista.com/babelfish/trurl_pagecontent?lp=it_fr&trurl=<?php the_permalink() ?>%2f" title="Traduccion de Frances On-line"><img alt="Traduccion de Frances On-line" src="http://www.italiasw.com/img/pages/translate/francese.gif"/></a> <?php edit_post_link('<img src="'.get_bloginfo(template_directory).'/images/pencil.png" alt="Editar enlace" title="Edit"/>','<span class="editlink">','</span>'); ?></h2>
	
<p><?php the_content('<p class="serif">Lea el resto de esta página &raquo;</p>'); ?></p>
<p><?php link_pages('<p><strong>Pagina:</strong> ', '</p>', 'number'); ?></p>
<?php endwhile; endif; ?></div>
<?php include (TEMPLATEPATH . '/sidebar.php'); ?>
<?php get_footer(); ?>