<div id="sidebar2">

<li>
<h2>Entradas Recientes:</h2>
  <ul class="menublock">
    <?php $latest = new WP_Query('showposts=5');
      while ($latest->have_posts()) : $latest->the_post(); ?>
<li><a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>"><?php the_title(); ?></a></li>
    <?php endwhile; ?>
  </ul></li>

<?php if (is_archive() | is_single()) : ?>
<li>
<h2>Rss Feed</h2>
<ul class="menublock">
<li><a href="http://www.bloglines.com/sub/<?php bloginfo('rss2_url') ?>" title="Añadir este sitio a Bloglines" rel="syndication">[+] Bloglines</a></li>
<li><a href="http://www.feedster.com/myfeedster.php?action=addrss&amp;rssurl=<?php echo urlencode(get_bloginfo('rss2_url')) ?>&amp;confirm=no" title="Añadir este sitio a Feedster" rel="syndication">[+] Feedster</a></li>
<li><a href="http://www.google.com/reader/preview/*/feed/<?php bloginfo('rss2_url') ?>" title="Añadir este sitio a Google" rel="syndication">[+] Buscador Google</a></li>
<li><a href="http://feeds.my.aol.com/add.jsp?url=<?php echo urlencode(get_bloginfo('rss2_url')) ?>" title="Añadir este sitio a My AOL" rel="syndication">[+] My AOL</a></li>
<li><a href="http://my.msn.com/addtomymsn.armx?id=rss&amp;ut=<?php echo urlencode(get_bloginfo('rss2_url')) ?>&amp;ru=http://my.msn.com" title="Añadir este sitio a My MSN" rel="syndication">[+] My MSN</a></li>
<li><a href="http://add.my.yahoo.com/rss?url=<?php echo urlencode(get_bloginfo('rss2_url')) ?>" title="Añadir este sitio a My Yahoo" rel="syndication">[+] My Yahoo</a></li>
<li><a href="http://www.newsgator.com/ngs/subscriber/subext.aspx?url=<?php echo urlencode(get_bloginfo('rss2_url')) ?>" title="Añadir este sitio a Newsgator" rel="syndication">[+] Newsgator</a></li>
<li><a href="http://client.pluck.com/pluckit/prompt.aspx?a=<?php echo urlencode(get_bloginfo('rss2_url')) ?>&amp;t=<?php echo urlencode(get_option('blogname')) ?>" title="Añadir este sitio a Pluckit" rel="syndication">[+] Pluckit</a></li>
<li><a href="http://www.rojo.com/add-subscription?resource=<?php echo urlencode(get_bloginfo('rss2_url')) ?>" title="Añadir este sitio a Rojo" rel="syndication">[+] Rojo</a></li>
</ul></li>
<?php endif; ?>


<?php if (is_home() ) : ?>
<li><h2>Enlaces favoritos</h2>
<ul class="menublock">
<li><?php get_linksbyname('', '', '<br />', '', TRUE, 'name', FALSE, TRUE); ?></li>
</ul></li>
<?php endif; ?>

</div>