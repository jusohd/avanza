	<div id="sidebar" class="sidebar">
	<ul>
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Right Sidebar') ) : else : ?>
  <li>
    <h3><?php _e('Paginas'); ?></h3>
    <ul>
      <?php wp_list_pages('title_li=' ); ?>
    </ul>
  </li>
<li>
  <h3><?php _e('Buscar'); ?></h3>
	<form id="searchform" method="get" action="<?php bloginfo('siteurl')?>/">
		<input type="text" name="s" id="s" class="textbox" value="<?php echo wp_specialchars($s, 1); ?>" />
		<input id="btnSearch" type="submit" name="submit" value="<?php _e('Go'); ?>" />
	</form>
  </li>
<li>
	<h3><?php _e('Categorias'); ?></h3>
	<ul>
		<?php wp_list_categories('show_count=1&hierarchical=1&title_li=');    ?>
	</ul>
</li>    
<?php endif; ?>
</ul>
</div>
</div><?php //closing for #main?>

<div id="leftside" class="sidebar">
<ul>
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Left Sidebar') ) : else : ?>
  <li>
    <h3>
      <?php _e('Mensuales'); ?>
    </h3>
    <ul>
      <?php wp_get_archives('type=monthly&show_post_count=1'); ?>
    </ul>
  </li>
	<?php if (function_exists('wp_tag_cloud')) {	?>
	<li>
		<h3>
			<?php _e('Tags'); ?>
		</h3>
		<p>
			<?php wp_tag_cloud(); ?>
		</p>
	</li>
	<?php } ?>
	<?php if(is_home()) {?>
  <?php get_links_list(); ?>    
  <li>
		<h3>Meta</h3>
		<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
			<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
			<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
			<?php wp_meta(); ?>
		</ul>			
   </li>
  <?php }?>
  <?php endif; ?>	
</ul>
</div>
<div style="clear:both;"></div>
</div><?php //closing for #outer?>
<div style="clear:both;"></div>
	