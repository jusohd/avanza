<?php get_header(); ?>

<!--content start-->
<div id="content_wrapper">
<div id="content">
  <!--single.php-->
  <!--loop-->
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <!--posts start--> 
  <div class="posts">
  <div class="author_date"><b>Publicado por <?php the_author(); ?></b> | <?php the_time('j F Y'); ?> </div>
    <!--post title-->
	<div class="padding10">
    <h2 id="post-<?php the_ID(); ?>"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Enlace permanente: <?php the_title(); ?>"><?php the_title(); ?></a></h2>
    <!--content with more link-->
    <?php the_content('<p class="serif">Leer el resto de esta entrada &raquo;</p>'); ?>
    <!--for paginate posts-->
    <?php link_pages('<p><strong>Páginas:</strong> ', '</p>', 'number'); ?>
	</div>
    <div class="topic_comment"><b>Archivado en:</b>
      <?php the_category(', ') ?>
      |
      <?php edit_post_link('Editar', '', ' | '); ?>
      <?php similar_posts(); ?>
      <?php comments_popup_link('No hay comentarios &#187;', '1 comentario &#187;', '% comentarios &#187;'); ?>
    </div>
  </div>
  <!--posts end-->
  <!--include comments template-->
  <!--comments start-->
  <div class="posts">
  <div class="padding10">
    <?php comments_template(); ?>
  </div>
  <!--comments end-->
  <!--navigation-->
  <div class="prev">
    <?php previous_post_link('&laquo; %link') ?>
  </div>
  <div class="next">
    <?php next_post_link('%link &raquo;') ?>
  </div>
  </div>
  <!--do not delete-->
  <?php endwhile; else: ?>
  <div class="posts">
  <div class="padding10">
  Lo siento, no hay entradas que coincidan con lo que buscas.
  </div>
  </div>
  <!--do not delete-->
  <?php endif; ?>
</div>
<!--content end-->
<!--single.php end-->
<!--include sidebar-->
<?php include(TEMPLATEPATH."/r_sidebar.php");?>
<!--include footer-->
</div>
<?php get_footer(); ?>
