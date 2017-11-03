   <div id="back">
    <?php if (isset($_SERVER["HTTP_REFERER"])) { ?>
        <span>&laquo; <a href="<?php echo $_SERVER['HTTP_REFERER'];?>" title="go back">regresar</a></span>
    <?php } ?>
        <a href="#documentContent" title="up to the page content">subir</a> &raquo;
    </div>
</div>
</div>

<div id="column2">
<div class="container-left">
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Left Sidebar') ) : else : ?>

<?php /* Adsense is disabled. Uncomment and fill in your details (ad_client_number) if you want to use it.
    <ul><li class="listHeader"><h3><?php _e('Publicidad'); ?></h3></li>
        <li class="adsense">
    <script type="text/javascript"><!--
        google_ad_client = "pub-edit-this-number";
        google_ad_width = 160;
        google_ad_height = 600;
        google_ad_format = "160x600_as";
        google_ad_type = "text_image";
        google_ad_channel ="";
        google_color_border = "FFFBFF";
        google_color_bg = "FFFBFF";
        google_color_link = "663300";
        google_color_url = "BB8800";
        google_color_text = "999999"; //--></script>
    <script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
    </script></li></ul>
*/ ?>


<?php /* Author information is disabled per default. Uncomment and fill in your details if you want to use it.
	<ul><li class="listHeader"><h2><?php _e('Author'); ?></h2></li>
		<li><p>A little something about you, the author. Nothing lengthy, just an overview.</p></li>
    </ul>
*/ ?>

    <ul><li class="listHeader"><h2><?php _e('Calendar'); ?></h2></li>
        <li class="calendar"><?php get_newcalendar() ?></li>
    </ul>

    <ul><li class="listHeader"><h2><?php _e('Archives'); ?></h2></li>
        <?php wp_get_archives('type=monthly'); ?>
    </ul>

    <ul><li class="listHeader"><h2><?php _e('Categories'); ?></h2></li>
        <?php wp_list_cats('sort_column=name&optioncount=0&hierarchical=0'); ?>
    </ul>

<?php endif; ?>
</div>
</div>
</div>

<div id="column3">
<div class="container-right">
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Right Sidebar') ) : else : ?>


<div class="rss"><a href="<?php bloginfo('rss2_url'); ?>" title="Subscribe to the <?php bloginfo('name'); ?> Blog" class="iconrss">RSS de los artículos</a></div>

<?php if (is_single()) { ?>
    <dl class="icons"><dt><?php _e('Compártelo'); ?></dt>
        <dd><a class="s_delicious" href="http://del.icio.us/post?title=<?php the_title(); ?>&amp;url=<?php echo get_permalink() ?>" title="Submit <?php the_title(); ?> to del.icio.us" rel="nofollow">delicious</a></dd>
        <dd><a class="s_digg" href="http://digg.com/submit?phase=2&amp;title=<?php the_title(); ?>&amp;url=<?php echo get_permalink() ?>" title="Submit <?php the_title(); ?> to digg" rel="nofollow">digg</a></dd>
        <dd><a class="s_technorati" href="http://www.technorati.com/faves?add=<?php echo get_permalink() ?>" title="Submit <?php the_title(); ?> to technorati" rel="nofollow">technorati</a></dd>
        <dd><a class="s_reddit" href="http://reddit.com/submit?title=<?php the_title(); ?>&amp;url=<?php echo get_permalink() ?>" title="Submit <?php the_title(); ?> to reddit" rel="nofollow">reddit</a></dd>
        <dd><a class="s_magnolia" href="http://ma.gnolia.com/beta/bookmarklet/add?title=<?php the_title(); ?>&amp;description=<?php the_title(); ?>&amp;url=<?php echo get_permalink() ?>" title="Submit <?php the_title(); ?> to magnolia" rel="nofollow">magnolia</a></dd>
        <dd><a class="s_stumbleupon" href="http://www.stumbleupon.com/submit?title=<?php the_title(); ?>&amp;url=<?php echo get_permalink() ?>" title="Submit <?php the_title(); ?> to stumbleupon" rel="nofollow">stumbleupon</a></dd>
        <dd><a class="s_yahoo" href="http://myweb2.search.yahoo.com/myresults/bookmarklet?title=<?php the_title(); ?>&amp;popup=true&amp;u=<?php echo get_permalink() ?>" title="Submit <?php the_title(); ?> to yahoo bookmarks" rel="nofollow">yahoo</a></dd>
        <dd><a class="s_google" href="http://www.google.com/bookmarks/mark?op=add&amp;title=<?php the_title(); ?>&amp;bkmk=<?php echo get_permalink() ?>" title="Submit <?php the_title(); ?> to google bookmarks" rel="nofollow">google</a></dd>
    </dl>
<?php } ?>

    <ul><li class="listHeader"><h2><?php _e('Latest Posts'); ?></h2></li>
        <?php wp_get_archives('type=postbypost&limit=10'); ?>
    </ul>

    <ul><li class="listHeader"><h2><?php _e('Friends'); ?></h2></li>
        <?php wp_get_linksbyname('Blogroll', 'before=<li>&after=</li>&orderby=name&show_description=0&show_updated=1') ?>
    </ul>

	<ul><li class="listHeader"><h2><?php _e('Meta'); ?></h2></li>
        <?php wp_register(); ?>
        <li><?php wp_loginout(); ?></li>
    	<li><a href="http://validator.w3.org/check/referer" title="Hopefully this page validates as XHTML 1.0 Strict">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
        <li><a href="http://jigsaw.w3.org/css-validator/check/referer" title="Valid CSS">Valid CSS</a></li>
    	<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
    	<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
        <?php wp_meta(); ?>
    </ul>

<?php endif; ?>
</div>
</div>

<br class="clear" />

</div>