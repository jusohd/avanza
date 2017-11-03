<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

<div id="content">

<?php include (TEMPLATEPATH . '/searchform.php'); ?>

<h2>Hemeroteca por Meses:</h2>
	<ul>
		<?php wp_get_archives('type=monthly'); ?>
	</ul>

<h2>Hemeroteca por Secciones:</h2>
	<ul>
		 <?php wp_list_categories(); ?>
	</ul>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
