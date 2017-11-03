<?php get_header(); ?>

<div id="content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); // the loop ?>	

    <div class="post ">
	<!--post title as a link-->
	<h1 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h1>

	<!--post text with the read more link-->
	<?php the_content('<div class="post-more">Read the rest of this entry &raquo;</div>'); ?>
    </div>

    <!--post meta info-->
	<div class="meta clearboth">
    <ul>
        <li class="meta-author"><strong>Por: </strong><?php the_author_link(); ?></li> <!-- The author's name as a link to his archive -->
        <li class="meta-date"><strong>Posteado el: </strong><?php the_time('j.m.Y') ?></li><!-- the timestamp -->
        <li class="meta-comments"><strong>Comentarios: </strong><a href="<?php the_permalink(); ?>#comments"><?php comments_number('Ninguno', '1 Comentario', '% Comentarios'); ?></a></li> <!-- comment number as link to post comments -->
        <li class="meta-category"><strong>Categorias: </strong><?php the_category(', ') ?></li> <!-- list of categories, seperated by commas, linked to corresponding category archives -->
    </ul>
    </div>

	<?php comments_template(); // include comments template ?>
	
	<?php endwhile; // end of one post ?>

	<?php else : // do not delete ?>

	<h3>Pagina no encontrada</h3>
    <p>No se encuentra lo que esta buscando.</p>
	<?php endif; // do not delete ?>
	
</div>

<!--include sidebar-->
<?php get_sidebar(); ?>

<!--include footer-->
<?php get_footer(); ?>

