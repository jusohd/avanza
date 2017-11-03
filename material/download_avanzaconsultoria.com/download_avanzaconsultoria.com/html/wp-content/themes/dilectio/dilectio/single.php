<?php get_header(); ?>
<!-- Container -->
<div class="CON">

<!-- Start SC -->
<div class="SC">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="Post" id="post-<?php the_ID(); ?>" style="padding-bottom: 20px;">
<div class="PostHead">
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Link a<?php the_title(); ?>"><?php the_title(); ?></a></h2>
<small class="PostTime">
<strong class="day"><?php the_time('j') ?></strong><strong class="month"><?php the_time('M') ?></strong><strong class="year"><?php the_time('Y') ?></strong>
</small>
<small class="PostCat">Categoria: <?php the_category(', ') ?></small>
<small class="PostAuthor">Autor: <?php the_author() ?></small>

</div>
  
<div class="PostContent">
<?php the_content('<p class="serif">Seguir leyendo &raquo;</p>'); ?>
<?php wp_link_pages(array('before' => '<p><strong>Paginass:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
</div>
<?php if (function_exists('the_tags')) { ?> <?php the_tags('<div class="PostCom"><ul><li class="Tags">Tags: ', ', ', '</li> </ul></div>'); ?> <?php } ?>
</div>

<span class="Note">
Puedes seguir las respuestas a este post mediante nuestro <?php comments_rss_link('RSS 2.0'); ?> feed.

<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
// Both Comments and Pings are open ?>
Puedes <a href="#respond">dejar una respuesta</a>, o un <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> desde tu sitio.

<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
// Only Pings are Open ?>Respuestas cerradas, aunque puedes seguir el <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a>desde tu sitio.

<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
// Comments are open, Pings are not ?>
You can skip to the end and leave a response. Pinging is currently not allowed.

<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
// Neither Comments, nor Pings are open ?>
Both comments and pings are currently closed.
<?php } edit_post_link('Editar el post.','',''); ?>
</span>

<?php if ( comments_open() ) comments_template(); ?>
<?php endwhile; else: ?>

<p>Disculpa, no se encuentra lo que busca.</p>

<?php endif; ?>

</div>
<!-- End SC -->

<?php get_sidebar(); ?>
</div>
<!-- End CON -->

<?php get_footer(); ?>