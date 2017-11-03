<?php
/*
Template Name: Links
*/
?>

<?php get_header(); ?>

<div id="post-entry">

<div class="post-meta" id="post-<?php the_ID(); ?>">
<h1>Links</h1>
<div class="post-author"><?php _e('Posteado por:'); ?>&nbsp;<?php the_author_posts_link(); ?>&nbsp;<?php _e('el:'); ?>&nbsp;&nbsp;<?php edit_post_link('editar'); ?></div>

<div class="post-content">
<ul><?php get_links(-1, '<li>', '</li>', ' - '); ?> </ul>
</div>

</div>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>