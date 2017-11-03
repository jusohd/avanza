<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="left">
<div id="left_top"></div>
<div id="post">
<div id="index_post">
<?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>
<div class="post_meta" id="post-<?php the_ID(); ?>">
<div class="post_meta_tag">
<div class="post_date">
<div class="date_post"><?php the_time('j') ?></div>
<div class="month_post"><?php the_time('M') ?></div>
</div>
<div class="post_title">
<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
<div class="author">Publicado por: <?php the_author_posts_link(); ?></div>
<div class="incat">en <?php the_category(', ') ?></div>
</div>
</div>
<div class="post_info"><?php the_content("<br />" . "sigue leyendo&nbsp;" . "&quot;" . the_title('', '', false) . "&quot;"); ?></div>
</div>
<?php endwhile; ?>
<?php comments_template(); ?>
<div class="nextpre"><?php if(function_exists('wp_pagenavi')): ?><?php wp_pagenavi(); ?><?php else : ?>
<?php posts_nav_link(); ?><?php endif; ?></div>
<?php else: ?>
<h3>Lo siento pero lo que buscas no está aquí</h3>
<?php endif; ?>
</div>
<?php get_leftbar(); ?> 
</div>
<div id="left_bottom"></div>
</div>
<?php get_footer(); ?>