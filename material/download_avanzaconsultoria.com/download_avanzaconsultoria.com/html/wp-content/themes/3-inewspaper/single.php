<?php get_header(); ?>

<?php get_sidebar(); ?>

	<div id="content" class="narrowcolumn_single">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<!--<div class="navigation">
			<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
			<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
		</div>-->

			<div class="post" id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace a <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<div class="author">Por: <?php the_author_link(); ?></div>
                <div class="published">Publicado: <?php the_time('j F Y') ?></div>

			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Páginas:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

				<div class="single">
					<div class="tagsSingle"><?php the_tags('<strong>Tags:</strong> ', ', ', '<br />'); ?></div>
                    
                   		
                        Este artículo se publicó
						<?php /* This is commented, because it requires a little adjusting sometimes.
							You'll need to download this plugin, and follow the instructions:
							http://binarybonsai.com/archives/2004/08/17/time-since-plugin/ */
							/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?>
						el <?php the_time('l, j F Y') ?> a las <?php the_time() ?>
						y está archivado en <?php the_category(', ') ?>.
						Puedes seguir los comentarios en el <?php comments_rss_link('RSS 2.0'); ?> feed.

						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
							Puedes <a href="#respond">escribir un comentario</a>, o <a href="<?php trackback_url(); ?>" rel="trackback">enlazar</a> desde tu web.

						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
							Los comentarios están cerrados pero puedes <a href="<?php trackback_url(); ?> " rel="trackback">enlazar</a> desde tu web.

						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
							Puedes escribir un comentario. Los pings están cerrados.

						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
							Los comentarios y los pings están cerrados.

						<?php } edit_post_link('Editar este artículo.','',''); ?>

				</div>
            

			</div>
		</div>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Lo siento, no hay nada que se ajuste a lo que buscas.</p>

<?php endif; ?>

	</div>

<?php get_footer(); ?>
