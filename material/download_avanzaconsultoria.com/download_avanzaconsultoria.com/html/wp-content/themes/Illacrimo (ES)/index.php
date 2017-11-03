<?php get_header(); ?>
<!-- Container -->
<div class="CON">

<!-- Start SC -->
<div class="SC">

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<div class="Post" id="post-<?php the_ID(); ?>" style="padding-bottom: 40px;">

<div class="PostHead">
<h1><a title="Enlace permanente a <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
<small class="PostAuthor">Autor: <?php the_author() ?> <?php edit_post_link('Editar'); ?></small>
<p class="PostDate">
<small class="day"><?php the_time('j') ?></small>
<small class="month"><?php the_time('M') ?></small>
<small class="year"><? // php the_time('Y') ?></small>
</p>
</div>
  
<div class="PostContent">
<?php the_content('Leer la entrada completa &raquo;'); ?>
</div>
<div class="PostDet">
 <li class="PostCom"><?php comments_popup_link('Ning&uacute;n comentario', '1 Comentario', '% Comentarios'); ?></li>
 <li class="PostCateg">Guardado en: <?php the_category(', ') ?></li>
 <div><li class="PostCateg">Tags: <?php the_tags(', ') ?></li></div>
</div>
</div>

<!--<?php trackback_rdf(); ?>-->
<div class="clearer"></div>
<?php endwhile; ?>
  
<div class="Nav"><?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?></div>

<?php else : ?>
<h2><?php _e('No encontrado'); ?></h2>
<p><?php _e('Lo siento, no se ha encontrado la p&aacute;gina que buscas.'); ?></p>
<?php endif; ?>
</div> 
<!-- End SC -->

<?php get_sidebar(); ?>
<?php trackTheme("illacrimo");  ?>

<!-- Container -->
</div>

<?php get_footer(); ?>
