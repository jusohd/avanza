<?php get_header(); ?>

<div id="content">

	<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
	
	<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="PermaLink a <?php the_title(); ?>"><?php the_title(); ?></a> <?php edit_post_link('<img src="'.get_bloginfo(template_directory).'/images/pencil.png" alt="Editar enlace" />','<span class="editlink">','</span>'); ?></h2>
	<small><?php the_time('j F Y') ?></small><br/>

<p><?php the_content('Continua leyendo &raquo;'); ?></p>

		<div class="entrymeta">
		<div class="postinfo">
		<span class="postedby">Autor: <?php the_author() ?></span>
		<span class="filedto">Publicado en <?php the_category(', ') ?></span>
		</div>
		<?php comments_popup_link('Escribe un comentario &#187;', '1 Comentario &#187;', '% Comentarios &#187;', 'enlace a comentarios'); ?>
		</div>
		
		<br/>

	<?php endwhile; ?>

<p><?php posts_nav_link(' &#8212; ', __('&laquo; Pag. anterior'), __('Pag. siguiente &raquo;')); ?></p>

	
	<?php else : ?>

	<h2 class="center">No encontrado</h2>
	<p class="center"><?php _e("Cuidado, estas intentando abrir una pagina que no existe."); ?></p>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
