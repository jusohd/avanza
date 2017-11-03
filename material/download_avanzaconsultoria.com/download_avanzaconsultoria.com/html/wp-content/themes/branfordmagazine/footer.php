</div> 
<div id="footer"> 
  <?php wp_footer(); ?>
  <div> &#169; <?php echo date('Y'); ?> 
    <?php bloginfo('name'); ?>
    | <a href="http://www.wp-themes.der-prinz.com/magazine/" target="_blank" title="By DER PRiNZ - Michael Oeser"> Plantilla BranfordMagazine 1.2</a> de <a href="http://www.der-prinz.com" target="_blank" title="DER PRiNZ - Michael Oeser">Michael Oeser</a> | Traducida por <a href="http://ayudawordpress.com/">Ayuda Wordpress</a></div>

  <div>
    <?php wp_loginout(); ?> | 
    <?php wp_register('', ' |'); ?>
	<?php echo get_num_queries(); ?> peticiones. <?php timer_stop(1); ?> segundos.
  </div>
</div>
</body>
</html>
