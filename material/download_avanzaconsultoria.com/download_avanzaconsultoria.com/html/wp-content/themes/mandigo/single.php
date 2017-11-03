<?php 
	get_header();

	$tag_posttitle_single = get_option('mandigo_tag_posttitle_single');
	$tag_pagetitle        = get_option('mandigo_tag_pagetitle'       );
?>
	<td id="content" class="<?php echo ($alwayssidebars ? 'narrow' : 'wide'); ?>column">

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="navigation">
			<div class="alignleft"><?php previous_post_link('&laquo;&nbsp;%link') ?></div>
			<div class="alignright"><?php next_post_link('%link&nbsp;&raquo;') ?></div>
		</div>

		<div class="post" id="post-<?php the_ID(); ?>">
                                <div class="postinfo">
					<?php mandigo_date_icon(get_the_time('Y M m d')); ?>
					<?php if (!get_option('mandigo_no_animations')): ?>
					<span class="switch-post">
						<a href="javascript:toggleSidebars();" class="switch-sidebars"><img src="<?php echo $dirs['www']['icons']; ?>bullet_sidebars_hide.png" alt="" class="png" /></a><a href="javascript:togglePost(<?php the_ID(); ?>);" id="switch-post-<?php the_ID(); ?>"><img src="<?php echo $dirs['www']['icons']; ?>bullet_toggle_minus.png" alt="" class="png" /></a>
					</span>
					<?php endif; ?>
                                        <<?php echo $tag_posttitle_single; ?> class="posttitle"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Enlace permanente: <?php the_title(); ?>"><?php the_title(); ?></a></<?php echo $tag_posttitle_single; ?>>
                                        <small>
						<?php printf(__('Publicado por: %s en %s','mandigo'),mandigo_author_link(get_the_author_ID(),get_the_author()),get_the_category_list(', ')) ?><?php if (function_exists('the_tags') && !get_option('mandigo_tags_after')) the_tags(', '. __('tags','mandigo') .': '); ?>
					</small>
                                </div>

			<div class="entry">
				<?php the_content('<p class="serif">'. __('Leer el resto de esta entrada','mandigo') .' &raquo;</p>'); ?>

				<?php link_pages('<p><strong>'. __('Páginas','mandigo') .':</strong> ', '</p>', 'number'); ?>

				<?php if (function_exists('the_tags') && get_option('mandigo_tags_after')) the_tags(); ?>

				<p class="postmetadata alt clear">
					<small>
						<?php printf(__('Esta entrada se publicó el %s a las %s y está archivada en %s.','mandigo'),get_the_time(__('l, j F, Y','mandigo')),get_the_time(),get_the_category_list(', ')); ?>
						<?php printf(__('Puedes seguir los comentarios de esta entrada en el %s feed.','mandigo'),'<a href="'. comments_rss() .'">RSS 2.0</a>'); ?>

						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
							<?php printf(__('Puedes <a href="#respond">escribir un comentario</a>, o hacer <a href="%s" rel="trackback">trackback</a> desde tu blog.','mandigo'),trackback_url(false)); ?>

						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
							<?php printf(__('Los comentarios están cerrados pero puedes hacer <a href="%s" rel="trackback">trackback</a> desde tu blog.','mandigo'),trackback_url(false)); ?>

						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
							<?php _e('Puedes <a href="#respond">ir al final</a> y escribir un comentario. Los pings están inhabilitados.','mandigo'); ?>

						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
							<?php _e('Tanto los comentarios como los pings están inhabilitados.','mandigo'); ?>

						<?php } edit_post_link(__('Editar esta entrada.','mandigo'),'',''); ?>

					</small>

				</p>
			</div>
		</div>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<<?php echo $tag_pagetitle; ?>><?php _e('Lo siento, ninguna entrada se ajusta a lo que buscas.','mandigo'); ?></<?php echo $tag_pagetitle; ?>>

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
