<?php get_header(); ?>
<div id="content">

<?php previous_post_link('&laquo; %link') ?> - <?php next_post_link('%link &raquo;') ?>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
	
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>"><?php the_title(); ?></a>  <?php edit_post_link('<img src="'.get_bloginfo(template_directory).'/images/pencil.png" alt="Editar enlace" title="Editar"/>','<span class="editlink">','</span>'); ?></h2>

	<small><?php the_time('j F Y') ?></small>
<div class="entrymeta">
		<div class="postinfo">
		<span class="postedby">Autor: <?php the_author() ?></span>
		<span class="filedto">Publicado en <?php the_category(', ') ?></span>
		</div></div>

<p><?php the_content('Leer el resto de esta entrada &raquo;'); ?></p>

<br/>


<?php comments_template(); ?>
	
<?php endwhile; ?>
	
<?php else : ?>

<h2 class="center">No encontrado</h2>
<p class="center">Lo lamentamos, pero lo que estas buscando no se encuentra aquí.</p>

<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>