			
		
		<div id="blog_right_body">
		
					<div id="menu_search_box">
						<form method="get" id="searchform" style="display:inline;" action="<?php bloginfo('home'); ?>/">
						buscar:&nbsp;
						<input type="text" class="s" value="<?php the_search_query(); ?>" name="s" id="s" />&nbsp;
						<input type="image" src="<?php bloginfo('stylesheet_directory'); ?>/images/go.gif" value="Submit" class="sub" align="top" id="sub_b" />
						</form>
					</div>	
					
					<div id="sidebar">
						<div id="sidebar_left">
							<ul>
							<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ){
							?>
							<?
							} else{ ?>
								<li class="widget_categories">
									<h2>Categorías</h2>
									<ul>
										<?php wp_list_cats('sort_column=name&optioncount=1'); ?>
									</ul>
								</li>
								
								<li class="widget_archives">
									<h2>Archivo</h2>
									<ul>
										<?php wp_get_archives('type=monthly'); ?>
									</ul>
								</li>
						<?php } ?>
							</ul>
						</div>
						<div id="sidebar_right">
							<ul>
							<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(2) ){
							?>
							<?
							} else { ?>	
								<li><h2>Amigos</h2>
									<ul>
										<?php get_links_list2(); ?>
									</ul>
								</li>	
								
								<li><h2>Páginas</h2>
									<ul>
										<?php wp_list_pages2(); ?>
									</ul>
								</li>
								
								<li class="widget_meta"><h2>Laboratorio</h2>
									<ul>
										<?php wp_register(); ?>
										<li><?php wp_loginout(); ?></li>
										<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
										<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
										<li><a href="http://ayudawordpress.com/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">Ayuda WordPress</a></li>
										<?php wp_meta(); ?>
									</ul>
								</li>
						<?php } ?>
							</ul>
						</div>
					</div>
				</div>
