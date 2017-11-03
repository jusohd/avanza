<?php get_header(); ?>

  <div id="container" class="clearfix">   
  
    <div id="leftnav">
	  <?php get_sidebar(); ?>
    </div>
	
    <div id="rightnav">
	  <?php include (TEMPLATEPATH . '/sidebar2.php'); ?>
    </div>
	
    <div id="content">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		<h3><?php the_title(); ?></h3>
			<div class="entrytext">
				<?php the_content('<p class="serif">Leer mas … &raquo;</p>'); ?>
	
				<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
	
			</div>
		</div>
	  <?php endwhile; endif; ?>
	<?php edit_post_link('Editar esta entrada.', '<p>', '</p>'); ?>
    </div>
	
    
	
  </div>

<?php get_footer(); ?>