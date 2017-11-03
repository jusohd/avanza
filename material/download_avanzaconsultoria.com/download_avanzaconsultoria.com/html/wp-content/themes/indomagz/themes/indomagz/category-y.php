
<?php get_header(); ?>

  <div id="content">

	<?php if (function_exists('breadcrumb_nav_xt_display')) {	breadcrumb_nav_xt_display();} ?>

	<?php if (have_posts()) : ?>

		<div class="post">

		<h2><?php single_cat_title(); ?></h2>

		<?php while (have_posts()) : the_post(); $loopcounter++; ?>

			<?php if ($loopcounter == 1) { ?> <div class="post-thumbpic alignleft"> <?php } ?>
			<?php if ($loopcounter == 2) { ?> <div class="post-thumbpic alignright"> <?php } ?>
			
			<?php global $post; ?>
			<?php $image = get_post_meta($post->ID, 'thumbpic', true); ?>
			<?php if($image) : ?>
				<a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>">
				<img src="<?php echo $image; ?>" alt="<?php the_title(); ?>" />
				</a>
			<?php else : ?>
				<a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/images/thumbpic.jpg" alt="<?php the_title(); ?>" />
				</a>
			<?php endif; ?>
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>" class="title"><?php the_title(); ?></a></h2>
			</div>

			<?php if ($loopcounter == 2) { $loopcounter =0; ?> <hr class="clear" /> <?php } ?>

		<?php endwhile; ?>

		<?php if ($loopcounter == 1) { ?> <hr class="clear" /> <?php } ?>

		</div>

		<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/ads468x60.jpg" title="Anúncitate aquí" alt="Anúnciate aquí" /></a>

		<div class="navigation">
		<?php if(function_exists('wp_pagenavi')) : wp_pagenavi(); else : ?>
		<div class="previous-entries"><?php next_posts_link('&laquo; Entradas anteriores') ?></div>
		<div class="next-entries"><?php previous_posts_link('Entradas siguientes &raquo;') ?></div>
		<hr class="clear"/>
		<?php endif; ?>
		</div>

	<?php else : ?>

		<div class="post">
		<h2 class="center">No se ha encontrado</h2>
		<p class="center">Lo siento, lo que buscas no está aquí.</p>
		</div>

	<?php endif; ?>

  </div><!--/content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
