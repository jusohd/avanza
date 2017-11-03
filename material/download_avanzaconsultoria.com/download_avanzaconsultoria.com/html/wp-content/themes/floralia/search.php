<?php get_header();?>
    <?php if (have_posts()) { ?>
    <div class="post">
      <h2>
        Resultados de busqueda para"<?php echo $s; ?>"
      </h2>
    </div>
    <?php }?>
	    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	        <div class="post" id="post-<?php the_ID(); ?>">
		          <h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
              <p class="posted">
                <?php the_author_posts_link() ?> el <?php the_time('M jS Y') ?> <?php edit_post_link(__('Editar')); ?></p>
		          <div class="entry">
			            <?php the_content(__('Seguir leyendo &#187;')); ?>
			            <?php wp_link_pages(); ?>
		          </div>		
		          <p class="posted">			
                  Filed in <?php the_category(',') ?> | <?php comments_popup_link(__('No hay respuestas'), __('Una respuesta'), __('% respuestas')); ?>
		          </p>		          
	        </div>
      <?php endwhile; else: ?>
          <div class="post">
            <h2>No hay resultados para "<?php echo $s; ?>"</h2>
          </div>
      <?php endif; ?>
      <p align="center"><?php posts_nav_link(' - ','&#171; Anteriores','Siguientes &#187;') ?></p>
	</div>
  <?php get_sidebar();?>
  <?php get_footer();?>