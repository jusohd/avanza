<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="content-left">
<h2 class="pagetitle">Archivo por Mes:</h2>
	<ul class="archive-list">
		<?php wp_get_archives('type=monthly'); ?>
	</ul>
<br /><br /><br />
<h2 class="pagetitle">Archivo por Categoría:</h2>
	<ul class="archive-list">
		 <?php wp_list_categories(); ?>
	</ul>
</div>
<!-- close content-left -->
<?php get_footer(); ?>

