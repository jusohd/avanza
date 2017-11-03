<?php get_header(); ?>

<div class="col1 fl">
			
	<?php if (have_posts()) : ?>
	
		 <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
			
			<?php /* If this is a category archive */ if (is_category()) { ?>
			<h2 class="pagetitle">Archivo: <?php echo single_cat_title(); ?></h2>

			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
			<h2 class="pagetitle">Archivo:<?php the_time('F jS Y'); ?></h2>
	
			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<h2 class="pagetitle">Archivo: <?php the_time('F Y'); ?></h2>
	
			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<h2 class="pagetitle">Archivo: <?php the_time('Y'); ?></h2>
	
			<?php /* If this is a search */ } elseif (is_search()) { ?>
			<h2 class="pagetitle">Resultados de busqueda</h2>
	
			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
			<h2 class="pagetitle">Archivo del autor</h2>
	
			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<h2 class="pagetitle">Archivos del blog</h2>
	
			<?php } ?>	
		
		<?php while (have_posts()) : the_post(); ?>	
		
		<div class="post" id="post-<?php the_ID(); ?>">
			
			<h2><a title="Link permanente a<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			
			<div class="postmetadata">
				<span class="meta-cal">Posteado el: <?php the_time('d F Y'); ?></span> <span class="meta-comm"><?php comments_popup_link('(0)ommentarios', '1 comentario', '(%) Commentarios'); ?></span><br />
				<span class="meta-tag">Tags: <?php the_category(', ') ?></span>
			</div><!--/postmetadata-->
			
			<div class="entry">
				<?php the_content(); ?>
			</div><!--/entry-->
		
		</div><!--/post -->

		<?php endwhile; ?>
		
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
		</div>				
		
	<?php endif; ?>		
				
</div><!--/col1-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>