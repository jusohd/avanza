  <div id="sidebar-wrapper">

	<?php include (TEMPLATEPATH . "/ads.php"); ?>

	<div id="sidebar1">
	  <ul>
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Left') ) : ?>
		<li>
			<h2><?php _e('Categorías'); ?></h2>
			<ul>
				<?php wp_list_cats('optioncount=1');    ?>
			</ul>		
		</li>
		<li>
			<h2><?php _e('Archivo'); ?></h2>
			<ul>
				<?php wp_get_archives('type=monthly&show_post_count=true'); ?>
			</ul>		
		</li>
		<li>
			<h2><?php _e('Publicidad'); ?></h2>
			<a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/ads200x200.jpg" title="Anúnciate aquí" alt="Anúnciate aquí" /></a>
		</li>
		<?php endif; ?>
	  </ul>
	</div>

	<div id="sidebar2">
	  <ul>
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Right') ) : ?>
		<li>
			<h2><?php _e('Meta'); ?></h2>
			<ul>
				<?php wp_register(); ?>
				<li><?php wp_loginout(); ?></li>
				<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
				<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
				<li><a href="http://ayudawordpress.com/" title="Ayuda Wordpress.">Ayuda WordPress</a></li>
				<?php wp_meta(); ?>
			</ul>		
		</li>
		<?php get_links_list('name'); ?>
		<?php endif; ?>
	  </ul>
	
	</div>

  
  </div>

