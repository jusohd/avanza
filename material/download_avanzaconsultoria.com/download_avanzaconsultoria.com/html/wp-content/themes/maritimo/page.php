<?php get_header();?>
<div id="main">
	<div id="content">
	    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	        <div class="post" id="post-<?php the_ID(); ?>">
            <p class="date">
            <span class="month">
              <?php the_time('M') ?>
            </span>
            <span class="day">
              <?php the_time('d') ?>
            </span>
            <span class="year">
              <?php the_time('Y') ?>
            </span>
          </p>
            <h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
            <div class="meta">
				      <p>Publicado por <?php the_author_posts_link() ?> <?php edit_post_link(); ?></p>
			      </div>
			      <div class="entry">
              <?php the_content(__('Leer mas … &#187;')); ?>
              <?php wp_link_pages(); ?>
              <?php $sub_pages = wp_list_pages( 'sort_column=menu_order&depth=1&title_li=&echo=0&child_of=' . $id );?>
              <?php if ($sub_pages <> "" ){?>
              <p class="meta">Esta pagina tiene las siguientes sub-paginas.</p>
              <ul>
                <?php echo $sub_pages; ?>
              </ul>
              <?php }?>
            </div>
            <p class="comments">
              <?php comments_popup_link(__('No hay comentarios'), __('Un comentario'), __('% comentarios')); ?>
            </p>
	          <?php comments_template(); // Get wp-comments.php template ?>
	        </div>
      <?php endwhile; else: ?>
          <p><?php _e('Lo siento, no hay nada que se ajuste a lo que buscas.'); ?></p>
      <?php endif; ?>
      <p align="center"><?php posts_nav_link(' - ','&#171; Ant','Sig &#187;') ?></p>
	</div>
  <?php get_sidebar();?>
  <?php get_footer();?>