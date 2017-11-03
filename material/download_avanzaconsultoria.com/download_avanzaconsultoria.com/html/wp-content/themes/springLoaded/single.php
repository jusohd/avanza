<?php get_header() ?>

<div id="single-content">

<?php if (have_posts()) : ?>

	<?php while (have_posts()) : the_post(); ?>

		<div class="post" id="post-<?php the_ID(); ?>">
			<p class="post-date">
				<span class="date-day"><?php the_time('j') ?></span>
				<span class="date-month"><?php the_time('M') ?></span>
			</p>
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<p class="metadata">Posteado por <?php the_author() ?> en <?php the_category(', '); ?>. <span class="feedback"><?php comments_popup_link('Sin comentarios', '1 Comentario', '% Comentarios'); ?></span><?php edit_post_link('Editar', ' | ', ''); ?></p>
			<div class="entry">
				<?php the_content('Seguir leyendo'); ?>
			</div>
		</div>
		
		<?php comments_template() ?>
	
	<?php endwhile; else : ?>
	<div class="post">
		<h2 class="center">Seguir leyendo</h2>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>
	</div>

<?php endif; ?>

</div><!-- /content -->

</div><!-- /main -->

<?php get_sidebar() ?>

<?php get_footer() ?>