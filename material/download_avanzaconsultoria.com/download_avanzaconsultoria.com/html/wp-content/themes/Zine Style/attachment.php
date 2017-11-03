<?php get_header(); ?>
	<div id="content" class="widecolumn">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="navigation">
			<div class="alignleft">&nbsp;</div>
			<div class="alignright">&nbsp;</div>
		</div>
<?php $attachment_link = get_the_attachment_link($post->ID, true, array(450, 800)); // This also populates the iconsize for the next line ?>
  <div><img src="<?php bloginfo('stylesheet_directory'); ?>/images/post_top.gif" width="498" height="5" border="0" alt="" /></div>
  <div class="post"><div class="storydate"><span class="day"><?php the_time('M') ?></span><br /><span class="month"><?php the_time('j'); ?></span><br /><?php the_time('Y'); ?></div>
  <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
			<h2><a href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment"><?php echo get_the_title($post->post_parent); ?></a> &raquo; <a href="<?php echo get_permalink() ?>" rel="bookmark" title="Enlace permanente: <?php the_title(); ?>"><?php the_title(); ?></a></h2>
			   <div class="inner">
				<p class="<?php echo $classname; ?>"><?php echo $attachment_link; ?><br /><?php echo basename($post->guid); ?></p>
				<?php the_content('<p class="serif">Leer el resto de esta entrada &raquo;</p>'); ?>
				<?php wp_link_pages(array('before' => '<p><strong>Páginas:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<p class="postmetadata alt">
					<small>
						esta entrada fue publicada						<?php /* This is commented, because it requires a little adjusting sometimes.
							Necesitas bajar el plugin y seguir las instrucciones de:							http://binarybonsai.com/archives/2004/08/17/time-since-plugin/ */
							/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?> 
						el <?php the_time('l, j F, Y') ?> a las <?php the_time() ?>
						archivo en <?php the_category(', ') ?>.
						Puedes seguir las respuestas a traves de nuestro <?php comments_rss_link('RSS 2.0'); ?> feed de comentarios. 

						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
							Puedes <a href="#respond">escribir un comentario</a>, o hacer <a href="<?php trackback_url(true); ?>" rel="trackback">trackback</a> desde tu blog.

						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
							Los comentarios están cerrados pero puedes hacer <a href="<?php trackback_url(true); ?> " rel="trackback">trackback</a> desde tu blog.

						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
							Puedes ir al final y escribir un comentario. Actualmente no está permitido hacer ping.

						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
							Tanto los comentarios como los pings están actualmente cerrados.

						<?php } edit_post_link('Editar esta entrada.','',''); ?>

					</small>
				</p>
     <div class="comment"><?php comments_popup_link(__('0 comentarios'), __('1 comentariio'), __('% comentarios')); ?></div><br clear="all" />
   </div>
  </div><br clear="all" />
	<?php comments_template(); ?>
	<?php endwhile; else: ?>
		<p>Lo siento, no hay nada que se ajuste a lo que buscas.</p>
<?php endif; ?>
	</div>
<?php get_footer(); ?>
