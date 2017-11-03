<div class="clearfix"></div>
</div>
<div class="container-bottom"></div>

<div id="footer">
<div id="footer-wrap">

<p class="copyright">Creado con <a href="http://wordpress.org/">Wordpress</a> | Tema <a href="http://wpremix.com/">WP Remix</a> traducido por <a href="http://ayudawordpress.com">Fernando</a>. <br />
Copyright <?php echo date('Y'); ?>. <?php bloginfo('name'); ?>. Todos los derechos reservados</p>
<ul id="nav-footer"> 
	<li class="<?php if (is_home()) { echo "current_page_item"; } ?>"><a href="<?php echo get_settings('home'); ?>">Inicio</a></li>		
	<?php wp_list_pages('title_li=&depth=1&exclude='); ?>
</ul>

<?php wp_footer(); ?>
</div>
</div>

</body>
</html>