<?php get_header(); ?>
<div id="content">
	<!--the loop-->
	<?php if (have_posts()) : ?>

	<h1 class="btmspace">
	<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	<?php /* If this is a category archive */ if (is_category()) { ?>				
	<?php echo single_cat_title(); ?>
	
	<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
	Archivo de <?php the_time('j F, Y'); ?>
		
	<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
	Archivo de <?php the_time('F, Y'); ?>

	<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
	Archivo de <?php the_time('Y'); ?>
		
	<?php /* If this is a search */ } elseif (is_search()) { ?>
	Resultados de Búsqueda
		
	<?php /* If this is an author archive */ } elseif (is_author()) { ?>
	Archivo del Autor

	<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
	Archivo del Blog

	<!--do not delete-->
	<?php } ?>
	</h1>
		
	<!--loop article begin-->
	<?php while (have_posts()) : the_post(); ?>
	<!--post title as a link-->
	<div class="comm"><span><?php comments_popup_link('0', '1', '%'); ?></span></div>
	
	<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>"><?php the_title(); ?></a></h3>
				
	<!--Post Meta-->
	<div class="post-meta-top">
	<div class="auth"><span>Publicado por <strong><?php the_author_posts_link(); ?></strong></span></div>
	<div class="date"><span><?php the_time('j F, Y'); ?></span></div>
 	</div>
	<div class="clearboth"></div>
	<!--optional excerpt or automatic excerpt of the post-->
	<?php the_excerpt(); ?>

	<!--Post Meta-->
	<hr />		
       <!--one post end-->
	<?php endwhile; ?>

    <!-- Previous/Next page navigation -->
    <div class="page-nav">
	    <div class="nav-previous"><?php previous_posts_link('Página anterior') ?></div>
	    <div class="nav-next"><?php next_posts_link('Página siguiente') ?></div>
    </div>
	
	<!-- do not delete-->
	<?php else : ?>

	No Encontrado

	<!--do not delete-->
	<?php endif; ?>
		
	
<!--archive.php end-->

</div>
<!--include sidebar-->
<?php get_sidebar();?>
<!--include footer-->
<?php get_footer(); ?>