<?php get_header(); ?>

<div id="content">
	<!--index.php-->

	<?php if (have_posts()) : while (have_posts()) : the_post(); // the loop ?>
	
<div class="postwrap">
    <div class="post ">
	<!--post title as a link-->
	<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Link permanente <?php the_title(); ?>"><?php the_title(); ?></a></h3>

	<!--post text with the read more link ... sorta-->
	<?php the_content('', 'FALSE', ''); ?>
    <?php if(strstr($post->post_content,'<!--more')) { //if the story has the more tag... ?>
    <p class="post-more"><a href="<?php the_permalink(); ?>">Seguir leyendo &raquo;</a></p>
    <?php } ?>
    
    </div>

    <!--post meta info-->
	<div class="meta clearboth">
    <ul>
        <li class="meta-author"><strong>Por: </strong><?php the_author_link(); ?></li> <!-- The author's name as a link to his archive -->
        <li class="meta-date"><strong>Posteado el: </strong><?php the_time('j.m.Y') ?></li><!-- the timestamp -->
        <li class="meta-comments"><strong>Comentarios: </strong><?php comments_popup_link('Sin comentarios', '1 Comentario', '% Comentarios'); ?></li> <!-- comment number as link to post comments -->
        <li class="meta-category"><strong>Categorias: </strong><?php the_category(', ') ?></li> <!-- list of categories, seperated by commas, linked to corresponding category archives -->
    </ul>
    </div>
</div>
	
	<?php endwhile; // end of one post ?>

    <!-- Previous/Next page navigation -->
    <div class="page-nav">
	    <div class="nav-previous"><?php previous_posts_link('&larr; Pagina previa') ?></div>
	    <div class="nav-next"><?php next_posts_link('Pagina siguiente &rarr;') ?></div>
    </div>    

	<?php else : // do not delete ?>

	<h3>No se encuentra</h3>
    <p>Lo sentimos, pero la pagina que busca no se encuentra.</p>
	<?php endif; // do not delete ?>
	

<!--index.php end-->
</div>

<!--include sidebar-->
<?php get_sidebar(); ?>

<!--include footer-->
<?php get_footer(); ?>

