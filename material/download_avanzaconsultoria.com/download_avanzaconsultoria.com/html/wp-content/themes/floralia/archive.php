<?php get_header();?>
      <?php if (have_posts()) {?>
	<div class="post">
      <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
    
    <?php /* If this is a category archive */ if (is_category()) { ?>				
		<h2 class="pagetitle">Archivo de '<?php echo single_cat_title(); ?>' Categoria</h2>
    
    <?php /* If this is a Tag archive */ } elseif (function_exists('is_tag')&& is_tag()) { ?>
    <h2 class="pagetitle">
      Tag Archive '<?php echo single_tag_title(); ?>'
    </h2>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="pagetitle">Archivo de <?php the_time('F jS, Y'); ?></h2>
		
	 <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="pagetitle">Archivo de <?php the_time('F, Y'); ?></h2>

		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="pagetitle">Archivo de <?php the_time('Y'); ?></h2>
		
		<?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="pagetitle">Archivo del autor</h2>

		<?php /* If this is a paged archive */ } elseif (is_paged()) { ?>
		<h2 class="pagetitle">Archivos del blog</h2>
		<?php }?>
		</div>
		<?php }?>
	    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	        <div class="post" id="post-<?php the_ID(); ?>">
		          <h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
              <p class="posted">
                <?php the_author_posts_link() ?> el <?php the_time('M jS Y') ?> <?php edit_post_link(__('Editar')); ?></p>
		          <div class="entry">
			            <?php the_excerpt(); ?>			            
		          </div>		
		          <p class="posted">			
                  <a href="<?php the_permalink() ?>" rel="bookmark">Leer post completo&#187;</a>
		          </p>		          
	        </div>
      <?php endwhile; else: ?>
          <p><?php _e('Lo sentimos, no se encontró nada relacionado a su busqueda.'); ?></p>
      <?php endif; ?>
      <p align="center"><?php posts_nav_link(' - ','&#171; Anterior','Siguiente &#187;') ?></p>
	</div>
  <?php get_sidebar();?>
  <?php get_footer();?>