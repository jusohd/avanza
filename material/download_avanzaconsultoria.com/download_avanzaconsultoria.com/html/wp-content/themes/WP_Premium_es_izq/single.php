<?php get_header(); ?>
<div id="content">
		
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<!--post title-->
	<h1 id="post-<?php the_ID(); ?>"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Enlace permanente: <?php the_title(); ?>"><?php the_title(); ?></a></h1>
	<div class="post-meta-top">
	<div class="auth"><span>Publicado por <strong><?php the_author_posts_link(); ?></strong></span></div>
	<div class="date"><span><?php the_time('j F, Y'); ?></span></div>
	</div>
			
	<div class="clearboth"></div>		
	<!--content with more link-->
	<?php the_content('<p>Leer el resto de esta entrada &raquo;</p>'); ?>
	
	<!--post paging-->
	<?php link_pages('<p><strong>Páginas:</strong> ', '</p>', 'number'); ?>

	<!--Post Meta-->
	<div class="post-bottom clearfix">
	<?php if (function_exists('the_tags')) { ?><strong>Tags: </strong><?php the_tags('', ', ', ''); ?><br /><?php } ?>
	<div class="cat"><span><?php the_category(', ') ?></span></div>
	</div>
	
	<p><strong>Si te gustó esta entrada anímate a <a href="#comments">escribir un comentario</a> o <a href="<?php if($db_feedburner_address) { echo $db_feedburner_address; } else { bloginfo('rss2_url'); } ?>">suscribirte al feed</a> y obtener los artículos futuros en tu lector de feeds.
    </strong></p>	
		
	<!--include comments template-->
	<?php comments_template(); ?>
	
	<!--do not delete-->
	<?php endwhile; else: ?>
	
	Lo siento, no hay entradas que se ajusten a lo que buscas.

	<!--do not delete-->
	<?php endif; ?>
	
	
<!--single.php end-->
</div>

<!--include sidebar-->
<?php get_sidebar();?>
<!--include footer-->
<?php get_footer(); ?>