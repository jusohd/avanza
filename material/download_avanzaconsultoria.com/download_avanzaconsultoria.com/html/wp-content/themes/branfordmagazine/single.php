<?php get_header(); ?>

<div id="content">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div class="post" id="post-<?php the_ID(); ?>">
    <h2>
      <?php the_title(); ?>
    </h2>
    <small>Por
    <?php the_author_posts_link('namefl'); ?>
    &bull;
    <?php the_time('j M, Y') ?>
    &bull; Sección:
    <?php the_category(', ') ?>
    </small>
    <div class="entry">
      <?php the_content('<p class="serif">Leer el resto de este artículo &raquo;</p>'); ?>
      <?php wp_link_pages(array('before' => '<p><strong>Páginas:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
    </div>
    <?php if ( function_exists('the_tags') ) {
			the_tags('<span id="tags"><strong>Etiquetado con:</strong> ', ', ', '</span>'); } ?>
  </div>
  <?php comments_template(); ?>
  <?php endwhile; else: ?>
  <p>Lo sentimos, no hay artículos sobre lo que buscas.</p>
  <?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
