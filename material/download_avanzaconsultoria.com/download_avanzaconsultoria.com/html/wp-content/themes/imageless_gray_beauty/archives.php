<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>
<div id="content_wrapper">
<div id="content">
<div class="posts">
<div class="padding10">
<h2>ARCHIVO</h2>
Archivo por Mes:
  <ul>
    <?php wp_get_archives('type=monthly'); ?>
  </ul>

Archivo por Categoría:
  <ul>
     <?php wp_list_cats(); ?>
  </ul>
</div>
</div>
</div>
<!--content end-->
<!--include sidebar-->
<?php include(TEMPLATEPATH."/r_sidebar.php");?>
<!--include footer-->
</div>
<?php get_footer(); ?>
