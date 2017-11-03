<?php get_header(); ?>

<div class="col1 fl">
	
	<?php $counter = 0; ?>
		
	<?php if (have_posts()) : ?>
		
		<?php while (have_posts()) : the_post(); ?>	
		
		<div class="post" id="post-<?php the_ID(); ?>">
		
			<?php $counter++; ?>
			
			<?php if ($counter == 1) { ?><div class="postimg"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/ico-hdr1.gif" alt="" class="fl"/></div><?php } ?>
			
			<h2><a title="Link permanente<?php the_title(); ?>" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			
			<div class="postmetadata">
				<span class="meta-cal">Posteado el: <?php the_time('d F Y'); ?></span> <span class="meta-comm"><?php comments_popup_link('0 Commentarios', '1 Commentarios ', '(%) Comments'); ?></span><br />
				<span class="meta-tag">Tags: <?php the_category(', ') ?></span>
			</div><!--/postmetadata-->
			
			<div class="entry">
				<?php the_content('Seguir leyendo...'); ?>
			</div><!--/entry-->
		
		</div><!--/post -->

		<?php endwhile; ?>
		
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Posts Anteriores') ?></div>
			<div class="alignright"><?php previous_posts_link('Siguientes posts &raquo;') ?></div>
		</div>				
		
	<?php endif; ?>		
				
</div><!--/col1-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>