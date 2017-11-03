<?php get_header(); ?>

<div id="content">
	<!--index.php-->

    <?php if (have_posts()) : // the loop ?>

    <h4><?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

    <?php /* If this is a category archive */ if (is_category()) { ?>				
        Archive for <?php echo single_cat_title(); ?>
 	<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		Archive for <?php the_time('F jS, Y'); ?>
    <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		Archive for <?php the_time('F, Y'); ?>
    <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		Archive for <?php the_time('Y'); ?>
    <?php /* If this is a search */ } elseif (is_search()) { ?>
		Search Results
	<?php /* If this is an author archive */ } elseif (is_author()) { ?>
	    Author Archive
    <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		Blog Archives

	<?php } //do not delete ?>
    </h4>

	<?php while (have_posts()) : the_post(); // the loop ?>

<div class="postwrap">
    <div class="post ">
	<!--post title as a link-->
	<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Link permanente <?php the_title(); ?>"><?php the_title(); ?></a></h3>

	<!--post text with the read more link ... sorta-->
	<?php the_content('', 'FALSE', ''); ?>
    <?php if(strstr($post->post_content,'<!--more')) { //if the story has the more tag... ?>
    <p class="post-more"><a href="<?php the_permalink(); ?>">Seguir leyendo.&raquo;</a></p>
    <?php } ?>
	</div>

    <!--post meta info-->
	<div class="meta clearboth">
    <ul>
        <li class="meta-author"><strong>Por: </strong><?php the_author_link(); ?></li> <!-- The author's name as a link to his archive -->
        <li class="meta-date"><strong>Posteado el: </strong><?php the_time('m.j.Y') ?></li><!-- the timestamp -->
        <li class="meta-comments"><strong>Commentaris: </strong><?php comments_popup_link('No Comments Yet', '1 Comment So Far', '% Comments Already'); ?></li> <!-- comment number as link to post comments -->
        <li class="meta-category"><strong>Categorias: </strong><?php the_category(', ') ?></li> <!-- list of categories, seperated by commas, linked to corresponding category archives -->
    </ul>
    </div>
	
	<?php endwhile; // end of one post ?>

    <!-- Previous/Next page navigation -->
    <div class="page-nav">
	    <div class="nav-previous"><?php previous_posts_link('&larr; Pagina previa') ?></div>
	    <div class="nav-next"><?php next_posts_link('Siguiente pagina &rarr;') ?></div>
    </div>    

	<?php else : // do not delete ?>

	<h3>No se encuentra la pagina</h3>
    <p>No se encuentra lo que estas buscando.</p>
    	<?php endif; // do not delete ?>
	

<!--index.php end-->
</div>

<!--include sidebar-->
<?php get_sidebar(); ?>

<!--include footer-->
<?php get_footer(); ?>

