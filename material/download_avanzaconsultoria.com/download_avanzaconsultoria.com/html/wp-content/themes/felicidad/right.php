<div id="right">

<div id="rpic"></div>

<?php include (TEMPLATEPATH . '/searchform.php'); ?>

<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar(2) ) : ?>

<h2>Enlaces de interes</h2>
	<ul>
	<li><a href="http://ayudawordpress.com">Ayuda Wordpress</a></li>
	<li><a href="http://wordpress.org">Wordpress</a></li>	
	</ul>


	
<h2>Mas enlaces</h2>
	<ul>
	<li><a href="http://ayudawordpress.com/tag/Avanzado/">Manuales Wordpress</a></li>
	<li><a href="http://ayudawordpress.com/tag/Principiante/">Manuales para principiantes</a></li>	
	</ul>


<?php endif; ?>

</div>