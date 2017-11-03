<?php get_header(); ?>

<div id="content">
    <div id="left">

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_type()  ); ?>

			<?php endwhile; ?>

			<?php get_template_part( 'navigation', 'index' ); ?>
				 
		<?php  else : ?>
	
			<?php get_template_part( 'no-results', 'index' ); ?>
	
		<?php endif; ?>

	</div><!-- #left -->
	<?php get_sidebar(); ?>
</div><!-- #content -->
<?php get_footer(); ?>