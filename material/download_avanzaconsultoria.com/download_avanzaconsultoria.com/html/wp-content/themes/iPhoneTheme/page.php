<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="content-left">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="post" id="post-<?php the_ID(); ?>">
		<h2 class="pagetitle"><?php the_title(); ?></h2>
		<div class="entry">
			<?php the_content('<p class="serif">Leer el resto de esta página &raquo;</p>'); ?>
		</div>
	</div>
	<?php endwhile; endif; ?>
</div>
<!-- close content-left -->
<?php get_footer(); ?>

