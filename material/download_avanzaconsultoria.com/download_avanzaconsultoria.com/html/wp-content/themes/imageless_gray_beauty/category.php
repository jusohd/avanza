<?php get_header(); ?>
<!--content start-->
<div id="content_wrapper">
<div id="content">
  <!--loop-->
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <!--posts start-->
  <div class="posts">
  <div class="author_date"><b>Publicado por <?php the_author(); ?></b> | <?php the_time('j F Y'); ?> </div>
  <div class="padding10">
    <!--post title-->
    <h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>">
      <?php the_title(); ?>
      </a></h2>
	  <!--post text with the read more link-->
    <?php the_content('Leer el resto de esta entrada &raquo;'); ?>
 </div>
 </div>
  <!--posts end-->
  <!--do not delete-->
  <?php endwhile;?> 
  <div class="prev_next">
    <?php next_posts_link('&laquo; Entradas anteriores') ?>
    <?php previous_posts_link('Entradas siguientes &raquo;') ?>
  </div>
  <?php else: ?>
  Lo siento, no hay entradas que se ajusten a lo que buscas.
  <!--do not delete-->
  <?php endif; ?>
</div>
<!--content end-->
<!--include sidebar-->
<?php include(TEMPLATEPATH."/r_sidebar.php");?>
<!--include footer-->
</div>
<?php get_footer(); ?>
