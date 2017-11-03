
<div id="l_sidebar" class="clearfix">

 	<ul>
	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>

	<li>
    	<h2>Entradas recientes</h2>
        <ul>
        <?php get_archives('postbypost', 10); ?>
        </ul>
	</li>

	<li>
	    <h2>Categorías</h2>			
	    <ul>
	    <?php wp_list_categories('orderby=name&title_li'); ?>
	    </ul>
	</li>

	<?php endif; ?>
	</ul>
</div>