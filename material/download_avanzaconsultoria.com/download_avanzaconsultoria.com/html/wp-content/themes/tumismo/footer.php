<div class="content-bottom"></div>
	</div>
</div>


<hr />
<div id="footer">
	<p>
	<?php printf(__('%1$s ha sido creado con %2$s y el tema %3$s'), get_bloginfo('name'), '<a href="http://wordpress.org/" title="WordPress.org">WordPress '.get_bloginfo('version').'</a>', '<a href="http://xuyiyang.com/wordpress-themes/unnamed/" title="Unnamed">UnNamed</a>'.' modificado por <a href="http://ayudawordpress.com/" title="Ayuda Wordpress">Fernando</a>')?><br />
	<a href="<?php if ( get_option('unnamed_rss') != '') { echo (get_option('unnamed_rss')); } else { echo bloginfo('rss2_url'); } ?>"><?php _e('Entradas (RSS)')?> </a><?php _e(' y ')?><a href="<?php bloginfo('comments_rss2_url'); ?>"> <?php _e('Comentarios (RSS)')?></a>
	</p>
	<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
</div>
<?php wp_footer(); ?>

</body>
</html>