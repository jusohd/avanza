<?php get_header();?>
	    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	        <div class="post" id="post-<?php the_ID(); ?>">
		          <h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
              <p class="posted">
                Posted by <?php the_author_posts_link() ?> el <?php the_time('l, F jS, Y') ?> <?php edit_post_link(__('Edit This')); ?></p>
		          <div class="entry">
			            <?php the_content(__('Seguir leyendo &#187;')); ?>
			            <?php wp_link_pages(); ?>
                <p class="post-tags">
                  <?php if (function_exists('the_tags')) the_tags('Tags: ', ', ', '<br/>'); ?>
                </p>
		          </div>		
		          <p class="posted">			
                  Archivado en <?php the_category(',') ?> | <?php comments_popup_link(__('No hay respuestas'), __('Una respuesta'), __('% respuestas')); ?>
		          </p>
		          <?php comments_template(); // Get wp-comments.php template ?>
	        </div>
      <?php endwhile; else: ?>
          <p><?php _e('No se encuentra lo que buscas.'); ?></p>
      <?php endif; ?>
      <p align="center"><?php posts_nav_link(' - ','&#171; Prev','Next &#187;') ?></p>
	</div>
  <?php get_sidebar();?>
  <?php get_footer();?>