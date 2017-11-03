<div id="sidebar">

<div id="left">

<h2>Buscar en el Blog</h2>
<?php include (TEMPLATEPATH . '/searchform.php'); ?>

<h2>Categorias</h2>
<ul class="menublock">
<?php list_cats(0, '', 'name', 'asc', '', 1, 0, 0, 1, 1, 1, 0,'','','','','') ?>
</ul>
	
<h2>Ultimas entradas</h2>
<ul class="menublock">
<p><?php wp_get_archives('type=postbypost&limit=05'); ?></p>			
</ul>

</div>

<div id="right"> 

<? if (function_exists('do_calendar')) { do_calendar(); } ?>

   <h2>BlogRoll</h2>
        <ul>
      <li><?php get_linksbyname('', '', '<br />', '', TRUE, 'name', FALSE, TRUE); ?></li>
        </ul>

<h2>Flickr:</h2>
<div id="flickr">
<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=4&amp;display=random&amp;size=s&amp;layout=x&amp;source=all_tag&amp;tag=art"></script>
</div>	
<br/>

<h2>Rss Feed</h2>
<ul class="menublock">
	<li><a href="http://add.my.yahoo.com/rss?url=<?php bloginfo('rss2_url'); ?>" title="<?php bloginfo('name'); ?>"><img src="http://us.i1.yimg.com/us.yimg.com/i/us/my/addtomyyahoo4.gif" alt="" style="border:0"/></a></li>
	<li><a href="http://www.newsgator.com/ngs/subscriber/subext.aspx?url=<?php bloginfo('rss2_url'); ?>" title="<?php bloginfo('name'); ?>"><img src="http://www.newsgator.com/images/ngsub1.gif" alt="Suscribirse a NewsGator Online" style="border:0"/></a></li>
	<li><a href="http://fusion.google.com/add?feedurl=<?php bloginfo('rss2_url'); ?>"><img src="http://buttons.googlesyndication.com/fusion/add.gif" width="104" height="17" style="border:0" alt="Añadir a Google"/></a></li>
	<li><a href="http://feeds.my.aol.com/add.jsp?url=<?php bloginfo('rss2_url'); ?>"><img src="http://myfeeds.aolcdn.com/vis/myaol_cta1.gif" alt="Añadir a My AOL" style="border:0"/></a></li>
	<li><a href="http://my.feedlounge.com/external/subscribe?url=<?php bloginfo('rss2_url'); ?>"><img src="http://static.feedlounge.com/buttons/subscribe_0.gif" alt="Suscribirse a FeedLounge" title="Suscribirse a FeedLounge" border="0" /></a></li>
	<li><a href="http://www.netvibes.com/subscribe.php?url=<?php bloginfo('rss2_url'); ?>"><img src="http://www.netvibes.com/img/add2netvibes.gif" width="91" height="17" alt="Añadir a netvibes" style="border:0" /></a></li>
	<li><a href="http://www.bloglines.com/sub/<?php bloginfo('rss2_url'); ?>" title="<?php bloginfo('name'); ?>" type="application/rss+xml"><img src="http://www.bloglines.com/images/sub_modern1.gif" alt="Suscribirse a Bloglines" style="border:0"/></a></li>
</ul>

<h2>Meta</h2>
<ul class="menublock">
<li><a href="<?php bloginfo('rss2_url'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/rss.gif" border="0" title="Suscribirse a RSS feed" alt="Suscribirse a RSS feed"/></a></li>
<?php wp_meta(); ?>
<?php wp_register(); ?>
<li><?php wp_loginout(); ?></li>



</ul>

</div>
</div>

