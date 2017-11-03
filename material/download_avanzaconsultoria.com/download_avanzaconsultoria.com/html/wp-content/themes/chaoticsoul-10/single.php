<?php get_header(); ?>

	<div id="content" class="widecolumn">

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php if(function_exists('wp_print')) { print_link(); } ?>

		<div class="post" id="post-<?php the_ID(); ?>">
			<h2 class="title"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Enlace permanente: <?php the_title(); ?>"><?php the_title(); ?></a></h2>

			<div class="entrytext">
				<?php the_content('<p class="serif">Haz clic para ver la foto &raquo;</p>'); ?>
				<?php link_pages('<p><strong>Paginas:</strong> ', '</p>', 'number'); ?>
<?php if(function_exists('the_ratings')) { the_ratings(); } ?>
			</div>
		</div>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Lo siento, no hay fotografias de lo que buscas.</p>

<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
