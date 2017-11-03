<div id="sidebar">
  <ul id="sidelist">
    <?php 	/* Widgetized sidebar, if you have the plugin installed. */
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(1) ) : ?>
    <?php endif; ?>
    <?php
// this is where 10 headlines from the current category get printed	  
if ( is_single() ) :
global $post;
$categories = get_the_category();
foreach ($categories as $category) :
?>
    <li>
      <h2>Mas artículos de esta sección</h2>
      <ul class="bullets">
        <?php
$posts = get_posts('numberposts=10&category='. $category->term_id);
foreach($posts as $post) :
?>
        <li><a href="<?php the_permalink(); ?>">
          <?php the_title(); ?>
          </a></li>
        <?php endforeach; ?>
        <li><strong><a href="<?php echo get_category_link($category);?>" title="Ver todos los archivos de la sección <?php echo $category->name; ?>"
              for '<?php echo $category->name; ?>' &raquo;</a></strong></li>
      </ul>
    </li>
    <?php endforeach; endif ; ?>
    <?php if ( is_home() ) { ?>
    <li>
      <h3>
        <?php 
	// this is where the name of the News (or whatever) category gets printed	  
	wp_list_categories('include=1&title_li=&style=none'); ?>
      </h3>
      <?php 
// this is where the last three headlines are pulled from the News (or whatever) category	  
		query_posts('showposts=3&cat=1'); 		
		?>
      <ul class="bullets">
        <?php while (have_posts()) : the_post(); ?>
        <li><a href="<?php the_permalink() ?>" rel="bookmark">
          <?php the_title(); ?>
          </a></li>
        <?php endwhile; ?>
      </ul>
    </li>
    <?php } ?>
    <li>
      <h3>Secciones</h3>
      <ul class="subnav">
       <?php wp_list_categories('orderby=order&hide_empty=1&title_li=&exclude=7');?>
      </ul>
    </li>
    <li>
      <h3>Anuncios y Patrocinadores</h3>
      <!-- I placed this advert here only to not let this place empty. You can remove or change it as you like -->
      <img src="<?php bloginfo('template_url'); ?>/images/Advert.gif" width="250" height="250" /> </li>
    <li>
      <h3>Hemeroteca</h3>
      <?php get_archives('monthly','',''); ?>
    </li>
    <li>
      <h3>Mantente informado</h3>
      <ul class="feed">
        <li><a href="<?php bloginfo('rss2_url'); ?>">Artículos (RSS)</a></li>
        <li><a href="<?php bloginfo('comments_rss2_url'); ?>">Comentarios (RSS)</a></li>
      </ul>
    </li>
    <li>
      <h3>Quien escribe aquí</h3>
      <ul class="bullets">
        <?php wp_list_authors ('exclude_admin=0&show_fullname=1&hide_empty=1&feed_image=' .get_bloginfo('template_url') . '/images/rss.gif&feed=XML'); ?>
      </ul>
    </li>
  </ul>
  <!--END SIDELIST-->
</div>
<!--END SIDEBAR-->
