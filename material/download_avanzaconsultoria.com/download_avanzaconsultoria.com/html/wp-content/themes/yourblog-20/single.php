<?php get_header(); ?>

	<div id="content" class="widecolumn">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="navigation">
			<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
			<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
		</div>

		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Enlace permanente : <?php the_title(); ?>"><?php the_title(); ?></a></h2>

			<div class="entry">
				<?php the_content('<p class="serif">Sigue leyendo &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages :</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

				<p class="postmetadata alt">
					<small>
						Este artículo se publicó 
						<?php /* This is commented, because it requires a little adjusting sometimes.
							You'll need to download this plugin, and follow the instructions:
							http://binarybonsai.com/archives/2004/08/17/time-since-plugin/ */
							/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?>
						el <?php the_time('l j F Y') ?> a las <?php the_time() ?>
						y está archivado en <?php the_category(', ') ?>.
						Puedes seguir los comentarios en el <?php comments_rss_link('RSS 2.0'); ?>.

						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
							Puedes <a href="#respond">escribir un comentario</a>, o hacer <a href="<?php trackback_url(true); ?>" rel="trackback">trackback</a> desde tu propio sitio.

						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
							Los comentarios están cerrados pero puedes hacer <a href="<?php trackback_url(true); ?> " rel="trackback">trackback</a> desde tu propio sitio.

						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
							Puedes escribir un comentario pero los pings no están habilitados.

						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
							Tanto los comentarios como los pings están cerrados.

						<?php } edit_post_link('Editar','',''); ?>

					</small>
				</p>

			</div>
		</div>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Lo siento pero lo que buscas no está aquí.</p>

<?php endif; ?>

	</div>

<?php get_footer(); ?>
