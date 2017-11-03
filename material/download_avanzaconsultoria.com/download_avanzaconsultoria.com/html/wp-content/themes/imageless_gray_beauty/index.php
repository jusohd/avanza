<?php get_header(); ?>
<div id="content_wrapper">
<div id="content">
  <!--content start-->
  <!--the loop-->
  <?php if (have_posts()) : ?>
  <!--the loop-->
  <?php while (have_posts()) : the_post(); ?>
  
  <div class="posts">
    <!--posts start-->
	<div class="author_date"><b>Publicado por <?php the_author(); ?></b> | <?php the_time('j F Y'); ?> </div>
    <!--post title as a link-->
	<div class="padding10">
    <h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>">
      <?php the_title(); ?>
      </a></h2>
    
    <!--post text with the read more link-->
    <?php the_content('Leer el resto de esta entrada &raquo;'); ?>
    <!--show categories, edit link ,comments-->
	</div>
    <div class="topic_comment"><b>Archivado en:</b>
      <?php the_category(', ') ?>
      |
      <?php edit_post_link('Editar', '', ' | '); ?>
      <?php comments_popup_link('No hay comentarios &#187;', '1 comentario &#187;', '% comentarios &#187;'); ?>
    </div>
  </div>
  <!--post end-->
  <?php endwhile; ?>
  <!--prev_next links start-->
  <div class="prev_next">
  <?php next_posts_link('&laquo; Entradas anteriores') ?>
    <?php previous_posts_link('Entradas siguientes &raquo;') ?>
  </div>
  <!--prev_next links end-->
  <!--do not delete-->
  <?php else : ?>
  No Encontrado
  Lo siento, lo que buscas no está aquí.
  <?php include (TEMPLATEPATH . "/searchform.php"); ?>
  <!--do not delete-->
  <?php endif; ?>
</div>
<!--content end-->
<!--include sidebar-->
<?php include(TEMPLATEPATH."/r_sidebar.php");?>
<!--include footer-->
</div>
<?php get_footer(); ?>
