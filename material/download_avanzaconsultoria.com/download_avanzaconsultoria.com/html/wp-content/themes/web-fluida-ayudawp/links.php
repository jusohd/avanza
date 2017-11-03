<?php
/*
Template Name: Links
*/
?>
  <div id="container" class="clearfix">
    <div id="leftnav">
	  <?php get_sidebar(); ?>
    </div>
	
    <div id="rightnav">
	  <?php include (TEMPLATEPATH . '/sidebar2.php'); ?>
</div>
<div id="content">

<h2>Enlaces:</h2>
<ul>
<?php get_links_list(); ?>
</ul>

</div>	
</div>
<?php get_footer(); ?>
