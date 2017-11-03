		<hr />
		<div id="sidebar">
			<ul>

				<?php include (TEMPLATEPATH . '/searchform.php'); ?>
			<h1>Bienvenido</h1>
			<p class="intro">En <a href="http://ayudawordpress.com">Ayuda Wordpress</a> encontrarás los mejores recursos gratuitos, plugins, themes, traducciones y tutoriales para Wordpress. Puedes modificar este texto en sidebar.php</p>
			<p class="intro"><a href="http://feeds.feedburner.com/AyudaWordpress" rel="alternate" type="application/rss+xml"><img src="http://www.feedburner.com/fb/images/pub/feed-icon16x16.png" alt="" style="vertical-align:middle;border:0"/></a>&nbsp;<a href="http://feeds.feedburner.com/AyudaWordpress" rel="alternate" type="application/rss+xml">Subscríbete por RSS</a> 
<img src="http://ayudawordpress.com/wp-content/uploads/2007/12/email.gif" style="vertical-align:middle;border="0" alt="" title="Recibir las entradas por email" /></a> <a href="http://www.feedburner.com/fb/a/emailverifySubmit?feedId=1510975&amp;loc=es_ES">Subscríbete por Email</a></p>
			</ul>
			
			<?php /* Category Archive */ if (is_category()) { ?>
			<p class="intro"><?php printf(__('Estas viendo el archivo de %1$s de la categoria %2$s.','unnamed'), '<a href="' . get_settings('siteurl') .'">' . get_bloginfo('name') . '</a>', single_cat_title('', false) ) ?></p>
			
			<?php /* Day Archive */ } elseif (is_day()) { ?>
			<p class="intro"><?php printf(__('Estas viendo el archivo de %1$s del dia %2$s.','unnamed'), '<a href="' . get_settings('siteurl') .'">' . get_bloginfo('name') . '</a>', get_the_time(__('l, j F, Y','unnamed'))) ?></p>
			
			<?php /* Monthly Archive */ } elseif (is_month()) { ?>
			<p class="intro"><?php printf(__('Estas viendo el archivo de %1$s del mes de %2$s.','unnamed'), '<a href="'.get_settings('siteurl').'">'.get_bloginfo('name').'</a>', get_the_time(__('F, Y','unnamed'))) ?></p>
			
			<?php /* Yearly Archive */ } elseif (is_year()) { ?>
			<p class="intro"><?php printf(__('Estas viendo el archivo de %1$s del año %2$s.','unnamed'), '<a href="'.get_settings('siteurl').'">'.get_bloginfo('name').'</a>', get_the_time('Y')) ?></p>
			
			<?php /* Search */ } elseif (is_search()) { ?>
			<p class="intro"><?php printf(__('Has buscado en el archivo de %1$s de \'<strong>%2$s</strong>\'.','unnamed'),'<a href="'.get_settings('siteurl').'">'.get_bloginfo('name').'</a>', wp_specialchars($s)) ?></p>
			
			<?php /* Paged Archive */ } elseif (is_paged()) { ?>
			<p class="intro"><?php printf(__('Estas viendo el archivo de %s.','unnamed'), '<a href="'.get_settings('siteurl').'">'.get_bloginfo('name').'</a>') ?></p>
			
			<?php } elseif (function_exists('is_tag') && is_tag()) { ?>
			<p class="intro"><?php printf(__('Estas viendo el archivo de %1$s de la tag \'%2$s\'.','unnamed'), '<a href="'.get_settings('siteurl').'">'.get_bloginfo('name').'</a>', get_query_var('tag') ) ?></p>
			
			<?php /* Permalink */ } elseif (is_single()) { ?>
			<p class="intro">
			<?php _e('Esta entrada esta archivada en ','unnamed')?><?php the_category(', ') ?><?php _e('. ','unnamed')?><?php _e('Puedes seguir los comentarios en el feed ','unnamed') ?><?php comments_rss_link(__('RSS 2.0','unnamed')) ?><?php _e('. ','unnamed')?><?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) { /* Both Comments and Pings are open */ ?><?php _e('Puedes <a href="#comment">escribir un comentario</a>, o hacer ','unnamed')?><a href="<?php trackback_url(true); ?>" rel="trackback"><?php _e('trackback','unnamed')?> </a><?php _e(' desde tu propia web. ','unnamed')?><?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) { /* Only Pings are Open */ ?><?php _e('Actualmente estan cerrados los comentarios pero puedes hacer ','unnamed') ?> <a href="<?php trackback_url(true); ?> " rel="trackback"><?php _e('trackback','unnamed')?></a><?php _e(' desde tu propia web. ','unnamed') ?><?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) { /* Comments are open, Pings are not */ ?><?php _e('Puedes ir al final y escribir un comentario. Actualente no estan habilitados los pings. ','unnamed') ?><?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) { /* Neither Comments, nor Pings are open */ ?><?php _e('Tanto los pings como los comentarios estan actualmente cerrados. ','unnamed') ?><?php } edit_post_link(__('Editar esta entrada.','unnamed')); ?>
			</p>
			<?php } ?>
			
			<?php if (is_search() || (function_exists('is_tag') && is_tag())) { ?>
			<p class="intro"><?php _e('Las entradas largas se cortan. Haz clic en el titulo de una entrada para leerla en su totalidad.','unnamed'); ?></p>
			<?php } ?>
			
			<?php /* Frontpage */ if (is_home() || (is_page() && get_option('unnamed_showsidebarpage') == 1) || (is_archive() && get_option('unnamed_showsidebarcat') == 1) || (is_single() && get_option('unnamed_showsidebarsingle') == 1) || ((function_exists('is_tag') && is_tag()) && get_option('unnamed_showsidebarcat') == 1) ) { ?>
			
			<div class="left-sidecolumn">
				<ul>
					<?php /* if the Sidebar Widgets plugin is enabled */ if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?> <?php /* Menu for subpages of current page */
						global $notfound;
						if (is_page() && ($notfound != '1')) {
						  $current_page = $post->ID;
						  while ($current_page) {
							$page_query = $wpdb->get_row("SELECT ID, post_title, post_status, post_parent FROM $wpdb->posts WHERE ID = '$current_page'");
							$current_page = $page_query->post_parent;
						  }
						  $parent_id = $page_query->ID;
						  $parent_title = $page_query->post_title;
						  if ($wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_parent = '$parent_id' AND post_status != 'attachment'")) {
					?>
					
					<li class="sb-pagemenu">
						<h2><?php echo $parent_title; ?> <?php _e('Subpaginas','unnamed'); ?></h2>
						<ul>
							<?php wp_list_pages('sort_column=menu_order&title_li=&child_of='. $parent_id); ?> <?php if ($parent_id != $post->ID) { ?>
							
							<li><a href="<?php echo get_permalink($parent_id); ?>"><?php printf(__('Regresar a %s','unnamed'), $parent_title ) ?></a></li>
							
							<?php } ?>	
						</ul>
					</li>
					
					<?php } } ?>
					
					<?php if (is_home() || is_page() || is_single()) { ?>
					
					<li>
						<h2><?php _e('Ultimo','unnamed'); ?></h2>
						<ul>
							<?php wp_get_archives('type=postbypost&limit=10'); ?>
						</ul>
					</li>
					
					<?php } if(is_home()) {?>
						
						<?php wp_list_bookmarks(); ?>
					
					<?php } if (is_archive()) { ?>
					
					<li>
						<h2><?php _e('Categorias','unnamed'); ?></h2>
						<ul>
							<?php if (function_exists('wp_list_categories')) {
  									
									wp_list_categories('title_li=&show_count=1&hierarchical=0');
								
								} else {
 								
									list_cats(0, '', 'name', 'asc', '', 1, 0, 1, 1, 1, 1, 0, '', '', '', '', '');
								}
							?>
						</ul>
					</li>
					
					<?php } ?>
					
					<?php /* end for Sidebar Widgets */ endif; ?>
				</ul>
			</div>
			
			<div class="right-sidecolumn">
				<ul>
					<?php /* if the Sidebar Widgets plugin is enabled */ if ( function_exists('dynamic_sidebar') && dynamic_sidebar(2) ) : else : ?> 
					
					<?php if (is_home() || is_page() || is_single()) { ?>
					
					<li>
						<h2><?php _e('Subscribir','unnamed'); ?></h2>
						<ul class="feedlink">
							<li><img src="<?php bloginfo('template_directory'); ?>/images/rss.png" alt="RSS" /><a href="<?php if ( get_option('unnamed_rss') != '') { echo (get_option('unnamed_rss')); } else { echo bloginfo('rss2_url'); } ?>" title="<?php _e('RSS Feed de las entradas','unnamed'); ?>"> <?php _e('RSS de las entradas','unnamed'); ?></a></li>
							<li><img src="<?php bloginfo('template_directory'); ?>/images/rss.png" alt="RSS" /><a href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php _e('RSS Feed de los comentarios','unnamed');?>"> <?php _e('RSS de los comentarios','unnamed'); ?></a></li>
						</ul>
					</li>
					
					<?php } elseif (is_archive()) { ?>
					
					<li>
						<h2><?php _e('Archivo','unnamed'); ?></h2>
						<ul>
							<?php wp_get_archives('type=monthly&show_post_count=1'); ?>
						</ul>
					</li>
					
					<?php } ?>
					
					<?php /* end for Sidebar Widgets */ endif; ?>
				</ul>
			</div>
			
			<?php } ?>
			
		</div>
		<div class="clear"></div>