<?php get_header(); ?>

    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post(); ?>

        <div class="post" id="post-<?php the_ID(); ?>">

<div class="date">
    <span class="date1"><?php the_time('j') ?></span>
    <span class="date2"><?php the_time('F') ?></span>
    <span class="date3"><?php the_time('Y') ?></span></div>

            <h2 class="firstheading"><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>"><?php the_title(); ?></a></h2>

            <div class="entry">
                <?php the_content('Leer mas … &raquo;'); ?></div>

            <p class="pageInfo">publicado en <?php the_category(', ', __(' y ')) ?> | <?php edit_post_link('<span class="iconEdit">Editar</span>', '', ' | '); ?> <span class="iconComment"><?php comments_popup_link('0 comentarios', '1 comentario', '% comentarios'); ?></span></p>

        </div>

        <?php endwhile; ?>

		<div id="page_nav">
			<div class="alignleft"><?php next_posts_link('&laquo; Anteriores') ?></div>
			<div class="alignright"><?php previous_posts_link('Siguientes &raquo;') ?></div>
		</div>

    <?php else : ?>

    <h2 class="center">No hay artículos</h2>
        <p><strong>Lo siento pero no hay nada de lo que buscas</strong></p>
        <p><em>Prueba a buscar o utilizar los enlaces.</em></p>

        <?php include (TEMPLATEPATH . '/searchform.php'); ?>

    <?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>