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
	
		<div class="navigation">
			<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
			<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
		</div>
	
		<div class="post" id="post-<?php the_ID(); ?>">
			<h3><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Enlace permanente: <?php the_title(); ?>"><?php the_title(); ?></a></h3>
	
			<div class="entrytext">
				<?php the_content('<p class="serif">Leer mas … &raquo;</p>'); ?>
	
				<?php link_pages('<p><strong>Paginas:</strong> ', '</p>', 'number'); ?>
	
				<p class="postmetadata alt">
					<small>
						Esta entrada se envio el <?php the_time('l, F jS, Y') ?> a las <?php the_time() ?>
						y está archivada en <?php the_category(', ') ?>.
						Puedes seguir los comentarios en el <?php comments_rss_link('RSS 2.0'); ?> feed. 
						
						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
							Puedes <a href="#respond">escribir un comentario </a>, o <a href="<?php trackback_url(true); ?>" rel="trackback">trackback</a> desde tu propia web.
						
						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
							En este momento estan cerrados los comentarios, pero puedes <a href="<?php trackback_url(true); ?> " rel="trackback">trackback</a> desde tu propia web.
						
						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
							Puedes escribir un comentario. Los Pings no estan permitidos.
			
						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
							No estan permitidos ni pings ni comentarios.			
						
						<?php } edit_post_link('Editar esta entrada.','',''); ?>
						
					</small>
				</p>
	
			</div>
		</div>
		
	<?php comments_template(); ?>
	
	<?php endwhile; else: ?>
	
		<p>Lo siento, no hay posts que se ajusten a tu busqueda.</p>
	
<?php endif; ?>
	
    </div>
	
    
	
  </div>

<?php get_footer(); ?>