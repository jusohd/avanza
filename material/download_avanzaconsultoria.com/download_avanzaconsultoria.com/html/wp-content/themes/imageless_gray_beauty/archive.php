<?php get_header(); ?>
<!--content start-->
<div id="content_wrapper">
<div id="content">
  <!--the loop-->
  <?php if (have_posts()) : ?>
  
    <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
    <?php /* If this is a category archive */ if (is_category()) { ?>
    <?php echo single_cat_title(); ?>
    <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
    <h2>Archivo del día
    <?php the_time('j F, Y'); ?></h2>
    <?php /* If this is a monthly archive */ } elseif (is_month()) { ?></h2>
    <h2>Archivo del mes
    <?php the_time('F, Y'); ?></h2>
    <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
    <h2>Archivo del año
    <?php the_time('Y'); ?></h2>
    <?php /* If this is a search */ } elseif (is_search()) { ?>
    <h2>Resultados de Búsqueda</h2>
    <?php /* If this is an author archive */ } elseif (is_author()) { ?>
    <h2>Archivo del Autor</h2>
    <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
      <h2>Archivo del Blog</h2>
      <!--do not delete-->
      <?php } ?>
    
    <!--loop article begin-->
    <?php while (have_posts()) : the_post(); ?>
	<div class="posts">
		<div class="author_date"><b>Publicado por <?php the_author(); ?></b> | <?php the_time('j F Y'); ?> </div>
	<div class="padding10">
    <!--post title as a link-->
    <h2 id="post-<?php the_ID(); ?>" class="page"><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>">
      <?php the_title(); ?>
      </a></h2>
    <!--post time-->
    <!--optional excerpt or automatic excerpt of the post-->
    <?php the_content(); ?>
    <!--one post end-->
    </div>
	</div>
	<?php endwhile; ?>
  
  <!-- navigation-->
  <div class="prev_next">
    <?php next_posts_link('&laquo; Entradas anteriores') ?>
    <?php previous_posts_link('Entradas siguientes &raquo;') ?>
	</div>
  <!-- do not delete-->
  <?php else : ?>
  No encontrado
  <?php include (TEMPLATEPATH . '/searchform.php'); ?>
  <!--do not delete-->
  <?php endif; ?>
  <!--archive.php end-->
</div>
<!--content end-->
<!--include sidebar-->
<?php include(TEMPLATEPATH."/r_sidebar.php");?>
<!--include footer-->
</div>
<?php get_footer(); ?>
