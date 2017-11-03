</div>
	
	<div id="sidebar">
		<?php get_sidebar(); ?>
	</div>
	
	<div id="footer">
		<div id="footercontent">
			<div class="footbox">
				<h2>META</h2>
				<ul id="metafoot">
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<li><a href="http://validator.w3.org/check/referer" title="Esta página valida como XHTML 1.0 Transitional">XHTML <abbr title="eXtensible HyperText Markup Language">Valido</abbr></a></li>
					<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
					<li><a href="http://wordpress.org/" title="Creado con Wordpress.">WordPress</a></li>
					<?php wp_meta(); ?>
				</ul>
			</div>
			
			<div class="footbox">
				<h2>Artículos recientes</h2>
					<?php wp_get_archives('type=postbypost&limit=5'); ?>
					
				
				
			</div>
			
			<div class="footbox">
				<h2>Categorías</h2>
				<ul id="metafoot2">
				<?php wp_list_categories('show_count=1&title_li='); ?>
			</ul></div>
			
			<div class="bringdown"></div>
		</div>
		<div id="footbar">Plantilla de <a href="http://www.abhishektripathi.com">Abhishek Tripathi</a> de <a href="http://www.mediawick.com">Mediawick Digital Solutions</a>. Traducida por <a href="http://ayudawordpress.com">Fernando</a></div>
	</div>
	
 </div>
 </body>
 </html>