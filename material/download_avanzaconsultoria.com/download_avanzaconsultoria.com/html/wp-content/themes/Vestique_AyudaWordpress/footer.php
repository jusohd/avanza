<?php wp_footer(); ?>
</div>

<div id="bottom-content"></div>

<div id="footer">
<div id="footer-top"></div>

<div id="footer-content">


<?php if ( !function_exists('dynamic_sidebar')
|| !dynamic_sidebar(3) ) : ?>


<div class="h-block">
<h3><?php _e('Posts Mas Comentados'); ?></h3>
<ul class="list">
<?php get_hottopics(); ?>
</ul>
</div>

<div class="h-block">
<?php if(function_exists("akpc_most_popular")) : ?>
<h3><?php _e('Posts populares'); ?></h3>
<ul class="list">
<?php akpc_most_popular(); ?>
</ul>
<?php else: ?>
<h3><?php _e('Mas Populares'); ?></h3>
<ul class="list">
<li>Debes instalar el plugin "most popular" de alex king</li>
</ul>
<?php endif; ?>
</div>

<div class="h-block">
<h3><?php _e('Posts recientes al azar'); ?></h3>
<ul class="list">
<?php gte_random_posts(); ?>
</ul>
</div>

<?php endif; ?>

</div>
<div id="footer-bottom"></div>
</div>

<div id="footer-close">&copy;2006-<?php the_time('Y'); ?> <a href="<?php echo get_settings('home'); ?>"><?php bloginfo('name'); ?></a><br />
Theme Vestique por <a href="http://www.propertiesforlondon.co.uk">London Properties</a> &amp; <a href="http://www.musicforlondon.co.uk">Wedding Bands</a> | Traducido por  <a href="http://www.ayudawordpress">Guillermo</a>  

</div>
</div>
</div>
</body>
</html>
