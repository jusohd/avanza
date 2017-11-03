<?php get_header(); ?>
<?php include (TEMPLATEPATH . '/searchform.php'); ?>
   <div class="title">   
    <div class="left"><h1>Archivo por mes:</h1></div>
	<div class="right">&nbsp;</div><br clear="all" />
   </div>
   <div class="post">
	<ul>
		<?php wp_get_archives('type=monthly'); ?>
	</ul>
	<h2>Archivo por categorías:</h2>
	<ul>
		 <?php wp_list_categories(); ?>
	</ul>
   </div>
<?php get_footer(); ?>
