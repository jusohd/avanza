<?php get_header(); ?>

		<div id="primary-content">
		  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		  <div class="entry" id="post-<?php the_ID(); ?>">
			<h2 class="center"><?php the_title(); ?></h2>
			<?php the_content(); ?>
			<?php link_pages('<p><strong>'.__('Paginas:','unnamed').'</strong> ', '</p>', 'number'); ?>
			<?php edit_post_link(__('Editar','unnamed'), '<span class="metaedit">','</span>'); ?>
			<?php if(function_exists('wp_print')) { print_link(); } ?>
		  </div>
		  <?php endwhile; endif; ?>
		</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
