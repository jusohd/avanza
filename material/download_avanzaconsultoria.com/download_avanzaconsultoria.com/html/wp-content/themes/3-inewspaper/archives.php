<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>
<?php get_sidebar(); ?>


<div id="content" class="narrowcolumn_single">

<?php include (TEMPLATEPATH . '/searchform.php'); ?>
<p></p>

<p><h2>Hemeroteca por Meses:</h2>
	<ul>
		<?php wp_get_archives('type=monthly'); ?>
	</ul></p>

<p><h2>Hemeroteca por Secciones:</h2>
	<ul>
		 <?php wp_list_categories(); ?>
	</ul></p>

</div>


<?php get_footer(); ?>
