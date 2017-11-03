<?php get_header();?>
	<?php
	global $wp_query;
	$curauth = $wp_query->get_queried_object();
?>
<div class="post">
<h2>Perfil del autor</h2>
<h3>Acerca de: <?php echo $curauth->nickname; ?></h3>
<dl>
<dt>Nombre completo</dt>
<dd><?php echo $curauth->first_name. ' ' . $curauth->last_name ;?></dd>
<dt>Sitio Web</dt>
<dd><a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></dd>
<dt>Detalles</dt>
<dd><?php echo $curauth->Descripcion; ?></dd>
</dl>

			<h3>Posts de <?php echo $curauth->nickname; ?>:</h3>
			<ul class="authorposts">
			<!-- The Loop -->
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<li>
				<em><?php the_time('d M Y'); ?></em>
				<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a>
			</li>
			<?php endwhile; else: ?>
			<p><?php _e('No hay posts de este autor.'); ?></p>

			<?php endif; ?>
			<!-- End Loop -->			
		</ul>
  <p align="center">
    <?php posts_nav_link(' - ','&#171; Posts nuevos','Post antiguos &#187;') ?>
  </p>
	</div>
</div>
  <?php get_sidebar();?>
  <?php get_footer();?>