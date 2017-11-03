<?php get_header(); ?>

<div class="col1 fl">
			
	<?php if (have_posts()) : ?>
	
		<h2 class="pagetitle"><?php printf(__('Resultados de búsqueda: \'%s\''), $s) ?></h2>
		
		<?php while (have_posts()) : the_post(); ?>	
		
		<div class="post" id="post-<?php the_ID(); ?>">
			
			<h2><a title="Link permanente <?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			
			<div class="postmetadata">
				<span class="meta-cal">Posteado el <?php the_time('d F Y'); ?></span> <span class="meta-comm"><?php comments_popup_link('0) Comentarios', '(1) Comentario', '(%) Commentarios'); ?></span><br />
				<span class="meta-tag">Tags: <?php the_category(', ') ?></span>
			</div><!--/postmetadata-->
			
			<div class="entry">
				<?php the_content(); ?>
			</div><!--/entry-->
		
		</div><!--/post -->

		<?php endwhile; ?>
		
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Posts anteriores') ?></div>
			<div class="alignright"><?php previous_posts_link('Siguientes posts &raquo;') ?></div>
		</div>
	
		<?php else : ?>
		
		<h2>Lo sentimos, su busqueda no dió resultados!</h2>
		
	<?php endif; ?>		
				
</div><!--/col1-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>