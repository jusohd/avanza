<div class="wrap_widget">
<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar(1) ) : ?>

<div class="title"><h2>acerca de</h2></div>
<p>Hola, estás viendo el blog <?php bloginfo('name'); ?>. Puedes editar este texto en left_sidebar.php.</p>


<div class="title"><h2>categorías</h2></div>
<ul>
<?php wp_list_cats('sort_column=name&optioncount=1'); ?>
</ul>

<div class="title"><h2>meta</h2></div>
<ul>
<?php wp_meta(); ?>
<?php wp_register(); ?>
<li><?php wp_loginout(); ?></li>
</ul>

<div class="title"><h2>calendario</h2></div>
<?php get_calendar(1); ?>



<?php endif; ?>

</div>