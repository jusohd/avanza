<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>
  <div id="container" class="clearfix">
    <div id="leftnav">
	  <?php get_sidebar(); ?>
    </div>
	
    <div id="rightnav">
	  <?php include (TEMPLATEPATH . '/sidebar2.php'); ?>
</div>
<div id="content">

<?php include (TEMPLATEPATH . '/searchform.php'); ?>

<h2>Archivo por mes:</h2>
  <ul>
    <?php wp_get_archives('type=monthly'); ?>
  </ul>

<h2>Archivo por tema:</h2>
  <ul>
     <?php wp_list_cats(); ?>
  </ul>
</div>
</div>	
<?php get_footer(); ?>
