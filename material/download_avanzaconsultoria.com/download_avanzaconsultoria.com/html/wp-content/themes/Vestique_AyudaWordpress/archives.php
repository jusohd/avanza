<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

<div id="post-entry">

<div class="post-meta" id="post-<?php the_ID(); ?>">
<h1>Archives</h1>
<div class="post-author"><?php _e('Posteado por'); ?>&nbsp;<?php the_author_posts_link(); ?>&nbsp;<?php _e('el:'); ?>&nbsp;&nbsp;<?php edit_post_link('editar'); ?></div>

<div class="post-content">
<h3>Archivos por mes</h3><ul><?php wp_get_archives('type=monthly') ?></ul>
<h3>Archivos por categoria</h3><ul><?php wp_list_cats('sort_column=name&optioncount=1&feed=RSS') ?></ul>
<h3>Articulos recientes</h3><ul><?php get_archives('postbypost', 1000); ?></ul>
<h3>Archivos de tags</h3>
<?php if(function_exists("UTW_ShowTagsForCurrentPost")) : ?>
<?php UTW_ShowWeightedTagSetAlphabetical("sizedtagcloud","","1000") ?>
<?php else : ?>
<?php if(function_exists("wp_tag_cloud")) : ?>
<?php wp_tag_cloud('smallest=11&largest=24&'); ?>
<?php endif; ?>
<?php endif; ?>
</div>

</div>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>