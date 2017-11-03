<div id="footer">
<div class="footer_links">
<div class="footer_menu">
<div class="footer_right">
<?php if(function_exists("get_mostcommented")) : ?>
<h4>Entrada mas comentada</h4>
<ul>
<?php get_mostcommented(); ?>
</ul>
<?php endif; ?>
</div>

<div class="footer_left">
<h4>Entradas Recientes</h4>
<ul>
<?php get_archives('postbypost', 10); ?>
</ul>
</div>

<div class="footer_middle">
<?php if(function_exists("get_recent_comments")) : ?>
<h4>Comentarios Recientes</h4>
<ul>
<?php get_recent_comments(); ?>
</ul>
<?php endif; ?>
</div>

</div>
</div>

<div class="footer_copyright">
<div class="right_fc"><p>Plantilla de <a href="http://www.wpthemesplugin.com">Wordpress Themes</a> y <a href="http://www.romow.com/" title="Romow Internet Marketing Center">Internet Marketing Center</a> | Traducida por <a href="http://ayudawordpress.com/">Fernando</a> </p>
</div>

<div class="left_fc">
<p>Modifica esto en footer.php</p>
		  </div>
	    </div>
      </div>
    </div>
  </div>
</div>
<?php wp_footer(); ?> 
</body>
</html>
