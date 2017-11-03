<?php get_header(); ?>

<?php get_sidebar(); ?>

	<div id="content" class="narrowcolumn">
<?php is_tag(); ?>
		<?php if (have_posts()) : ?>

 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 class="pagetitle">Hemeroteca de la sección &#8216;<?php single_cat_title(); ?>&#8217;</h2>
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h2 class="pagetitle">Artículos etiquetados con &#8216;<?php single_tag_title(); ?>&#8217;</h2>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="pagetitle">Hemeroteca de <?php the_time('j F Y'); ?></h2>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="pagetitle">Hemeroteca de <?php the_time('F, Y'); ?></h2>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="pagetitle">Hemeroteca de <?php the_time('Y'); ?></h2>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="pagetitle">Hemeroteca del Redactor</h2>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pagetitle">Hemeroteca</h2>
 	  <?php } ?>


		<?php while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<div class="author">Por: <?php the_author_link(); ?></div>
                <div class="published">Publicado: <?php the_time('j F Y') ?></div>

				<div class="entry">
					<?php the_content('Leer el resto del artículo &raquo;'); ?>
				</div>

				<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Archivado en <?php the_category(', ') ?> | <?php edit_post_link('Editar', '', ' | '); ?>  <?php comments_popup_link('No hay comentarios &#187;', '1 comentario &#187;', '% comentarios &#187;'); ?></p>
	</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Artículos anteriores') ?></div>
			<div class="alignright"><?php previous_posts_link('Artículos siguientes &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">No encontrado</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

	</div>

<?php get_footer(); ?>
