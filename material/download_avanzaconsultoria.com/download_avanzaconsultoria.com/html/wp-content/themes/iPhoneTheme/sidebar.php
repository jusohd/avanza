<div id="content-right">
	<div id="feeds">
		<span><a href="#">Suscríbete al RSS Feed</a><br />entérate de las novedades <br />del blog en tu ordenador</span>
	</div>
	<!-- close feeds -->
	<div id="right-sidebar" class="sidebar">
		<ul>
			<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Right Sidebar')): ?>
				<li><h2>Entradas recientes</h2>
					<ul>
					<?php
					$recentposts = get_posts('numberposts=10');
					foreach ($recentposts as $post)
					{
					setup_postdata($post);
					?>
					<li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
					<?php } ?>
					</ul>
				</li>
                                <li><h2>Archivo</h2>
					<ul>
					<?php wp_get_archives('type=monthly'); ?>
					</ul>
				</li>
			<?php endif; ?>
		</ul>
	</div>
	<!-- end right sidebar -->
	
	<div id="left-sidebar" class="sidebar">
		<ul>
			<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Left Sidebar')): ?>
			<li><h2>Acerca de</h2>
			<p>Algo acerca de ti, el autor. Nada largo, solo un bosquejo.</p>
			</li>		
			<?php wp_list_categories('show_count=1&title_li=<h2>Categories</h2>'); ?>
			<?php endif; ?>
		</ul>
	</div>
	<!-- close left-sidebar -->
	
	<div id="links" class="wide-widget">
		<h2>Blogroll</h2>
		<center><a href="#"><img src="<?php bloginfo('stylesheet_directory')?>/images/ad-img.png" alt="" width="125px" height="125px" /></a>
		<a href="#"><img src="<?php bloginfo('stylesheet_directory')?>/images/ad-img.png" alt="" width="125px" height="125px" /></a>
		<a href="#"><img src="<?php bloginfo('stylesheet_directory')?>/images/ad-img.png" alt="" width="125px" height="125px" /></a></center>
	</div>
	<!-- close links -->
</div>
<!-- close content-right -->		
