<?php get_header(); ?>

  <div id="content">

  	<div class="home">

		<div class="home-featured">
	    <?php $cat_featured=1; ?>
	    <?php $num_featured=1; ?>
	    <?php query_posts('showposts='.$num_featured.'&cat='.$cat_featured); ?>
		<?php if (have_posts()) : ?>
		<h3><?php wp_list_categories('include='.$cat_featured.'&title_li=&style=none'); ?></h3>
		<?php while (have_posts()) : the_post(); ?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>" class="title"><?php the_title(); ?></a></h2>
		<?php the_content('Sigue leyendo &raquo;'); ?>
		<hr class="clear" />
		<?php endwhile; ?>
		<?php endif; ?>
		</div>

		<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/ads468x60.jpg" title="Anúnciate aquí" alt="Anúnciate aquí" /></a>

		<div class="home-left">
			<?php $cat_left=1; ?>
			<?php $num_left=1; ?>
			<?php $latest_left=5; ?>
			<?php query_posts('showposts='.$num_left.'&cat='.$cat_left); ?>
			<?php if (have_posts()) : ?>
			<h3><?php wp_list_categories('include='.$cat_left.'&title_li=&style=none'); ?></h3>
			<?php while (have_posts()) : the_post(); ?>
			<div class="post-thumbpic">
			<?php global $post; ?>
			<?php $image = get_post_meta($post->ID, 'thumbpic', true); ?>
			<?php if($image) : ?>
				<a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>">
				<img src="<?php echo $image; ?>" alt="<?php the_title(); ?>" />
				</a>
			<?php else : ?>
				<a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/images/thumbpic-left.jpg" alt="<?php the_title(); ?>" />
				</a>
			<?php endif; ?>
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>" class="title"><?php the_title(); ?></a></h2>
			</div>
			<?php endwhile; ?>
			<?php endif; ?>
			<?php query_posts('showposts='.$latest_left.'&cat='.$cat_left.'&offset=1'); ?>
			<?php if (have_posts()) : ?>
			<h3>LO ÚLTIMO <?php wp_list_categories('include='.$cat_left.'&title_li=&style=none'); ?></h3>
			<ul>
			<?php while (have_posts()) : the_post(); ?>
			<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>" class="title"><?php the_title(); ?></a></li>
			<?php endwhile; ?>
			</ul>
			<?php endif; ?>
		</div>

		<div class="home-right">
			<?php $cat_right=1; ?>
			<?php $num_right=1; ?>
			<?php $latest_right=5; ?>
			<?php query_posts('showposts='.$num_right.'&cat='.$cat_right); ?>
			<?php if (have_posts()) : ?>
			<h3><?php wp_list_categories('include='.$cat_right.'&title_li=&style=none'); ?></h3>
			<?php while (have_posts()) : the_post(); ?>
			<div class="post-thumbpic">
			<?php global $post; ?>
			<?php $image = get_post_meta($post->ID, 'thumbpic', true); ?>
			<?php if($image) : ?>
				<a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>">
				<img src="<?php echo $image; ?>" alt="<?php the_title(); ?>" />
				</a>
			<?php else : ?>
				<a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanete a <?php the_title(); ?>">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/images/thumbpic-right.jpg" alt="<?php the_title(); ?>" />
				</a>
			<?php endif; ?>
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>" class="title"><?php the_title(); ?></a></h2>
			</div>
			<?php endwhile; ?>
			<?php endif; ?>
			<?php query_posts('showposts='.$latest_right.'&cat='.$cat_right.'&offset=1'); ?>
			<?php if (have_posts()) : ?>
			<h3>LO ÚLTIMO <?php wp_list_categories('include='.$cat_right.'&title_li=&style=none'); ?></h3>
			<ul>
			<?php while (have_posts()) : the_post(); ?>
			<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>" class="title"><?php the_title(); ?></a></li>
			<?php endwhile; ?>
			</ul>
			<?php endif; ?>
		</div>
		<hr class="clear" />

		<?php $cat_gallery=1; ?>
		<?php $num_gallery=3; ?>
		<?php query_posts('showposts='.$num_gallery.'&cat='.$cat_gallery); ?>
		<?php if (have_posts()) : ?>
		<h3><?php wp_list_categories('include='.$cat_gallery.'&title_li=&style=none'); ?></h3>
		<?php while (have_posts()) : the_post(); $loopcounter++; ?>
			<?php if ($loopcounter == 1 || $loopcounter == 2) { ?> <div class="post-thumb alignleft"> <?php } ?>
			<?php if ($loopcounter == 3) { ?> <div class="post-thumbr alignright"> <?php } ?>
			<?php global $post; ?>
			<?php $image = get_post_meta($post->ID, 'thumb', true); ?>
			<?php if($image) : ?>
				<a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>">
				<img src="<?php echo $image; ?>" alt="<?php the_title(); ?>" />
				</a>
			<?php else : ?>
				<a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/images/thumb.jpg" alt="<?php the_title(); ?>" />
				</a>
			<?php endif; ?>
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>" class="title"><?php the_title(); ?></a></h2>
			</div>
			<?php if ($loopcounter == 3) { $loopcounter =0; ?> <hr class="clear" /> <?php } ?>
		<?php endwhile; ?>
		<?php if ($loopcounter == 1 || $loopcounter == 2) { ?> <hr class="clear" /> <?php } ?>
		<?php endif; ?>

  	</div>

  </div><!--/content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
