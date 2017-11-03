<?php get_header(); ?>

<div id="content">
    <!--page.php-->
		
	<?php if (have_posts()) : while (have_posts()) : the_post(); // the loop ?>

	<!--post title-->
	<h1 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h1>

	<!--post text with the read more link-->
	<?php the_content('<div class="post-more">Seguir leyendo &raquo;</div>'); ?>
	
	<!--for paginate posts-->
	<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
	
    <?php //comments_template(); // uncomment this if you want to include comments template ?>
	
	<?php endwhile; // end of one post ?>
	<?php else : // do not delete ?>
	
	<h3>No se encuentra</h3>
    <p>No se encuentra la pagina que esta buscando.</p>
    <?php endif; // do not delete ?>
	
	
<!--page.php end-->
</div>

<!--include sidebar-->
<?php get_sidebar(); ?>

<!--include footer-->
<?php get_footer(); ?>