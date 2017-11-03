<?php 
require (dirname(__FILE__).'/../../../wp-blog-header.php');
if ($_GET['searchquery'] != '') { query_posts( 'showposts=10&s='.$_GET['searchquery'] );
?>

		<div id="live-results">
			
			<?php if (have_posts()) { ?>
				
				<h2><?php _e('Resultados de busqueda','unnamed')?></h2>
				<ul>
				
					<?php while (have_posts()) { the_post(); ?>
						<li>
							<h3><a href="<?php echo get_permalink() ?>" rel="bookmark" title='<?php printf(__('Enlace permanente a "%s"','unnamed'), get_the_title()) ?>'> <?php the_title(); ?></a></h3>
						</li>
					<?php } ?>
					
				</ul>
				
				<div class="more-results"><a href="<?php echo get_settings('home') . '?s=' . $_GET['searchquery']; ?>"><?php _e('Obtener mas resultados&nbsp;&raquo;','unnamed') ?></a></div>
			
			<?php } else { ?>
				
				<div class="alert"><?php _e('Lo siento, no hay resultados.','unnamed'); ?></div>
			
			<?php } ?>
		
		</div>

<?php } ?>