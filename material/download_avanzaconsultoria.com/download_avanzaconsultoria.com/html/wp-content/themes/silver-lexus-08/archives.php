<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

<div id="content" class="widecolumn">

<?php include (TEMPLATEPATH . '/searchform.php'); ?>

<h2>Archivo por Mes:</h2>
  <ul>
    <?php wp_get_archives('type=monthly'); ?>
  </ul>

<h2>Archivo por Categoría:</h2>
  <ul>
     <?php wp_list_cats(); ?>
  </ul>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
