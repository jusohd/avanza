<!--r_sidebar start-->

<div id="r_sidebar">
  <!--sidebar.php-->
  <!--125x125 ads-->
  <?php include (TEMPLATEPATH . '/ad_125.php'); ?>
  <?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar(1) ) : ?>
  <!--rss feed-->
  <div class="widget_box">
    <h2>RSS</h2>
      <ul>
        <li><a href="#">Suscríbete a este blog por RSS</a></li>
        <li><a href="#">Suscríbete a este blog por Email</a></li>
      </ul>
  </div>
<!--group start -->
  <div class="usual">
        <ul class="idTabs">
          <li><a class="selected" href="#RECENT">RECIENTES</a></li>
          <li><a class="" href="#ARCHIVE">ARCHIVO</a></li>
		  <li><a class="" href="#TOPICS">TEMAS</a></li>
		  <li><a class="" href="#TAGS">TAGS</a></li>
        </ul><div class="widget_box">
        <div style="display: block;" id="RECENT"><ul><?php get_archives('postbypost', 10); ?></ul></div>
        <div style="display: none;" id="ARCHIVE"><ul><?php wp_get_archives('type=monthly'); ?></ul></div>
		<!--list of categories, order by name, without children categories, no number of articles per category-->
		<div style="display: none;" id="TOPICS"><ul><?php wp_list_categories('orderby=name&title_li'); ?></ul></div>
		<div style="display: none;" id="TAGS"><?php wp_tag_cloud('smallest=8&largest=22'); ?></div>
</div>
</div>
<!--group end -->
<!--search -->
<div class="widget_box">
  <h2>Búsqueda</h2>
  <?php include (TEMPLATEPATH . '/searchform.php'); ?>
  </div>
  <!--search end -->
   <div class="widget_box">
    <h2>Blogroll</h2>
    <ul>
      <?php get_links(-1, '<li>', '</li>', ''); ?>
    </ul>
  </div>

  <!--links or blogroll-->

  <!--sidebar.php end-->
  <?php endif; ?>
  <?php include (TEMPLATEPATH . '/ad_300.php'); ?>
  </div>
<!--r_sidebar end-->
