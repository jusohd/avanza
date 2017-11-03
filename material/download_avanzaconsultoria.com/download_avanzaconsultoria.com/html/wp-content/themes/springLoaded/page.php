<?php get_header() ?>

<div id="content">

<?php if (have_posts()) : ?>

	<?php while (have_posts()) : the_post(); ?>

		<div class="post" id="post-<?php the_ID(); ?>">
			<p class="post-date">
				<span class="date-day"><?php the_time('j') ?></span>
				<span class="date-month"><?php the_time('M') ?></span>
			</p>
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Link permanente <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<p class="metadata">Posteado por <?php the_author() ?>.<?php edit_post_link('Editar', ' | ', ''); ?></p>
			<div class="entry">
				<?php the_content('Seguir leyendo'); ?>
				
				<?php wp_link_pages(array('before' => '<p><strong>Paginas:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			</div>
		</div>

	<?php endwhile; endif; ?>

</div><!-- /content -->

</div><!-- /main -->

<?php get_sidebar() ?>

<?php get_footer() ?>