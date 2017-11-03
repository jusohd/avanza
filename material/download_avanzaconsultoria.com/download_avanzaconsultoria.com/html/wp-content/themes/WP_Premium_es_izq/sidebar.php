<div id="sidebar" class="clearfix">

<div id="xsnazzy"><!--Search Box Start -->
<b class="xtop"><b class="xb1"></b><b class="xb2"></b><b class="xb3"></b><b class="xb4"></b></b>
<div class="xboxcontent">

				<div class="tabber">
					 <div class="tabbertab">
						  <h2>Buscar</h2>
  						  <?php include(TEMPLATEPATH."/searchform.php");?>
  					 </div>
					 
					  <div class="tabbertab">
						  <h2>Archivo</h2>
						  <ul class="tablist">
						  <?php wp_get_archives('type=monthly'); ?>
						  </ul>
 					 </div>
 					 
					  <div class="tabbertab">
						  <h2>Categorías</h2>
						  <ul class="tablist">
						  <?php wp_list_categories('orderby=name&title_li'); ?>
						  </ul>
 					 </div>
							
 			</div><!--Tabber end -->
</div>
<b class="xbottom"><b class="xb4"></b><b class="xb3"></b><b class="xb2"></b><b class="xb1"></b></b>
</div><!--Search box end -->


<div class="advertise">
<?php include(TEMPLATEPATH."/sidebar_featured.php"); ?>
</div>

<div id="sidebarwrap" class="clearfix">


<!--Popular  Start -->
<div id="pxsnazzy">
<b class="pxtop"><b class="pxb1"></b><b class="pxb2"></b><b class="pxb3"></b><b class="pxb4"></b></b>
<div class="pxboxcontent">

	<div id="popular">
	<ul>
		<li>
		<h2>Entradas recientes</h2>
		<ul >
			<?php $recent = new WP_Query("showposts=5"); while($recent->have_posts()) : $recent->the_post();?>
			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			<?php endwhile; ?>
		</ul>
		</li>
	</ul>
	<div id="popular-bottom"></div>
	</div>
				 
</div>
<b class="pxbottom"><b class="pxb4"></b><b class="pxb3"></b><b class="pxb2"></b><b class="pxb1"></b></b>
</div><!--Search box end -->

 	<?php include(TEMPLATEPATH."/l_sidebar.php");?>
	<?php include(TEMPLATEPATH."/r_sidebar.php");?>
	 
</div>

</div>

<!--sidebar.php end-->