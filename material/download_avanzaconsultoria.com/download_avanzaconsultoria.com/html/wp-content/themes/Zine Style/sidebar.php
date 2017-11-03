 <div class="sidebar">
 <form id="searchform" method="get" action="<?php bloginfo('home'); ?>"><div id="search"><input type="text" name="s" id="s" size="15" value="<?php _e("Escribe aquí lo que buscas .. "); ?>" onfocus="if(this.value=='<?php _e("Escribe aquí lo que buscas .. "); ?>') this.value='';"/></div></form>
 <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar') ) : else : ?>
  <div class="widget">
   <div class="inner">
    <h2>Categorías</h2>
	<ul><?php wp_list_cats(); ?></ul><br clear="all" /><br clear="all" />
   </div>
  </div>
  <div class="widget">
   <div class="inner">
    <h2>Entradas recientes</h2>
	<ul class="recent"><?php mdv_recent_posts('5'); ?></ul>
   </div>
  </div>
  <div class="widget">
   <div class="inner">
   <h2>Últimos vídeos</h2>
   <img src="<?php bloginfo('stylesheet_directory'); ?>/images/featuredvideo.gif" />
   </div>
  </div>
  <div class="widget">
   <div class="inner">
    <h2>Archivo</h2>
    <ul class="archives"><?php wp_get_archives('type=monthly'); ?></ul><br clear="all" />
   </div>
  </div>
  <?php endif; ?>
  </div>
