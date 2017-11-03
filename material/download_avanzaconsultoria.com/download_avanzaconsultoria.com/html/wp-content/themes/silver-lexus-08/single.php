<?php get_header(); ?>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="post" id="post-<?php the_ID(); ?>">

<div class="date">
    <span class="date1"><?php the_time('j') ?></span>
    <span class="date2"><?php the_time('F') ?></span>
    <span class="date3"><?php the_time('Y') ?></span></div>

    <h2 class="firstheading"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Enlace permanente: <?php the_title(); ?>"><?php the_title(); ?></a></h2>

    <div class="boxedin">
        <small>publicado en <?php the_category(', ', __(' y ')) ?> | <?php edit_post_link('<span class="iconEdit">Editar</span>', '', ' | '); ?></small>
    </div>

			<div class="entry">
				<?php the_content('<p class="serif">Leer mas … &raquo;</p>'); ?>
				<?php if(function_exists('wp_print')) { print_link(); } ?>

				<?php link_pages('<p><strong>Páginas:</strong> ', '</p>', 'number'); ?>

    <div class="boxedup">
					<small>
						Este artículo fue publicado
						<?php /* This is commented, because it requires a little adjusting sometimes.
							You'll need to download this plugin, and follow the instructions:
							http://binarybonsai.com/archives/2004/08/17/time-since-plugin/ */
							/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?>
						el <?php the_time('l, j F, Y') ?> a las <?php the_time() ?>
						y está archivado en <?php the_category(', ') ?>.
						Puedes seguir los comentarios en el <?php comments_rss_link('RSS 2.0'); ?> feed.

						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
							Puedes <a href="#respond">escribir un comentario</a>, o hacer <a href="<?php trackback_url(true); ?>" rel="trackback">trackback</a> desde tu Web.

						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
							Los comentarios están cerrados pero puedes hacer <a href="<?php trackback_url(true); ?> " rel="trackback">trackback</a> desde tu Web.

						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
							Puedes ir al final y escribir un comentario. No están habilitados los pings.

						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
							No están habilitados los comentarios y pings.

						<?php } edit_post_link('Editar.','',''); ?>

					</small>
				</div>

			</div>
		</div>

	<div class="boxedup"><?php comments_template(); ?></div>

	<?php endwhile; else: ?>

		<p>Lo siento, ningún artículo se ajusta a lo que buscas.</p>

<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>

