<div id="l_sidebar">
<ul>
<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar(1) ) : ?>

<!--About Section-->
<li>
    <h2>Sobre</h2>
	<p>Editar esta informacion en el archivo sidebar.php</p>
</li>

<?php if (function_exists('wp_tag_cloud')) { ?>
<li>
	<h2>Nube de tags</h2>
	<?php wp_tag_cloud(); ?>
</li>
<?php } ?>

<?php endif; ?>
</ul>
</div>

<div id="m_sidebar">
<ul>
<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar(2) ) : ?>

<!--list of categories, order by name, without children categories, no number of articles per category-->
<li>	
	<h2>Categorias</h2>			
	<ul>
	<?php wp_list_categories('orderby=name&title_li'); ?>
	</ul>
</li>

<?php endif; ?>
</ul>
</div>

<div id="r_sidebar">
<ul>
<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar(3) ) : ?>

<!--archives ordered per month-->
<li>
    <h2>Archivos</h2>
	<ul>
	<?php wp_get_archives('type=monthly'); ?>
	</ul>
</li>

<!--you will set this only at frontpage or of a static page, login logout, register,validate links, link to wordpress -->

<?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>				
<li>
    <h2>Meta</h2>
    <ul>
    <?php wp_register(); ?>
    <li><?php wp_loginout(); ?></li>
	<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
	<?php wp_meta(); ?>
	</ul>
</li>
<?php } ?>

<?php endif; ?>
</ul>
</div>