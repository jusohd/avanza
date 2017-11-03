<?php get_header(); ?>

<div id="post-entry">

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="post-meta" id="post-<?php the_ID(); ?>">
<h1><?php the_title(); ?></h1>
<div class="post-author"><?php _e('Posteado por:'); ?>&nbsp;<?php the_author_posts_link(); ?>&nbsp;<?php _e('el:'); ?>&nbsp;<?php the_time('F jS Y') ?>&nbsp;&nbsp;<?php edit_post_link('editar'); ?></div>

<div class="post-content">
<?php the_content(); ?>
<p><script src="http://digg.com/tools/diggthis.js" type="text/javascript"></script> </p>
</div>

<?php include (TEMPLATEPATH . '/social.php'); ?>

</div>

<?php endwhile; ?>

<?php comments_template(); ?>

<?php include (TEMPLATEPATH . '/paginate.php'); ?>

<?php else: ?>

<h2>Lo sentimos, el post fue movido o borrado.</h2>

<?php endif; ?>


</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>