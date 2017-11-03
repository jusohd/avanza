<?php get_header(); ?>

	<div id="content" class="narrowcolumn">

	<?php if (have_posts()) : ?>

		<!-- First Post -->
  	<?php $top_query = new WP_Query('showposts=1'); ?>
  	<?php while($top_query->have_posts()) : $top_query->the_post(); $first_post = $post->ID; ?>

			<div class="post top" id="post-<?php the_ID(); ?>">
				<h2 class="first"><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<span class="postmetadata">&bull; <?php comments_popup_link('No hay criticas', '1 critica', '% criticas'); ?> <?php edit_post_link('Editar', '(', ')'); ?></span>

				<div class="entry">
					<?php the_content("<span class=\"continue\">" . __('Haz clic para ver la fotografia','') . " '" . the_title('', '', false) . "'</span>"); ?>
				</div>
			</div>

		<?php endwhile; ?>
		
		<!-- Next few posts -->
		<?php while(have_posts()) : the_post(); if(!($first_post == $post->ID)) : ?>	
		
			<div class="post lastfive" id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<span class="postmetadata">&bull; <?php comments_popup_link('No hay criticas', '1 critica', '% criticas'); ?> <?php edit_post_link('Editar', '(', ')'); ?></span>

				<div class="entry">
					<?php the_excerpt(); ?>
				</div>
			</div>

		<?php endif; endwhile; ?>

	<?php else : ?>

		<h2 class="center">No se ha encontrado</h2>
		<p class="center">Lo siento, pero buscas algo que no esta aqui.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
