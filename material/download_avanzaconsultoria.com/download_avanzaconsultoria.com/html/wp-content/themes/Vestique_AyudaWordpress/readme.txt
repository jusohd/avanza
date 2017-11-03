
1. How To Add Featured Category?

open sidebar.php and find this line

<h3>Featured Articles</h3>
<div class="f-box">
<?php $my_query = new WP_Query('category_name=YOURCATEGORYNAME&showposts=HOWMANYPOSTTOSHOW');
while ($my_query->have_posts()) : $my_query->the_post();
$do_not_duplicate = $post->ID; ?>
<?php $values = get_post_custom_values("featured-images");
if ( is_array($values)) : ?>
<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><img src="<?php echo "$values[0]"; ?>" alt="<?php the_title(); ?>" /></a>
<?php endif; ?>
<h1><?php the_title(); ?></h1>
<?php the_excerpt_feature(); ?>
<br /><br />
<?php endwhile;?>
</div>




2. plugin supported?

- alex king's most popular plugin
- wp-page-navigation

