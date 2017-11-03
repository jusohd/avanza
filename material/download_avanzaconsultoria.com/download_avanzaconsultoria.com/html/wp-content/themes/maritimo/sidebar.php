	<div id="sidebar1" class="sidecol">
	<ul>
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>
<li>
	<h2><?php _e('Ultimos articulos'); ?></h2>
	<ul><?php wp_get_archives("type=postbypost&limit=6")?></ul>
</li>
<li>
    <h2>Feed on</h2>
    <ul>
      <li class="feed"><a title="RSS de los articulos" href="<?php bloginfo('rss2_url'); ?>">RSS de los articulos</a></li>
      <li class="feed"><a title="RSS de los comentarios" href="<?php bloginfo('comments_rss2_url'); ?>">RSS de comentarios</a></li>
    </ul>
  </li>
<li>
  <h2><?php _e('Buscar'); ?></h2>
	<form id="searchform" method="get" action="<?php bloginfo('siteurl')?>/">
		<input type="text" name="s" id="s" class="textbox" value="<?php echo wp_specialchars($s, 1); ?>" />
		<input id="btnSearch" type="submit" name="submit" value="<?php _e('Ir'); ?>" />
	</form>
  </li>  
<?php get_links_list(); ?>      
<?php endif; ?>
</ul>
</div>

<div id="sidebar2" class="sidecol">
<ul>
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(2) ) : else : ?>
  <li>
    <h2>
      <?php _e('Categorias'); ?>
    </h2>
    <ul>
      <?php wp_list_cats('optioncount=1&hierarchical=1');    ?>
    </ul>
  </li>
  <li>
    <h2>
      <?php _e('Archivo'); ?>
    </h2>
    <ul>
      <?php wp_get_archives('type=monthly&show_post_count=true'); ?>
    </ul>
  </li>
  <li>
    <h2><?php _e('Paginas'); ?></h2>
    <ul>
      <?php wp_list_pages('title_li=' ); ?>
    </ul>
  </li>
	<li>
      <h2>Admin</h2>
		<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
			<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
			<li><a href="http://ayudawordpress.com.com/" title="Haz clic para descargar mas temas y plugins gratuitos.">Ayuda Wordpress</a></li>
			<?php wp_meta(); ?>
		</ul>			
   </li>
    <?php endif; ?>
</ul>
</div>
<div style="clear:both;"></div>