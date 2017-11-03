<?php get_header(); ?>

<div id="post-entry">

<?php if (have_posts()) : ?>

<h2>
<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
<?php /* If this is a category archive */ if (is_day()) { ?>
Archive for <?php the_time('F jS, Y'); ?>
<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
Archive for <?php the_time('F, Y'); ?>
<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
Archive for <?php the_time('Y'); ?>
<?php } ?>
</h2>

<?php while (have_posts()) : the_post(); ?>

<div class="post-meta" id="post-<?php the_ID(); ?>">
<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
<div class="post-author"><?php _e('Posteado por'); ?>&nbsp;<?php the_author_posts_link(); ?>&nbsp;<?php _e('el'); ?>&nbsp;<?php the_time('F jS Y') ?>&nbsp;&nbsp;<?php edit_post_link('editar'); ?></div>

<div class="post-content">
<?php the_excerpt(); ?>
</div>

<?php include (TEMPLATEPATH . '/social.php'); ?>

</div>

<?php endwhile; ?>

<?php /* comments_template() */ ?>

<?php include (TEMPLATEPATH . '/paginate.php'); ?>

<?php else: ?>

<h2>Lo sentimos, la pagina que busca fue borrada o movida.</h2>

<?php endif; ?>


</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>