<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

<div id="content" class="widecolumn">

<h2 class="title">Archivo del Mes:</h2>
  <ul class="archive">
    <?php wp_get_archives('type=monthly'); ?>
  </ul>

<h2 class="title">Archivo por Seccion:</h2>
  <ul class="archive">
     <?php wp_list_cats(); ?>
  </ul>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
