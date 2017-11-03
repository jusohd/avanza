<?php get_header(); ?>
<div id="content">

   <?php
 // Include tabs with the lead story 
	include(TEMPLATEPATH . '/tabs.php'); ?>
   

  <div id="leftcol">
    <?php 
// "Featured articles" module begins	  
	query_posts('showposts=3&cat=7'); ?>
    <h3>
	<?php 
	// name of the "featured articles" category gets printed	  
	wp_list_categories('include=7&title_li=&style=none'); ?></h3>
    <?php while (have_posts()) : the_post(); ?>
    <div class="feature"><a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>"><img src="<?php bloginfo('url'); ?>/wp-content/uploads/
	<?php 
// this is where the custom field prints images for each Feature	  
	$values = get_post_custom_values("featuredarticleimage"); echo $values[0]; ?>" alt="" /></a><a href="<?php the_permalink() ?>" rel="bookmark" class="title">
      <?php 
// title of the "featured articles"	  
	  the_title(); ?></a>
<p><?php the_content_rss('', TRUE, '', 20); ?></p>
      </div>
    <?php endwhile; ?>
          
  </div><!--END LEFTCOL-->
  
  
  <div id="rightcol">
    <?php
// enter the IDs of which categories you want to display
$display_categories = array(3,4,5,6);
foreach ($display_categories as $category) { ?>
    <div class="clearfloat">
      <?php query_posts("showposts=1&cat=$category");
	    $wp_query->is_category = false;
		$wp_query->is_archive = false;
		$wp_query->is_home = true;
		 ?>
      <h3><a href="<?php echo get_category_link($category);?>"><?php 
	// name of each category gets printed	  
	  single_cat_title(); ?></a></h3>
      <?php while (have_posts()) : the_post(); ?>
      <?php
// this grabs the image filename
	$values = get_post_custom_values("rightcolimage");
// this checks to see if an image file exists
	if (isset($values[0])) {						
?>
      <a href="<?php the_permalink() ?>" rel="bookmark" title="Enlace permanente a <?php the_title(); ?>"><img src="<?php bloginfo('url'); ?>/wp-content/uploads/<?php $values = get_post_custom_values("rightcolimage"); echo $values[0]; ?>" alt="" /></a>
      <?php } ?>
      <a href="<?php the_permalink() ?>" rel="bookmark" class="title"><?php 
// this is where title of the article gets printed	  
	  the_title(); ?></a><br />
      <?php the_excerpt() ; ?>
      <?php endwhile; ?>
    </div>
    <?php } ?>
  </div><!--END RIGHTCOL-->
</div><!--END CONTENT-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
