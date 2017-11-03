<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <h2 class="firstheading"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Enlace permanente: <?php the_title(); ?>"><?php the_title(); ?></a></h2>

    <div class="entry">
        <?php the_content('<p>Leer mas … &rarr;</p>'); ?>
        <?php if(function_exists('wp_print')) { print_link(); } ?>
        <?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
    </div>

    <?php endwhile; endif; ?>

    <div class="boxedup"><?php comments_template(); ?></div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>

