		<div id="shelf">
		
			<ul id="toggle" style="display:none">
			
				<?php /* if the Sidebar Widgets plugin is enabled */ if ( function_exists('dynamic_sidebar') && dynamic_sidebar(3) ) : else : ?>
				
				<?php if (function_exists("UTW_ShowWeightedTagSet")) { ?>
				
				<li class="tags">
					<h2><?php _e('Tags','unnamed'); ?></h2>
					<?php UTW_ShowWeightedTagSet("sizedtagcloud"); ?>
				</li>
				
				<?php } elseif (function_exists("wp_tag_cloud") && !function_exists("UTW_ShowWeightedTagSet")) { ?>
				
				<li class="tags">
					<h2><?php _e('Tags','unnamed'); ?></h2>
					<?php wp_tag_cloud("");?>
				</li>
				
				<?php } ?>
				
				<li>
					<h2><?php _e('Categorias','unnamed'); ?></h2>
					<ul>
						<?php wp_list_categories('show_count=0&title_li=&hierarchical=0'); ?>
					</ul>
				</li>
				
				<li>
					<h2><?php _e('Admin','unnamed'); ?></h2>
					<ul>
						<?php wp_register(); ?>
						<li> <?php wp_loginout(); ?> </li>
						<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.1">Validar <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
						<li><a href="http://ayudawordpress.com/" title="Haz clic para obtener ayuda sobre Wordpress.">Ayuda Wordpress</a></li>
						<?php wp_meta(); ?>
					</ul>
				</li>
				
				<?php /* end for Sidebar Widgets */ endif; ?>
			</ul>
			
			<div class="content-top"><a href="#" onclick="Effect.toggle('toggle','BLIND'); return false;"><?php _e('Mostrar/Ocultar','unnamed')?></a></div>
			
		</div>