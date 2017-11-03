<?php get_header();?>
<div id="main">
	<div id="content">
      <?php if(have_posts()) : ?>
        <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
        <?php /* If this is a category archive */ if (is_category()) { ?>
        <h2 class="post-title">
          Archivo de la categoria '<?php echo single_cat_title(); ?>'
        </h2>

        <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
        <h2 class="post-title">
          Archivo de <?php the_time('j F, Y'); ?>
        </h2>

        <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
        <h2 class="post-title">
          Archivo de <?php the_time('F, Y'); ?>
        </h2>

        <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
        <h2 class="post-title">
          Archivo de <?php the_time('Y'); ?>
        </h2>

        <?php /* If this is a search */ } elseif (is_search()) { ?>
        <h2 class="post-title">Resultados de busqueda</h2>

        <?php /* If this is an author archive */ } elseif (is_author()) { ?>
        <h2 class="post-title">Archivo del Autor</h2>

        <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
        <h2 class="post-title">Archivo del Blog</h2>

        <?php } ?>
      <?php endif; ?>
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
				      <p>Publicado por <?php the_author_posts_link() ?>  en <?php the_category(',') ?> <?php edit_post_link(); ?></p>
			      </div>
			      <div class="entry">
              <?php the_content(__('Leer mas … &#187;')); ?>
              <?php wp_link_pages(); ?>
      			</div>
            <p class="comments">
              <?php comments_popup_link(__('No hay comentarios'), __('Un comentario'), __('% comentarios')); ?>
            </p>	          
	        </div>
      <?php endwhile; else: ?>
          <p><?php _e('Lo siento, no hay nada que se ajuste a lo que buscas.'); ?></p>
      <?php endif; ?>
      <p align="center"><?php posts_nav_link(' - ','&#171; Ant','Sig &#187;') ?></p>
	</div>
  <?php get_sidebar();?>
  <?php get_footer();?>