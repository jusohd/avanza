<div id="sidebar">


<div class="widget-sidebar">

<div class="div-rss">
<p><a href="<?php bloginfo('rss2_url'); ?>">Subscribirse via feeds</a></p>
<p><a href="<?php bloginfo('rss2_url'); ?>">Subscribirse via email</a></p><br />
<a href="<?php bloginfo('rss2_url'); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/feedsburn.gif" alt="feeds" /></a>
</div>


<h3>Anunciantes</h3>
<div class="ads">
<a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/b5.png" alt="b5" /></a>
<a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/lw.gif" alt="b5" /></a>
<a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/b5.png" alt="b5" /></a>
<a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/lw.gif" alt="b5" /></a>
<a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/b5.png" alt="b5" /></a>
<a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/lw.gif" alt="b5" /></a>
<a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/b5.png" alt="b5" /></a>
<a href="#"><img src="<?php bloginfo('template_directory'); ?>/images/lw.gif" alt="b5" /></a>
</div>

<h3>Articulos</h3>
<div class="f-box">
<?php $my_query = new WP_Query('category_name=&showposts=5');
while ($my_query->have_posts()) : $my_query->the_post();
$do_not_duplicate = $post->ID; ?>
<?php $values = get_post_custom_values("featured-images");
if ( is_array($values)) : ?>
<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><img src="<?php echo "$values[0]"; ?>" alt="<?php the_title(); ?>" /></a>
<?php endif; ?>
<h1><?php the_title(); ?></h1>
<?php the_excerpt_feature(); ?>
<br /><br />
<?php endwhile;?>
</div>



<h3>Tags</h3>
<div class="tag-box">
<?php if(function_exists("UTW_ShowTagsForCurrentPost")){  ?>
<?php UTW_ShowWeightedTagSetAlphabetical("sizedtagcloud","","70"); ?>
<?php } elseif(function_exists("wp_tag_cloud")) { ?>
<?php wp_tag_cloud('smallest=10&largest=20&'); ?>
<?php } else { ?>
<?php wp_list_categories('orderby=id&show_count=0&use_desc_for_title=0&title_li='); ?>
<?php } ?>
</div>




<?php if ( !function_exists('dynamic_sidebar')
|| !dynamic_sidebar(2) ) : ?>


<h3><?php _e('Buscar'); ?></h3>
<ul class="nolist">
<li>
<form method="get" id="search-form" action="<?php bloginfo('url'); ?>/">
<input name="s" type="text" class="search-field" value="Ingrese su busqueda" onfocus="if (this.value == 'Ingrese su busqueda') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Ingrese su busqueda';}" size="10" tabindex="1" />
</form>
</li>
</ul>


<?php if(function_exists("wp_theme_switcher")) : ?>
<h3><?php _e('Themes'); ?></h3>
<?php wp_theme_switcher('dropdown'); ?>
<?php endif; ?>

<h3><?php _e('Categorias'); ?></h3>
<ul class="list">
<?php wp_list_categories('orderby=id&show_count=1&use_desc_for_title=0&title_li='); ?>
</ul>

<h3><?php _e('Archivos'); ?></h3>
<ul class="list">
<?php wp_get_archives('type=monthly&limit=12&show_post_count=1'); ?>
</ul>


<h3><?php _e('Paginas'); ?></h3>
<ul class="list">
<?php wp_list_pages('title_li=&depth=0'); ?>
</ul>


<h3><?php _e('Meta'); ?></h3>
<ul class="list">
<?php wp_register(); ?>
<li><?php wp_loginout(); ?></li>
<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid XHTML</a></li>
<li><a href="http://jigsaw.w3.org/css-validator/validator?uri=<?php echo get_settings('home'); ?>&amp;usermedium=all">Valid CSS</a></li>
<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
<?php wp_meta(); ?>
</ul>

<?php endif; ?>

</div>

</div>