	<div id="sidebar">
			<?php 	/* Widgetized sidebar, if you have the plugin installed. */
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>

            <div id="categories" class="widget widget_categories">
                <div class="wtitle">Categorías&#160;</div>
                <div class="text-content">
                    <ul>
                    <?php wp_list_categories('orderby=name&show_count=1&hierarchical=1&title_li='); ?>
                    </ul>
                </div>
            </div>

            <div id="archives" class="widget widget_archives">
                <div class="wtitle">Archivo&#160;</div>
                <div class="text-content">		
				<ul>
				<?php wp_get_archives('type=monthly'); ?>
				</ul>
                </div>
            </div>

<?php
		wp_list_bookmarks(array(
			'title_before' => '<div class="wtitle">', 'title_after' => '&#160;</div><div class="text-content">', 
			'category_before' => '<div id="links" class="widget widget_links">', 'category_after' => '</div></div>', 
			'show_images' => true
		));
?>
            <div id="meta" class="widget widget_meta">
                <div class="wtitle">Meta&#160;</div>
                <div class="text-content">		
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">XHTML <abbr title="eXtensible HyperText Markup Language">válido</abbr></a></li>
					<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
					<li><a href="http://ayudawordpress.com/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">Ayuda WordPress</a></li>
					<?php wp_meta(); ?>
				</ul>
                </div>
            </div>
			
			<?php endif; ?>
	</div>

