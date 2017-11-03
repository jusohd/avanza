<?php 
	get_header();

	$tag_pagetitle = get_option('mandigo_tag_pagetitle'       );
?>
	<td id="content" class="<?php echo ($alwayssidebars ? 'narrow' : 'wide'); ?>column">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<?php $attachment_link = get_the_attachment_link($post->ID, true, array(450, 800)); // This also populates the iconsize for the next line ?>
	<?php $_post = &get_post($post->ID); $classname = ($_post->iconsize[0] <= 128 ? 'small' : '') . 'attachment'; // This lets us style narrow icons specially ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<<?php echo $tag_pagetitle; ?> class="pagetitle"><a href="<?php echo get_permalink($post->post_parent); ?>" rel="attachment"><?php echo get_the_title($post->post_parent); ?></a> &raquo; <a href="<?php echo get_permalink() ?>" rel="bookmark" title="Enlace permanente: <?php the_title(); ?>"><?php the_title(); ?></a></<?php echo $tag_pagetitle; ?>>
			<div class="entry">
				<p class="<?php echo $classname; ?>"><?php echo $attachment_link; ?><br /><?php echo basename($post->guid); ?></p>

				<?php the_content('<p class="serif">'. __('Leer el resto de esta entrada','mandigo') .' &raquo;</p>'); ?>

				<?php link_pages('<p><strong>'. __('Páginas','mandigo') .':</strong> ', '</p>', 'number'); ?>

				<p class="postmetadata alt">
					<small>
						<?php printf(__('Esta entrada se publicó el %s a las %s y está archivada en %s.','mandigo'),get_the_time(__('l, j F, Y','mandigo')),get_the_time(),get_the_category_list(', ')); ?>
						<?php printf(__('Puedes seguir los comentarios a esta entrada en el  %s feed.','mandigo'),'<a href="'. comments_rss() .'">RSS 2.0</a>'); ?>

						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) { ?>
							<?php printf(__('Pudes <a href="#respond">escribir un comentario</a>, o hacer <a href="%s" rel="trackback">trackback</a> desde tu blog.','mandigo'),trackback_url(false)); ?>

						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) { ?>
							<?php printf(__('Los comentarios están cerrados pero puedes hacer <a href="%s" rel="trackback">trackback</a> desde tu blog.','mandigo'),trackback_url(false)); ?>

						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) { ?>
							<?php _e('Puedes <a href="#respond">ir al final</a> y escribir un comentario. Los pings están inhabilitados.','mandigo'); ?>

						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) { ?>
							<?php _e('Tanto los comentarios como los pings están inhabilitados.','mandigo'); ?>

						<?php } edit_post_link(__('Editar esta entrada.','mandigo'),'',''); ?>

					</small>
				</p>

			</div>
		</div>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p><?php _e('Lo siento, no hay nada que se ajuste a lo que buscas.','mandigo'); ?></p>

<?php endif; ?>

	</td>

<?php
	if (get_option('mandigo_always_show_sidebars')) {
		if (!get_option('mandigo_nosidebars')) {
			include (TEMPLATEPATH . '/sidebar.php');
			if (get_option('mandigo_1024') && get_option('mandigo_3columns')) include (TEMPLATEPATH . '/sidebar2.php');
		}
	}

	get_footer(); 
?>
