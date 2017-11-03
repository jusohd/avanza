<?php get_header();?>
<div id="main">
	<div id="content">
	<?php
	global $wp_query;
	$curauth = $wp_query->get_queried_object();
?>
<h2>Acerca de: <?php echo $curauth->nickname; ?></h2>
<dl>
<dt>Nombre completo</dt>
<dd><?php echo $curauth->first_name. ' ' . $curauth->last_name ;?></dd>
<dt>Web</dt>
<dd><a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></dd>
<dt>Detalles</dt>
<dd><?php echo $curauth->description; ?></dd>
</dl>

			<h2>Articulos de <?php echo $curauth->nickname; ?>:</h2>
			<ul class="authorposts">
			<!-- The Loop -->
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<li>
				<em><?php the_time('d M Y'); ?></em>
				<a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente: <?php the_title(); ?>"><?php the_title(); ?></a>
			</li>
			<?php endwhile; else: ?>
			<p><?php _e('No hay articulos de este autor.'); ?></p>

			<?php endif; ?>
			<!-- End Loop -->			
		</ul>
		<p align="center"><?php posts_nav_link() ?></p>
	</div>
  <?php get_sidebar();?>
  <?php get_footer();?>