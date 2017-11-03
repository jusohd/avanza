<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

<?php include(TEMPLATEPATH."/left.php");?>

<?php include(TEMPLATEPATH."/right.php");?>
<div id="middlepic"></div>
<div id="content">

<?php get_header(); ?>
<div id="arch">
<h2>Archivo</h2>
<br/>
Archivo por Mes:
  <ul>
    <?php wp_get_archives('type=monthly'); ?>
  </ul>

Archivo por Categorias:
  <ul>
     <?php wp_list_cats(); ?>
  </ul>
</div>
</div>

<?php get_footer(); ?>
