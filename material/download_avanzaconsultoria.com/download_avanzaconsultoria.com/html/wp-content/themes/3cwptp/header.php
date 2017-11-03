<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="description" content="themename design by yourname coded by rkcorp and sponsored by sponsor links" /><!-- edit -->
<meta name="keywords" content="wordpress, wordpress theme, wordpress themes"/>
<meta name="author" content="<?php bloginfo('name') ?>" />
<meta name="coder" content="rkcorp" /><!-- remove this line if needed -->
<meta name="copyright" content="2007 <?php bloginfo('name') ?>" />
<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
<style type="text/css">
<!--
@import url("<?php bloginfo('stylesheet_url'); ?>");
-->
</style>
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>"  />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>"  />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="icon" href="/favicon.ico" type="image/x-icon" /><!-- remember to put a favourite icon for your site -->
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://scott-m.net/xmlrpc.php?rsd" />
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<?php wp_head(); ?>
</head>
<body>
<div id="wrap">
<div id="contain">
<div id="header">
<div class="search_box">
<div class="search_tag">
<form method="get" name="searchkeyword" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<p><input name="s" type="text" class="texxysearch" value="busca aquí"/></p><p><input name="submit" type="image" src="<?php bloginfo('stylesheet_directory'); ?>/images/sbutton.jpg" /></p>
</form>
</div>
</div>
<div class="site_header">
<div class="logo"><a href="index.php"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/sitelogo.jpg" alt="sitelogo" width="200" height="52" /></a></div>
</div>
</div>
<div id="navigator">
<div class="navigator_menu">
<ul>
<li><a href="<?php echo get_settings('home'); ?>">principal</a></li>
<?php wp_list_pages('title_li=&depth=1'); ?>
</ul>
</div>
<div class="rss_feed"><a href="<?php bloginfo('rss2_url'); ?>" title="Feed for <?php bloginfo('name'); ?>">rss feed</a></div>
</div>