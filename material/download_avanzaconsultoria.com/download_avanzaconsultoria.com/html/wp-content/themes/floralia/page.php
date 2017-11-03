<?php get_header();?>
	    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	        <div class="post" id="post-<?php the_ID(); ?>">
		          <h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
              <p class="posted"><?php the_author() ?> el <?php the_time('M jS Y') ?> <?php edit_post_link(__('Editar')); ?></p>
		          <div class="entry">
			            <?php the_content(__('Seguir leyendo&#187;')); ?>
			            <?php wp_link_pages(); ?>
                  <?php $sub_pages = wp_list_pages( 'sort_column=menu_order&depth=1&title_li=&echo=0&child_of=' . $id );?>
			            <?php if ($sub_pages <> "" ){?>
				            <p>Esta pagina tiene las siguientes sub-paginas.</p>
				            <ul><?php echo $sub_pages; ?></ul>
			            <?php }?>					
		          </div>
		          <?php comments_template(); // Get wp-comments.php template ?>
		          
	        </div>
      <?php endwhile; else: ?>
          <p><?php _e('No se encuentra lo que buscas.'); ?></p>
      <?php endif; ?>
      <p align="center"><?php posts_nav_link(' - ','&#171; Anteriores','Siguientes &#187;') ?></p>
	</div>
  <?php get_sidebar();?>
  <?php get_footer();?>