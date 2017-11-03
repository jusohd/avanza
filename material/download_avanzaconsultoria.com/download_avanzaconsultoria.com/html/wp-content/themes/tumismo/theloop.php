		<?php 
		/* 
			This is the loop, which fetches entries from your database.
			It is a delicate piece of machinery. Be gentle! 
		*/ 
		?> 
		<?php /* Headlines for archives */ if ((!is_single() && !is_home()) || is_paged()) { ?>
			<h2 class="pagetitle">
			<?php if (is_category()) {
				  printf(__('Archivo de la categoria \'%s\'', 'unnamed'), single_cat_title('', false));
				} elseif (is_day()) {
				  printf(__('Archivo de %s', 'unnamed'), get_the_time(__('j F, Y', 'unnamed')));
				} elseif (is_month()) {
				  printf(__('Archivo de %s', 'unnamed'), get_the_time(__('F, Y', 'unnamed')));
				} elseif (is_year()) {
				  printf(__('Archivo de %s', 'unnamed'), get_the_time(__('Y', 'unnamed')));
				} elseif (is_search()) {
				  printf(__('Resultados de busqueda de \'%s\'', 'unnamed'), $s);
				} elseif (function_exists('is_tag') && is_tag()) {
				  printf(__('Archivo de etiquetas de \'%s\'', 'unnamed'), get_query_var('tag'));
				} elseif (is_paged() && ($paged > 1)) {
				  printf(__('Pagina de Archivo %s', 'unnamed'), $paged);
				}
			?>
			</h2>
			<?php } ?>
			<?php if (!is_single() && is_paged()) include (TEMPLATEPATH . '/navigation.php'); ?> 
			
			<?php /* Start the loop */ if (have_posts()) { while (have_posts()) { the_post(); ?>
			<?php /* Permalink nav has to be inside loop */ if (is_single()) include (TEMPLATEPATH . '/navigation.php'); ?>
			
			<div id="post-<?php the_ID(); ?>" class="entry">
				<h3 class="entry-header"><a href="<?php the_permalink() ?>" rel="bookmark" title='Enlace permanente a "<?php strip_tags(the_title()); ?>"'> <?php the_title(); ?></a></h3>
				<div class="entry-date"><?php printf(__('%1$s por %2$s ','unnamed'), the_time(__(' j F, Y','unnamed')), get_the_author()) ?></div>			
				<?php if (is_search() || (function_exists('is_tag') && is_tag())) {
 					the_excerpt();
				} else {
  					the_content(sprintf(__("Sigue leyendo … '%s'", 'unnamed'), the_title('', '', false)));
				} ?>
				
				<?php wp_link_pages('before=<p><strong>' . __('Paginas:','unnamed') . '</strong>&after=</p>'); ?>
				<!-- <?php trackback_rdf(); ?> -->
				
				<?php if (is_home() || is_archive() || function_exists('is_tag') && is_tag()) { ?>
				
				<div class="entry-footer">
				<?php if(function_exists('wp_print')) { print_link(); } ?>
				<?php edit_post_link(__('Editar','unnamed'),'<span class="metaedit">','</span>&nbsp;&nbsp;'); ?>
				<?php if(function_exists('UTW_ShowTagsForCurrentPost')) { ?>
				<span class="metatag"><?php _e('Etiquetas:','unnamed'); ?><?php UTW_ShowTagsForCurrentPost("commalist") ?></span>
				<?php } elseif (function_exists('the_tags') && !function_exists('UTW_ShowTagsForCurrentPost')) { ?>
				<span class="metatag"><?php the_tags(__('Etiquetas: '), ', ', ''); ?></span>
				<?php } ?>
				<span class="metacat"><?php the_category(','); ?></span>
				<?php comments_popup_link('&nbsp;&nbsp;<span class="metacmt">'.__('Escribe un comentario','unnamed').'</span>', '<span class="metacmt">1&nbsp;'.__('Comentario','unnamed').'</span>', '<span class="metacmt">%&nbsp;'.__('Comentarios','unnamed').'</span>', '', '<span class="metacmt">'.__('Cerrado','unnamed').'</span>'); ?>
				</div>

				<?php } ?>
			<?php similar_posts(); ?>	
			</div>
			
			<?php  } /* End The Loop */ ?>
			<?php /* Insert Paged Navigation */ if (!is_single()) { include (TEMPLATEPATH.'/navigation.php'); } ?>
			
			<?php /* If there is nothing to loop */  } else { ?>
			
			<h2 class="center"><?php _e('No encontrado','unnamed'); ?></h2>
			<div class="entry">
				<p><?php _e('Lo siento! Buscas algo que no esta aqui. Puedes usar la busqueda o los enlaces del sitio para encontrar lo que necesites.','unnamed'); ?></p>
			</div>
			
			<?php /* End Loop Init  */ } ?>