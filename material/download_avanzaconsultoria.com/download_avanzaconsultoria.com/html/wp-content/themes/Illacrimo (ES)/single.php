<?php get_header(); ?>
<!-- start content items -->
<div class="CON">


<!-- start center -->
<div class="SC">

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="Post" id="post-<?php the_ID(); ?>">
<div class="PostHead">
<h1><?php the_title(); ?></h1>
<small class="PostAuthor">Autor: <?php the_author() ?> <?php edit_post_link('Editar'); ?></small>
<p class="PostDate">
<small class="day"><?php the_time('j') ?></small>
<small class="month"><?php the_time('M') ?></small>
<small class="year"><? // php the_time('Y') ?></small>
</p>
</div>

<div class="PostContent">
 <?php the_content("<p>Leer la entrada completa &raquo;</p>"); ?>
</div>
<div class="PostDet">
 <li class="PostCateg">Guardado en: <?php the_category(', ') ?></li>
 <div><li class="PostCateg">Tags: <?php the_tags(', ') ?></li></div>
</div>
</div>
<br clear="all" />

<ul class="Note">
<li class="NoteRss"><?php comments_rss_link(__('<abbr title="Really Simple Syndication">RSS</abbr> feed de los comentarios de esta entrada')); ?></li>
<?php if ( pings_open() ) : ?>
<li class="NoteTrackBack"><a href="<?php trackback_url() ?>" rel="trackback"><?php _e('<abbr title="Uniform Resource Identifier">URL</abbr> del TrackBack'); ?></a></li>
</ul>
<?php endif; ?>


<?php comments_template(); ?>
<?php endwhile; else : ?>

<h2><?php _e('No encontrado'); ?></h2>
<p><?php _e('Lo siento, no se ha encontrado la p&aacute;gina que buscas.'); ?></p>
<?php endif; ?>
</div> 
<!-- end center -->
<!-- start content left -->
<div class="SR">
<?php get_sidebar(); ?>
</div> 
<!-- end content left -->
</div> 
<?php get_footer(); ?>
