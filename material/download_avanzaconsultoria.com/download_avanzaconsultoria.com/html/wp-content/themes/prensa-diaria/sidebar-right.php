<div id="sidebar-area">
	<div id="sidebar">
	<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar(2) ) : ?>
	  <ul>
	  	<li id="search">
		<h2>Buscar</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>
		</li>
		<li id="info">
			<!-- change this part -->
		<h2>Acerca de …</h2>
			Aqui puedes escribir lo que quieras acerca de tu blog o el autor. 
		</li>
		<li id="meta">
		<h2><?php _e('Redaccion'); ?></h2>
		<ul>
		<?php wp_register(); ?>
		<li><?php wp_loginout(); ?></li>
		<li><a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Suscribirse a las entradas'); ?>"><?php _e('Entradas <abbr title="Suscribirse a las entradas del blog">RSS</abbr>'); ?></a></li>
		<li><a href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php _e('Suscribirse a los comentarios de blog'); ?>"><?php _e('Comentarios <abbr title="Suscribirse a los comentarios del blog">RSS</abbr>'); ?></a></li>
        <li><a href="http://ayudawordpress.com/" title="Descarga mas temas en castellano">Ayuda Wordpress</a></li>
		
		<?php wp_meta(); ?>
		</ul>
		<br />
	</li>
	
      </ul>     
	  		
<?php endif; ?>
</div>
</div>
