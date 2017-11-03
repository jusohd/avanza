<?php get_header(); ?>
<!--content start-->
<div id="content_wrapper">
<div id="content">
<!--search.php-->

        <!--loop-->
	<?php if (have_posts()) : ?>
	
		<h2>Resultados de Búsqueda</h2>
		
                <!--to create links for the previous entries or the next-->
		<?php next_posts_link('&laquo; Entradas anteriores') ?>

		<?php previous_posts_link('Entradas siguientes &raquo;') ?>
		

                <!--loop-->
		<?php while (have_posts()) : the_post(); ?>
				<div class="posts">
				<div class="author_date"><b>Publicado por <?php the_author(); ?></b> | <?php the_time('j F Y'); ?> </div>
				<div class="padding10">
			        <!--permalink of the post title-->
				<h2 id="post-<?php the_ID(); ?>" class="page"><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>"><?php the_title(); ?></a></h2>
    <?php the_content('Leer el resto de esta entrada &raquo;'); ?>				
		
			<!--show the category, edit link, comments-->
                           Archivada en <?php the_category(', ') ?>
			
	        <!--loop-->
			</div>
			</div>
		<?php endwhile; ?>

		<!--to create links for the previous entries or the next-->
		<?php next_posts_link('&laquo; Entradas anteriores') ?>

		<?php previous_posts_link('Entradas siguientes &raquo;') ?>
		
	
        <!--necessary do not delete-->
	<?php else : ?>
	<div class="posts">
		No se han encontrado entradas. ¿Quieres probar otra búsqueda?
                 <!--include searchform-->
       </div> <!--do not delete-->
	<?php endif; ?>
		
</div>
<!--content start-->
<!--search.php end-->
<!--include sidebar-->
<?php include(TEMPLATEPATH."/r_sidebar.php");?>
<!--include footer-->
</div>
<?php get_footer(); ?>