</div>

<hr />
<div id="footer">
	<p>
		<a href="<?php echo get_settings('home'); ?>/"><?php bloginfo('name'); ?> esta creado con 
		<a href="http://wordpress.org/">WordPress</a> y la plantilla <a href="http://sandbox.avalonstar.com">ChaoticSoul</a> traducida y modificada por <a href="http://ayudawordpress.com">Fernando</a>.
		<br /><a href="feed:<?php bloginfo('rss2_url'); ?>">RSS de las fotografias</a>
		y <a href="feed:<?php bloginfo('comments_rss2_url'); ?>">RSS de las criticas</a>.
		<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
	</p>
</div>
</div>

<?php wp_footer(); ?>
</body>
</html>
