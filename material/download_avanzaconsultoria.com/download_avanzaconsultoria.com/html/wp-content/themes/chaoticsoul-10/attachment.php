<?php get_header(); ?>

	<div id="content" class="widecolumn">

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="navigation">
			<div class="alignleft">&nbsp;</div>
			<div class="alignright">&nbsp;</div>
		</div>
<?php $attachment_link = get_the_attachment_link($post->ID, true, array(450, 800)); // This also populates the iconsize for the next line ?>
<?php $_post = &get_post($post->ID); $classname = ($_post->iconsize[0] <= 128 ? 'small' : '') . 'attachment'; // This lets us style narrow icons specially ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><a href="<?php echo get_permalink($post->post_parent); ?>" rev="attachment"><?php echo get_the_title($post->post_parent); ?></a> &raquo; <a href="<?php echo get_permalink() ?>" rel="bookmark" title="Enlace permanente: <?php the_title(); ?>"><?php the_title(); ?></a></h2>
			<div class="entrytext">
				<p class="<?php echo $classname; ?>"><?php echo $attachment_link; ?><br /><?php echo basename($post->guid); ?></p>

				<?php the_content('<p class="serif">Haz clic para ver la foto &raquo;</p>'); ?>

				<?php link_pages('<p><strong>Paginas:</strong> ', '</p>', 'number'); ?>

				<p class="postmetadata alt">
					<small>
						Esta fotografía se publicó el
						<?php /* This is commented, because it requires a little adjusting sometimes.
							You'll need to download this plugin, and follow the instructions:
							http://binarybonsai.com/archives/2004/08/17/time-since-plugin/ */
							/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?> 
						el <?php the_time('l, j F, Y') ?> a las <?php the_time() ?>
						y esta archivda en la seccion <?php the_category(', ') ?>.
						Puedes leer las críticas a esa foto en el <?php comments_rss_link('RSS 2.0'); ?> feed. 

						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
							Puedes <a href="#respond">escribir tu crítica</a>, o hacer <a href="<?php trackback_url(true); ?>" rel="trackback">trackback</a> desde tu propia Web.

						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
							Actualmente no estan activas las críticas pero puedes hacer <a href="<?php trackback_url(true); ?> " rel="trackback">trackback</a> desde tu propia Web.

						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
							Puedes ir al final y escribir una crítica. Actualmente no están permitidos los pings.

						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
							Actualmente no están activas las criticas y pings.

						<?php } edit_post_link('Editar esta entrada.','',''); ?>

					</small>
				</p>

			</div>
		</div>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Lo siento, no hay nada que coincida con lo que buscas.</p>

<?php endif; ?>

	</div>

<?php get_footer(); ?>
