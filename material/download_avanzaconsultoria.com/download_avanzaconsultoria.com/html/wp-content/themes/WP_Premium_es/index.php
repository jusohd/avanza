<?php get_header(); ?>

<div id="content">

	<?php if (have_posts()) : ?>	
	<?php while (have_posts()) : the_post(); ?>
	

	<!--comment count on right-->
	<div class="comm"><span><?php comments_popup_link('0', '1', '% '); ?></span></div>
	<!--post title link-->
	<h3 class="h1" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>"><?php the_title(); ?></a></h3>
		
	<!--Post Meta-->
	<div class="post-meta-top">
	<div class="auth"><span>Publicado por <strong><?php the_author_posts_link(); ?></strong></span></div>
	<div class="date"><span> el <strong><?php the_time('j F, Y'); ?></strong></span></div>
	
	</div>
	<div class="clearboth"></div>
	<!--read more-->
	<?php the_content('<br />Leer el resto de esta entrada &raquo;'); ?>
	
	<!--Post Meta-->
	<div class="post-bottom">
	<?php if (function_exists('the_tags')) { ?><strong>Tags: </strong><?php the_tags('', ', ', ''); ?><br /><?php } ?>
	<div class="cat"><span><?php the_category(', ') ?></span></div>
	
	<div class="clearfix"></div>
	</div>
	
	<?php endwhile; ?>

    <!-- Prev/Next page navigation -->
    <div class="page-nav">
	    <div class="nav-previous"><?php previous_posts_link('Página anterior') ?></div>
	    <div class="nav-next"><?php next_posts_link('Página siguiente') ?></div>
    </div>

	<?php else : ?>

	<h2>No encontrado</h2>
	<p>Lo siento, lo que buscas no está aquí.</p>
	<p>Si quieres encontrar algo utiliza la búsqueda de la parte superior derecha de la página.</p>

	<?php endif; ?>

</div>

<!--include sidebar-->
<?php get_sidebar(); ?>

<!--include footer-->
<?php get_footer(); ?>