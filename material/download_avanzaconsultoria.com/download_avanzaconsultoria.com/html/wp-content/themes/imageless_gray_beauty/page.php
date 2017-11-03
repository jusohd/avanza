<?php get_header(); ?>

<!--page.php-->
<!--content start-->
<div id="content_wrapper">
<div id="content">
  <!--loop-->
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <!--posts start-->
  <div class="posts">
  <div class="padding10">
    <!--post title-->
    <h2 id="post-<?php the_ID(); ?>" class="page">
      <?php the_title(); ?>
    </h2>
    <div class="postspace2"> </div>
    <!--post with more link -->
    <?php the_content('<p class="serif">Leer el resto de esta página &raquo;</p>'); ?>
    <!--if you paginate pages-->
    <?php link_pages('<p><strong>Páginas:</strong> ', '</p>', 'number'); ?>
    <!--end of post and end of loop-->
    <?php endwhile; endif; ?>
    <!--edit link-->
    <?php edit_post_link('Editar esta entrada.', '<p>', '</p>'); ?>
  </div>
  <!--posts end-->
  </div>
</div>
<!--content end-->
<!--page.php end-->
<!--include sidebar-->
<?php include(TEMPLATEPATH."/r_sidebar.php");?>
<!--include footer-->
</div>
<?php get_footer(); ?>
