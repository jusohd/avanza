<?php
/*
Template Name: Sitemap
*/
?>

<?php get_header(); ?>

<div id="post-entry">

<div class="post-meta" id="post-<?php the_ID(); ?>">
<h1>Sitemap</h1>
<div class="post-author"><?php _e('Posteado por:'); ?>&nbsp;<?php the_author_posts_link(); ?>&nbsp;<?php _e('el:'); ?>&nbsp;&nbsp;<?php edit_post_link('editar'); ?></div>

<div class="post-content">
<h3>Paginas del blog</h3>
<ul>
<?php $archive_query = new WP_Query('showposts=1000');
while ($archive_query->have_posts()) : $archive_query->the_post(); ?>
<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Link permanente <?php the_title(); ?>"><?php the_title(); ?></a> (<?php comments_number('0', '1', '%'); ?>)</li>
<?php endwhile; ?>
</ul>

<?php if(function_exists("get_hottopics")) : ?>
<h3>Posts muy comentados</h3><ul><?php get_hottopics(); ?></ul>
<?php else : ?>
<?php endif; ?>

<h3>Agregador de Feeds</h3>
<ul>
<li><a href="<?php bloginfo('rdf_url'); ?>" title="RDF/RSS 1.0 feed"><acronym title="Resource Description Framework">RDF</acronym>/<acronym title="Really Simple Syndication">RSS</acronym> 1.0 feed</a></li>
<li><a href="<?php bloginfo('rss_url'); ?>" title="RSS 0.92 feed"><acronym title="Really Simple Syndication">RSS</acronym> 0.92 feed</a></li>
<li><a href="<?php bloginfo('rss2_url'); ?>" title="RSS 2.0 feed"><acronym title="Really Simple Syndication">RSS</acronym> 2.0 feed</a></li>
<li><a href="<?php bloginfo('atom_url'); ?>" title="Atom feed">Atom feed</a></li>
</ul>
</div>

</div>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>