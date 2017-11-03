<?php
/*
Template Name: Pagina de archivos
*/
?>

<?php get_header(); ?>

<div id="content" class="widecolumn">


 <h2>Archivo mensual</h2>
  <ul>
    <?php wp_get_archives('type=monthly'); ?>
  </ul>

</div>	

<?php include ('sidebar.php'); ?>

<?php get_footer(); ?>
