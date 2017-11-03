<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

<div class="page_archives_div entry">

<div class="ar_panel">
	<h2>Por Mes:</h2>
	<ul class="dark">
		<?php wp_get_archives('type=monthly'); ?>
	</ul>
</div>

<div class="ar_panel">
	<h2>Por Categoría:</h2>
	<ul>
		 <?php wp_list_categories('title_li='); ?>
	</ul>
</div>

</div>

<?php get_footer(); ?>
