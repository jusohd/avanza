<?php if (is_home()) { query_posts('showposts=1'); }
if (have_posts()) {
while (have_posts()) : the_post();
	if (is_single() or is_home()) { ?>
		<?php $wp_query->is_single = true; ?>
		<div id="layer2">
			<div class="photo">
				<?php the_content(); ?>
			</div>
		</div>
		<?php 
			if (get_post_custom_values('date') != 0) {
				$date = get_post_custom_values('date');
			}
			if (get_post_custom_values('camera') != 0) {
				$camera = get_post_custom_values('camera');
			}
			if (get_post_custom_values('description') != 0) {
				$desc = get_post_custom_values('description');
			}
			if (get_post_custom_values('flickr') != 0) {
				$flickr = get_post_custom_values('flickr');
			}
		?>
		<div id="layer3">
			<ul class="description">
				<li id="title"><a href="<?php the_permalink(); ?>" title="<?php wp_specialchars(get_the_title(), 1); ?>"><?php the_title(); ?></a> <?php if ($flickr[0] != '') { ?><span id="flickr">(<a href="<?php echo $flickr[0]; ?>">verlo en flickr</a>)</span><?php } ?></li>
				<?php if ($date[0] != '') { ?>
					<li id="datetaken"><span>Fecha de la toma:</span> <?php echo $date[0]; ?></li>
				<?php } ?>
				<li id="dateposted"><span>Fecha de publicacion:</span> <?php the_date('j F, Y'); ?></li>
				<?php if ($camera[0] != '') { ?>
					<li id="camera"><span>Informacion de Camara:</span> <?php echo $camera[0]; ?></li>
				<?php } ?>
				<?php if ($desc[0] != '') { ?>
					<li id="desc"><?php echo $desc[0]; ?></li>
				<?php } ?>
			</ul>
		</div>

		<div id="layer4">
			<div class="nav">
				<div id="prev"><?php previous_post( '%', '&laquo; fotografia anterior', '' ) ?></div>
				<!-- customize this link to your archive page's link -->
				<div id="archive"><a href="<?php bloginfo('url'); ?>/archives/">archivo</a></div>
				<div id="next"><?php next_post( '%', 'fotografia siguiente &raquo;', '' ) ?></div>
			</div>
		</div>
		
	<?php } elseif (is_page()) { ?>
		<div id="layer3">
			<ul class="description">
				<li id="title"><?php the_title(); ?></li>
				<li id="desc"><?php the_content(); ?></li>
			</ul>
		</div>
	<?php  } else { ?>
		<div id="layer3">
			<ul class="description">
				<li id="title">No hay nada aqui</li>
				<li id="desc"><p>Parece que no hay fotografias que coincidan con lo que buscas. Revisa el <a href="http://www.ciberprensa.com/fotolog/secciones/">Archivo</a> a ver si encuentras lo que buscas.</p></li>
			</ul>
		</div>
	<?php } ?>
<?php endwhile; ?>
<?php } ?>
