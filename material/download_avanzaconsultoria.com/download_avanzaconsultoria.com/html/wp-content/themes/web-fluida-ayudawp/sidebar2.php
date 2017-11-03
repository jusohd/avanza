		<div style="text-align:center">
<a href="feed:<?php bloginfo('rss2_url'); ?>"><img src="<?php bloginfo('template_url'); ?>/img/feed.gif" alt="XML Feed" width="62" height="73" border="0" id="feed"/></a></div><br />
		<ul id="sidebarright">
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(2) ) : else : ?>
<li id="search">
   <?php _e('<h2>Buscar</h2>'); ?>
   <form id="searchform" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	<div>
		<input type="text" name="s" id="s" size="15" />
		<input type="submit" value="<?php _e('Buscar'); ?>" />
	</div>
	</form>
 </li>
	<?php get_links_list(); ?>
<li id="meta"><?php _e('<h2>Admin</h2>'); ?>
 	<ul>
		<?php wp_register(); ?>
		<li><?php wp_loginout(); ?></li>
		<li><a href="feed:<?php bloginfo('rss2_url'); ?>" title="<?php _e('Suscribirse usando RSS'); ?>"><?php _e('<abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>
		<li><a href="feed:<?php bloginfo('comments_rss2_url'); ?>" title="<?php _e('Suscribirse a los comentarios RSS'); ?>"><?php _e('Comentarios <abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>
		<li><a href="http://validator.w3.org/check/referer" title="<?php _e('This page validates as XHTML 1.0 Transitional'); ?>"><?php _e('Validar <abbr title="eXtensible HyperText Markup Language">XHTML</abbr>'); ?></a></li>
        <li><a href="http://ayudawordpress.com/" title="<?php _e('Ayuda sobre Wordpress.'); ?>"><abbr title="WordPress">Ayuda Wordpress</abbr></a></li>
		<li><a href="http://wordpress.org/" title="<?php _e('Creado con Wordpress.'); ?>"><abbr title="WordPress">Wordpress</abbr></a></li>
		<?php wp_meta(); ?></ul></li>
<?php endif; ?>

		</ul>
